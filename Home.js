window.addEventListener("scroll", function(){
    let head = document.getElementById('head');

    if(window.pageYOffset > 0){
        head.classList.add("head-nav");
    }
    else{
        head.classList.remove("head-nav");
    }
});

const leftArrow = document.getElementById("leftArrow");
       const rightArrow = document.getElementById("rightArrow");
       let slide =document.getElementsByClassName('slide');
      let s= document.getElementsByClassName("slidehover")

      leftArrow.addEventListener("click", prevSlide);
      rightArrow.addEventListener("click", nextSlide);

        let slideIndex = 1;
        let slides = document.querySelectorAll('.slider .slide');
        let numSlides = slides.length;
        
        
        function showSlides() {
         let i;
          for (i = 0; i < numSlides; i++) {
            slides[i].style.display = 'none';
            
          }
          for (i = slideIndex; i < slideIndex + 4 && i <= numSlides; i++) {
            slides[i-1].style.display = 'block';
          }
        }
        
        function nextSlide() {
          if (slideIndex + 4 > numSlides) {
            slideIndex = numSlides - 3;
          } else {
            slideIndex += 4;
          }
          showSlides();
        }
        
        function prevSlide() {
          if (slideIndex - 4 < 1) {
            slideIndex = 1;
          } else {
            slideIndex -= 4;
          }
          showSlides();
        }
        
        showSlides();
        function showDiv() {
          s.style.display = "block";
}

function toggleDiv() {
  var x = document.getElementById("divhover");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}