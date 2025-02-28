<?php
// Kết nối cơ sở dữ liệu ($conn)
include '../connect.php';
global $conn;
$username = null;
if (isset($_GET["id"])) {
    $username = $_GET["id"];
}
// Hàm lọc dữ liệu Excel
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Tạo tên file Excel cho việc tải về
$fileName = "DShoadon " . date('Y-m-d') . ".xls";

// Tên cột
$fields = array('Mã đơn hàng', 'Tên người mua', 'Địa chỉ', 'Email', 'Chi chú', 'Số điện thoại', 'Trạng thái', 'Ngày giao', 'Giá cả', 'Tài khoản mua');

// Tạo nội dung file Excel
$excelData = implode("\t", array_values($fields)) . "\n";

// Lấy dữ liệu từ cơ sở dữ liệu
if ($username == null) {
    $query = $conn->query("SELECT * FROM `list_orders` ");
} else {
    $query = $conn->query("SELECT * FROM `list_orders` where `userName` = '$username'");
}
if ($query->num_rows > 0) {
    // Duyệt từng dòng dữ liệu
    while ($row = $query->fetch_assoc()) {
        $status = $row['status'] >= 3 ? 'Đã giao' : ($row['status'] == 2 ? 'Đang giao' : ($row['status'] <= 0 ? 'Chưa xác nhận' : 'Đã xác nhận'));
        $lineData = array(($row['idList']), ($row['namePeople']), ($row['address']), ($row['email']), ($row['note']), ($row['phoneNumbers']), ($status), $row['dateOder'], number_format($row["price"], 3, '.', '.') . 'đ', ($row['userName']));
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'Không tìm thấy bản ghi nào...' . "\n";
}
// Header để tải file về
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"$fileName\"");
header("Pragma: no-cache");
header("Expires: 0");
ob_clean();
flush();
echo $excelData;

exit;
