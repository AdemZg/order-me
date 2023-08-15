const valideinput=document.querySelector('#zza');
window.addEventListener('input',()=>{

    if(valideinput.value.length <3){
        valideinput.style.borderColor="red";
        valideinput.style.borderWidth="3px";
    }else if(valideinput.value.length >=3 && valideinput.value.length <8 ){
        valideinput.style.borderColor="yellow";
        valideinput.style.borderWidth="4px";
    }
    else{
        valideinput.style.borderColor="green";
        valideinput.style.borderWidth="5px";
    }
})
const valideinput1=document.querySelector('#zaa');
window.addEventListener('input',()=>{

    if(valideinput1.value.length <8){
        valideinput1.style.borderColor="red";
        valideinput1.style.borderWidth="3px";
    }
    else{
        valideinput1.style.borderColor="green";
        valideinput1.style.borderWidth="5px";
    }
})
const valideinput2=document.querySelector('#aaa');
window.addEventListener('input',()=>{

    if(valideinput2.value.length <8 && valideinput2.value.indexOf("@", 0) < 0){
        valideinput2.style.borderColor="red";
        valideinput2.style.borderWidth="3px";
    }
    else if(valideinput2.value.length >=8 && valideinput2.value.indexOf("@", 0) > 0 ){
        valideinput2.style.borderColor="green";
        valideinput2.style.borderWidth="5px";
    }
})
const valideinput3=document.querySelector('#bbb');
window.addEventListener('input',()=>{

    if(valideinput3.value.length <5){
        valideinput3.style.borderColor="red";
        valideinput3.style.borderWidth="3px";
    }else if(valideinput3.value.length >=3 && valideinput3.value.length <10 ){
        valideinput3.style.borderColor="yellow";
        valideinput3.style.borderWidth="4px";
    }
    else{
        valideinput3.style.borderColor="green";
        valideinput.style.borderWidth="5px";
    }
})

