let form = document.querySelector(".multiple-form")
// ---------------below code for form open a form by clicking the type button(sinle btn and multiple btn)------------------
let inputBtn = document.querySelectorAll(".input-type-btn");
let singleForm = document.querySelector(".single-input-form");
let multiFormDiv = document.querySelector(".multiple-input-form");
let innerContainer = document.querySelector(".inner-container")
let cancelBtn = document.querySelector(".cancel-btn");
let empty = document.querySelector(".forms-inner-div")
let darkBtn = document.querySelector(".darkmode")

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
      // AddOneMoreForm();
    }


  })

}
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
      console.log(getBtns)
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
  divCon.innerHTML += `
  <div class="multiple-forms-div">
  <form action="" method="post" class="multiple-form">
  <div class="main-div-closeBtn" id=${multiformCnt} >
  <span id=${multiformCnt}>X</span>
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
          <input type="button" class="typeBtn" name="1" value="Professional" id=${multiformCnt} />
          <input type="button" class="typeBtn" id=${multiformCnt} name="2" value="Personal" id="personal" />
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
          <input type="button" value="Yes" id=${multiformCnt} class="urgent-priority-btn" />
          <input type="button" value="No" id=${multiformCnt} class="urgent-priority-btn" />
        </div>
      </div>
      <div class="ImportantDiv">
        <label>Important</label>
        <div class="">
          <input type="button" value="Yes" id=${multiformCnt} class="important-priority-btn" />
          <input type="button" value="No" id=${multiformCnt} class="important-priority-btn" />
        </div>
      </div>
    </div>
  </form>
  </div>
  `
  // ----------below code for adding color to the taskType(personal or professional) ----------------

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
      // console.log(getBtns)
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


  // -----------------this below close button for close multi form-----------------

  let mainDivCloseBtn = document.querySelectorAll(".main-div-closeBtn");
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
    
    // for (let i = 0; i < multipleFormsDiv.length; i++) {
    //   // multipleFormsDiv.addEventListener("onmouseenter", () => {
    //   console.log(multipleFormsDiv[i]);
    //   // })
      
    // }

    // cancelButton.addEventListener("click", () => {

    //   innerContainer.classList.remove("active");
    //   multipleFormsDiv[i].remove();
    //   multiFormDiv.classList.remove("show");
    //   // console.log(multipleFormsDiv[i]);

    // })

  }

}
// ========================================================================================================/

// ========================================Notification section=================================================================/

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

darkBtn.addEventListener("click", () => {
  darkMode()
})

function darkMode() {
  document.querySelector(":root").classList.toggle("darkmode")
}