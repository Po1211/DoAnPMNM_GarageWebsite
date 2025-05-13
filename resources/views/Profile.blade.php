<h2>Thông tin người dùng</h2>
<p><strong>Tên:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

@if ($customer)
    <hr>
    <h3>Thông tin khách hàng</h3>
    <p><strong>Tên:</strong> {{ $customer->name }}</p>
    <p><strong>Điện thoại:</strong> {{ $customer->phone }}</p>
@endif

@if (count($vehicles))
    <hr>
    <h3>Xe đã đăng ký</h3>
    @foreach ($vehicles as $v)
        <p>Mẫu xe: {{ $v->vehicle_type }} | Biển số: {{ $v->vehicle_plate }} | KM: {{ $v->vehicle_traveled }}</p>
    @endforeach
@endif

@if (count($appointments))
    <hr>
    <h3>Lịch hẹn</h3>
    @foreach ($appointments as $a)
        <p>
            Ngày hẹn: {{ $a->appointment_date }} | Dịch vụ: {{ $a->service_type }}
            @if($a->notes)
                | Ghi chú: {{ $a->notes }}
            @endif
        </p>
    @endforeach
@endif

@auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Đăng xuất</button>
    </form>
@endauth
