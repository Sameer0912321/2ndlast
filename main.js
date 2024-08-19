// review

let currentIndex = 0;
const reviews = document.querySelector('.review-container');
const reviewItems = document.querySelectorAll('.review');
const reviewCount = reviewItems.length;

function moveSlide(step) {
    currentIndex += step;
    if (currentIndex >= reviewCount) {
        currentIndex = 0;
    } else if (currentIndex < 0) {
        currentIndex = reviewCount - 1;
    }
    const offset = -currentIndex * 100;
    reviews.style.transform = `translateX(${offset}%)`;
}


// hamenu

hamburger.addEventListener('click', () => {
    navLinksLeft.classList.toggle('show');
    navLinksRight.classList.toggle('show');
});



function toggleMenu() {
    const nav = document.querySelector('.header nav');
    nav.classList.toggle('active');
}




