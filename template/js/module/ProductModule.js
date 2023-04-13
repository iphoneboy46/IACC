export default function ProductModule() {
  const HVJS = document.querySelectorAll(".HVJS");

  if (HVJS.length > 0) {
    HVJS.forEach((item, i) => {
      const itemHVlistJS = item.querySelectorAll(".itemHVJS");

      itemHVlistJS.forEach((ele, j) => {
        $(ele).hover(
          () => {
            $(ele.querySelector(".content")).stop().slideDown();
          },
          () => {
            $(ele.querySelector(".content")).stop().slideUp();
          }
        );
      });
    });
  }

  let n = 0;
  $(".genSec")
    .find(".product-item.hot")
    .each((index, ele) => {
      $(ele).before($(".product-item:nth-child(" + (11 + n * 8) + ")"));
      n++;
    });

  $(".pro-list").each((index, ele) => {
    $(ele)
      .find(".pro-item.pro-catalogue")
      .insertAfter($(ele).find(".pro-item:nth-child(6)"));
  });
}
