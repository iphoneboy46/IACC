export default function inputForm() {
  try {
    const inputPass = document.querySelector(".pass");
    const show = document.querySelector(".hide-pass");
    const hidden = document.querySelector(".show-pass");

    if (show) {
      show.addEventListener("click", () => {
        console.log("asdas");
        inputPass.type = "text";
        hidden.style.display = "block";
        show.style.display = "none";
      });
    }

    if (hidden) {
      hidden.addEventListener("click", () => {
        console.log("asdas");
        inputPass.type = "password";
        show.style.display = "block";
        hidden.style.display = "none";
      });
    }


    const showRe = document.querySelector(".re-hide-pass");
    const hiddenRe = document.querySelector(".re-show-pass");
    const inputPassRe = document.querySelector(".re-pass");

    if (showRe) {
      showRe.addEventListener("click", () => {
        console.log("asdas");
        inputPassRe.type = "text";
        hiddenRe.style.display = "block";
        showRe.style.display = "none";
      });
    }

    if (hiddenRe) {
      hiddenRe.addEventListener("click", () => {
        console.log("asdas");
        inputPassRe.type = "password";
        showRe.style.display = "block";
        hiddenRe.style.display = "none";
      });
    }

  } catch (error) {
    console.log(error);
  }
}
