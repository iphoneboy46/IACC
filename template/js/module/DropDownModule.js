export default function DropDownModule() {
  const optionMenu = document.querySelector(".header-cart");
  const selectBtn = optionMenu.querySelector(".icon-cart");
  const body_bar = document.querySelector("body");
  const icon_Plus = document.querySelectorAll(".product-tab-control .icon");
  const prodt_show = document.querySelectorAll(".product-list-hide");
  // document.querySelector(".header-toggle").classList.toggle("active");
  let isOpen = false;
  // icon_Plus.forEach((element) => {
  //   element.addEventListener("click", (e) => {
  //     e.stopPropagation();
  //     element.classList.toggle("active");
  //   });
  // });
  // window.addEventListener("click", function (e) {
  //   e.stopPropagation();
  //   isOpen = false;
  //   $(icon_Plus).removeClass("active");
  // });

  if (optionMenu) {
    selectBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      isOpen = !isOpen;
      if (isOpen) {
        optionMenu.classList.toggle("active");
        body_bar.classList.toggle("hide-bar");
      } else {
        optionMenu.classList.remove("active");
        body_bar.classList.remove("hide-bar");
      }
    });
  }
  const cminni = document.querySelectorAll(".cmini");
  window.addEventListener("click", (e) => {
    e.stopPropagation();
    isOpen = false;
    cminni.forEach((item) => {
      const notCmini = item.contains(e.target);
      if (!notCmini) {
        const slList = item.querySelector(".cmini");
        optionMenu.classList.remove("active");
        body_bar.classList.remove("hide-bar");
      }
    });
  });
  const techHeads = document.querySelectorAll(".tech-item-head");
  const techBlocks = document.querySelectorAll(".tech-block");

  // if (techBlocks) {
  //   techBlocks.forEach((item) => {
  //     item.querySelectorAll(".tech-item-head")[0].classList.add("active");
  //     const techBody = item.querySelectorAll(".tech-body")[0];
  //     $(techBody).slideDown();
  //   });
  // }
  if (techHeads) {
    techHeads.forEach((item) => {
      item.addEventListener("click", () => {
        const techBody = item.parentElement.querySelector(".tech-body");
        $(techBody).slideToggle();
        $(item).toggleClass("active");
      });
    });
  }
  const proTab = document.querySelectorAll(".product-tab");
  proTab.forEach((item, index) => {
    const proTabItems = item.querySelectorAll(".product-tab-item");
    const proWrapper = item.querySelector(".product-tab-wrapper");
    const proWrapperList = item.querySelector(".product-tab-wrapper-list");
    const proList = item.querySelector(".product-tab-list");
    const proControl = item.querySelector(".product-tab-control");
    let proWrapperSize = proWrapper.offsetWidth;
    let translate = 0;
    let widthTotal = 0;
    let size = widthTotal - proWrapperSize;
    proTabItems.forEach((proItem, index) => {
      widthTotal += proItem.offsetWidth;
    });

    proTabItems.forEach((proItem, index) => {
      // if (widthTotal < proWrapperSize) {
      //   if (index > 2) {
      //     translate += proItem.offsetWidth;
      //   }
      //   console.log("if");
      // } else {
      //   console.log("else");

      // }
      if (index > 2) {
        translate += proItem.offsetWidth;
      }
    });

    proList.style = `transform: translate3d(${translate}px, 0px, 0px)`;
    let isActive = true;
    console.log(proControl);
    proControl.addEventListener("click", () => {
      isActive = !isActive;
      if (isActive == false) {
        proControl.classList.add("active");
        proList.style = `transform: translateX(0px)`;
        if (window.innerWidth < 600) {
          proList.style = `flex-wrap: wrap;transform: translateX(0px)`;
        }
      } else {
        proControl.classList.remove("active");
        proList.style = `flex-wrap: nowrap;transform: translate3d(${translate}px, 0px, 0px)`;
      }
    });
  });

  const shopTable = document.querySelector(
    ".shop_table.woocommerce-checkout-review-order-table"
  );
}
