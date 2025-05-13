const sheetID = '1M1vlTD4L1cTuf9U4un5lIDxogVVlXkhkHgTmvhMPH4I'; 
const apiKey = 'AIzaSyCC3ehiGhHCg0pP81LLrPCHX2vb84xUUQo'; 
const newsRange = 'NewsPage!A:Y'; 
const url = `https://sheets.googleapis.com/v4/spreadsheets/${sheetID}/values/${newsRange}?key=${apiKey}`;

const articlesPerPage = 5; 
let currentPage = 1; 

function fetchNewsArticles() {
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const rows = data.values;
            if (rows && rows.length > 1) {
                const newsContainer = document.querySelector('.news-grid');
                newsContainer.innerHTML = '';

                const start = (currentPage - 1) * articlesPerPage + 1;
                const end = start + articlesPerPage;
                const articlesToShow = rows.slice(start, end);

                if (articlesToShow.length > 0) {
                    const firstArticleNID = articlesToShow[0][0];
                    const firstArticle = document.createElement('a');
                    firstArticle.href = `/tin-tuc-chi-tiet?id=${firstArticleNID}`;
                    firstArticle.className = 'news-card large';
                    firstArticle.innerHTML = `
                        <img src="${getGoogleDriveThumbnail(articlesToShow[0][2])}" alt="News Image">
                        <div class="news-overlay">
                            <div class="news-content">
                                <h2>${articlesToShow[0][1]}</h2>
                                <p>${articlesToShow[0][24]}</p> <!-- Updated to use column 25 for the date -->
                            </div>
                        </div>
                    `;
                    newsContainer.appendChild(firstArticle);
                }

                articlesToShow.slice(1).forEach(row => {
                    const articleNID = row[0]; // NID
                    const newsCard = document.createElement('a');
                    newsCard.href = `TrangTinTuc/TrangTinTuc.html?id=${articleNID}`;
                    newsCard.className = 'news-card';
                    newsCard.innerHTML = `
                        <img src="${getGoogleDriveThumbnail(row[2])}" alt="News Image">
                        <div class="news-content">
                            <h2>${row[1]}</h2>
                            <p>${row[24]}</p> <!-- Updated to use column 25 for the date -->
                        </div>
                    `;
                    newsContainer.appendChild(newsCard);
                });

                updatePagination(rows.length - 1); 
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

function getGoogleDriveThumbnail(url) {
    if (url.includes("drive.google.com")) {
        const fileId = url.match(/d\/(.+?)\//)[1];
        return `https://drive.google.com/thumbnail?id=${fileId}&sz=w1360-h1020`;
    }
    return url;
}

function updatePagination(totalArticles) {
    const totalPages = Math.ceil(totalArticles / articlesPerPage);
    const paginationContainer = document.querySelector('.pagination');
    paginationContainer.innerHTML = ''; 

    for (let i = 1; i <= totalPages; i++) {
        const pageLink = document.createElement('a');
        pageLink.href = '#';
        pageLink.className = 'page-number';
        pageLink.innerText = i;
        if (i === currentPage) pageLink.classList.add('active');

        pageLink.addEventListener('click', (event) => {
            event.preventDefault();
            currentPage = i;
            fetchNewsArticles();
        });

        paginationContainer.appendChild(pageLink);
    }
}

fetchNewsArticles();
