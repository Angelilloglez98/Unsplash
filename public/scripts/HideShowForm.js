
let containerForm=document.querySelector('.formulario');
let addPhotoButton=document.querySelector('.addPhotoButton');
let filtro=document.querySelector('.filtro');

addPhotoButton.addEventListener('click',mostrarOcultarForm);
formulario.cancel.addEventListener('click',mostrarOcultarForm)

formulario.file.addEventListener('change',(e)=>{
    console.log(e.target.files);

    if (e.target.files.length!=0) {
        formulario.url.disabled=true;
    }else{
        formulario.url.disabled=false;
    }
});

formulario.url.addEventListener('change',(e)=>{
    
    if (e.target.value!="") {
        formulario.file.disabled=true;
    }else{
        formulario.file.disabled=false;
    }
});



function mostrarOcultarForm() {
    containerForm.classList.toggle('active');
    if (containerForm.classList.contains('active')) {
        filtro.style.display="block";
    }else{
        filtro.style.display="none";
    }    
}


filtro.addEventListener('click',()=>{
    filtro.style.display="none";
    containerForm.classList.toggle('active');
});

