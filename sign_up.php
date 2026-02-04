<?php
session_start();
include "database.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $phone    = $_POST['phone'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // تحقق من الإيميل
    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "❌ الإيميل مستخدم مسبقًا";
        exit;
    }

    // إدخال المستخدم
    $stmt = $conn->prepare(
        "INSERT INTO users (name, phone, email, pass) VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $username, $phone, $email, $password);

    if ($stmt->execute()) {
        // إعادة التوجيه بعد التسجيل
        header("Location: select.html");
        exit; // دايمًا ضع exit بعد header
    } else {
        echo "❌ خطأ أثناء التسجيل";
    }
}
?>




