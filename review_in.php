<?php
// підключення до бази даних
$servername = "127.0.0.1"; // адреса сервера бази даних
$username = "root"; // ім'я користувача бази даних
$password = ""; // пароль користувача бази даних
$dbname = "pat"; // назва бази даних


// Створення з'єднання
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Помилка підключення до бази даних: " . $conn->connect_error);
}

// SQL-запит для підрахунку кількості рядків
$sql_count = "SELECT COUNT(*) FROM reviews";

// Виконання запиту
$result_count = $conn->query($sql_count);

// Перевірка результату запиту
if ($result_count->num_rows > 0) {
    // Отримання значення count
    $row_count = $result_count->fetch_row();
    $count = $row_count[0];

    // Додавання 1 до count
    $count += 1;
    if(isset($_POST["submit"]))
    {
        $name=$_POST["name"];
        $review=$_POST["review"];
    
    // SQL-запит для вставки запису з ID = $count
    $sql_insert = "INSERT INTO reviews (ID, name, review) VALUES ('$count', '$name', '$review')";
    
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Запис успішно вставлено')</script>";
    } else {
        echo "Помилка вставки запису: " . $conn->error;
    }
}
} else {
    echo "Результат не знайдено";
}

// Закриття з'єднання з базою даних
$conn->close();
?>