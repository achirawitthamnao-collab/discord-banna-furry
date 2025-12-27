<?php
$newlink = trim($_POST['newlink'] ?? '');

if ($newlink == '') {
    exit("ลิงก์ไม่ถูกต้อง");
}

file_put_contents("link.txt", $newlink);

header("Location: admin.html");
exit;
