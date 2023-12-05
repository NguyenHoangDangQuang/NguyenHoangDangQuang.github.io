document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('[data-carousel="static"]');
    const slides = carousel.querySelectorAll('[data-carousel-item]');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    const nextButton = carousel.querySelector('[data-carousel-next]');
    const indicators = carousel.querySelectorAll('[data-carousel-slide-to]');

    let currentSlide = 0;

    function showSlide(index) {
        if (index >= slides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slides.length - 1;
        }

        slides.forEach(slide => {
            slide.classList.add('hidden');
        });
        indicators.forEach(indicator => {
            indicator.setAttribute('aria-current', 'false');
        });

        slides[currentSlide].classList.remove('hidden');
        indicators[currentSlide].setAttribute('aria-current', 'true');
    }

    function nextSlide() {
        currentSlide++;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide--;
        showSlide(currentSlide);
    }

    nextButton.addEventListener('click', nextSlide);
    prevButton.addEventListener('click', prevSlide);

    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            showSlide(index);
            currentSlide = index;
        });
    });

    // Show the initial slide (optional)
    showSlide(currentSlide);
});
