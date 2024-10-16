const listImage = document.querySelector('.list-image');
const imgs = document.querySelectorAll('.swiper-slide');
let currentIndex = 0;

const displayTime = 3000;
const transitionTime = 1000;

function showNextSlide() {
    const width = window.innerWidth;

    // Thêm các lớp CSS để tạo hiệu ứng "swiper-slide-prev" và "swiper-slide-next"
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

    // Di chuyển đến slide hiện tại
    listImage.style.transition = `transform ${transitionTime}ms ease-in-out`;
    listImage.style.transform = `translateX(${-currentIndex * width}px)`;

    // Cập nhật chỉ số slide
    currentIndex = (currentIndex + 1) % imgs.length;

    // Sau khi đạt đến cuối, quay lại ảnh đầu tiên
    if (currentIndex === imgs.length - 1) {
        setTimeout(() => {
            listImage.style.transition = 'none';
            listImage.style.transform = `translateX(0px)`;
            currentIndex = 0;
        }, transitionTime);
    }

    // Lặp lại sau thời gian hiển thị
    setTimeout(showNextSlide, displayTime);
}

// Khởi động slideshow
setTimeout(showNextSlide, displayTime);

// Điều chỉnh lại khi kích thước màn hình thay đổi
window.addEventListener('resize', () => {
    const width = window.innerWidth;
    listImage.style.transition = 'none'; // Loại bỏ hiệu ứng chuyển đổi khi thay đổi kích thước
    listImage.style.transform = `translateX(${-currentIndex * width}px)`;
});
