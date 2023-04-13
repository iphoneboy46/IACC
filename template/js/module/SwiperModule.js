export default function SwiperModule() {
  const bannerHome = document.querySelector(".banner-home");
  if (bannerHome) {
    const main = bannerHome.querySelector(".banner-slide");
    const swiperContainer = main.querySelector(".swiper");
    var swiper1 = new Swiper(swiperContainer, {
      slidesPerView: 1,
      spaceBetween: 0,
      loopedSlides: 4,
      lazy: !0,
      watchSlidesVisibility: !0,
      watchSlidesProgress: !0,
      loop: swiperContainer.classList.contains("--loop"),
      pagination: {
        el: main.querySelector(".swiper-pagination"),
        clickable: !0,
        renderBullet: function (index, className) {
          return (
            '<span class="' +
            className +
            '">' +
            '<span class="inner"></span>' +
            "</span>"
          );
        },
      },
      navigation: {
        nextEl: main.querySelector(".next"),
        prevEl: main.querySelector(".prev"),
      },
      speed: 1000,
      autoplay: { delay: 5000 },
      effect: "coverflow",
      parallax: !0,
      coverflowEffect: {
        rotate: 0.05,
        depth: 0,
        stretch: 0,
        modifier: 1,
        slideShadows: !1,
      },
      on: {
        init: function () {
          let swiper = this;
          for (let i = 0; i < swiper.slides.length; i++) {
            const slide = swiper.slides[i];
            const bannerMedia = slide.querySelector(".banner-media");
            const bannerdc = slide.querySelector(".banner-dc");
            const bannerct = slide.querySelector(".content");
            const bannerRight = slide.querySelector(".banner-right");
            if (bannerMedia) {
              bannerMedia.setAttribute(
                "data-swiper-parallax",
                0.9 * swiper.width
              );
              bannerMedia.setAttribute("data-swiper-paralalx-opacity", 0.1);
            }
            if (bannerdc) {
              bannerdc.setAttribute(
                "data-swiper-parallax",
                0.7 * swiper.width
              );
              bannerdc.setAttribute("data-swiper-paralalx-opacity", 0.1);
            }
            if (bannerct) {
              bannerct.setAttribute(
                "data-swiper-parallax",
                0.7 * swiper.width
              );
              bannerct.setAttribute("data-swiper-paralalx-opacity", 0.1);
            }
            if (bannerRight) {
              bannerRight.setAttribute(
                "data-swiper-parallax",
                0.7 * swiper.width
              );
              bannerRight.setAttribute("data-swiper-paralalx-opacity", 0.1);
            }
          }
        },
        resize: function () {
          this.update();
        },
      },
    });
  }

  const newsSL = document.querySelector(".news-sl");
  if (newsSL) {
    var swiper2 = new Swiper(newsSL.querySelector(".swiper"), {
      slidesPerView: "auto",
      lazy: !0,
      pagination: {
        el: newsSL.querySelector(".swiper-pagination"),
        clickable: !0,
      },
      navigation: {
        nextEl: newsSL.querySelector(".next"),
        prevEl: newsSL.querySelector(".prev"),
      },
      speed: 1000,
    });
  }

  const prorlSL = document.querySelectorAll(".prorl-sl");
  if (prorlSL) {
    prorlSL.forEach((ele, i) => {
      const grid = ele.querySelector(".swiper").getAttribute("data-swiper-grid")
      var swiper2 = new Swiper(ele.querySelector(".swiper"), {
        slidesPerView: 1.2,
        lazy: !0,
        grid:{
          rows: grid ? grid : 1
        },
        pagination: {
          el: ele.querySelector(".swiper-pagination"),
          clickable: !0,
        },
        navigation: {
          nextEl: ele.querySelector(".next"),
          prevEl: ele.querySelector(".prev"),
        },
        speed: 1000,
        breakpoints: {
          400: {
            slidesPerView: 1.8,
            grid:{
              rows: grid ? grid : 1
            },
          },
          500: {
            slidesPerView: 2.5,
            grid:{
              rows: grid ? grid : 1
            },
          },
          650: {
            slidesPerView: 3,
            grid:{
              rows: grid ? grid : 1
            },
          },
          800: {
            slidesPerView: 4,
            grid:{
              rows: grid ? grid : 1
            },
          },
        }
      });

    });
  }

  const videoSec = document.querySelector(".vdsec");

  if (videoSec) {
    const swImg = videoSec.querySelector(".vdsec-sl-img");
    var videoImg = new Swiper(swImg.querySelector(".swiper"), {
      slidesPerView: 1,
      spaceBetween: 0,
      loopedSlides: 4,
      lazy: !0,
      watchSlidesVisibility: !0,
      watchSlidesProgress: !0,
      speed: 1000,
      effect: "coverflow",
      parallax: !0,
      coverflowEffect: {
        rotate: 0.05,
        depth: 0,
        stretch: 0,
        modifier: 1,
        slideShadows: !1,
      },
      on: {
        init: function () {
          let swiper = this;
          for (let i = 0; i < swiper.slides.length; i++) {
            const slide = swiper.slides[i];
            const bannerMedia = slide.querySelector(".vdsec-img");
            if (bannerMedia) {
              bannerMedia.setAttribute(
                "data-swiper-parallax",
                0.9 * swiper.width
              );
              bannerMedia.setAttribute("data-swiper-paralalx-opacity", 0.1);
            }
          }
        },
        resize: function () {
          this.update();
        },
      },
    });

    const swthumbs = videoSec.querySelector(".vdsec-thumbs");
    var videoThumbs = new Swiper(swthumbs.querySelector(".swiper"), {
      slidesPerView: 2.2,
      spaceBetween: 12,
      loopedSlides: 2,
      lazy: !0,
      watchSlidesVisibility: !0,
      watchSlidesProgress: !0,
      loop: swthumbs.classList.contains("--loop"),
      speed: 1000,
      breakpoints: {
        450: {
          slidesPerView: 3.2,
        },
        600: {
          spaceBetween: 12,
          slidesPerView: 4,
        },
        801: {
          spaceBetween: 24,
          slidesPerView: 4,
        },
      },
    });

    const swCt = videoSec.querySelector(".vdsec-sl");
    var videContent = new Swiper(swCt.querySelector(".swiper"), {
      slidesPerView: 1,
      spaceBetween: 0,
      loopedSlides: 2,
      lazy: !0,
      watchSlidesVisibility: !0,
      watchSlidesProgress: !0,
      loop: swCt.classList.contains("--loop"),
      pagination: {
        el: videoSec.querySelector(".swiper-pagination"),
        type: "progressbar",
      },
      navigation: {
        nextEl: videoSec.querySelector(".next"),
        prevEl: videoSec.querySelector(".prev"),
      },
      speed: 1000,
      autoplay: { delay: 5000 },
      effect: "fade",
      fadeEffect: {
        crossFade: true,
      },
      thumbs: {
        swiper: videoThumbs,
      },
    });

    videoImg.controller.control = videContent;
    videContent.controller.control = videoImg;
  }

  const glrsecs = document.querySelectorAll(".glrsec");

  if (glrsecs) {
    glrsecs.forEach((glrsec, index) => {
      const panel = glrsec.querySelectorAll(".glrsec-panel");

      panel.forEach((ele, i) => {
        const swtop = ele.querySelector(".glrsec-sl-top");
        const swbt = ele.querySelector(".glrsec-sl-ct");

        var swiperTop = new Swiper(swtop.querySelector(".swiper"), {
          slidesPerView: "auto",
          lazy: !0,
          pagination: {
            el: swtop.querySelector(".swiper-pagination"),
            clickable: !0,
          },

          speed: 1000,
        });

        var swiperBt = new Swiper(swbt.querySelector(".swiper"), {
          slidesPerView: 1,
          lazy: !0,
          speed: 1000,
          navigation: {
            nextEl: swbt.parentElement.querySelector(".next"),
            prevEl: swbt.parentElement.querySelector(".prev"),
          },
          thumbs: {
            swiper: swiperTop,
          },
          allowTouchMove: false,
          // effect: "fade",
          // fadeEffect: {
          //   crossFade: true,
          // },
        });
      });
    });
  }

  const proDt = document.querySelector(".prodt-slide");

  if (proDt) {
    const thumvbs = proDt.querySelector(".prodt-thumbs");
    const main = proDt.querySelector(".prodt-main");

    var slthumbs = new Swiper(thumvbs.querySelector(".swiper"), {
      slidesPerView: 4,
      spaceBetween: 16,
      lazy: !0,
      pagination: {
        el: thumvbs.querySelector(".swiper-pagination"),
        clickable: !0,
      },
      navigation: {
        nextEl: thumvbs.querySelector(".next"),
        prevEl: thumvbs.querySelector(".prev"),
      },
      speed: 1000,
    });

    var slmain = new Swiper(main.querySelector(".swiper"), {
      slidesPerView: 1,
      spaceBetween: 0,
      loopedSlides: 4,
      lazy: !0,
      watchSlidesVisibility: !0,
      watchSlidesProgress: !0,
      speed: 1000,
      effect: "coverflow",
      parallax: !0,
      coverflowEffect: {
        rotate: 0.05,
        depth: 0,
        stretch: 0,
        modifier: 1,
        slideShadows: !1,
      },
      on: {
        init: function () {
          let swiper = this;
          for (let i = 0; i < swiper.slides.length; i++) {
            const slide = swiper.slides[i];
            const bannerMedia = slide.querySelector(".prodt-img");
            if (bannerMedia) {
              bannerMedia.setAttribute(
                "data-swiper-parallax",
                0.9 * swiper.width
              );
              bannerMedia.setAttribute("data-swiper-paralalx-opacity", 0.1);
            }
          }
        },
        resize: function () {
          this.update();
        },
      },
      thumbs: {
        swiper: slthumbs,
      },
    });
  }



  const sliderProduct = document.querySelectorAll(".product_info-list");

  if(sliderProduct){
    sliderProduct.forEach((thum)=>{
      var swiper2 = new Swiper(thum.querySelector(".swiper"), {
        slidesPerView: "auto",
        lazy: !0,
        pagination: {
          el: thum.querySelector(".swiper-pagination"),
          clickable: !0,
        },
        loop: thum.querySelector(".swiper").classList.contains("--loop"),
        navigation: {
          nextEl: thum.querySelector(".next"),
          prevEl: thum.querySelector(".prev"),
        },
        speed: 1000,
      });
    })
  }


  const aboutEqual = document.querySelector(".about-equal");
  if (aboutEqual) {
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 10,
      autoplay: false,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".btn-next",
        prevEl: ".btn-prev",
      },
      breakpoints: {
        300: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        400: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 5,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 6,
          spaceBetween: 24,
        },
      },
    });
  }

  const eleFree = document.querySelectorAll(".free-slide");

  if (eleFree) {
    eleFree.forEach((ele, i) => {
      var swiper2 = new Swiper(ele.querySelector(".swiper"), {
        slidesPerView: "auto",
        lazy: !0,
        pagination: {
          el: ele.querySelector(".swiper-pagination"),
          clickable: !0,
        },
        loop: ele.querySelector(".swiper").classList.contains("--loop"),
        navigation: {
          nextEl: ele.querySelector(".next"),
          prevEl: ele.querySelector(".prev"),
        },
        speed: 1000,
      });
    });
  }
  const homeRepresentative = document.querySelector(
    ".main_representative > .main_representative-con"
  );
  if (homeRepresentative) {
    var representativeHome = document.querySelector(
      ".main_representative-con-slides"
    );
    var swiper = new Swiper(representativeHome.querySelector(".mySwiper"), {
      slidesPerView: 1,
      speed: 1000,

      autoplay: false,
      loop: false,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".btn-next-res",
        prevEl: ".btn-prev-res",
      },
      breakpoints: {
        300: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        400: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 24,
        },
        900: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 24,
        },
      },
    });
  }
}
