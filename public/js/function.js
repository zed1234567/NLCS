
window.onscroll = () => { btnOnTop() }

function btnOnTop(){
    let btn = document.getElementById("scrollOnTop");
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        btn.style.display="block";
    }else{
        btn.style.display="none";
    }
}

function onTop(){
    document.documentElement.scrollTop =0;
}

