<?php
$route=$_POST['idRoute2'];
$surname=$_POST['surname'];
$name=$_POST['name'];
$midname=$_POST['midname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$height=$_POST['height'];
$width=$_POST['width'];
$leng=$_POST['leng'];
$volume=$height*$width*$leng;
// підключення до бази даних
$servername = "127.0.0.1"; // адреса сервера бази даних
$username = "root"; // ім'я користувача бази даних
$password = ""; // пароль користувача бази даних
$dbname = "pat"; // назва бази даних

// створення з'єднання
$conn = mysqli_connect($servername, $username, $password, $dbname);

// перевірка з'єднання
if (!$conn) {
    die("Помилка підключення: " . mysqli_connect_error());
}
        
$sql="INSERT INTO order_delivery (surname, name, midname, email, phone, volume, route) VALUES ('$surname', '$name', '$midname', '$email', '$phone', '$volume', '$route')";
$query=mysqli_query($conn, $sql);
if($query)
{
    echo "<script>window.location.href='intro.html';</script>";
}
else {echo "<script>alert('Виникла помилка'); window.location.href='order.php';</script>";}
// закриття з'єднання
mysqli_close($conn);
?>