<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garage AHK - Giới thiệu</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">

  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

  @vite([
  'resources/css/GioiThieu01.css',
  'resources/css/ThanhSidebar.css',
  'resources/css/PhanFooter.css',
  'resources/js/ChuyenDongFeedback01.js',
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
    <a href="{{ route('home') }}" class="sidebar-logo">
      <img data-icon="LogoGarage" alt="Logo" />
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
      <li><a href="{{ route('home') }}" class="active">Trang Chủ</a></li>
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

  <!-- Phần tiêu đề chính (Hero Section) -->
  <section class="hero">
    <div class="hero-content">
      <h2>GARAGE SƠN XE Ô TÔ UY TÍN TẠI HÀ NỘI</h2>
      <p><a href="{{ route('home') }}">Trang chủ</a> / GARAGE SƠN XE Ô TÔ UY TÍN TẠI HÀ NỘI</p>
    </div>
  </section>

  <!-- Phần giới thiệu Garage -->
  <section class="garage-info">
    <h2>GARAGE SƠN XE Ô TÔ UY TÍN TẠI HÀ NỘI</h2>
    <p>Rất nhiều chữ</p>

    <!-- Video về Garage Quang Đức -->
    <div class="video-container">
      <iframe width="560" height="315" src="https://www.youtube.com/watch?v=-60sYyKXkew&t=2s" frameborder="0" allowfullscreen></iframe>
    </div>

    <p>Rất nhiều chữ</p>

    <div class="images-container">
      <div class="images-x3">
        <img data-image="01" loading="lazy" alt="Tin tức 1">
      </div>
    </div>
  </section>

  <!-- Phần giới thiệu đặc điểm nổi bật -->
  <section class="highlights">
    <h2>Garage AHK - Nơi gửi trọn niềm tin của khách hàng</h2>
    <div class="highlight-container">
      <div class="highlight-item">
        <img data-image="01" loading="lazy" alt="Kỹ thuật viên chuyên nghiệp">
        <h3>Kỹ thuật viên chuyên nghiệp</h3>
        <p>Tất cả kỹ thuật viên của Garage Quang Đức đều có trình độ kỹ thuật cao cũng như nhiều năm kinh nghiệm, có thể xử lý mọi vấn đề mà chiếc xe của Quý khách đang gặp phải.</p>
      </div>
      <div class="highlight-item">
        <img data-image="02" loading="lazy" alt="Năng suất làm việc cao">
        <h3>Năng suất làm việc cao</h3>
        <p>Được đào tạo bài bản và làm việc trong một môi trường năng động, chuyên nghiệp, các kỹ thuật viên của Garage Quang Đức là những người có năng suất làm việc cực kỳ ấn tượng.</p>
      </div>
      <div class="highlight-item">
        <img data-image="03" loading="lazy" alt="Công nghệ tiên tiến">
        <h3>Công nghệ tiên tiến</h3>
        <p>Garage Quang Đức luôn cập nhật và ứng dụng những công nghệ tiên tiến nhất vào quá trình bảo dưỡng, sửa chữa xe ô tô, giúp xe vận hành một cách mạnh mẽ và bền bỉ hơn.</p>
      </div>
      <div class="highlight-item">
        <img data-image="04" loading="lazy" alt="Đội ngũ hỗ trợ 24/7">
        <h3>Đội ngũ hỗ trợ 24/7</h3>
        <p>Bất cứ lúc nào chiếc xe của Quý khách gặp sự cố, đừng ngần ngại liên hệ ngay với Garage Quang Đức để được hỗ trợ một cách tốt nhất.</p>
      </div>
    </div>
  </section>

  <!-- Phần Cam kết của chúng tôi -->
  <section class="commitments">
    <h2>Cam kết của chúng tôi</h2>
    <div class="commitment-container">
      <div class="commitment-item">
        <img data-image="01" loading="lazy" alt="Dịch vụ chất lượng cao">
        <h3>Dịch vụ chất lượng cao</h3>
        <p>Xe của Quý khách sẽ được chăm sóc bởi những kỹ thuật viên và công nghệ tiên tiến nhất.</p>
      </div>
      <div class="commitment-item">
        <img data-image="02" loading="lazy" alt="Hoàn trả xe nhanh chóng">
        <h3>Hoàn trả xe nhanh chóng</h3>
        <p>Quý khách sẽ nhận lại xe của mình trong thời gian sớm nhất.</p>
      </div>
      <div class="commitment-item">
        <img data-image="03" loading="lazy" alt="Tận tình và chu đáo">
        <h3>Tận tình và chu đáo</h3>
        <p>Tư vấn lựa chọn dịch vụ phù hợp một cách tận tình nhất.</p>
      </div>
      <div class="commitment-item">
        <img data-image="04" loading="lazy" alt="Không quản ngày đêm">
        <h3>Không quản ngày đêm</h3>
        <p>Hỗ trợ khách hàng bất kể ngày đêm khi xe gặp sự cố.</p>
      </div>
    </div>
  </section>

  <!-- Phần Feedback khách hàng -->
  <section class="latest-news">
    <h2>Feedback khách hàng</h2>
    <div class="container">
      <div class="news-carousel">
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="01" alt="AUDI Q7 Phục hồi sửa chữa">
          </div>
          <div class="news-description">
            <h3>AUDI Q7 PHỤC HỒI SỬA CHỮA</h3>
            <p>Việc phục hồi xe sau tai nạn là một quá trình quan trọng để đảm bảo an toàn...</p>
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="02" alt="Phục hồi Mazda CX5">
          </div>
          <div class="news-description">
            <h3>PHỤC HỒI MAZDA CX5</h3>
            <p>Việc phục hồi xe sau tai nạn là một quá trình quan trọng để đảm bảo an toàn...</p>
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="03" alt="Thay đèn xe Mercedes">
          </div>
          <div class="news-description">
            <h3>THAY ĐÈN XE MERCEDES</h3>
            <p>Việc phục hồi xe sau tai nạn là một quá trình quan trọng để đảm bảo an toàn...</p>
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="04" alt="Phục hồi xe tai nạn">
          </div>
          <div class="news-description">
            <h3>PHỤC HỒI XE TAI NẠN</h3>
            <p>Việc phục hồi xe tai nạn là một quá trình quan trọng để đảm bảo an toàn...</p>
          </div>
        </a>
        <a href="#" class="news-items">
          <div class="news-image">
            <img data-image="05" alt="Phục hồi xe">
          </div>
          <div class="news-description">
            <h3>PHỤC HỒI XE</h3>
            <p>Việc phục hồi xe tai nạn là một quá trình quan trọng để đảm bảo an toàn...</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- Phần Hình ảnh Garage AHK -->
  <section class="gallery">
    <h2>Hình ảnh Garage AHK</h2>
    <div class="gallery-container">
      <div class="gallery-item">
        <img data-image="01" loading="lazy" alt="Hình ảnh 1">
      </div>
      <div class="gallery-item">
        <img data-image="02" loading="lazy" alt="Hình ảnh 2">
      </div>
      <div class="gallery-item">
        <img data-image="03" loading="lazy" alt="Hình ảnh 3">
      </div>
    </div>
    <div class="see-more">
      <a href="#" class="btn">Xem thêm</a>
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
          <li><a href="{{ route('home') }}">Trang chủ</a></li>
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