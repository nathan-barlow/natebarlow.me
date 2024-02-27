console.clear();
console.log("👋 Fancy seeing you here! I hope you are enjoying my portfolio.");

// THEME ------------------------------------------------------------------------------------------
const themeBtn = document.querySelector(".theme");

function getCurrentTheme() {
   let theme = window.matchMedia("(prefers-color-scheme: dark)").matches
      ? "dark"
      : "light";
   localStorage.getItem("nb.theme.local")
      ? (theme = localStorage.getItem("nb.theme.local"))
      : null;
   return theme;
}

function loadTheme(theme) {
   loadButton(theme);
   loadColors(theme);
}

function loadButton(theme) {
   if (theme === "light") {
      themeBtn.innerHTML = `<i class="bi bi-sun-fill"></i>`;
      themeBtn.ariaLabel = `switch to dark mode`;
      themeBtn.title = `switch to dark mode`;
   } else {
      themeBtn.innerHTML = `<i class="bi bi-moon-fill"></i>`;
      themeBtn.ariaLabel = `switch to light mode`;
      themeBtn.title = `switch to light mode`;
   }
}

function loadColors(theme) {
   const root = document.querySelector(":root");
   root.setAttribute("color-scheme", `${theme}`);
}

themeBtn.addEventListener("click", () => {
   let theme = getCurrentTheme();
   if (theme === "dark") {
      theme = "light";
   } else {
      theme = "dark";
   }
   localStorage.setItem("nb.theme.local", `${theme}`);
   document.cookie = "theme=" + theme + "; path=/";
   loadTheme(theme);
});

window.addEventListener("DOMContentLoaded", () => {
   loadTheme(getCurrentTheme());
});

const recaptcha = document.getElementById("nb-recaptcha");

if (recaptcha) {
   if (getCurrentTheme() === "light") {
      recaptcha.setAttribute("data-theme", "light");
   } else {
      recaptcha.setAttribute("data-theme", "dark");
   }
}

// ANIMATE ----------------------------------------------------------------------------------------
const observer = new IntersectionObserver((entries) => {
   entries.forEach((entry) => {
      if (entry.isIntersecting) {
         entry.target.classList.add("show-float-up");
      }
   });
});

const animatedItems = document.querySelectorAll(".hide-float-up");
animatedItems.forEach((el) => observer.observe(el));

// HOVER TRACKING BLOB
const blobSVG = `<svg id="blob" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
<circle cx="50" cy="50" r="50" />
</svg>`;

document.body.insertAdjacentHTML("afterbegin", blobSVG);

const blob = document.getElementById("blob");
var mouseX, mouseY;

document.addEventListener("mousemove", (event) => {
   mouseX = event.clientX + "px";
   mouseY = event.clientY + "px";

   /*blob.style.left = mouseX;
  blob.style.top = mouseY;*/

   blob.animate(
      {
         left: mouseX,
         top: mouseY,
      },
      {
         duration: 1000,
         fill: "forwards",
         easing: "cubic-bezier(.8,0,.2,1)",
      }
   );
});

// DIALOG BOXES -----------------------------------------------------------------------------------
function showModal(id) {
   document.getElementById(id).showModal();
}

function closeModal(id) {
   document.getElementById(id).close();
}
