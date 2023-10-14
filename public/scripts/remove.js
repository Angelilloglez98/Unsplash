let btns_remove = document.querySelectorAll('.remove');


btns_remove.forEach(btn=>{
    btn.addEventListener('click',remove);
})

function remove(e) {
    
    let img_id=e.target.closest('.gallery-item').querySelector('img').id;
    
    const formData=new FormData();

    formData.append('id',img_id);

    fetch('/remove',{
        method:'POST',
        body:formData
    })
    .then(res=>res.json())
    .then(data=>{
        console.log(data)
        window.location.reload();
    });
    
}