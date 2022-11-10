


let img = document.getElementById("image")
let btnprev = document.getElementById("btnprev")
let btnnext = document.getElementById("btnnext")
let slideIndex=1

showSlide(slideIndex)
displayScrolBtn()

function nextSlide(n){
    showSlide(slideIndex +=n)
    displayScrolBtn()
}

function currentSlide(n){
    showSlide(slideIndex =n)
    displayScrolBtn()
}

function displayScrolBtn(){
    
img.onmouseover = function(){
    btnprev.style.display = "block"
    btnnext.style.display = "block"
   // alert('hover')

}

img.onmouseleave = function(){
    btnprev.style.display = "none"
    btnnext.style.display = "none"

  // alert("leave")
}
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
