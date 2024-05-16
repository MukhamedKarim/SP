// Функция для загрузки деталей товара
function showProductDetails(productId) {
    // Здесь можно использовать AJAX запрос для загрузки данных о товаре из базы данных
    // Например, используя fetch()

    // Временные данные для демонстрации
    const productDetails = {
        name: "Товар " + productId,
        description: "Описание товара " + productId,
        price: "$" + (Math.random() * 100).toFixed(2) // Случайная цена
    };

    // Формируем HTML с информацией о товаре и добавляем его на страницу
    const productDetailsHTML = `
        <h2>${productDetails.name}</h2>
        <p>${productDetails.description}</p>
        <p>Цена: ${productDetails.price}</p>
    `;
    document.getElementById("product-details").innerHTML = productDetailsHTML;
}

// -----------------------------------------------------------


// Для автоматического пролистывания карусели
let carouselInterval;

function startCarousel() {
    carouselInterval = setInterval(() => {
        const carousel = document.querySelector('.carousel');
        carousel.scrollLeft += carousel.clientWidth;
    }, 3000); // Интервал пролистывания в миллисекундах (здесь каждые 3 секунды)
}

function stopCarousel() {
    clearInterval(carouselInterval);
}

// Приостанавливаем автоматическое пролистывание карусели при наведении
const carousel = document.querySelector('.carousel');
carousel.addEventListener('mouseenter', stopCarousel);
carousel.addEventListener('mouseleave', startCarousel);

// Запускаем карусель при загрузке страницы
window.addEventListener('load', startCarousel);

// JavaScript для обработки запроса поиска
document.getElementById('search-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Предотвращаем отправку формы
    
    const searchTerm = document.getElementById('search-input').value.toLowerCase(); // Получаем текст поискового запроса
    const productCards = document.querySelectorAll('.product-card'); // Получаем все карточки товаров
    
    productCards.forEach(function(card) {
        const productName = card.querySelector('h2').textContent.toLowerCase(); // Получаем наименование товара из карточки
        if (productName.includes(searchTerm)) {
            card.style.display = 'block'; // Показываем карточку товара, если она содержит текст поискового запроса
        } else {
            card.style.display = 'none'; // Скрываем карточку товара, если она не содержит текст поискового запроса
        }
    });
});



