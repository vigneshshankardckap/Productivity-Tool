let singleForm = document.querySelector(".single-input-form");
let multiFormDiv = document.querySelector(".multiple-input-form");
let inputBtn = document.querySelectorAll(".input-type-btn");
let innerContainer = document.querySelector(".inner-container")
let multiFormCloseBtn = document.querySelector(".multi-close-btn")
let multipleFroms = document.querySelector(".multiple-form")
let allForm = document.querySelector(".allForm")
let divCon = document.querySelector(".divCon")




// ---------------below code for form open a form by clicking the type button(sinle btn and multiple btn)------------------
for (let i = 0; i < inputBtn.length; i++) {
  inputBtn[i].addEventListener("click", () => {
    innerContainer.classList.add("active")

    if (inputBtn[i].innerText == "Single") {
      singleForm.classList.add("show")
    }
    if (inputBtn[i].innerText == "Multiple") {
      multiFormDiv.classList.add("show");
      // multiForm.innerHTML += htmlEle;
    }

  })

}
// console.log(multipleFroms.innerHTML);
// =====================================append multi form div============================

let addOneMoreBtn = document.querySelector(".addDivBtn")

let htmlEle = `
<div class="multiple-forms-div">
<form action="" method="post" class="multiple-form">
<div class="main-div-closeBtn">
<span>X</span>
</div>
  <div class="multi-input-div">
    <label>what on your todo?</label>
    <div class="todo-input-box">
      <textarea name="Task_name" id="" cols="30" rows="10" placeholder="Enter your todo"></textarea>
    </div>
  </div>
  <div class="other-input-div">
    <div class="category-div">
      <label>pick category</label>
      <div class="task_type">
        <input type="button" class="typeBtn" name="1" value="Professional" id="professional" />
        <input type="button" class="typeBtn " id="personal" name="2" value="Personal" id="personal" />
      </div>
    </div>
    <div class="date-time-div">
      <label>what is your due?</label>
      <div>
        <input type="datetime-local" placeholder="Get Date/Time" class="multiDateTime" value="" name="artistid" />
      </div>
    </div>
    <div class="urgentDiv">
      <label>Urgent</label>
      <div>
        <input type="button" value="Yes" class="urgent-priority-btn" />
        <input type="button" value="No" class="urgent-priority-btn" />
      </div>
    </div>
    <div class="ImportantDiv">
      <label>Important</label>
      <div class="">
        <input type="button" value="Yes" class="important-priority-btn" />
        <input type="button" value="No" class="important-priority-btn" />
      </div>
    </div>
  </div>
</form>
</div>
`


addOneMoreBtn.addEventListener("click",()=>{
  divCon.innerHTML += htmlEle 
})

// ======================================below section for closing the form sections==============================================//



// ------------this below close button for close the single form ----------------
let closeBtn = document.querySelector(".close-btn");

closeBtn.addEventListener("click", () => {
  innerContainer.classList.remove("active")
  singleForm.classList.remove("show")
})

// -----------------this below close button for close multi form button-----------------

let mainDivCloseBtn = document.querySelector(".main-div-closeBtn");
console.log(mainDivCloseBtn);
let multipleFormsDiv = document.querySelector(".multiple-forms-div")

// for (let i = 0; i < mainDivCloseBtn.length; i++) {
  // console.log(mainDivCloseBtn[i].length);
  mainDivCloseBtn.addEventListener("click",(e)=>{
    // console.log(mainDivCloseBtn[i]);
    // if(mainDivCloseBtn ){
      innerContainer.classList.remove("active")
      multiFormDiv.classList.remove("show")
      console.log("yes");
    // }
    // else{
      console.log("no");
      // e.target.parentElement.remove()
    // }
      // multipleFormsDiv.remove()
  })
  
// }




// =======================================================================================================//

// ----------below code for adding color to the taskType(personal or professional) ----------------

let taskType = document.querySelectorAll(".typeBtn");

for (let i = 0; i < taskType.length; i++) {

  taskType[i].addEventListener('click', () => {
    // console.log(taskType[i].value)
    for (let i = 0; i < taskType.length; i++) {
      taskType[i].style.backgroundColor = "";
      taskType[i].style.color = ""
      taskType[i].style.borderColor = ""

    }

    taskType[i].style.backgroundColor = "#bff5da";
    taskType[i].style.color = "#5fb32e"
    taskType[i].style.borderColor = "#5fb32e"
    taskType[i].style.transitionDuration = "0.3s"


  })
}


// ===========================priority buttons fuctionality===========================//

let urgentBtn = document.querySelectorAll(".urgent-priority-btn")
let importantBtn = document.querySelectorAll(".important-priority-btn")

// -------------below code for urgent button----------------//
for (let i = 0; i < urgentBtn.length; i++) {
  urgentBtn[i].addEventListener('click', () => {
    // console.log(urgentBtn[i].value)

    for (let i = 0; i < urgentBtn.length; i++) {
      urgentBtn[i].style.backgroundColor = "";
      urgentBtn[i].style.color = ""
      urgentBtn[i].style.borderColor = ""
    }

    urgentBtn[i].style.backgroundColor = "#bff5da"
    urgentBtn[i].style.color = "#5fb32e"
    urgentBtn[i].style.borderColor = "#5fb32e"
    urgentBtn[i].style.transition = "0.3s"


  })
}

// -------------below code for important button------------------//
for (let i = 0; i < importantBtn.length; i++) {
  importantBtn[i].addEventListener('click', () => {
    console.log(importantBtn[i].value)

    for (let i = 0; i < importantBtn.length; i++) {
      importantBtn[i].style.backgroundColor = "";
      importantBtn[i].style.color = ""
      importantBtn[i].style.borderColor = ""

    }

    importantBtn[i].style.backgroundColor = "#bff5da";
    importantBtn[i].style.color = "#5fb32e"
    importantBtn[i].style.borderColor = "#5fb32e"
    importantBtn[i].style.transition = "0.3s"

  })
}
// =========================================================================================================//


let DateField = document.querySelector(".dateTime");

DateField.addEventListener("click", () => {
  // console.log(DateField.value);

})


let projectField = document.querySelector(".projectName")


// let urgentPri = $('.urgent-yes').val();
// let urgentno = $('.urgent-no').val();
// let importantyes = $('.important-yes').val();
// let importantno = $('.important-no').val();

let allInput = document.querySelectorAll('.data')

let allInputs = document.querySelectorAll('.datas')
let category_id;
let category = document.querySelectorAll('.category')
for(let i=0;i<category.length;i++){
  category[i].addEventListener('click',(e)=>{
      category_id =  e.target.id
  })
}

let data;
for(let i=0;i<allInput.length;i++){
  console.log(allInput[i]);
  console.log(allInputs[i]);

     allInput[i].addEventListener('click',(e)=>{
      if(allInput[i].value == 1 && allInputs[i].value == 1){
       data = 1
      }
      else if(allInput[i].value == 0 && allInputs[i].value == 1){
        data = 2
       }    
      else if(allInput[i].value == 1 && allInputs[i].value == 0){
        data = 3
       }    
     else if(allInput[i].value == 0 && allInputs[i].value == 0){
        data = 4
       }
     })
}
function store(){
  let projectName =  $(".projectName").val();
  let dateTime = $(".dateTime").val();
  let priority = data;
  let pickCateid = category_id;

    console.log(data)

   

  // console.log(urgentPri,importantBtn)
  //  console.log(professional,projectName,dateTime,urgentPri,importantBtn)
      
   let FrontendObj = {
     "category_id": pickCateid,
     "task_name":projectName,
     "dates":dateTime,
     "user_id":1,
     "matrix_id":priority
   }



    //  $.ajax({
    //              method: 'POST',
    //              url: '/store',
    //              data: FrontendObj,
    //              success: function (response) {
    //                console.log(response);

    //              }
    //          })
}
// setInterval(() => {
//   if (projectField.value != "") {
//     projectField.style.backgroundColor = "#bff5da";
// }
// }, 1000);
// projectField.addEventListener("click  ", () => {
//     if (projectField.value == "") {
//         projectField.style.backgroundColor = "";
//     }
//     else {
//         projectField.style.backgroundColor = "#bff5da";
//     }
// })
// ==================================================================================



// ------------- Notification icon  ------------------
let Notificationbtn = document.querySelector(".notification");
let closelist = document.querySelector("#close-notificationList")
let Habitsdiv = document.querySelector(".Habitsdiv");

console.log(Notificationbtn);
console.log(Habitsdiv);
function openNotofy() {
    Habitsdiv.classList.toggle("showdiv");
}


closelist.addEventListener("click", (e) => {
    Habitsdiv.classList.remove("showdiv");
})