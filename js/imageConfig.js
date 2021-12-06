let inputFile = document.getElementById("Post_image");
let imageRow = document.getElementById("imageRow");
let imageInfo = document.getElementById('imageInfo').value;
let label = imageRow.children[1];

window.onload = () => {
    label.style = 'background: #375D81 ;color: white ; display:inline-block; padding: .6rem; border-radius: .5rem; margin-bottom: 1rem; margin-top: 1rem; cursor: pointer';

    if(imageInfo){
        label.innerText = 'Imagem selecionada: ' +imageInfo;  
    } else {
        label.innerText = 'Nenhuma imagem selecionada';  
    }
}

inputFile.addEventListener("change", (event) => {
    label.innerText = 'Imagem selecionada: ' + event.srcElement.files[0].name;
});