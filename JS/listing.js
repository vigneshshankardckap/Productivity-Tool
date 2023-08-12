let form = document.querySelector(".multiple-form")
let inputBtn = document.querySelectorAll(".input-type-btn");
let singleForm = document.querySelector(".single-input-form");
let multiFormDiv = document.querySelector(".multiple-input-form");
let innerContainer = document.querySelector(".inner-container")
let cancelBtn = document.querySelector(".cancel-btn");
let empty = document.querySelector(".forms-inner-div")
let userContents = document.querySelectorAll(".user-content")

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

// ================================Below code is for switch the type button (personal or profession)============
let switchs = document.querySelector(".switchBall")
let taskType = document.querySelectorAll('.switchCat')

for (let s = 0; s < taskType.length; s++) {
  switchs.addEventListener("click", () => {
    taskType[s].classList.toggle('on')
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
  divCon.innerHTML += `
  <div class="multiple-forms-div">
  <form action="" method="post" class="multiple-form">
  <div class="main-div-closeBtn" id=${multiformCnt} >
  <span id=${multiformCnt}>X</span>
  </div>
    <div class="multi-input-div">
      <label>What on your task?</label>
      <div class="todo-input-box">
        <textarea name="Task_name" id="" cols="30" rows="10" placeholder="Enter your task"></textarea>
      </div>
    </div>
    <div class="other-input-div">
      <div class="category-div">
        <label>Pick category</label>
        <div class="task_type">
          <input type="button" class="typeBtn" name="1" value="Professional" id=${multiformCnt} />
          <input type="button" class="typeBtn" id=${multiformCnt} name="2" value="Personal" id="personal" />
        </div>
      </div>
      <div class="date-time-div">
        <label>When is your due?</label>
        <div>
          <input type="datetime-local" placeholder="Get Date/Time" class="multiDateTime" value="" name="" />
        </div>
      </div>
      <div class="urgentDiv">
        <label>Urgent</label>
        <div>
          <label for="css">Yes</label>
          <input type="radio" value="1" id=${multiformCnt} class="urgent-priority-btn" name="urgent"/>
          <label for="css">No</label>
          <input type="radio" value="0" id=${multiformCnt} class="urgent-priority-btn" name="urgent"/>
        </div>
      </div>
      <div class="ImportantDiv">
        <label>Important</label>
        <div>
          <label for="css">Yes</label>
          <input type="radio" value="1" id=${multiformCnt} class="important-priority-btn" name="important"/>
          <label for="css">No</label>
          <input type="radio" value="0" id=${multiformCnt} class="important-priority-btn" name="important"/>
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
    console.log(urgentBtn[i])
    classListAdd(taskType[i], taskType);
    classListAdd(urgentBtn[i], urgentBtn);
    classListAdd(importantBtn[i], importantBtn);
  }

  function classListAdd(getBtns, getBtn) {
    getBtns.addEventListener("click", (e) => {
      let targetId = e.target.id;
      for (let j = 0; j < getBtn.length; j++) {
        if (getBtn[j].getAttribute("id") == targetId) {
          getBtn[j].style.backgroundColor = "";
          getBtn[j].style.color = "";
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

  for (let i = 0; i < mainDivCloseBtn.length; i++) {
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
let darkBtn = document.querySelector(".theme-btn")

darkBtn.addEventListener("click", () => {
  if (darkBtn.classList.contains("fa-moon")) {
    document.querySelector(":root").classList.add("darkmode")
    darkBtn.classList.remove("fa-moon")
    darkBtn.classList.add("fa-sun")

  }
  else {
    document.querySelector(":root").classList.remove("darkmode")
    darkBtn.classList.remove("fa-sun")
    darkBtn.classList.add("fa-moon")
  }
})

// =================================================================================================
// ---------------show more button functionality code here--------------
let showMoreBtn = document.querySelectorAll(".showMoreBtn");
let popUpWnd = document.querySelector('.testing-window');

for (let i = 0; i < showMoreBtn.length; i++) {
  showMoreBtn[i].addEventListener("click", () => {
    popUpWnd.classList.toggle('invisible');
    // datas()
  });

}

// ====================deleted function ====================================================



$(document).ready(function () {

  // selecting btn to delete
  var btnDelete = $("#btnDelete");
  // console.log(btnDelete);

  // adding click function for delete btn
  btnDelete.click(function () {

    // getting taskid 
    var rowdiv = $('#rowdiv');
    var taskid = $('#rowid').val();

    // sending task id to backend
    $.ajax({
      url: "/deleteTask",
      data: { id: taskid },
      type: "POST",
      success: function (response) {
        $("#rowdiv" + taskid).remove();

        // If the request is successful, update the HTML table

      }
    });

  })

  // ==========================ADD COMMENT FUNCTION ========================

  $(document).ready(function () {

    var addComment = $('#addComment')
    addComment.click(function () {
      // alert("clicked")
      var comment = $("#comment").val()
      // console.log(comment)
      var commentId = $("#commentId").val()
      $.ajax({
        url: "/addComment",
        data: {
          comment: comment,
          commentId: commentId
        },
        type: "POST",
        success: function (response) {
          // console.log(response);
        }
      });


    })

  })

});

// ===============================This below function is about the after add the habit change it to added ===

$(function () {
  $('.add').each(function () {
    $(this).click(function (e) {
      var addText = $(e.target).text()
      var addedValue = $(e.target).attr("name")
      // console.log(addedValue)
      if (addText == "ADD") {
        $(e.target).text("ADDED")
      }
      else if (addText == "ADDED") {
        $(e.target).text("ADD")
      }
      $.ajax({
        url: "/addTask",
        data: {
          value: addedValue
        },
        type: "POST",
        success: function (response) {
          // console.log(response)
        }
      });
    });
  });
});



// =====================REMOVE ADDED HABITS USING JQUERY AND AJAX=================

$(function () {
  $('.removetask').each(function () {
    $(this).click(function (e) {
      var removeBtn = $(e.target).attr("name")
      // console.log(removeBtn)
      $.ajax({
        url: "/deleteAddedTask",
        data: {
          value: removeBtn
        },
        type: "POST",
        success: function (response) {
          // console.log(response)
        }
      });
    });
  });
});



// ==================================getId ==================


$(document).ready(function () {

  // selecting btn to delete
  var viewtask = $("#getid");

  let btn = document.querySelectorAll("#getid");
  // console.log(btn)

  for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener("click", (e) => {

      let matrixid = e.target.dataset.id;


      let arr = [];
      /**  sending task id to backend */

      $.ajax({
        url: "/particulartask",
        data: { id: matrixid },
        type: "POST",
        success: function (response) {
          // console.log(response);  
          let obj = JSON.parse(response);

          for (let i = 0; i < obj.length; i++) {

            arr.push(obj[i])
          }
          datas(arr);
        }
      });

    })
  }

});
// -----------------------------------------
let popUpclose = document.querySelector('#popUpCloseBtn');
popUpclose.addEventListener("click", () => {
  popUpWnd.classList.toggle('invisible');
});
// -----------------------------

let taskDiv = document.querySelector('.taskListDiv')


function datas(data) {
  console.log(data);
  if (data.length > 0) {
    let datas = data.map((element) => {

      return `
      <div class="tasks-lists bg-zinc-200 my-1	h-14	py-3 px-1.5	cursor-pointer flex gap-8 pb-5 rounded">
        <div class="task-inner-div">
          <div class="task-info" id="rowdiv">
            <input type="hidden" id="rowid" value="">
            <div class="list-name">
              <h5 id="Task-Name" class="text-sm text-gray-500">
                <p class="user-content">${element.task_name}</p>
              </h5>
            </div>
          </div>
          <div class="text-base  leading-6 text-gray-900 no-underline " id="modal-title">
            <p id="due-date">${element.dates}</p>
          </div>
        </div>
        <div class="second-div">
          <div class="text-base leading-6 text-gray-900 no-underline model-title " id="modal-title">
            <div class="add-Cmt">
              <form action="/addComment" method="post" class="relative">
                <input type="text" value="" name="commentId" id="commentId" hidden>
                <input type="text" placeholder="comment here " id="comment" name="comment" class="add-Cmt">
                <button id="addComment" class="absolute right-0 type="button"><i class="fa-solid fa-upload"></i></button>
              </form>
            </div>
          </div>
          <div class="text-base leading-6 text-gray-900 no-underline " id="modal-title">
            <div class="change">
              <div class="Task-progress pt-px	">
                  <div class="round">
                    <input type="checkbox" id="checkbox" class="taskCheckBox"/>
                    <label for="checkbox"></label>
                  </div>
              </div>
              <div class="make-changes">
                <button><i class="fa-solid fa-pen"></i></button>
                <form action="/deleteTask" method="post">
                  <input type="text" hidden name=task_id value="" />
                  <button type="button" id="btnDelete"><i class="fa-solid fa-trash-can"></i></button>
                </form>
                <button class="add-comment-btn"><i class="fa-solid fa-comment"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      `
    }).join("")

    taskDiv.innerHTML = datas

  }
  else {
    let emptyMsg = `
    <div>
    <p>Please Add Task</p>
    </div>`
    taskDiv.innerHTML = emptyMsg;
  }


  // ======================================

  let tasks_list = document.querySelectorAll('.tasks-lists')
  let btnDiv = document.querySelectorAll('.make-changes')


  $(document).ready(function () {
    for (let i = 0; i < tasks_list.length; i++) {
      $(tasks_list[i]).hover(function () {
        $(btnDiv[i]).addClass('show')
      }, function () {
        $(btnDiv[i]).removeClass('show')
      });
    }
  });


  // ==============================================================

  let commentBtn = document.querySelectorAll(".add-comment-btn");
  let commentInput = document.querySelectorAll(".model-title ");
  let TaskCompleted = document.querySelectorAll("#checkbox");
  let task_name = document.querySelectorAll(".task-inner-div");

  for (let j = 0; j < commentBtn.length; j++) {

    commentBtn[j].addEventListener("click", () => {
      commentInput[j].classList.toggle("addvisibility")
    })

    TaskCompleted[j].addEventListener("click", () => {
      task_name[j].classList.toggle("completedTask")
      setTimeout(() => {
        tasks_list[j].remove()
      }, 250);
    })
  }


}

  // ======================================

  // let viewDiv1 = document.querySelector('.viewBtnDiv1');
  // let viewDiv2 = document.querySelector('.viewBtnDiv2');
  // let viewDiv3 = document.querySelector('.viewBtnDiv3');
  // let viewDiv4 = document.querySelector('.viewBtnDiv4');
  // console.log(viewDiv1.parentElement)
  
  // viewDiv1.innerHTML = `<button class="showMoreBtn" id="getid" data-id="<?php echo "1" ?>" name="matrixId">View Task..</button>`

