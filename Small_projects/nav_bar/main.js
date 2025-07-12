document.addEventListener("DOMContentLoaded", function () {
  let header_main = document.querySelector(".header-main");
  let lis = document.querySelectorAll("li");
  let containers = document.querySelectorAll(".container");

  function backgroundLightOrange() {
    header_main.style.backgroundColor = "rgb(255, 195, 83)";
  }
  function backgroundDeepOrange() {
    header_main.style.backgroundColor = "rgb(255, 165, 0)";
  }

  lis.forEach((li) => {
    li.addEventListener("mouseover", backgroundLightOrange);
    li.addEventListener("mouseout", backgroundDeepOrange);
  });

  containers.forEach((container) => {
    container.addEventListener("mouseover", backgroundLightOrange);
    container.addEventListener("mouseout", backgroundDeepOrange);
  });
});
