<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Shop";

// Установка соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получение текста запроса из формы
if (isset($_GET['query'])) {
    $search = $_GET['query'];

    // SQL запрос для поиска товаров
    // SQL запрос для поиска товаров по всем таблицам
$sql = "SELECT `product name`, `description`, `price` FROM `shop` 
        WHERE `product name` LIKE '%$search%' OR `description` LIKE '%$search%'
        UNION
        SELECT `product name`, `description`, `price` FROM `shop2`
        WHERE `product name` LIKE '%$search%' OR `description` LIKE '%$search%'
        UNION
        SELECT `product name`, `description`, `price` FROM `shop3`
        WHERE `product name` LIKE '%$search%' OR `description` LIKE '%$search%'
        UNION
        SELECT `product name`, `description`, `price` FROM `shop4`
        WHERE `product name` LIKE '%$search%' OR `description` LIKE '%$search%'
        UNION
        SELECT `product name`, `description`, `price` FROM `shop5`
        WHERE `product name` LIKE '%$search%' OR `description` LIKE '%$search%'
        UNION
        SELECT `product name`, `description`, `price` FROM `shop6`
        WHERE `product name` LIKE '%$search%' OR `description` LIKE '%$search%'";



    // Выполнение SQL запроса
    $result = $conn->query($sql);

    // Обработка результатов поиска
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    $productName = $row["product name"];
    $description = $row["description"];
    $price = $row["price"];

    // Формируем HTML-код карточки товара
    echo "<div class='product-card'>";
    echo "<h2>$productName</h2>";
    echo "<p>$description</p>";
    echo "<p>Цена: $price.</p>";
    echo "<img src='../pictures/$productName.jpg' alt='$productName'>";

    // Формируем URL для кнопки "Подробнее" на основе основной страницы index.html
    echo "<button onclick=\"location.href='item.html?product=$productName';\">Подробнее</button>";
    echo "</div>";
}
    } else {
        echo "<p>По вашему запросу ничего не найдено.</p>";
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>
