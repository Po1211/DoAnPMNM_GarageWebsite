<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Garage AHK - Lịch sử</title>

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
    'resources/css/DichVu.css',
    'resources/css/ThanhSidebar.css',
    'resources/css/PhanFooter.css',
    'resources/js/ThanhSidebar.js',
    'resources/js/TruyCapAnh.js',
    'resources/js/DichVu.js',
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
            @auth
            <li><a href="{{ route('customer.cars') }}">{{ Auth::user()->name }}</a></li>
            @else
            <li><a href="{{ route('signin') }}">Đăng Nhập</a></li>
            <li><a href="{{ route('signup') }}">Đăng Ký</a></li>
            @endauth
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
            <h2>LỊCH SỬ</h2>
            <p><a href="{{ route('home') }}">Trang chủ</a> / Lịch sử</p>
        </div>
    </section>

    <section class="history">
        <div class="container">
            <!-- Left side -->
            <div class="card profile-card">

                <div class="profile-header">
                    <div class="profile-info">
                        <strong>Xin chào,</strong> {{ $customer->name }}
                    </div>

                    <div class="logout-wrap">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Đăng xuất</button>
                        </form>
                    </div>

                    <div class="back-wrap">
                        <a href="{{ route('customer.cars') }}" class="back-link">← Quay lại danh sách xe</a>
                    </div>
                </div>
            </div>

            <!-- Right side -->
            <div class="card service-card">
                <div class="header">
                    <div>
                        <h3>{{ $vehicle->vehicle_type }}</h3>
                        <div>Biển số xe: <strong>{{ $vehicle->vehicle_plate }}</strong></div>
                    </div>
                    <a href="{{ route('lienhe') }}" class="book-btn">Đặt lịch dịch vụ</a>
                </div>

                <div class="section-title">Lịch hẹn sắp tới</div>
                @forelse ($upcomingAppointments as $appt)
                <div class="schedule-card">
                    <div class="date-box">
                        <div>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('d') }}</div>
                        <div>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('m/Y') }}</div>
                    </div>
                    <div class="schedule-info">
                        <h4>{{ $appt->service_type }}</h4>
                        <div>335 Nguyễn Khoái, Thanh Long, Hai Bà Trưng, Hà Nội</div>
                        <div>Số km đã đi: <strong>{{ $vehicle->vehicle_traveled }}</strong></div>
                        <div class="status">
                            <span>🕒 {{ \Carbon\Carbon::parse($appt->appointment_date)->format('H:i') }}</span>
                            <span class="status-green">🟢 {{ ucfirst($appt->status) }}</span>
                            <form method="POST" action="{{ route('appointment.cancel', $appt->appointment_id) }}">
                                @csrf
                                <button type="submit" class="cancel-btn">Hủy Lịch</button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <p style="padding-left: 16px;">Không có lịch hẹn nào.</p>
                @endforelse

                <div class="section-title">Lịch sử dịch vụ</div>
                @forelse ($pastAppointments as $appt)
                <div class="schedule-card">
                    <div class="date-box">
                        <div>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('d') }}</div>
                        <div>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('m/Y') }}</div>
                    </div>
                    <div class="schedule-info">
                        <h4>{{ $appt->service_type }}</h4>
                        <div>335 Nguyễn Khoái, Thanh Long, Hai Bà Trưng, Hà Nội</div>
                        <div>Số km đã đi: <strong>{{ $vehicle->vehicle_traveled }}</strong></div>
                        <div class="status">
                            <span>🕒 {{ \Carbon\Carbon::parse($appt->appointment_date)->format('H:i') }}</span>
                            @if ($appt->status === 'completed')
                            <span class="status-green">✔️ Hoàn thành</span>
                            @elseif ($appt->status === 'cancelled')
                            <span class="status-red">❌ Đã hủy</span>
                            @else
                            <span>{{ ucfirst($appt->status) }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @empty
                <p style="padding-left: 16px;">Không có lịch sử dịch vụ.</p>
                @endforelse
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

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</body>

</html>