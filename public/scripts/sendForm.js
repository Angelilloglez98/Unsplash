let formulario = document.querySelector('#form');
let input= document.querySelector('input[name="file"]');
formulario.addEventListener('submit',sendForm);

function sendForm(e) {
    e.preventDefault();


    if (formulario.file.files.length!=0 || formulario.url.value!="") {
        
        const formData=new FormData();

        formData.append('file',input.files[0]);
        formData.append('label',e.target.label.value);
        formData.append('url',e.target.url.value);
        
        fetch('/upload',{
            method:'POST',
            body:formData
        })
        .then(res=>res.json())
        .then(data=>{
            console.log(data)
            window.location.reload();
        });
    }else{
        console.log('me cago en tus muelas,rellena el formulario');
    }

    
    
}