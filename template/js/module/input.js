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

    //////////////////////////////////////////////////////////////
    ////form edit

    const form = document.querySelectorAll(".form-edit");

    if (form) {
      form.forEach((ele, i) => {
        const btn = ele.querySelector(".form-edit-btn");
        const inputList = ele.querySelectorAll("input");
        const recheck = ele.querySelectorAll(".recheck-item")

        recheck.forEach((item) => {
          item.preventDefault();
        })

        inputList.forEach((input, i) => {
          input.disabled = true;
        })

        btn.addEventListener("click", () => {
          ele.classList.add("active");
          if (ele.classList.contains("active")) {
            const control = ele.querySelectorAll(".form-edit-control");

            control.forEach((ctEl, j) => {
              const edit = ctEl.querySelector(".form-edit-icon");
              const input = ctEl.querySelector(".form-edit-input");
              input.removeAttribute("disabled");
              edit.addEventListener("click", () => {
                input.focus();
              });
            });
          }
        });
      });
    }
  } catch (error) {
    console.log(error);
  }
}
