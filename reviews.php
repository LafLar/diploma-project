<!doctype html>
<html>
<head>
<meta charset="utf-8" lang="ukr">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Testimonial HTML</title>
<!--Stylesheet--------------------------->
<link rel="stylesheet" href="reviews.css"/>
<!--poppins-font-family-------------------->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>
<script src="setting.js"></script>
</head>
<body>
    <header>
        <nav>
          <ul>
            <li><a href="intro.html" title="Перейти до головної сторінки"><button>Головна</button></a></li>
            <li><a href="map.html" title="Переглянути маршрути"><button>Маршрути</button></a></li>
            <li><a href="contacts.html" title="Зв'яжіться з нами"><button>Контакти</button></a></li>
            <li><a href="reviews.php" title="Відгуки"><button>Відгуки</button></a></li>
            <li><a href="enter_register.html" title="Увійти"><button><ion-icon name="enter-outline"></ion-icon></button></a></li>
          </ul>
        </nav>
        <img src="logo2.png" alt="Логотип">
      </header>
     <main><!--Testimonials--------------------->
     <section id="testimonials">
         <!--heading--->
         <div class="testimonial-heading">
              <h1>ВІДГУКИ КЛІЄНТІВ</h1>
         <div>
         <!--testimonials-box-container------>
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
$sql="SELECT reviews.name, reviews.review
FROM reviews";
// Підготовка запиту
$stmt = mysqli_prepare($conn, $sql);
// Перевірка, чи вдалось підготувати запит
if (!$stmt) {
    die("Error in preparing statement: " . mysqli_error($conn));
}
// Виконання запиту
mysqli_stmt_execute($stmt);
// Отримання результатів запиту
$result = mysqli_stmt_get_result($stmt);
// обробка результатів запиту
if (mysqli_num_rows($result) > 0) {
    echo "<div class='testimonial-box-container'>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='testimonial-box'>
        <!--top------------------------->
        <div class='box-top'>
             <!--profile---->
             <div class='profile'>
                  <!--img--->
                  <div class='profile-img'>
                     <img src='profile_img.png'>
                  </div>
                  <!--name-and-username-->
                  <div class='name-user'>
                      <strong>".$row["name"]."</strong>
                  </div>
             </div>
        </div>
        <!--Comments----------------------------------------->
        <div class='client-comment'>
             <p>".$row["review"]."</p>
         </div>
    </div>";
    }
    echo "</div>";
} else {
    echo "<script>alert('Немає результатів')</script>";
}
mysqli_close($conn);
?>
     </section>
     <section id="testimonials2"> 
        <div class="testimonial-heading">
            <h1>ЗАЛИШИТИ ВІДГУК</h1>
        </div>
        <!--BOX-4---------------->
        <div class="review-box">
            <!--top------------------------->
            <form class="review" method="POST" action="reviews.php">
                <label for="name">Ім'я</label>
                <input type="text" name="name" class="field name" placeholder="Тут має бути Ваше ім'я">
                <label for="review">Відгук</label>
                <input type="text" name="review" class="field text" placeholder="Напишіть про нас щось хороше">
                <button class="btn btn-primary" name="submit">НАДІСЛАТИ</button>
                <?php include "review_in.php"?>
            </form>
        </div>
     </section>
     </main>
        <footer id="footer">
            <div class="empty">   </div>
                <div class="text">
                    <h1>
                        FindWay - 
                        <span
                            class="txt-rotate"
                            data-period="2000"
                            data-rotate='[ "це зручно", "це швидко", "завжди доступно", "завжди поруч", "завжди вчасно" ]'>
                        </span>
                    </h1>
                    <h2>FindWay Inc. Всі права захищено. Produced by Laflare in 2023</h2>
                </div>
        </footer>
     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>