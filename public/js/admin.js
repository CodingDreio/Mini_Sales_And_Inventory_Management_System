const imgInput = document.getElementById("imgInput");
const imgPreviewContainer = document.getElementById("imgPreview");
const updateImg = document.getElementById("updateImg");
const previewImage = imgPreviewContainer.querySelector(".imgPrev");
const defImage = imgPreviewContainer.querySelector(".imgDef");
const imgWarning = updateImg.querySelector(".imgWarning");

imgInput.addEventListener("change",function(){
    var fileName = document.querySelector('#imgInput').value;
    var extension = fileName.split('.').pop();
    const img = this.files[0];
    
    if(img){
        if(extension == "png" || extension == "jpg" || extension == "jpeg" || extension == "gif"){
            const reader = new FileReader();
    
            previewImage.style.display = "block";
            defImage.style.display = "none";
            imgWarning.style.display = "none";
    
            reader.addEventListener("load",function(){
                previewImage.setAttribute("src", this.result);
            });
            reader.readAsDataURL(img);
        }else{
            imgInput.value = '';
            previewImage.style.display = "none";
            defImage.style.display = "block";
            imgWarning.style.display = "block";
        }
    }else{
        previewImage.style.display = "none";
        defImage.style.display = "block";
        imgWarning.style.display = "none";
    }
});   