<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Article - VinFast</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite([
    'resources/css/TrangTinTuc.css',
    'resources/css/ThanhSidebar.css',
    'resources/css/PhanFooter.css',
    'resources/js/TrangTinTuc.js',
    'resources/js/ThanhSidebar.js',
    'resources/js/TruyCapAnh.js',
    ])
</head>

<body>

    <div class="menu-container">
        <div id="menu-icon" class="menu-icon">&#9776;</div> <!-- Biểu tượng Menu -->
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">

        <!-- Logo ở đầu sidebar -->
        <a href="/A-TrangChu/TrangChu02.html" class="sidebar-logo">
            <img src="/icons/Logo.jpg" alt="Logo" />
        </a>

        <!-- Icon tìm kiếm ở cuối sidebar -->
        <div class="sidebar-search">
            <a href="/D-TinTucMain/TinTucSearch.html">
                <i class="fa fa-search"></i> <!-- Icon tìm kiếm -->
            </a>
        </div>
    </div>

    <!-- Overlay -->
    <div id="page-overlay" class="page-overlay">
        <ul class="menu-items">
            @auth
            @if(Auth::user()->role === 'admin')
            <li><a href="{{ route('admin.weekly') }}">{{ Auth::user()->name }} (Admin)</a></li>
            @else
            <li><a href="{{ route('customer.cars') }}">{{ Auth::user()->name }}</a></li>
            @endif
            @else
            <li><a href="{{ route('signin') }}">Đăng Nhập</a></li>
            <li><a href="{{ route('signup') }}">Đăng Ký</a></li>
            @endauth

            <li><a href="#" class="active">Trang Chủ</a></li>
            <li><a href="/B-GioiThieu/GioiThieu01.html">Giới Thiệu</a></li>

            <li class="has-submenu">
                <a href="/C-DichVu/01-BaoTri/BaoTri.html" class="expandable">Dịch vụ</a>
                <ul class="submenu">
                    <li><a href="/C-DichVu/01-BaoTri/BaoTri.html">Bảo trì</a></li>
                    <li><a href="/C-DichVu/02-GamMay/GamMay01.html">Gầm máy</a></li>
                    <li><a href="/C-DichVu/03-PhucHoi/PhucHoi.html">Phục hồi</a></li>
                </ul>
            </li>

            <li><a href="/D-TinTucMain/TinTucMain.html">Tin Tức</a></li>

            <li><a href="/E-LienHe/LienHe01.html">Liên Hệ</a></li>
        </ul>
    </div>


    <div class="article-container" id="article-container">
        <nav class="breadcrumb">
            <a href="../../A-TrangChu/TrangChu02.html">Trang chủ</a> &gt;
            <a href="../TinTucMain.html">Tin Tức</a> &gt;
        </nav>
        <h1 class="article-title" id="article-title"></h1>
        <div class="article-meta" id="article-meta"></div>
        <img class="article-image" id="intro-image" alt="Article Intro Image">
        <div class="article-content" id="article-content"></div>
    </div>

    <div class="tags-container"></div>

    <div class="related-news-container">
        <h2 class="related-news-title">TIN TỨC KHÁC</h2>
        <div class="related-news-grid" id="related-news-grid">

        </div>
    </div>

    <!-- Phần Footer -->
    <div class="footer-section">
        <div class="footer-container">

            <!-- Logo và thông tin liên hệ -->
            <div class="footer-column">
                <img src="/icons/Logo.jpg" alt="Garage Logo" class="footer-logo">
                <h3>GARAGE QUANG ĐỨC</h3>
                <ul>
                    <li><i class="fa fa-map-marker"></i><a href="https://maps.app.goo.gl/kk4zgrAmjhvnoJTW9" target="_blank"> <strong>Địa chỉ: </strong> 335 Nguyễn Khoái, Thanh Long, Hai Bà Trưng, Hà Nội </a></li>
                    <li><i class="fa fa-phone"></i><a href="tel:0962677726" target="_blank"> <strong>Hotline: </strong> 0962677726 </a></li>
                    <li><i class="fa fa-envelope"></i><a href="mailto:Garaquangduc1075@gmail.com" target="_blank"> <strong>Email: </strong> Garaquangduc1075@gmail.com</a></li>

                    <a href="//www.dmca.com/Protection/Status.aspx?ID=52b584c4-d79c-4d9e-b37c-4b8f5771e4c1" title="DMCA.com Protection Status" class="dmca-badge">
                        <img src="https://images.dmca.com/Badges/dmca_protected_sml_120l.png?ID=52b584c4-d79c-4d9e-b37c-4b8f5771e4c1" alt="DMCA.com Protection Status" />
                    </a>
                    <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                </ul>
            </div>

            <!-- Thông tin công ty -->
            <div class="footer-column">
                <h4>Thông tin công ty</h4>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="/B-GioiThieu/GioiThieu01.html">Giới thiệu</a></li>
                    <li><a href="/C-DichVu/01-BaoTri/BaoTri.html">Dịch vụ</a></li>
                    <li><a href="/D-TinTucMain/TinTucMain.html">Tin tức</a></li>
                    <li><a href="/E-LienHe/LienHe01.html">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Dịch vụ -->
            <div class="footer-column">
                <h4>Dịch vụ</h4>
                <ul>
                    <li><a href="/C-DichVu/01-BaoTri/BaoTri.html">Bảo trì, bảo dưỡng</a></li>
                    <li><a href="/C-DichVu/02-GamMay/GamMay01.html">Dịch vụ gầm máy</a></li>
                    <li><a href="/C-DichVu/03-PhucHoi/PhucHoi.html">Phục hồi xe tai nạn - Va chạm</a></li>
                </ul>
            </div>

            <!-- Giờ làm việc -->
            <div class="working-hours-box">
                <div class="working-hours-icon">
                    <img src="/icons/Clock-02.png" alt="Clock Icon">
                </div>
                <h4>GIỜ LÀM VIỆC</h4>
                <ul>
                    <li>Thứ 2: 9h00 - 19h00</li>
                    <li>Thứ 3: 9h00 - 19h00</li>
                    <li>Thứ 4: 9h00 - 19h00 </li>
                    <li>Thứ 5: 9h00 - 19h00 </li>
                    <li>Thứ 6: 9h00 - 19h00 </li>
                    <li>Thứ 7: 9h00 - 19h00 </li>
            </div>

        </div>
    </div>
</body>

</html>