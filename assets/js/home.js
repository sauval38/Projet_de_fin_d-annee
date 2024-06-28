
document.addEventListener('DOMContentLoaded', function() {
  const slides = document.querySelectorAll('.slide');
  const prevButton = document.querySelector('.carousel-button-prev');
  const nextButton = document.querySelector('.carousel-button-next');
  let currentIndex = 0;

  function showSlide(index) {
    const totalSlides = slides.length;
    const carouselSlides = document.querySelector('.carousel-slides');
    carouselSlides.style.transform = `translateX(-${index * 100}%)`;
  }

  prevButton.addEventListener('click', function() {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
    showSlide(currentIndex);
    console.log(showSlide);
  });

  nextButton.addEventListener('click', function() {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    showSlide(currentIndex);
  });
});
