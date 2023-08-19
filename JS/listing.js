let form = document.querySelector(".multiple-form")
let inputBtn = document.querySelectorAll(".type-btn");
// let singleForm = document.querySelector(".single-input-form");
// let multiFormDiv = document.querySelector(".multiple-input-form");
let innerContainer = document.querySelector(".inner-container")
let cancelBtn = document.querySelector(".cancel-btn");
let empty = document.querySelector(".forms-inner-div")


// ======================below code is for open single form and multi form ===============================
for (let i = 0; i < inputBtn.length; i++) {
  inputBtn[i].addEventListener("click", () => {
    innerContainer.classList.add("active")

    if (inputBtn[i].id == "1") {
      // singleForm.classList.add("show")
      $("#single-form").show()
      openSingleForm()
    }
    else if (inputBtn[i].id == "2") {
      // multiFormDiv.classList.add("show");
      $("#multi-form").show()
      AddOneMoreForm();
    }

  })

}

// -----------below jquery code is for rotate the add button when user hover the btn-------------
$(".input-type").hover(function () {
  $(".add-btn").addClass('rotate')
}, function () {
  $(".add-btn").removeClass('rotate')
});
// ----------------------------
let typeBtn = document.querySelectorAll(".type-btn")
let typeName = document.querySelectorAll(".typeName")

$(document).ready(function () {
  for (let i = 0; i < typeBtn.length; i++) {
    $(typeBtn[i]).hover(function () {
      $(typeName[i]).show()
    }, function () {
      $(typeName[i]).hide()
    });
  }
});

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

  let closeBtn = document.querySelector("#singleCloseBtn");

  closeBtn.addEventListener("click", () => {
    innerContainer.classList.remove("active")
    // singleForm.classList.remove("show")
    $("#single-form").hide()
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
        // multiFormDiv.classList.remove("show");
        $("#multi-form").hide()
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
let check = document.querySelectorAll("#round")

for (let i = 0; i < showMoreBtn.length; i++) {
  showMoreBtn[i].addEventListener("click", () => {
    // popUpWnd.classList.toggle('invisible');
    $("#popUpWindow").show();
  });

}

// -------------task pop up window close functionality code here--------------

let popUpclose = document.querySelector('#popUpCloseBtn');
popUpclose.addEventListener("click", () => {
  // popUpWnd.classList.toggle('invisible');
  $("#popUpWindow").hide();
  // closePopUp()
});

// ------------------------------------------------------------------------------
// ==================================getId (we will fetch the tasks using jquery and store it array)==================


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

// =========================================below function is for assign the fetched task details===================== 

let taskDiv = document.querySelector('.taskListDiv')

function datas(data) {
  // console.log(data);
  if (data.length > 0) {
    let datas = data.map((element) => {

      return `
      <div class=" tasks-lists my-1	h-14	py-3 px-1.5	cursor-pointer flex gap-8 pb-5 rounded" >
        <div class="task-inner-div" id="${element.matrix_id}">
          <div class="task-info " id="rowdiv" >
            <input type="hidden" id="rowid" value="">
            <div class="list-name">
              <h5>
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
              <div class="relative" id="1">
                <input type="text" placeholder="comment here" id="comment" data-id="${element.id}" class="add-Cmts">
                <button id="addComment" data-id="${element.id}" class="absolute right-0 type="button"><i class="fa-solid fa-upload"></i></button>
              </div>
              <div class="fetchedComment">
                <p class="fetchCmt">${element.comments}</p>
              </div>
            </div>
          </div>
          <div class="text-base leading-6 text-gray-900 no-underline " id="modal-title" >
            <div class="change">
              <div class="Task-progress pt-px	">
                  <div class="round" >
                    <label for="checkbox" class="roundCheck" id ="${element.id}"></label>
                  </div>
              </div>
              <div class="make-changes">
                <button id="editBtn"><i class="fa-solid fa-pen"></i></button>
              <div>
    
    
              <button type="button" id="btnDelete" data-id="${element.id}"><i class="fa-solid fa-trash-can"></i></button>
              </div>
                <button class="add-comment-btn" data-id="${element.id}"><i class="fa-solid fa-comment"></i></button>
                <button class="addedCommentIcon" data-id="${element.id}"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 6.49962C21 9.53698 18.5376 11.9992 15.5 11.9992C12.4624 11.9992 10 9.53698 10 6.49962C10 3.46227 12.4624 1 15.5 1C18.5376 1 21 3.46227 21 6.49962ZM16.5285 2.99986H15.0965C14.8881 2.99986 14.7015 3.12914 14.6283 3.32428L13.5033 6.32407C13.3808 6.65093 13.6224 6.99959 13.9715 6.99959H14.75L13.9773 9.31749C13.8655 9.65295 14.1152 9.99938 14.4688 9.99938C14.6442 9.99938 14.8077 9.91068 14.9032 9.76366L17.5283 5.72535C17.7314 5.4129 17.5072 4.99973 17.1345 4.99973H16.5L16.9967 3.67538C17.1192 3.34853 16.8776 2.99986 16.5285 2.99986ZM15.5 12.9992C17.2465 12.9992 18.8321 12.3104 20 11.1897V14.7491C20 16.5439 18.5449 17.9988 16.75 17.9988H10.9648L5.57814 21.8159C5.12752 22.1351 4.50337 22.0287 4.18407 21.5781C4.06432 21.4091 4 21.2071 4 21.0002L3.9992 17.9988H3.25C1.45507 17.9988 0 16.5439 0 14.7491V6.24964C0 4.45484 1.45507 2.99986 3.25 2.99986H10.0218C9.375 4.01009 9 5.21107 9 6.49962C9 10.0892 11.9101 12.9992 15.5 12.9992Z" fill="#5FB32E"/>
                <circle cx="16" cy="6" r="6" fill="#FF0000"/></svg></button>
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
    </div>
    `
    taskDiv.innerHTML = emptyMsg;
  }


  // ===============================below code is for If the user hover the task div we will show the (edit delete comment butoons)======================================

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

  // console.log(data)
  // =============================below code is for three functionality (comment div toggling)(task detail strike out)(if user click the check box the div will be hiding)=================================

  let commentBtn = document.querySelectorAll(".add-comment-btn");
  let commentInput = document.querySelectorAll(".model-title ");
  let TaskCompleted = document.querySelectorAll(".roundCheck");
  let task_name = document.querySelectorAll(".task-inner-div");
  let popUpHeader = document.querySelector('.popUpHeader')


  // popUpHeader.innerHTML = `<button type="submit" id="${data[0].matrix_id}" class="completedBtn focus:outline-none font-medium rounded-lg text-sm px-5 ">COMPLETED TASK </button>`

  for (let j = 0; j < commentBtn.length; j++) {
    commentBtn[j].addEventListener("click", () => {
      commentInput[j].classList.toggle("addvisibility")
    })

    TaskCompleted[j].addEventListener("click", () => {

      task_name[j].classList.toggle("completedTask")

      setTimeout(() => {
        tasks_list[j].remove()
      }, 400)

    })
  }

  // ==============================completed task shown=================================
  let completedBtn = document.querySelector('.completedBtn')
  $(document).on("click", ".completedBtn", function (e) {
    let matrixId = e.target.id;
    // console.log(matrixId)

    /**  sending martix id to backend */
    $.ajax({
      url: "/completed",
      data: {
        value: matrixId
      },
      type: "POST",
      success: function (response) {
        // console.log(response)
        let completedTask = JSON.parse(response)
        // console.log(completedTask)
        let datas = completedTask.map((element) => {
          return `
<div class=" tasks-lists my-1	h-14	py-3 px-1.5	cursor-pointer flex gap-8 pb-5 rounded">
<div class="task-inner-div">
  <div class="task-info " id="rowdiv" >
    <input type="hidden" id="rowid" value="">
    <div class="list-name">
      <h5>
       <p class="user-content">${element.task_name}</p>
      </h5>
    </div>
  </div>
  <div class="text-base  leading-6 text-gray-900 no-underline " id="modal-title">
    <p id="due-date">${element.dates}</p>
  </div>
</div>
<div class=" tasks-lists my-1	h-14	py-3 px-1.5	cursor-pointer flex gap-8 pb-5 rounded">
<div>

<div class="make-changes addvisibility">
    <div>
        <button type="button" id="btnDelete" data-id="${element.id}"><i class="fa-solid fa-trash-can"></i></button>
    </div>
    </div>
</div>
</div>
</div>
`
        }).join("")
        taskDiv.innerHTML = datas
        // });
      }
    });
  })

  // =====================================


  // -------------------------below code is for remove the task from UI------------------------------------
  // UI delete function code here //
  let deleteBtn = document.querySelectorAll('#btnDelete')
  // console.log(deleteBtn)
  for (let i = 0; i < deleteBtn.length; i++) {

    deleteBtn[i].addEventListener('click', () => {
      tasks_list[i].remove()
    })
  }

  let del = document.querySelectorAll("#btnDelete")
  // console.log(del)




  // ------------------------------------------------------------------------
  //  ==========================This function(datas) ended here=====================


  // ==========================ADD COMMENT FUNCTION ========================
  // let addComment = document.querySelectorAll("#addComment")
  let cmtBtn = document.querySelectorAll("#addComment")
  let comment = document.querySelectorAll("#comment")
  let addCommentBtn = document.querySelectorAll(".add-comment-btn")
  let addedCommentIcon = document.querySelectorAll(".addedCommentIcon")

  for (let a = 0; a < cmtBtn.length; a++) {
    const element = cmtBtn[a];
    // console.log(element)
    element.addEventListener("click", () => {
      let id = comment[a].dataset.id
      let comments = comment[a].value

      $.ajax({
        url: "/addComment",
        data: {
          id: id,
          comments: comments
        },
        type: "POST",
        success: function (response) {

          $("#succcess").css("display", "block");

          setTimeout(() => {
            $("#succcess").css("display", "none");
          }, 3000)
          $(cmtBtn[a]).hide()
          $(addCommentBtn[a]).hide()
          $(comment[a]).hide()
          $(addedCommentIcon[a]).show();

        }
      });
    })
  }

  // ==============================addedCommentfetching=============================
  let taskInnerDiv = document.querySelectorAll(".task-inner-div")
  let fetchedComment = document.querySelectorAll(".fetchedComment")
  for (let v = 0; v < addedCommentIcon.length; v++) {
    const element = addedCommentIcon[v];
    element.addEventListener("click", () => {
      let id = comment[v].dataset.id
      let matId = taskInnerDiv[v].id
      $.ajax({
        url: "/commFetch",
        data: {
          id: id,
          matrixId: matId
        },
        type: "POST",
        success: function (res) {
          // console.log(res)
          let fetCmt = JSON.parse(res);
          $(fetchedComment[v]).css("visibility", "visible");
          fetchedComment[v].innerText = fetCmt
        }
      });
    })
  }
}


// =========================================================================

function close(params) {
  for (let i = 0; i < commentInput.length; i++) {
    if (commentInput[i].classList.contains('addvisibility')) {
      commentInput[i].classList.remove(' addvisibility')
    }
  }
}

// ===================================Below ajax code is for send the task id to backend for complete task functionality=============================================
$(document).on("click", ".roundCheck", function (e) {

  let taskid = e.target.id;
  /**  sending task id to backend */
  $.ajax({
    url: "/completedTask",
    data: { id: taskid },
    type: "POST",
    success: function (response) {
      // console.log(response);
    }

  });
})


// ================================delete task=================================

// ----------backend delete function here--------

let deleteBtn = document.querySelectorAll('#btnDelete');

$(document).on("click", "#btnDelete", function (e) {

  let taskid = e.target.parentElement.dataset.id;
  /**  sending task id to backend */
  $.ajax({
    url: "/deleteTask",
    data: { id: taskid },
    type: "POST",
    success: function (response) {
      // console.log(response);
    }
  });
})


let cmtBtn = document.querySelectorAll("#addComment")
let comment = document.querySelectorAll("#comment")
for (let a = 0; a < cmtBtn.length; a++) {
  const element = cmtBtn[a];
  element.addEventListener("click", (e) => {
    let id = comment[a].dataset.id
    let comments = comment[a].value
    $.ajax({
      url: "/addComment",
      data: {
        id: id,
        comments: comments
      },
      type: "POST",
      success: function (response) {
        // console.log(response);
        $("#succcess").css("display", "block");
      }
    })
  })
}

// ==========================ADD COMMENT FUNCTION ========================

$(document).ready(function () {

  var addComment = $('#addComment')
  addComment.click(function () {
    var comment = $("#comment").val()
    var commentId = $("#comment").attr("data-id")
    $.ajax({
      url: "/addComment",
      data: {
        comment: comment,
        commentId: commentId
      },
      type: "POST",
      success: function (response) {
        // console.log(response);
        $("#succcess").css("display", "block");
        paren.remove()

        setTimeout(() => {
          $("#succcess").css("display", "none");
        }, 3000)

      }
    });

  })
})


// ===============================This below function is about the after add the habit change it to added ==================

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
  // $(".Tasklist")
  $('.removetask').each(function () {
    $(this).click(function (e) {
      var removeBtn = $(e.target).attr("name")
      var paren = $(e.target).parent();
      $.ajax({
        url: "/deleteAddedTask",
        data: {
          value: removeBtn
        },
        type: "POST",
        success: function (response) {
          $("#succcess").css("display", "block");
          setTimeout(() => {
            $("#succcess").css("display", "none");
          }, 5000)
          paren.remove()
        }

      });

    });

  });

})

/*=========================== personal & professional btns functionality code ===============================*/

// -----------below ajax code is for send the task type id to backend for fetch that type of task --------------
let Task_typeBtn = document.querySelectorAll(".font-menu");



// ---------------below code is for add a classList to user clicked task--------------
for (let i = 0; i < Task_typeBtn.length; i++) {
  Task_typeBtn[i].addEventListener("click", (e) => {
    for (let j = 0; j < Task_typeBtn.length; j++) {
      Task_typeBtn[j].classList.remove("selectedCatagory");
    }
    e.target.classList.add("selectedCatagory");
  })

}

// =================== habits div ======================

let habiticon = document.querySelector(".Habits-icon")
// console.log(habiticon);
let AddHabisDiv = document.querySelector(".Habits-div")
let matrixdiv = document.querySelector(".page-content")
let closeHabitdiv = document.querySelector("#close-habit-div");

habiticon.addEventListener("click", () => {
  innerContainer.classList.add("active")
  AddHabisDiv.style.display = "block"
})

closeHabitdiv.addEventListener("click", () => {
  innerContainer.classList.remove("active")
  AddHabisDiv.style.display = "none"
})
// ===============================================================

for (let i = 0; i < check.length; i++) {
  check[i].addEventListener("click", (e) => {
    // console.log(e.target);
  })

}


let category_id = document.querySelectorAll(".category_id")


$(document).on("click", ".category_id", function (e) {


  let taskid = +e.target.id;
  // console.log(taskid);

  /**  sending task id to backend */
  $.ajax({
    url: "/list",
    data: { category_id: taskid },
    type: "POST",
    success: function (response) {
    }

  });



})


