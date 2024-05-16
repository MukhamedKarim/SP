<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Товары</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/Style.css">
   

    
</head>
<body>
    <header>
        <div>
            <ul>
                <li class="logo"><a href="../pages/item.html">LOGO</a></li>
                <li><a href="../pages/item.html">Главная</a></li>
               
            </ul>
        </div>
        
        <nav>
            <div class="search">
                                
                <div class="navigation">
                    <a href="../login/login.html">Вход</a>
                </div>
                <div class="navigation">
                    <a href="../registration/registration.php">Регистрация</a>
                </div>
                <div class="search">
                    <form id="search-form">
                        <input type="text" id="search-input" placeholder="Поиск по наименованию товара">
                        <button type="submit">Найти</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>



<div class="item-shop-top"> 
    <div class="item-shop-left">
        <h1> Товары нашего магазина:<br></h1> 
        <div class="status"> 
            <span class="green"> Доступно: В наличии </span>
        </div> 

        <div class="container">
            <div class="zone50">
        
            
            <?php
                $servername = "localhost";
                $username = "root"; 
                $password = ""; 
                $dbname = "Shop";

        // Создание соединения с базой данных
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Проверка соединения
        if ($conn->connect_error) {
            die("Connection failed: ".$conn->connect_error);
        }
        ?>
            <?php
            // Выполнение запроса к базе данных
            $sql = "SELECT * FROM shop2";
            $result = $conn->query($sql);

            // Обработка результатов запроса
            if ($result->num_rows > 0) {
                // Начало списка
                echo '<ul class="product-list">';

                // Вывод данных о товарах
                while($row = $result->fetch_assoc()) {
                    echo '
                    <li class="product-item">
                        <div class="product-details">
                            <h3>'.$row["product name"].'</h3><br>
                            <p><strong>Стоимость товара:</strong> '.$row["price"].'тг</p><br>
                            <p>'.$row["description"].'</p>
                        </div>
                    </li>';
                }

                // Завершение списка
                echo '</ul>';
            } else {
                echo "0 результатов";
            }
            $conn->close();
        ?>

                 
            </div>
            

            <div class="carousel">
                <div class="carousel-item">
                    <img src="../pictures/stiralka1.jpg" alt="Image 1">
                </div>
                <div class="carousel-item">
                    <img src="../pictures/stiralka2.jpg" alt="Image 1">
                </div>
            </div>




        </div>

        <hr></hr>
    </div>
</div>

 <footer>
            <div class="footer-content">
                <div class="contact-info">
                    <h3>Контактная информация</h3>
                    <p>Адрес: ул. Примерная, д. 123, офис 456</p>
                    <p>Телефон: +7 (123) 456-78-90</p>
                    <p>Email: info@example.com</p>
                </div>
                <div class="social-links">
                    <h3>Мы в социальных сетях</h3>
                <div class="social-icons">
                    <a href="#"><img src="../pictures/facebook.jpeg" alt="Facebook"></a>
                    <a href="#"><img src="../pictures/twitter.jpeg" alt="Twitter"></a>
                    <a href="#"><img src="../pictures/insta.jpeg" alt="Instagram"></a>
                    <a href="#"><img src="../pictures/link.jpeg" alt="LinkedIn"></a>
                </div>
            </div>

            </div>
            <div class="footer-bottom">
                <p>&copy;2024 Все права защищены и все такое</p>
            </div>
        </footer>

    <script src="JS.js"></script>
</body>
</html>
