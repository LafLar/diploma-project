<!DOCTYPE html>
<html lang="ukr">
    <head>
        <meta charset="UTF-8">
        <title>FindWay</title>
        <link rel="stylesheet" href="order.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="setting.js"></script>
    </head>
    <body>
        <?php session_start();?>
        <header>
            <img src="logo2.png">
        </header>
        <main>
            <section class="client_info">
                <div class="content_client" id="content_client">
                    
                    <h1>Оформлення замовлення:</h1>
                    <div class="radio-buttons">
                        <input type="radio" name="option" id="ticket" class="radio" onchange="changeForm(this)" value="ticket">
                        <label for="ticket">Замовити квиток</label>
                        <input type="radio" name="option" id="delivery" class="radio" onchange="changeForm(this)" value="delivery">
                        <label for="delivery">Оформити доставку</label>
                    </div>
                    <div class="form">
                        <form id="form1" class="info" method="post" action="insert-ticket.php">
                            <div class="form-element"> 
                                <label for="idRoute">Номер обраного маршруту:</label>
                                <input type="text" class="field" id="idRoute" name="idRoute" readonly>
                            </div>
                            <div class="form-element">
                                <label for="surname">Прізвище:</label>
                                <input type="text" class="field" id="surname" name="surname" required>
                            </div>
                            <div class="form-element">
                                <label for="name">Ім'я:</label>
                                <input type="text" class="field" id="name" name="name" required>
                            </div>
                            <div class="form-element">
                                <label for="midname">По-батькові:</label>
                                <input type="text" class="field" id="midname" name="midname" required>
                            </div>
                            <div class="form-element">
                                <label for="email">Email:</label>
                                <input type="email" class="field" id="email" name="email" required>
                            </div>
                            <div class="form-element">
                                <label for="phone">Контактний телефон:</label>
                                <input type="text" class="field" id="phone" name="phone" required>
                            </div>
                            <div class="form-element">
                                <label for="passport">Документ, що посвідчує особу:</label>
                                <input type="text" class="field" id="passport" name="passport" required>
                            </div>
                            <div class="form-element">
                                <button type="submit" class="btn btn-primary" onclick="alert('Замовлення успішне')">Оформити</button>
                            </div>
                            <!--<script>
                            $(document).ready(function() {
                            $('#form1').submit(function(e) {
                                e.preventDefault(); // Зупинити звичайне надсилання форми

                                // Отримати дані з форми
                                var formData = $(this).serialize();

                                // Виконати AJAX-запит
                                $.ajax({
                                type: 'POST',
                                url: 'insert-ticket.php', // URL PHP-скрипту, який обробляє та заносить дані у базу даних
                                data: formData,
                                success: function(response) {
                                    // Виконати дії після успішного занесення даних у базу даних
                                    console.log(response); // Вивести відповідь з сервера в консоль
                                }
                                });
                            });
                            });
                        </script>-->
                        </form>
                        <form id="form2" class="info" method="POST" action="insert-delivery.php">
                        <div class="form-element"> 
                            <label for="idRoute">Номер обраного маршруту:</label>
                            <input type="text" class="field" id="idRoute2" name="idRoute2" readonly>
                        </div>
                        <div class="form-element">
                            <label for="surname">Прізвище:</label>
                            <input type="text" class="field" id="surname" name="surname" required>
                        </div>
                        <div class="form-element">
                            <label for="name">Ім'я:</label>
                            <input type="text" class="field" id="name" name="name" required>
                        </div>
                        <div class="form-element">
                            <label for="midname">По-батькові:</label>
                            <input type="text" class="field" id="midname" name="midname" required>
                        </div>
                        <div class="form-element">
                            <label for="email">Email:</label>
                            <input type="email" class="field" id="email" name="email" required>
                        </div>
                        <div class="form-element">
                            <label for="phone">Контактний телефон:</label>
                            <input type="text" class="field" id="phone" name="phone" required>
                        </div>
                        <div class="form-element">
                            <label for="height">Висота:</label>
                            <input type="text" class="del" id="height" name="height" placeholder="см" required>
                            <label for="width">Ширина:</label>
                            <input type="text" class="del" id="width" name="width" placeholder="см" required>
                            <label for="leng">Довжина:</label>
                            <input type="text" class="del" id="leng" name="leng" placeholder="см" required>
                        </div>
                        <div class="form-element">
                            <button type="submit" class="btn btn-primary" onclick="alert('Доставка успішних розмірів')">Оформити</button>
                        </div>
                        <!--<script>
                            $(document).ready(function() {
                            $('#form2').submit(function(e) {
                                e.preventDefault(); // Зупинити звичайне надсилання форми
                                // Отримати дані з форми
                                var formData = $(this).serialize();
                                // Виконати AJAX-запит
                                $.ajax({
                                type: 'POST',
                                url: 'insert-delivery.php', // URL PHP-скрипту, який обробляє та заносить дані у базу даних
                                data: formData,
                                success: function(response) {
                                    // Виконати дії після успішного занесення даних у базу даних
                                    console.log(response); // Вивести відповідь з сервера в консоль
                                }
                                });
                            });
                            });
                        </script>-->
                        </form>
                        </div>
                  </div>
            </section>
            <section class="order_info">
                <div class="content_order">
                    <div class="info">
                        <?php
                        $servername = "127.0.0.1";
                    $username = "root";
                    $password = "";
                    $dbname = "pat";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $route = $_GET["id"];
                        $sql = "SELECT routes.ID, s1.name AS start_city, s2.name AS finish_city,
                DATE_FORMAT(routes.drive_date, '%d.%m.%Y') AS fdrive_date, 
                TIME_FORMAT(routes.s_time, '%H:%i') AS fs_time, 
                TIME_FORMAT(routes.f_time, '%H:%i') AS ff_time, 
                routes.price, bus_photo.link
                FROM routes
                INNER JOIN buses ON routes.bus = buses.ID
                INNER JOIN bus_photo ON buses.photo = bus_photo.ID
                INNER JOIN city AS s1 ON routes.s_city = s1.ID
                INNER JOIN city AS s2 ON routes.f_city = s2.ID
                WHERE routes.ID = ?";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$route]);
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $row) {
                            echo "<h1>Інформація про замовлення</h1>
                <div class='info_element'>
                    <p>Місце відправлення: " . $row['start_city'] . "</p>   
                </div>
                <div class='info_element'>
                    <p>Місце прибуття: " . $row['finish_city'] . "</p>
                </div>
                <div class='info_element'>
                    <p>Дата відправлення: " . $row['fdrive_date'] . "</p>
                </div>
                <div class='info_element'>
                    <p>Час відправлення: " . $row['fs_time'] . "</p> 
                </div>
                <div class='info_element'>
                    <p>Час прибуття: " . $row['ff_time'] . "</p>
                </div>
                <div class='info_element'>
                    <p>Ціна: " . $row['price'] . " &#8372</p>
                </div>";
                        }
                    } catch (PDOException $e) {
                        echo "Помилка підключення: " . $e->getMessage();
                    }

                    $conn = null;
                        ?>
                    </div>
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
    </body>
    <script>
                       var route = localStorage.getItem('routeID');
                        var inputField = document.getElementById('idRoute');
                        var inputField2 = document.getElementById('idRoute2');
                        inputField.value=route;
                        inputField2.value=route;
                /*$.ajax({
                    url:'order.php',
                    type: 'POST',
                    data: {ID: route}
                });*/
                        console.log(route);

                        function changeForm(form) {
                        var form1 = document.getElementById('form1');
                        var form2 = document.getElementById('form2');
                        var content_client = document.getElementById('content_client');
                        var footer = document.getElementById('footer');
                        var selectedOption = form.value;
                        if (form.value === 'ticket') {
                            form1.style.display = 'block';
                            form2.style.display = 'none';
                            content_client.style.height = '700px';
                            footer.style.marginTop = 'auto';
                        }
                        if (form.value === 'delivery') {
                            form1.style.display = 'none';
                            form2.style.display = 'block';
                            content_client.style.height = '840px';
                            footer.style.marginTop = 'auto';
                        }
                        }
                    </script>
</html> 