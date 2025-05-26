function cancelSchedule() {
  const confirmed = confirm("Bạn có chắc muốn hủy lịch hẹn này?");
  if (confirmed) {
    alert("Lịch hẹn đã được hủy thành công.");
    // Code xử lý sau khi hủy (ẩn UI hoặc gọi API)
  }
}
