




let slideIndex=1

showSlide(slideIndex)

function nextSlide(n){
    showSlide(slideIndex +=n)
    
}

function currentSlide(n){
    showSlide(slideIndex =n)
    
}



function showSlide(n){
    let i
    let slides=document.getElementsByClassName("mySlide")

    if (n>slides.length){
        slideIndex=1
    }
    if(n<1){
        slideIndex=slides.length
    }

    for (i=0; i<slides.length;i++){
        slides[i].style.display="none"
    }

    slides[slideIndex-1].style.display="block" 

}


function showbtn(){

    //alert("hello")
    btnnext=document.getElementById("btnnext")
   btnprev=document.getElementById("btnprev")
    btnprev.style.display = "block"
    btnnext.style.display = "block"
 
 }
 
 function hidebtn(){
     
     btnnext=document.getElementById("btnnext")
     btnprev=document.getElementById("btnprev")
     btnprev.style.display = "none"
     btnnext.style.display = "none"
 }
 