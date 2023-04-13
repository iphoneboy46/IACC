export default function HeaderModule() {
  const lang = document.querySelectorAll(".lang");
  const toggleHd = document.querySelector(".header-btn");
  const headerCT = document.querySelector(".header-ct");
  const bg = document.querySelector(".bg-fade");
  if (lang.length > 0) {
    lang.forEach((ele, i) => {
      $(ele).click(function () {
        $(ele.querySelector(".lang-lst")).slideToggle("300", function () {
          // Animation complete.
        });
      });
    });
  }

  if (toggleHd) {
    toggleHd.addEventListener("click", () => {
      headerCT.classList.toggle("show");
      bg.classList.toggle("show");
      toggleHd.querySelector(".toggle-header").classList.toggle("active");
      document.body.classList.toggle("overflow-hidden");
    });

    // headerCT.querySelector(".header-close").addEventListener("click", () => {
    //   headerCT.classList.remove("show");
    //   bg.classList.remove("show");
    //   toggleHd.classList.remove("active");
    //   document.body.classList.remove("overflow-hidden");
    // });
  }

  document.addEventListener("click", (e) => {
    const isClickInsideElement = toggleHd.contains(e.target);
    // const isClickInsideElement2 =
    if (e.target.matches(".header-ct, .header-ct *") || isClickInsideElement) {
      return;
    }
    headerCT.classList.remove("show");
    bg.classList.remove("show");
    toggleHd.classList.remove("active");
    document.body.classList.remove("overflow-hidden");
  });

  window.addEventListener("scroll", () => {
    var prevScrollpos = window.pageYOffset;
    if (prevScrollpos > 0) {
      document.querySelector(".header").classList.add("out");
    } else {
      document.querySelector(".header").classList.remove("out");
    }
  });
}
