let form = document.querySelector(".multiple-form")
// ---------------below code for form open a form by clicking the type button(sinle btn and multiple btn)------------------
let inputBtn = document.querySelectorAll(".input-type-btn");
let singleForm = document.querySelector(".single-input-form");
let multiFormDiv = document.querySelector(".multiple-input-form");
let innerContainer = document.querySelector(".inner-container")
let cancelBtn = document.querySelector(".cancel-btn");
let empty = document.querySelector(".forms-inner-div")

// ======================below code is for open single form and multi form ===============================
for (let i = 0; i < inputBtn.length; i++) {
  inputBtn[i].addEventListener("click", () => {
    innerContainer.classList.add("active")

    if (inputBtn[i].innerText == "Single") {
      singleForm.classList.add("show")
      openSingleForm()
    }
    else if (inputBtn[i].innerText == "Multiple") {
      multiFormDiv.classList.add("show");
      AddOneMoreForm();
    }
  })
}
let addDivBtn = document.querySelector('.addDivBtn');
addDivBtn.addEventListener("click", () => {
  textAreaCreation()
})
//========================================single form functionality================================/

function openSingleForm(params) {

  let taskType = document.querySelectorAll(".typeBtn");
  let urgentBtn = document.querySelectorAll(".urgent-priority-btn");
  let importantBtn = document.querySelectorAll(".important-priority-btn");


  for (let i = 0; i < taskType.length; i++) {
    classListAdd(taskType[i], taskType);
    classListAdd(urgentBtn[i], urgentBtn);
    classListAdd(importantBtn[i], importantBtn);
  }

  function classListAdd(getBtns, getBtn) {
    getBtns.addEventListener("click", (e) => {

      let targetClass = e.target.classList.value;
      for (let j = 0; j < getBtn.length; j++) {
        if (getBtn[j].getAttribute("class") == targetClass) {
          getBtn[j].style.backgroundColor = ""
          getBtn[j].style.color = ""
          getBtn[j].style.border = "";
        }
      }
      getBtns.style.backgroundColor = "#5fb32e";
      getBtns.style.color = "white ";
      getBtns.style.border = "none";

    })
  }

  // ------this below close button for close the single form ----------

  let closeBtn = document.querySelector(".close-btn");

  closeBtn.addEventListener("click", () => {
    innerContainer.classList.remove("active")
    singleForm.classList.remove("show")
  })


}

// ==============================================================================================================

// =====================================this function is for append multiple form div============================
let divCon = document.querySelector(".forms-inner-div")
let multiformCnt = 0;
let cnt = 0;

function AddOneMoreForm() {
  multiformCnt = multiformCnt + 1
  cnt++;
  // divCon.innerHTML += `
  // <div class="multiple-forms-div">
  // <form action="" method="post" class="multiple-form">
  // <div class="main-div-closeBtn" id=${multiformCnt} >
  // <span id=${multiformCnt}>X</span>
  // </div>
  //   <div class="multi-input-div">
  //     <label>What on your task?</label>
  //     <div class="todo-input-box">
  //     </div>
  //   </div>
  //   <div class="other-input-div">
  //     <div class="category-div">
  //       <label>Pick category</label>
  //       <div class="task_type">
  //         <input type="button" class="typeBtn" name="1" value="Professional" id=${multiformCnt} />
  //         <input type="button" class="typeBtn" id=${multiformCnt} name="2" value="Personal" id="personal" />
  //       </div>
  //     </div>
  //     <div class="date-time-div">
  //       <label>When is your due?</label>
  //       <div>
  //         <input type="datetime-local" placeholder="Get Date/Time" class="multiDateTime" value="" name="artistid" />
  //       </div>
  //     </div>
  //     <div class="urgentDiv">
  //       <label>Urgent</label>
  //       <div>
  //         <input type="button" value="Yes" id=${multiformCnt} class="urgent-priority-btn" />
  //         <input type="button" value="No" id=${multiformCnt} class="urgent-priority-btn" />
  //       </div>
  //     </div>
  //     <div class="ImportantDiv">
  //       <label>Important</label>
  //       <div class="">
  //         <input type="button" value="Yes" id=${multiformCnt} class="important-priority-btn" />
  //         <input type="button" value="No" id=${multiformCnt} class="important-priority-btn" />
  //       </div>
  //     </div>
  //   </div>
  // </form>
  // </div>
  // `



  // -----main div for multiple form section------
  let mainDiv = document.createElement('div');
  mainDiv.setAttribute('class', 'multiple-forms-div')
  //------creating form element for multiple------
  let forms = document.createElement('form');
  forms.setAttribute('class', 'multiple-forms');
  forms.setAttribute('action', '');
  forms.setAttribute('method', 'post');
  //-------close button div for multiple--------
  let mainDivCloseBtn = document.createElement('div');
  mainDivCloseBtn.setAttribute('class', 'main-div-closeBtn');
  mainDivCloseBtn.setAttribute('id', `${multiformCnt}`);
  //--------close X symbole creat-----------
  let closeSymbole = document.createElement('span')
  closeSymbole.setAttribute('id', `${multiformCnt}`);
  closeSymbole.innerText = 'X'
  //--------creating todo input div-----------
  let todoInput = document.createElement('div');
  todoInput.setAttribute('class', 'multi-input-div')
  let label1 = document.createElement('label');
  label1.innerText = 'What on your task?'
  let todoInputBox = document.createElement('div');
  todoInputBox.setAttribute('class', 'todo-input-box');
  let textarea = document.createElement('textarea');
  textarea.name = 'Task_name';
  textarea.placeholder = 'Enter Your Task';
  // -----------append----------
  todoInput.appendChild(label1)
  todoInputBox.appendChild(textarea)
  todoInput.append(todoInputBox)
  mainDivCloseBtn.append(closeSymbole);
  forms.append(mainDivCloseBtn);

  // -------------creating other inout -------------
  let otherInputs = document.createElement('div');
  otherInputs.setAttribute('class', 'other-input-div');
  let categoryDiv = document.createElement('div');
  categoryDiv.setAttribute('class', 'category-div');
  let label2 = document.createElement('label');
  label2.innerText = "Pick category";
  let taskType = document.createElement('div');
  taskType.setAttribute('class', 'task_type');
  let professionalBtn = document.createElement('input');
  professionalBtn.setAttribute('type', 'button');
  professionalBtn.setAttribute('id', `${multiformCnt}`);
  professionalBtn.setAttribute('name', '1');
  professionalBtn.value = 'Professional';
  professionalBtn.setAttribute('class', 'typeBtn')

  let personalBtn = document.createElement('input');
  personalBtn.value = 'Personal';
  personalBtn.setAttribute('type', 'button');
  personalBtn.setAttribute('id', `${multiformCnt}`);
  personalBtn.setAttribute('name', '2');
  personalBtn.setAttribute('class', 'typeBtn')

  // -----------append----------

  otherInputs.append(categoryDiv)
  categoryDiv.appendChild(label2)
  categoryDiv.appendChild(taskType)
  taskType.appendChild(professionalBtn);
  taskType.appendChild(personalBtn)

      //       < div class="date-time-div" >
      // //       <label>When is your due?</label>
      // //       <div>
      // //         <input type="datetime-local" placeholder="Get Date/Time" class="multiDateTime" value="" name="dateTime" />
      // //       </div>
      // //     </div>
// -----------creating date time div--------------
  let dateTimeDiv = document.createElement('div')
  dateTimeDiv.setAttribute('class', 'date-time-div')
  let innerDiv = document.createElement('div')
  let dateInput = document.createElement('input')
  dateInput.placeholder = 'Get Date/Time'
  dateInput.name = 'dateTime'
  dateInput.type = 'datetime-local'
  


  mainDiv.append(forms);
  mainDiv.append(todoInput)
  mainDiv.append(otherInputs)
  empty.append(mainDiv);

  // ----------below code for adding color to the taskType(personal or professional) ----------------

  buttonActions()
  closeBtnActions()

}

// --------- classList add and remove function------------
function buttonActions(params) {
  let taskType = document.querySelectorAll(".typeBtn");
  let urgentBtn = document.querySelectorAll(".urgent-priority-btn");
  let importantBtn = document.querySelectorAll(".important-priority-btn");

  for (let i = 0; i < taskType.length; i++) {
    classListAdd(taskType[i], taskType);
    classListAdd(urgentBtn[i], urgentBtn);
    classListAdd(importantBtn[i], importantBtn);
  }

  function classListAdd(getBtns, getBtn) {
    getBtns.addEventListener("click", (e) => {
      let targetId = e.target.id;
      for (let j = 0; j < getBtn.length; j++) {
        if (getBtn[j].getAttribute("id") == targetId) {
          getBtn[j].style.backgroundColor = ""
          getBtn[j].style.color = ""
          getBtn[j].style.border = "";
        }
      }
      getBtns.style.backgroundColor = "#5fb32e";
      getBtns.style.color = "white ";
      getBtns.style.border = "none";

    })
  }

}

// ----------function close button multi----------------
function closeBtnActions(params) {
  // -----------------this below close button for close multi form-----------------

  // let mainDivCloseBtn = document.querySelectorAll(".main-div-closeBtn");
  let multipleFormsDiv = document.querySelectorAll(".multiple-forms-div");
  // let cancelButton = document.querySelector(".cancel-btn");

  for (let i = 0; i < mainDivCloseBtn.length; i++) {
    // console.log(multipleFormsDiv[i]);
    mainDivCloseBtn[i].addEventListener("click", () => {
      cnt--;
      if (cnt == 0) {
        innerContainer.classList.remove("active");
        multipleFormsDiv[i].remove();
        multiFormDiv.classList.remove("show");
      }
      else {
        multipleFormsDiv[i].remove();
      }
    })

  }
}
// ========================================================================================================/


let DateField = document.querySelector(".dateTime");

DateField.addEventListener("click", () => {
  // console.log(DateField.value);
  // console.log(category_id)
})





let projectField = document.querySelector(".projectName")


// let urgentPri = $('.urgent-yes').val();
// let urgentno = $('.urgent-no').val();
// let importantyes = $('.important-yes').val();
// let importantno = $('.important-no').val();

let allInput = document.querySelectorAll('.data')
// console.log(allInput,"ll");
let allInputs = document.querySelectorAll('.datas')
// console.log(allInputs,"kk");

let category_id;
let category = document.querySelectorAll('.category')

for (let i = 0; i < category.length; i++) {
  category[i].addEventListener('click', (event) => {
    category_id = event.target.id
  })
}



let data;
let urgent;
let important;
for (let i = 0; i < allInput.length; i++) {
  allInput[i].addEventListener('click', (e) => {
    urgent = allInputs[i].value
  })
  allInputs[i].addEventListener('click', (e) => {
    important = allInputs[i].value
  })
}
function store() {


  if (urgent == 1 && important == 1) {
    data = 1
  }
  else if (urgent == 0 && important == 1) {
    data = 2
  }
  else if (urgent == 1 && important == 0) {
    data = 3
  }
  else if (urgent == 0 && important == 0) {
    data = 4
  }

  let projectName = $(".projectName").val();
  let dateTime = $(".dateTime").val();
  let user_id = $(".user_id").val();
  let priority = data;
  let pickCateid = category_id;

  let FrontendObj = {
    "category_id": pickCateid,
    "task_name": projectName,
    "dates": dateTime,
    "user_id": user_id,
    "matrix_id": priority
  }



  $.ajax({
    method: 'POST',
    url: '/store',
    data: FrontendObj,
    success: function (response) {
      window.location.href = '/list'

    }
  })
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

function openNotofy() {
  Habitsdiv.classList.toggle("showdiv");
}


closelist.addEventListener("click", (e) => {
  Habitsdiv.classList.remove("showdiv");
})

// ==========================================================================================================

// ==========================This below function is for dark mode functionality==============================
let darkBtn = document.querySelector(".darkmode")

darkBtn.addEventListener("click", () => {
  darkMode()
})

function darkMode() {
  document.querySelector(":root").classList.toggle("darkmode")
}