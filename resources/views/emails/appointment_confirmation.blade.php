<h2>Chào {{ $appointment->vehicle->customer->name }}</h2>
<p>Thông tin lịch hẹn của bạn:</p>
<ul>
  <li>Ngày hẹn: {{ $appointment->appointment_date }}</li>
  <li>Dịch vụ: {{ $appointment->service_type }}</li>
</ul>
