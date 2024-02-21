let uploadButton=document.getElementById("upload_button");
let chosenImage=document.getElementById("chosen_image");

uploadButton.onchange = () => {
    let reader=new FileReader();
    reader.readAsDataURL(uploadButton.files[0]);

    reader.onload = () =>{
        chosenImage.setAttribute("src",reader.result);
    }
}