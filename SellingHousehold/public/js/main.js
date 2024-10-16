const listImage = document.querySelector('.list-image');
const imgs = document.getElementsByTagName('img');
let currentIndex = 0;

const displayTime = 3000;
const transitionTime = 2000;

function showNextSlide() {
    const width = 1920;
    listImage.style.transition = `transform ${transitionTime}ms ease-in-out`;
    listImage.style.transform = `translateX(${-currentIndex * width}px)`;
    currentIndex = (currentIndex + 1) % imgs.length;

    setTimeout(showNextSlide, displayTime);
}

setTimeout(showNextSlide, displayTime);
