<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: sign_in.php");
    exit;
}

$coffeeDetails = $_SESSION['coffee_details'] ?? '';
$totalPrice = $_SESSION['total'] ?? 0;
?>

<h2>شكراً لك يا <?= $_SESSION['username'] ?>!</h2>
<p>تم تأكيد طلبك بنجاح</p>

<div>
    <strong>تفاصيل الطلب:</strong><br>
    <?= htmlspecialchars($coffeeDetails) ?>
</div>

<div>
    <strong>السعر الإجمالي:</strong> <?= number_format($totalPrice,2) ?> JD
</div>

<a href="selectitem.php">طلب جديد</a>
