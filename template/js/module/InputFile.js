export default function InputFile() {
  try {
    const formFile = document.querySelectorAll(".form-upload");

    if (formFile) {
      var event1 = new Event("change");
      formFile.forEach((ele, i) => {
        const inputFile = ele.querySelector("input");
        const button = ele.querySelector(".form-label");
        // const returnHtm = `<div class="name-file"></div>`
        // const the_return = ele.querySelector(".name-file");

        if (button) {
          button.addEventListener("keydown", function (event) {
            if (event.keyCode == 13 || event.keyCode == 32) {
              fileInput.focus();
            }
          });
          button.addEventListener("click", function (event) {
            inputFile.click();
            return false;
          });
          inputFile.addEventListener("change", function (event) {
            // inputFile.dispatchEvent(event1);
            //  $(ele).append(returnHtm)
            console.log(inputFile.value);
            $(".name-file").html(
              `<span class="text">Selected: </span>` +
                `<span class="name-file">` +
                splitName(this.value) +
                `</span>`
            );
          });
        }
      });
    }

    const splitName = (name) => {
      let string = "";
      string += name.split("\\")[name.split("\\").length - 1];
      return string;
    };

    ////////////////////////////////////////////////////////////////
    //custom select

    const listSelectform = document.querySelectorAll(".form-select");
    var event = new Event("change");

    if (listSelectform.length > 0) {
      listSelectform.forEach((ele, i) => {
        const dropicon = document.createElement("span");
        dropicon.className = "icon";
        dropicon.innerHTML = `<i class="ti-angle-down"></i>`;
        const selected = ele.querySelector(".selected .text");
        const input = ele.querySelector("input");
        const listItem = ele.querySelectorAll(".item-select");
        selected.parentElement.appendChild(dropicon);

        listItem.forEach((elem, j) => {
          elem.addEventListener("click", () => {
            let dataSelected = selected.getAttribute("data-select");
            const dataSelect = elem.getAttribute("data-select");
            input.value = dataSelect;
            input.dispatchEvent(event);
            selected.innerHTML = dataSelect;
            selected.setAttribute("data-select", dataSelect);
            selected.style.color = "black";
            selected.style.fontWeight = "400";
          });
        });

        ele.addEventListener("click", () => {
          listItem.forEach((elem) => {
            let dataSelected = selected.getAttribute("data-select");
            elem.classList.remove("seleted-item");

            if (dataSelected == elem.getAttribute("data-select")) {
              elem.classList.add("seleted-item");
            }
          });
          $(ele.querySelector(".list-select")).slideToggle(300);
        });
      });
    }

    /////////////////////////////////////////////////////////////////
    const inputUpload = document.querySelector("#upload-file");
    if (inputUpload) {
      $(".re-form-image").fadeOut();
      const btnUpload = inputUpload.parentElement.querySelector(".upload-btn");

      btnUpload.addEventListener("click", () => {
        inputUpload.click();
      });
      var filesChangeable = [];
      inputUpload.addEventListener("change", (e) => {
        const dataTransfer = new DataTransfer();

        if (inputUpload.files.length == 0) {
          $(".reviews-upload-image").html(``);
          // return;
        } else {
          $(".reviews-upload-image").html(` <div class="list-chooesed">
        <div class="list-chooesed-wrap">
                <div class="list-chooesed-content d-wrap"></div>
            </div>
        </div>
        <input type="file" class="input-upload upload-btn" id="addMore-input"
        name="upload_files[]" multiple="" hidden>`);
        }

        var files = e.target.files,
          file;
        for (var i = 0; i < files.length; i++) {
          file = files[i];
          dataTransfer.items.add(file);
          filesChangeable.push(file);

          if (file.type.toString().includes("video")) {
            $(".reviews-upload-image .list-chooesed .list-chooesed-content")
              .append(`<div class="upload-result-img d-item d-5"> <div class="upload-result-img-inner">
                  <div class="upload-close"><i class="fas fa-times"></i></div>
                  <div class="media video-flie">
                   <video width="120" height="120">
                  <source src="${URL.createObjectURL(file)}" type="video/mp4">
                  </video> </div> </div></div>`);
          } else {
            $(
              ".reviews-upload-image .list-chooesed .list-chooesed-content"
            ).append(
              '<div class="upload-result-img d-item d-5"> <div class="upload-result-img-inner"> <div class="upload-close"> <i class="fas fa-times"> </i>  </div> <div class="media img-file gItem" data-src=' +
                URL.createObjectURL(file) +
                '"> <img src="' +
                URL.createObjectURL(file) +
                '" alt="" width=120 height=120></div></div> </div>'
            );
          }
        }

        var removeItem = function (fileEle) {
          const listClose = document.querySelectorAll(".upload-close");
          listClose.forEach((ele, i) => {
            ele.addEventListener("click", (e) => {
              $(ele).parent().closest(".upload-result-img").remove();
              filesChangeable.splice(filesChangeable.indexOf(fileEle), 1);
              const dataList = dataTransfer.items;
              for (let j = dataList.length - 1; j >= 0; j--) {
                if (i === j) {
                  if (dataList[i].kind === "file") {
                    dataList.remove(i);
                  }
                }
              }
              inputUpload.files = dataTransfer.files;

              // console.log(inputUpload.files);

              if (filesChangeable.length == 0) {
                $(".reviews-upload-image").html(``);
              }
            });
          });
        };

        removeItem(file);
      });
    }

    ///////////////////////////////////////////////////////////////
    //upload avt
    const avt = document.querySelector(".avt-scr");
    const avtSrc = document.querySelector(".avt-scr img");
    if (avt) {
      avt.addEventListener("click", () => {
        avt.querySelector("input").click();
      });
      avt.onchange = (e) => {
        var imgFile = e.target.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(imgFile);

        reader.onload = function (evt) {
          avtSrc.setAttribute("src", evt.target.result);
        };
      };
    }
  } catch (error) {
    console.log(error);
  }
}
