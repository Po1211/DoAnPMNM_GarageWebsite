function viewDetails(model) {
  // Điều hướng sang trang chi tiết dịch vụ đã đặt lịch theo từng xe
  window.location.href = `DichVu.html?model=${encodeURIComponent(model)}`;
}
