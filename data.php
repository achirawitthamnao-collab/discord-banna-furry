<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("Access denied");
}

$name  = trim($_POST['name']);
$email = trim($_POST['email']);
$date  = trim($_POST['date']);

$file = "users.xls";

// ถ้ายังไม่มีไฟล์ → สร้าง + BOM + หัวตาราง
if (!file_exists($file)) {
    $fp = fopen($file, "w");
    fwrite($fp, "\xEF\xBB\xBF"); // BOM
    fwrite($fp, "ชื่อ\tอีเมล\tวันเกิด\n");
} else {
    $fp = fopen($file, "a");
}

fwrite($fp, "$name\t$email\t$date\n");
fclose($fp);

// อ่านลิงก์จากไฟล์
$link = trim(@file_get_contents("link.txt"));
if ($link == "") {
    $link = "https://discord.gg/ffUc2ZzJ";
}

header("Location: $link");
exit;
