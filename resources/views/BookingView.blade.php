<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Garage AHK - Liên hệ</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  @vite([
  'resources/css/LienHe01.css',
  'resources/css/ThanhSidebar.css',
  'resources/css/PhanFooter.css',
  'resources/js/ThanhSidebar.js',
  'resources/js/TruyCapAnh.js',
  'resources/js/LienHe.js',
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
      <li><a href="{{ route('signin') }}">Đăng Nhập</a></li>
      <li><a href="{{ route('signup') }}">Đăng Ký</a></li>
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

      <li><a href="{{ route('tintuc') }}"">Tin Tức</a></li>
  
      <li><a href=" #">Liên Hệ</a></li>
    </ul>
  </div>

  <!-- Phần tiêu đề chính (Hero Section) -->
  <section class="hero">
    <div class="hero-content">
      <h2>LIÊN HỆ</h2>
      <p><a href="{{ route('home') }}">Trang chủ</a> / Liên hệ</p>
    </div>
  </section>

  <!-- Phần Google Maps -->
  <section class="map-section">
    <h1> </h1>
    <div class="map-container">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14898.978922698849!2d105.8739419!3d21.0028673!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad8a53b4a489%3A0xe00dac89e90531b3!2zR2FyYSDDtCB0w7QgUGjDumMgSG_DoG4!5e0!3m2!1svi!2s!4v1728310649355!5m2!1svi!2s" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>

  <!-- Phần Liên hệ đặt lịch -->
  <section class="contact-schedule">
    <div class="form-wrapper">
      <h2 class="schedule-title">ĐẶT LỊCH DỊCH VỤ</h2>

      <form id="appointment-form" method="POST" action="{{ route('appointments.store') }}">
        @csrf

        <div class="schedule-grid">
          <!-- Section 1: Customer Info -->
          <div class="schedule-section">
            <div class="section-header">
              <span class="step-number">1</span> Thông tin khách hàng
            </div>
            <div class="field">
              <label for="name">Họ tên <span class="required">*</span></label>
              <input type="text" id="name" name="name" required maxlength="80" placeholder="Nhập họ và tên">
            </div>
            <div class="field">
              <label for="phone">Số điện thoại <span class="required">*</span></label>
              <input type="tel" id="phone" name="phone" required pattern="\d{10,15}" placeholder="Tối thiểu 10 chữ số">
            </div>
            <div class="field">
              <label for="email">Email <span class="required">*</span></label>
              <input type="email" id="email" name="email" required placeholder="ví dụ: vidu@gmail.com">
            </div>
          </div>

          <!-- Section 2: Vehicle Info -->
          <div class="schedule-section">
            <div class="section-header">
              <span class="step-number">2</span> Thông tin xe
            </div>
            <div class="field">
              <label for="model">Mẫu xe <span class="required">*</span></label>
              <select id="model" name="model" required>
                <option value="" disabled selected hidden>Lựa chọn</option>
                <option value="Santafe">Hyundai Santafe</option>
                <option value="Soluto">Kia Soluto</option>
                <option value="Vios">Toyota Vios</option>
                <option value="CX5">Mazda CX-5</option>
                <option value="Civic">Honda Civic</option>
                <option value="Everest">Ford Everest</option>

              </select>
            </div>
            <div class="field">
              <label for="km">Số Km</label>
              <input type="number" id="km" name="km" placeholder="Nhập số km trên xe">
            </div>
            <div class="field">
              <label for="plate">Biển số xe <span class="required">*</span></label>
              <input type="text" id="plate" name="plate" required placeholder="Nhập biển số xe">
            </div>
          </div>

          <!-- Section 3: Services -->
          <div class="schedule-section">
            <div class="section-header">
              <span class="step-number">3</span> Dịch vụ
            </div>
            <div class="checkbox-group">
              <div class="service-item">
                <label>Bảo trì</label>
                <a href="#" class="detail-link">Thêm chi tiết</a>
                <input type="checkbox" name="services[]" value="Bảo trì" class="service-checkbox">
              </div>

              <div class="service-item">
                <label>Gầm máy</label>
                <a href="#" class="detail-link">Thêm chi tiết</a>
                <input type="checkbox" name="services[]" value="Gầm máy" class="service-checkbox">
              </div>

              <div class="service-item">
                <label>Phục hồi</label>
                <a href="#" class="detail-link">Thêm chi tiết</a>
                <input type="checkbox" name="services[]" value="Phục hồi" class="service-checkbox">
              </div>
            </div>

            <div class="field">
              <label for="notes">Ghi chú</label>
              <textarea id="notes" name="notes" placeholder="Ví dụ: cần kiểm tra thêm…"></textarea>
            </div>
          </div>

          <!-- Section 4: Appointment Time -->
          <div class="schedule-section">
            <div class="section-header">
              <span class="step-number">4</span>Thời gian
            </div>
            <div class="field-inline">
              <div class="field">
                <label for="date">Ngày <span class="required">*</span></label>
                <input type="text" id="date" name="date" required>
              </div>
              <div class="field">
                <label for="time">Giờ <span class="required">*</span></label>
                <select id="time" name="time" required style="width: 120px;">
                  <option value="" disabled selected hidden>Chọn giờ</option>
                  @foreach($fixedSlots as $slot)
                  <option value="{{ $slot }}">{{ \Carbon\Carbon::createFromFormat('H:i', $slot)->format('g:i A') }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- Submit -->
        <div class="form-actions full-width">
          <button type="submit" class="btn-submit">Gửi yêu cầu</button>
        </div>
      </form>

    </div>

    <div id="confirmation-modal" class="custom-modal {{ session('show_modal') ? '' : 'hidden' }}">
      <div class="custom-modal-content">
        <h3 class="modal-title">Yêu cầu đã gửi thành công!</h3>
        <p class="modal-text">Bạn có muốn đăng ký thành viên không?</p>
        <div class="modal-buttons">
          <button class="btn-cancel">Về trang chủ</button>
          <a href="{{ route('signup') }}" class="btn-confirm">Đăng ký</a>
        </div>
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
          <li><a href="{{ route('home') }}">Trang chủ</a></li>
          <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
          <li><a href="{{ route('baotri') }}">Dịch vụ</a></li>
          <li><a href="{{ route('tintuc') }}">Tin tức</a></li>
          <li><a href="#">Liên hệ</a></li>
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

  <div id="booking-meta"
    data-fully-booked="{{ implode(',', $fullyBookedDates) }}"
    data-fixed-slots="{{ implode(',', $fixedSlots) }}"
    data-booked-slots='@json($bookedSlots)'>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const cancelBtn = document.querySelector('.btn-cancel');
      if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
          window.location.href = "{{ route('home') }}";
        });
      }
    });
  </script>

  <script type="application/json" id="booking-data">
    {
      !!json_encode([
        'fullyBookedDates' => $fullyBookedDates,
        'bookedSlotsByDate' => $bookedSlots,
        'fixedSlots' => $fixedSlots
      ], JSON_UNESCAPED_UNICODE) !!
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>

</html>