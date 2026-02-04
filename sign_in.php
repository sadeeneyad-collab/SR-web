<?php
include 'database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE name='$username' AND pass='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
     header("Location: select.html");
    echo "Login successful ✅";
    // هون لاحقًا ممكن تعملي session وتحوّليه على صفحة ثانية
} else {
    echo "Invalid username or password ❌";
}

mysqli_close($conn);
?>

