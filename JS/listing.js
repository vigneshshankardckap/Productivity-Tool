let professional = document.querySelector("#professional");
let personal =document.querySelector("#personal");
let doBox = document.querySelectorAll(".doBox")

console.log(doBox)
personal.addEventListener("click",()=>{
    professional.classList.remove("addswitch");
    professional.classList.add("Professional-btndummy")
    personal.classList.remove("Personal-btn")
    personal.classList.add("personalclass")

})
professional.addEventListener("click",()=>{
    personal.classList.remove("personalclass")
    personal.classList.add("Personal-btn")
    professional.classList.add("addswitch");
    professional.classList.add("Professional-btndummy") 
})
for (let i = 0; i < doBox.length; i++) {
    doBox[i].addEventListener("click",()=>{
        alert("welcome")
    })    
}


