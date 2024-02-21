var uploadButton=document.getElementById("upload_btn");
var chosenImage=document.getElementById("chosen_img");

uploadButton.onchange = () => {
    let reader=new FileReader();
    reader.readAsDataURL(uploadButton.files[0]);

    reader.onload = () =>{
        chosenImage.setAttribute("src",reader.result);
    }
}