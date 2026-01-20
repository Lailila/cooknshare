"use strict";
{
  const hamBtn = document.querySelector(".hamburger");
  const navi = document.querySelector("#navi");
  const naviMenu = document.querySelectorAll("#header #navi-menu a");

  //wenn der Hamburger-Button geklickt wird, wird eine class "active" dem Ham-Button und dem navi hinzügefgt
  hamBtn.addEventListener("click", () => {
    hamBtn.classList.toggle("active");
    navi.classList.toggle("active");
  });

  //wenn der Hamburger-Button wieder geklickt wird, wird die class "active" gelöscht
  naviMenu.forEach((menu) => {
    menu.addEventListener("click", () => {
      hamBtn.classList.remove("active");
      navi.classList.remove("active");
    });
  });


}