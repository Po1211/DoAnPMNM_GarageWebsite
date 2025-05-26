<!DOCTYPE html>
<html lang="vi"> <!-- Khai báo ngôn ngữ là tiếng Việt -->

<head>
  <meta charset="UTF-8"> <!-- Khai báo mã hóa ký tự UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Đảm bảo trang web hiển thị tốt trên thiết bị di động -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

  <title>Trang Chủ</title> <!-- Tiêu đề trang web -->
  @vite([
  'resources/css/TrangChu02.css',
  'resources/css/ThanhSidebar.css',
  'resources/css/PhanFooter.css',
  'resources/js/NutCuonXuong02.js',
  'resources/js/CuonDichVu.js',
  'resources/js/ChuyenDongFeedback02.js',
  'resources/js/TinTucGanDay.js',
  'resources/js/ThanhSidebar.js',
  'resources/js/TruyCapAnh.js',
  ])

</head>

<body>

  <!-- Nút Menu -->
  <div class="menu-container">
    <div id="menu-icon" class="menu-icon">&#9776;</div> <!-- Biểu tượng Menu -->
  </div>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <!-- Logo ở đầu sidebar -->
    <a href="#" class="sidebar-logo">
      <img data-icon="LogoGarage" alt="Logo">
    </a>

    <!-- Icon tìm kiếm ở cuối sidebar -->
    <div class="sidebar-search">
      <a href="{{ route('tintucsearch') }}">
        <i class="fa fa-search"></i> <!-- Icon tìm kiếm -->
      </a>
    </div>
  </div>

  <!-- Overlay -->
  <div id="page-overlay" class="page-overlay">
    <ul class="menu-items">
      @auth
      <li><a href="{{ route('customer.cars') }}">{{ Auth::user()->name }}</a></li>
      @else
      <li><a href="{{ route('signin') }}">Đăng Nhập</a></li>
      <li><a href="{{ route('signup') }}">Đăng Ký</a></li>
      @endauth
      <li><a href="#" class="active">Trang Chủ</a></li>
      <li><a href="{{ route('gioithieu') }}">Giới Thiệu</a></li>

      <li class="has-submenu">
        <a href="{{ route('baotri') }}" class="expandable">Dịch vụ</a>
        <ul class="submenu">
          <li><a href="{{ route('baotri') }}">Bảo trì</a></li>
          <li><a href="{{ route('gammay') }}">Gầm máy</a></li>
          <li><a href="{{ route('phuchoi') }}">Phục hồi</a></li>
        </ul>
      </li>

      <li><a href="{{ route('tintuc') }}">Tin Tức</a></li>

      <li><a href="{{ route('lienhe') }}">Liên Hệ</a></li>
    </ul>
  </div>

  <!-- Phần hình nền lớn (Hero section) -->
  <div class="hero">
    <!-- Ảnh nền toàn màn hình -->
    <img data-image="02" alt="Hình nền" class="background">

    <!-- Phần văn bản hiển thị trên hình nền -->
    <div class="hero-text">
      <h1>Vì một cuộc sống tốt đẹp hơn cho mọi người</h1> <!-- Tiêu đề chính -->
      <a href="#new" class="scroll-down">Cuộn xuống
        <div class="arrow-down">&#8595;</div> <!-- Mũi tên xuống -->
      </a> <!-- Nút cuộn xuống -->
      </a>
    </div>
  </div>

  <!-- Phần Tin tức sự kiện -->
  <section id="news" class="news-section">
    <h2 class="news-title">Tin tức mới nhất</h2>
    <div class="news-container"></div>
    <a href="{{ route('tintuc') }}" class="view-all">Xem tất cả</a>
  </section>

  <section class="fields-section">
    <div class="field-content">
    </div>

    <div class="card-container">
      <div class="field-card">
        <img data-image="01" alt="Công Nghệ">
        <h3>Bảo trì - Bảo dưỡng</h3>
        <a href="{{ route('baotri') }}" class="view-more">Xem thêm ➝</a>
      </div>

      <div class="field-card">
        <img data-image="02" alt="Thương Mại">
        <h3>Dịch vụ - Gầm máy</h3>
        <img data-image="Banner00" alt="Thương mại dịch vụ" class="service-img">
        <a href="{{ route('gammay') }}" class="view-more">Xem thêm ➝</a>
      </div>

      <div class="field-card">
        <img data-image="03" alt="Thiện Nguyện">
        <h3>Phục hồi xe Tai nạn - Va chạm</h3>
        <a href="{{ route('phuchoi') }}" class="view-more">Xem thêm ➝</a>
      </div>
    </div>
  </section>


  <!-- Giới thiệu về Trung Tâm Ô Tô AHK -->
  <section class="about-section">
    <div class="about-content">
      <div class="about-text">
        <h2>Về Trung Tâm Ô Tô Phúc Hoàn</h2>
        <p>Garage ô tô [Tên Garage] là địa chỉ đáng tin cậy cho mọi nhu cầu sửa chữa, bảo dưỡng và chăm sóc xe hơi tại [địa chỉ]. Với hơn 30 năm kinh nghiệm trong ngành, chủ sở hữu của [Tên Garage] tự tin mang đến dịch vụ chất lượng cao và sự hài lòng tuyệt đối cho khách hàng. Chúng tôi tự hào là đối tác tin cậy của hàng nghìn chủ xe, từ các dòng xe phổ thông đến các dòng xe cao cấp.
        </p>
        <a href="#" class="btn about-btn">Xem thêm</a>
      </div>
      <div class="about-video">
        <!-- Giả sử đây là một video, bạn có thể thay bằng hình ảnh nếu cần -->
        <iframe width="560" height="315" src="https://www.youtube.com/watch?v=-60sYyKXkew" title="Giới thiệu về Garage" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </section>


  <!-- Phần Câu hỏi thường gặp -->
  <section class="faq-section">
    <div class="container">
      <div class="section-title">
        <h2>Câu hỏi thường gặp</h2>
        <p>Tổng hợp những câu hỏi thường gặp nhất dành cho khách hàng</p>
      </div>
      <div class="faq-columns">
        <div class="faq-column">
          <div class="faq-item">
            <button class="faq-question">Tôi có thể đặt lịch bảo dưỡng ô tô tại Garage Quang Đức như thế nào ?</button>
            <div class="faq-answer">
              <ol>
                <li>Thông qua số hotline: <strong>0913 518 953</strong></li>
                <li>Thông qua website (link đặt lịch)</li>
                <li>Thông qua Facebook page: <a href="https://www.facebook.com/garaphuchoan">https://www.facebook.com/garaphuchoan</a></li>
              </ol>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Garage Quang Đức có cung cấp dịch vụ bảo dưỡng tận nơi không ?</button>
            <div class="faq-answer">
              <p>Hiện tại gara chưa cung cấp</p>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Các hình thức thanh toán khi sử dụng dịch vụ của Garage Quang Đức ?</button>
            <div class="faq-answer">
              <ol>
                <li>Tiền mặt</li>
                <li>Chuyển khoản</li>
              </ol>
            </div>
          </div>
        </div>
        <div class="faq-column">
          <div class="faq-item">
            <button class="faq-question">Tôi cần làm gì nếu xe gặp sự cố giữa đường ?</button>
            <div class="faq-answer">
              <p>Gọi ngay cho số hot-line: <strong>0913 518 953</strong> </p>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Sẽ cần bao nhiêu thời gian cho việc sửa chữa và bảo dưỡng ?</button>
            <div class="faq-answer">
              <p>Chúng tôi sẽ cập nhật thông tin sau khi hoàn tất việc kiểm tra</p>
            </div>
          </div>
          <div class="faq-item">
            <button class="faq-question">Điều gì làm Gara Phúc Hoàn khác biệt so với các đại lý ô tô chính hãng ?</button>
            <div class="faq-answer">
              <ol>
                <li> <strong> Chi phí hợp lý: </strong> Gara Phúc Hoàn cung cấp dịch vụ sửa chữa và bảo dưỡng với mức giá cạnh tranh, thường thấp hơn so với các đại lý chính hãng, giúp khách hàng tiết kiệm chi phí.</li>
                <li> <strong> Linh hoạt trong lựa chọn phụ tùng: </strong> Khách hàng tại Gara Phúc Hoàn có thể lựa chọn giữa phụ tùng chính hãng hoặc các sản phẩm từ nhà cung cấp thứ ba có chất lượng tốt và giá cả phù hợp, đáp ứng nhu cầu đa dạng của người sử dụng.</li>
                <li> <strong> Kinh nghiệm đa dạng: </strong> Đội ngũ kỹ thuật viên tại Gara Phúc Hoàn có kinh nghiệm làm việc với nhiều dòng xe và hãng xe khác nhau, cho phép họ nhanh chóng chẩn đoán và khắc phục các sự cố phức tạp mà đôi khi đại lý chính hãng có thể gặp khó khăn.</li>
                <li> <strong> Thời gian phục vụ linh hoạt: </strong> Gara Phúc Hoàn thường có khả năng đáp ứng nhanh chóng nhu cầu của khách hàng, giảm thiểu thời gian chờ đợi so với các đại lý chính hãng, đặc biệt trong những thời điểm cao điểm.</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="#">
      <div class="more-button">
        <button>Xem thêm</button>
      </div>
    </a>
  </section>

  <!-- Phần Feedback khách hàng -->
  <section class="latest-news">
    <h2>Feedback khách hàng</h2>
    <div class="container">
      <div class="news-carousel">
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="doingu1" alt="AUDI Q7 Phục hồi sửa chữa">
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="doingu2" alt="Phục hồi Mazda CX5">
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="doingu3" alt="Thay đèn xe Mercedes">
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="doingu1" alt="Phục hồi xe tai nạn">
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="doingu2" alt="Phục hồi xe">
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Phần Footer -->
  <div class="footer-section">
    <div class="footer-container">

      <!-- Logo và thông tin liên hệ -->
      <div class="footer-column">
        <img data-icon="LogoGarage" alt="Garage Logo" class="footer-logo">
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
          <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
          <li><a href="{{ route('baotri') }}">Dịch vụ</a></li>
          <li><a href="{{ route('tintuc') }}">Tin tức</a></li>
          <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
        </ul>
      </div>

      <!-- Dịch vụ -->
      <div class="footer-column">
        <h4>Dịch vụ</h4>
        <ul>
          <li><a href="{{ route('baotri') }}">Bảo trì, bảo dưỡng</a></li>
          <li><a href="{{ route('gammay') }}">Dịch vụ gầm máy</a></li>
          <li><a href="{{ route('phuchoi') }}">Phục hồi xe tai nạn - Va chạm</a></li>
        </ul>
      </div>

      <!-- Giờ làm việc -->
      <div class="working-hours-box">
        <div class="working-hours-icon">
          <img data-icon="Clock-02" alt="Clock Icon">
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


  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2024 Garage AHK. All rights reserved.</p>
  </footer>

  <!-- Social Icons Fixed -->
  <div class="social-icons-fixed">
    <a href="https://www.facebook.com/garaphuchoan" target="_blank" class="social-icon facebook"><img data-icon="Logo FB" alt="Facebook"></a>
    <a href="#" target="_blank" class="social-icon zalo"><img data-icon="Logo Zalo" alt="Zalo"></a>
    <a href="tel:0923387840" target="_blank" class="icon-phone"><img data-icon="Logo Phone" alt="Phone"></a>
    <a href="https://www.facebook.com/garaphuchoan" target="_blank" class="social-icon messenger"><img data-icon="Logo Mes" alt="Messenger"></a>
    <a href="https://maps.app.goo.gl/kk4zgrAmjhvnoJTW9" target="_blank" class="social-icon maps"><img data-icon="Logo Map" alt="Google Maps"></a>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const faqQuestions = document.querySelectorAll(".faq-question");

      faqQuestions.forEach(question => {
        question.addEventListener("click", function() {
          // Đóng tất cả các câu trả lời khác trước khi mở câu hỏi mới
          faqQuestions.forEach(q => {
            if (q !== question) {
              q.classList.remove("active");
              q.nextElementSibling.style.display = "none";
            }
          });

          // Chuyển đổi trạng thái hiển thị của câu hỏi hiện tại
          this.classList.toggle("active");
          const answer = this.nextElementSibling;

          if (answer.style.display === "block") {
            answer.style.display = "none";
          } else {
            answer.style.display = "block";
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.news-carousel').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
      });
    });
  </script>

</body>

</html>