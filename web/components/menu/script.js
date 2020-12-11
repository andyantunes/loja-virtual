const sideMenuButtons = document.querySelectorAll("aside.menu .menu-item");
sideMenuButtons.forEach((button) => {
  if (button.innerText === "Camisetas") {
    // button.addEventListener("click");
  } else if (button.innerText === "Bolas") {
    // button.addEventListener("click");
  } else if (button.innerText === "Comentários") {
    button.addEventListener("click", toggleCommentsArea);
  }
});

function toggleCommentsArea() {
  const commentsArea = document.querySelector(".comments-wrapper");
  commentsArea.classList.toggle("opened");
}
