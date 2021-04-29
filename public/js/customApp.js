function checkData(id,outerId){
    let field=document.getElementById(id).value;
    if(field.length>=3||field==''){
        document.getElementById(outerId).innerText=''
    }else{
        document.getElementById(outerId).innerText='Plese enter atleast three character';
    }
}

function confirmDelete() {
    return confirm('Do you want to delete this Pemanently!');
}