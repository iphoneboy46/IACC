export default function LinksMain() {
    const scrollTop =  document.querySelector(".scroll-to-top");
    scrollTop.onclick = () =>{
        document.body.scrollIntoView({ behavior: "smooth", block: "start" });
    }

    const menuListLink = document.querySelector(".links-main");
    window.onscroll = () =>{
        if(window.scrollY > 800){
            menuListLink.classList.add("active");
        }else{
            menuListLink.classList.remove("active");

        }
     
    }
}