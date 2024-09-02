// Écoute l'événement 'DOMContentLoaded', qui est déclenché lorsque le document HTML a été complètement chargé et analysé.
document.addEventListener('DOMContentLoaded', function() {
  // Sélectionne tous les éléments avec la classe "slide" et les stocke dans une variable sous forme de NodeList.
  const slides = document.querySelectorAll('.slide');
  // Sélectionne le bouton de navigation "précédent" en utilisant la classe "carousel-button-prev".
  const prevButton = document.querySelector('.carousel-button-prev');
  // Sélectionne le bouton de navigation "suivant" en utilisant la classe "carousel-button-next".
  const nextButton = document.querySelector('.carousel-button-next');
  // Initialise une variable pour suivre l'index de la diapositive actuellement affichée.
  let currentIndex = 0;
  // Fonction pour afficher une diapositive spécifique en fonction de l'index donné.
  function showSlide(index) {
    // Récupère le nombre total de diapositives.
    const totalSlides = slides.length;
    // Sélectionne l'élément contenant toutes les diapositives (généralement un conteneur de type "carousel-slides").
    const carouselSlides = document.querySelector('.carousel-slides');
    // Modifie la propriété CSS "transform" pour déplacer les diapositives horizontalement, en fonction de l'index.
    carouselSlides.style.transform = `translateX(-${index * 100}%)`;
  }
  // Ajoute un écouteur d'événements "click" au bouton "précédent".
  prevButton.addEventListener('click', function() {
    // Décrémente l'index actuel, ou revient à la dernière diapositive si l'on est sur la première.
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
    // Appelle la fonction pour afficher la diapositive correspondant à l'index mis à jour.
    showSlide(currentIndex);
    // Log de la fonction showSlide dans la console (ceci est probablement un résidu de test ou de débogage).
    console.log(showSlide);
  });
  // Ajoute un écouteur d'événements "click" au bouton "suivant".
  nextButton.addEventListener('click', function() {
    // Incrémente l'index actuel, ou revient à la première diapositive si l'on est sur la dernière.
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    // Appelle la fonction pour afficher la diapositive correspondant à l'index mis à jour.
    showSlide(currentIndex);
  });
});
