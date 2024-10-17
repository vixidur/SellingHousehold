const listImage = document.querySelector('.list-image');
const imgs = document.querySelectorAll('.swiper-slide');
let currentIndex = 0;
const displayTime = 3000;
const transitionTime = 1000;

function showNextSlide() {
    const width = window.innerWidth;

    imgs.forEach((img, index) => {
        img.classList.remove('swiper-slide-prev', 'swiper-slide-next', 'swiper-slide-active');

        if (index === currentIndex) {
            img.classList.add('swiper-slide-active');
        } else if (index === (currentIndex + 1) % imgs.length) {
            img.classList.add('swiper-slide-next');
        } else if (index === (currentIndex - 1 + imgs.length) % imgs.length) {
            img.classList.add('swiper-slide-prev');
        }
    });

    listImage.style.transition = `transform ${transitionTime}ms ease-in-out`;
    listImage.style.transform = `translateX(${-currentIndex * width}px)`;

    currentIndex = (currentIndex + 1) % imgs.length;

    if (currentIndex === imgs.length - 1) {
        setTimeout(() => {
            listImage.style.transition = 'none';
            listImage.style.transform = `translateX(0px)`;
            currentIndex = 0;
        }, transitionTime);
    }

    setTimeout(showNextSlide, displayTime);
}

setTimeout(showNextSlide, displayTime);

window.addEventListener('resize', () => {
    const width = window.innerWidth;
    listImage.style.transition = 'none';
    listImage.style.transform = `translateX(${-currentIndex * width}px)`;
});
