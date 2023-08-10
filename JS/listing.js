let form = document.querySelector(".multiple-form")
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
  });

}

let popUpclose = document.querySelector('#popUpCloseBtn');
popUpclose.addEventListener("click", () => {
  popUpWnd.classList.toggle('invisible');
});

// ==============================================================

let commentBtn = document.querySelectorAll(".add-comment-btn");
let commentInput = document.querySelectorAll(".add-Cmt");
let TaskCompleted = document.querySelectorAll("#checkBox");

let task_name = document.querySelectorAll(".list-name");

for (let j = 0; j < commentBtn.length; j++) {
  commentInput[j].classList.add("addvisibility")
  commentBtn[j].addEventListener("click", () => {
    commentInput[j].classList.toggle("addvisibility")
  })

  TaskCompleted[j].addEventListener("click", () => {
    task_name[j].classList.toggle("completedTask")
  })
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



