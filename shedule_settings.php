<?php
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

if(isset($_POST['submit'])){$from=$_POST['from'];
                            $where=$_POST['where'];
                            $date=$_POST['date'];}
$sql = "SELECT routes.ID, s1.name as start_city, s2.name AS finish_city,
DATE_FORMAT(routes.drive_date, '%d.%m.%Y') AS fdrive_date, TIME_FORMAT(routes.s_time, '%H:%i') AS fs_time, TIME_FORMAT(routes.f_time, '%H:%i') AS ff_time, routes.price, bus_photo.link
FROM routes
INNER JOIN buses ON routes.bus=buses.ID
INNER JOIN bus_photo ON buses.photo=bus_photo.ID
INNER JOIN city AS s1 ON routes.s_city = s1.ID
INNER JOIN city AS s2 ON routes.f_city = s2.ID
WHERE s1.name=? AND s2.name=? AND routes.drive_date=?";

// Підготовка запиту
$stmt = mysqli_prepare($conn, $sql);

// Перевірка, чи вдалось підготувати запит
if (!$stmt) {
  die("Error in preparing statement: " . mysqli_error($conn));
}
// Прив'язка значень параметрів до плейсхолдерів у запиті
mysqli_stmt_bind_param($stmt, "sss", $from, $where, $date);

// Виконання запиту
mysqli_stmt_execute($stmt);

// Отримання результатів запиту
$result = mysqli_stmt_get_result($stmt);


// обробка результатів запиту
if (mysqli_num_rows($result) > 0) {
    // виведення даних у вигляді таблиці
    echo "<table><thead>
      <tr>
        <th>Звідки</th>
        <th>Куди</th>
        <th>Дата поїздки</th>
        <th>Початок руху</th>
        <th>Кінець руху</th>
        <th>Фото автобуса</th>
        <th>Вартість</th>
        <th></th>
      </tr>
      </thead><tbody>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["start_city"]. "</td><td>" . $row["finish_city"]. "</td><td>" 
        . $row["fdrive_date"]. "</td><td>" . $row["fs_time"]. "</td><td>" 
        . $row["ff_time"]. "</td><td><img class= 'bus' src=" 
        . $row["link"]. " width='180' height='100'></td><td>" . $row["price"]. " &#8372</td><td><a value=".$row["ID"]." href='order.php?id=".$row["ID"]."' onclick=addPar(this)><button class='btn btn-primary'>Обрати</button></a></td</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<script>alert('Немає результатів')</script>";
}

// закриття з'єднання
mysqli_close($conn);
?>