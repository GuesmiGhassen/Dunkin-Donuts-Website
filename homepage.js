
const testimonials = [
    {
      name: "Julia Dhaouedi",
      job: "Lawyer",
      image: "./images/t1.jpg",
      testimonial:
        "❝ I really like the atmosphere, good coffee, and nice interior. This is a good place to study or chill with friends. The drinks and foods were all tasty and worthwhile. If you’re up for a fresh place with beautiful architecture then this is a must to visit. ❞",
    },
    {
      name: "Moez ben Hmida",
      job: "Web Developper",
      image: "./images/t2.jpg",
      testimonial:
        "❝ This coffee shop is my favorite place to hang and do my works. I really like this place because it has a good ambiance and not too crowded as well. The coffee and pastries that they had were so delicious. ❞",
    },
    {
      name: "Rahma Tounsi",
      job: "UI Designer",
      image: "./images/t3.jpg",
      testimonial:
        "❝ A unique coffee shop to study and read books. No loud noises which will help you a lot to concentrate on what you do. They do have a variety of food and drinks you can select from. I honestly love the great interior all over the place. Trust me! You will never be disappointed for sure! A memorable place to relax. ❞",
    },
    {
      name: "Naim gritli",
      job: "CEO",
      image: "./images/t4.jpg",
      testimonial:
        "❝ This coffee shop has it all. The ambiance, interior designs, good coffee, tasty foods, and fast wi-fi connection. Prices are a bit high but once you already taste it, you understand why. It is simply one of the best and my favorites coffee shop in town. Overall, it’s a good shop for relaxing. Highly recommended! ❞",
    },
  ];
  

  let i = 0;

  let j = testimonials.length;
  
  let testimonialContainer = document.getElementById("testimonial-container");
  let nextBtn = document.getElementById("next");
  let prevBtn = document.getElementById("prev");
  
  nextBtn.addEventListener("click", () => {
    i = (j + i + 1) % j;
    displayTestimonial();
  });
  prevBtn.addEventListener("click", () => {
    i = (j + i - 1) % j;
    displayTestimonial();
  });
  
  let displayTestimonial = () => {
    testimonialContainer.innerHTML = `
      <p>${testimonials[i].testimonial}</p>
      <img src=${testimonials[i].image}>
      <h3>${testimonials[i].name}</h3>
      <h6>${testimonials[i].job}</h6>
    `;
  };
  window.onload = displayTestimonial;