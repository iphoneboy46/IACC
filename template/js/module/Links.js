export default function Links() {
  try {
    const btnToTop = document.querySelector(".item-arrow-up");
    btnToTop.onclick = () => {
      window.document.body.scrollIntoView({ behavior: "smooth", block: "start" });
    };
  
    const btnZalo = document.querySelector(".item-zalo");
    const phoneListZalo = document.querySelectorAll(".item-phone-list");
  
    phoneListZalo.forEach((phone) => {
      const parent = phone.parentElement;
      const click = parent.querySelector(".item-zalo");
  
      click.addEventListener("click", () => {
        phone.classList.toggle("show");
      });
    });
  
    document.addEventListener("click", (e) => {
      const item = e.target.closest(".lists-tags-item");
      if (item) {
        const list = item.querySelector(".item-phone-list");
        if (list) {
          const click = item.querySelector(".item-zalo");
  
          click.addEventListener("click", () => {
            phone.classList.toggle("show");
          });
        }
      }
      else{
        const list = document.querySelectorAll(".item-phone-list");
        if(list){
          list.forEach((item)=>{
            item.classList.remove("show")
          })
        }
       
      }
  
  
    });
  
    window.onscroll = () => {
      const menuLinks = document.querySelector(".links_tags");
  
      if (window.scrollY > 300) {
        menuLinks.classList.add("active");
      } else {
        menuLinks.classList.remove("active");
      }
    };
    
  } catch (error) {
    console.log(error)
  }
}