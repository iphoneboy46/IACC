export default function AvatarUploadModule() {
    const avt = document.querySelector('.change-avt input[type="file"]');
    const avtSrc = document.querySelector('.avt-scr img');
    if (avt) {
        avt.onchange = (e) => {
            var imgFile = e.target.files[0]
            var reader = new FileReader();
            reader.readAsDataURL(imgFile);

            reader.onload = function(evt){
                avtSrc.setAttribute('src', evt.target.result)
            }
        }
    }
}