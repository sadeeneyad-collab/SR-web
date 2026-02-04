<?php
session_start();
require_once 'database.php';

$user_id = 1; // للتجربة فقط (لازم يكون موجود في users)

$size_price     = $_POST['size'];
$milk_price     = $_POST['milk'];
$sugar_price    = $_POST['sugar'];
$espresso_price = $_POST['espresso'];
$cream_price    = $_POST['cream'];

$size = ($size_price == 3) ? 'Super' : 'Regular';
$milk = ($milk_price == 1.5) ? 'Special Milk' : 'None';
$sugar = 'No Sugar';

$espresso_shot = ($espresso_price == 1) ? 1 : 0;
$cream         = ($cream_price == 1.5) ? 1 : 0;

$coffee_type = 'Coffee';
$base_price = 3;
$delivery_price = 2;

$total_price = $base_price + $size_price + $milk_price +
               $sugar_price + $espresso_price + $cream_price +
               $delivery_price;

$sql = "INSERT INTO orders
(user_id, coffee_type, size, milk, sugar, espresso_shot, cream, total_price)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "issssiid",
    $user_id,
    $coffee_type,
    $size,
    $milk,
    $sugar,
    $espresso_shot,
    $cream,
    $total_price
);

$stmt->execute();
echo "تم التخزين بنجاح";
  header("Location: finalstep.html");