<!DOCTYPE html>
<html lang="ukr">
    <head>
        <meta charset="UTF-8">
        <title>FindWay</title>
        <link rel="stylesheet" href="shedule.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <div class="holder">
            <p class="hello">НАЯВНІ РЕЙСИ</p>
        </div>
        <div class="container">
            <section class="finder">
                <form action="/курсова/shedule.php" method="post" class="content">
                    <input type="text" class="finder-way" name="from" placeholder="Звідки">
                    <input type="text" class="finder-way1" name="where" placeholder="Куди">
                    <input type="date" class="finder-way2" name="date" placeholder="Дата поїздки">              
                    <button type="submit" class="btn btn-primary" name="submit">Знайти</button>
                </form>
            </section>
            <main class="table">
                <section class="table-body" id="result">
                    <?php include "shedule_settings.php" ?>
                    <script>
                        function addPar(link){
                        var routeID;
                        localStorage.setItem('routeID', link.getAttribute("value"));
                        console.log(localStorage.getItem('routeID'));}
                        /*window.location.href='order.php';}
                        function addPar(link){
                            $.ajax({
                                url: "order.php",
                                type: "POST",
                                data: { routeID: link.getAttribute("value")}    
                            });
                            console.log(link.getAttribute("value")); 
                        }*/
                        
                    </script>
                </section>
            </main>
            <footer>
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
          </div>
          <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
          <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>