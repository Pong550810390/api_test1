# api_test1
1.ติดตั้ง XAMPP 
2.start เซิร์ฟเวอร์ Apache
3.เปิดโปรแกรมแก้ไขข้อความ (text editor) เช่น VS Code
4.สร้างไฟล์ fibonacci.php และเขียนโค้ด
<?php

header('Content-Type: application/json');


function fibonacciSequence($memberCount) {
    $sequence = [0, 1];
    for ($i = 2; $i < $memberCount; $i++) {
        $sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
    }
    return array_slice($sequence, 0, $memberCount);
}


function calculateTotal($sequence) {
    return array_sum($sequence);
}


if (!isset($_GET['member-count'])) {
    echo json_encode([
        "error" => "member-count parameter is required"
    ]);
    exit;
}
$memberCount = intval($_GET['member-count']);


if ($memberCount < 1 || $memberCount > 100) {
    echo json_encode([
        "error" => "member-count must be between 1 and 100"
    ]);
    exit;
}

$sequence = fibonacciSequence($memberCount);
$total = calculateTotal($sequence);

$response = [
    "member-count" => $memberCount,
    "sequence" => $sequence,
    "total" => $total
];

echo json_encode($response);
?>

5.บันทึกไฟล์นี้ในโฟลเดอร์ htdocs ของ XAMPP  เช่น C:\xampp\htdocs\api_test\fibonacci.php.
6.install  Postman Extensions ใน vscode
7.สร้างการร้องขอใหม่ (New Request) ใน postman
8.ในช่อง URL ให้ใส่ URL ของ API ที่คุณต้องการทดสอบ เช่น http://localhost/api_test/fibonacci.php?member-count=8
9.คลิกปุ่ม Send เพื่อส่งคำร้องขอไปยังเซิร์ฟเวอร์
