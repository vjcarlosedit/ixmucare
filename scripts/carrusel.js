document.addEventListener('DOMContentLoaded', function () {
    const carouselSlide = document.querySelector('.carousel-slide');
    const images = document.querySelectorAll('.carousel-slide img');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const indicators = document.querySelectorAll('.carousel-indicators span');

    let index = 0;
    const totalImages = images.length;
    const imageWidth = images[0].clientWidth;

    carouselSlide.style.width = `${images.length * 1525}px`;

    // Función para mover el carrusel
    function moveCarousel() {
        carouselSlide.style.transform = `translateX(${-index * imageWidth}px)`;
        updateIndicators();
    }

    // Actualiza el estado de los indicadores
    function updateIndicators() {
        indicators.forEach((indicator, idx) => {
            indicator.classList.toggle('active', idx === index);
        });
    }

    // Avanzar al siguiente slide
    function nextSlide() {
        if (index >= totalImages - 1) {
            index = 0; // Reinicia al principio
        } else {
            index++;
        }
        moveCarousel();
    }

    // Retroceder al slide anterior
    function prevSlide() {
        if (index <= 0) {
            index = totalImages - 1; // Salta al final
        } else {
            index--;
        }
        moveCarousel();
    }

    // Navegación con indicadores
    indicators.forEach((indicator) => {
        indicator.addEventListener('click', (e) => {
            index = parseInt(e.target.getAttribute('data-index'));
            moveCarousel();
        });
    });

    // Eventos de los botones
    prevButton.addEventListener('click', prevSlide);
    nextButton.addEventListener('click', nextSlide);

    // Navegación automática
    setInterval(nextSlide, 5000); // Cambia automáticamente cada 5 segundos
});
