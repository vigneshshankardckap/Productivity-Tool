let inputBtn = document.querySelectorAll(".input-type-btn");
let innerContainer = document.querySelector(".inner-container")


// below selectore for task type btn (single or multiple)
let typeBtn = document.querySelectorAll(".type-btn")
let typeName = document.querySelectorAll(".typeName")
// below selectore is for comment section

// below selectore is for multiple form append div
// let divCon = document.querySelector(".forms-inner-div");
// ----------notification section----------
let Notificationbtn = document.querySelector(".notification");
let closelist = document.querySelector("#close-notificationList")
let Habitsdiv = document.querySelector(".Habitsdiv");
// ----------notification close function------------------
closelist.addEventListener("click", () => {
  location.reload()
})
// --------------dark mode button ----------
let darkBtn = document.querySelector(".theme-btn")

let taskMainCont1 = document.querySelector(".content1")
let taskMainCont2 = document.querySelector(".content2")
let taskMainCont3 = document.querySelector(".content3")
let taskMainCont4 = document.querySelector(".content4")

let content1 = []
let content2 = []
let content3 = []
let content4 = []

$(document).ready(function () {
  $.ajax({
    type: "GET",
    url: "/fetch_proofession",
    async: false,
    success: function (response) {
      var obj = JSON.parse(response)
      for (let i = 0; i < obj.length; i++) {
        if (obj[i].matrix_id == 1) {
          content1.push(obj[i])
        }
        else if (obj[i].matrix_id == 2) {
          content2.push(obj[i])
        }
        else if (obj[i].matrix_id == 3) {
          content3.push(obj[i])
        }
        else {
          content4.push(obj[i])
        }
      }

      createTasks(taskMainCont1, content1.slice(0, 4))
      createTasks(taskMainCont2, content2.slice(0, 4))
      createTasks(taskMainCont3, content3.slice(0, 4))
      createTasks(taskMainCont4, content4.slice(0, 4))

    }

  });

})

function createTasks(div, obj) {
  let htmlEle = obj.map((datum) => {
    return `
      <div class="flex items-center gap-2	">
      <span class="material-symbols-outlined"  style="color:#5fb32e">
      adjust
      </span>
        <div class="nameDateDiv">
          <p class="copy text-start	w-40">${datum.task_name.slice(0, 20)}</p>
          <p class="date text-right	">${datum.dates.slice(0, 16)}</p>
        </div>
      </div>`
  }).join("")
  div.innerHTML = htmlEle

}



$(".category_id").on("click", (e) => {

  content1.splice(0, content1.length)
  content2.splice(0, content2.length)
  content3.splice(0, content3.length)
  content4.splice(0, content4.length)

  let CatId = e.target.id;
  $.post("/list_page", { Id: CatId })
    .done(function (data) {
      let category = JSON.parse(data);


      for (let i = 0; i < category.length; i++) {
        if (category[i].matrix_id == 1) {
          content1.push(category[i])
        }
        else if (category[i].matrix_id == 2) {
          content2.push(category[i])
        }
        else if (category[i].matrix_id == 3) {
          content3.push(category[i])
        }
        else {
          content4.push(category[i])
        }
      }
      createTasks(taskMainCont1, content1)
      createTasks(taskMainCont2, content2)
      createTasks(taskMainCont3, content3)
      createTasks(taskMainCont4, content4)
    });
})

// ======================below code is for open single form and multi form ===============================
for (let i = 0; i < inputBtn.length; i++) {
  inputBtn[i].addEventListener("click", () => {
    innerContainer.classList.add("active")
    $(".black-screen").show();

    if (inputBtn[i].id == "1") {
      $("#single-form").show()
      openSingleForm()
    }
    else if (inputBtn[i].id == "2") {
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

function openSingleForm() {

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
    $(".black-screen").hide();
    $("#single-form").hide()
  })


}

// ==============================================================================================================

// =====================================this function is for append multiple form div============================
let multiformCnt = -1;
let cnt = 0;

function AddOneMoreForm() {
  multiformCnt = multiformCnt + 1
  cnt++;

  jQuery(".forms-inner-div").append('' +
  `<div class="multiple-forms-div">`+
  `<div class="main-div-closeBtn" id=${multiformCnt} >`+
  `<span id=${multiformCnt}>X</span>`+
  `</div>`+
    `<div class="multi-input-div">`+
      `<label>What on your task?</label>`+
      `<div class="todo-input-box">`+
        `<textarea name="Task_name[]" id="" cols="30" rows="10" placeholder="Enter your task"></textarea>`+
      `</div>`+
    `</div>`+
    `<div class="other-input-div">`+
      `<div class="category-div">`+
        `<label>Pick category</label>`+
        `<div class="multi-task_type">`+
          `<input type="radio" class="typeBtn" name="${multiformCnt}catogrey[]" value="1" id=${multiformCnt}/>Professional`+
          `<input type="radio" class="typeBtn" id=${multiformCnt} name="${multiformCnt}catogrey[]" value="2"/>Personal`+
        `</div>`+
      `</div>`+
      
      `<div class="date-time-div">`+
        `<label>When is your due?</label>`+
        `<div>`+
          `<input type="datetime-local" placeholder="Get Date/Time" class="multiDateTime" value="" name="date[]" />`+
        `</div>`+
      `</div>`+
      `<div class="urgentDiv">`+
        `<label>Urgent</label>`+
        `<div>`+
          `<label for="css">Yes</label>`+
          `<input type="radio" value="1" id=${multiformCnt} class="urgent-priority-btn" name="${multiformCnt}urgent[]"/>`+
          `<label for="css">No</label>`+
          `<input type="radio" value="0" id=${multiformCnt} class="urgent-priority-btn" name="${multiformCnt}urgent[]"/>`+
        `</div>`+
      `</div>`+
      `<div class="ImportantDiv">`+
        `<label>Important</label>`+
        `<div>`+
          `<label for="css">Yes</label>`+
          `<input type="radio" value="1" id=${multiformCnt} class="important-priority-btn" name="${multiformCnt}important[]"/>`+
          `<label for="css">No</label>`+
          `<input type="radio" value="0" id=${multiformCnt} class="important-priority-btn" name="${multiformCnt}important[]"/>`+
        `</div>`+
      `</div>`+
    `</div>`+
  `</div>`
  );


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
        $(".black-screen").hide();
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

// ------------- Notification functionality  ------------------

function openNotofy() {
  Habitsdiv.classList.toggle("showdiv");
}


closelist.addEventListener("click", (e) => {
  Habitsdiv.classList.remove("showdiv");
})

$(document).mouseup(function () {
  if (Habitsdiv.classList.contains("showdiv")) {
    Habitsdiv.classList.remove("showdiv");
  }
});


// ==========================================================================================================

// ==========================This below function is for dark mode functionality==============================

darkBtn.addEventListener("click", () => {
  document.querySelector(":root").classList.toggle("darkmode")
  if (darkBtn.innerText === "dark_mode") {
    darkBtn.innerText = "light_mode"
  }
  else {
    darkBtn.innerText = "dark_mode"
  }
})

// =================================================================================================
// ---------------show more button functionality code here--------------
let showMoreBtn = document.querySelectorAll(".showMoreBtn");
let popUpWnd = document.querySelector('.testing-window');
let check = document.querySelectorAll("#round")

let model_title = document.querySelector('#modal-title')

for (let i = 0; i < showMoreBtn.length; i++) {
  showMoreBtn[i].addEventListener("click", () => {
    // popUpWnd.classList.toggle('invisible');
    $("#popUpWindow").show();

    switch (showMoreBtn[i].id) {
      case "1":
        model_title.innerHTML = "Do it now"
        break;
      case "2":
        model_title.innerHTML = "Schedule a Time to Do it"
        break;
      case "3":
        model_title.innerHTML = "Who can Do it for you"
        break;
      case "4":
        model_title.innerHTML = "Eliminate it"
        break;
      default:
        model_title.innerHTML = ""
        break;
    }
  });

}

// -------------task pop up window close functionality code here--------------
let fetchFilterData = 1;

let taskDiv = document.querySelector('.taskListDiv')
let popUpclose = document.querySelector('#popUpCloseBtn');
// let tasksLists = document.querySelectorAll(".tasks-lists")

popUpclose.addEventListener("click", () => {
  $("#popUpWindow").hide();
  location.reload()
  fetchFilterData = 1;
});

// ------------------------------------------------------------------------------
// ==================================getId (we will fetch the tasks using jquery and store it array)==================
let categoryId = 1
$(".category_id").on("click", (e) => {
  categoryId = e.target.id
})

let unCompletedTask = [];
let completedTask = [];

$(document).ready(function () {

  let btn = document.querySelectorAll("#getid");

  for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener("click", (e) => {

      let matrixid = e.target.dataset.id;
      // console.log(categoryId);
      /**  sending task id to backend */
      $.ajax({
        url: "/particulartask",
        data: {
          matrixId: matrixid,
          categoryId: categoryId
        },
        type: "POST",
        success: function (response) {
          // console.log(response);  
          let obj = JSON.parse(response);

          for (let i = 0; i < obj.length; i++) {

            if (obj[i].completed_at == null) {
              unCompletedTask.push(obj[i]);
            }
            else {
              completedTask.push(obj[i]);
            }

          }
          datas(unCompletedTask, completedTask)
          completedTaskFun(completedTask)
          // console.log(completedTask);
        }
      });

    })
  }

});

// =========================================below function is for assign the fetched task details===================== 

let popUpHeader = document.querySelector('.popUpHeader')
// let incompletedDiv = document.querySelector(".incompleteBtn")
function datas(data, getType) {
  if (data.length > 0) {
    let datas = data.map((element) => {
      if (element.comments == "null") {
        return `
        <div class=" tasks-lists my-1	h-14	py-3 px-data.length > 01.5	cursor-pointer flex gap-8 pb-5 rounded">
          <div class="task-inner-div" id="${element.matrix_id}">
            <div class="task-info " id="rowdiv" >
              <input type="hidden" id="rowid" value="">
              <div class="list-name">
                <h5>
                 <p class="user-content">${element.task_name.slice(0,20)}</p>
                </h5>
              </div>
            </div>
            <div class="text-base  leading-6 text-gray-900 no-underline " id="modal-title">
              <p id="due-date">${element.dates.slice(0, 16)}</p>
            </div>
          </div>
          <div class="second-div">
            <div class="text-base leading-6 text-gray-900 no-underline model-title " id="modalBar" data-id="modal-title" >
              <div class="add-Cmt" id="commentDiv">
                <div class="relative" id="relativeDiv">
                  <input type="text" placeholder="comment here" id="comment" data-id="${element.id}" class="add-Cmt">
                  <button id="addComment" data-id="${element.id}" class="absolute right-0 type="button"><i class="fa-solid fa-upload"></i></button>
                </div>
                <div class="fetchedComments" id="${element.id}">
                  <p class="fetchCmt">${element.comments}</p>
                </div>
              </div>
            </div>
            <div class="text-base leading-6 text-gray-900 no-underline ">
              <div class="change">
                <div class="Task-progress pt-px	">
                    <div class="round" >
                      <label for="checkbox" class="roundCheck" id ="${element.id}" title="Complete"></label>
                    </div>
                </div>
                <div class="make-changes">
                  <button id="editBtn" data-role="update" data-id="${element.id}">
                    <span class="material-symbols-outlined">
                      edit
                    </span>
                  </button>
                  <div class="commentBtnDiv" id="${element.id}"> 
                  <button class="addComentBtn" data-id="${element.id}" title="Add Comment" id="${element.id}">
                    <span class="material-symbols-outlined">
                      chat
                    </span>
                  </button>
                  <button class="commentAddeds" data-id="${element.id}" id="${element.id}"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M21 6.49962C21 9.53698 18.5376 11.9992 15.5 11.9992C12.4624 11.9992 10 9.53698 10 6.49962C10 3.46227 12.4624 1 15.5 1C18.5376 1 21 3.46227 21 6.49962ZM16.5285 2.99986H15.0965C14.8881 2.99986 14.7015 3.12914 14.6283 3.32428L13.5033 6.32407C13.3808 6.65093 13.6224 6.99959 13.9715 6.99959H14.75L13.9773 9.31749C13.8655 9.65295 14.1152 9.99938 14.4688 9.99938C14.6442 9.99938 14.8077 9.91068 14.9032 9.76366L17.5283 5.72535C17.7314 5.4129 17.5072 4.99973 17.1345 4.99973H16.5L16.9967 3.67538C17.1192 3.34853 16.8776 2.99986 16.5285 2.99986ZM15.5 12.9992C17.2465 12.9992 18.8321 12.3104 20 11.1897V14.7491C20 16.5439 18.5449 17.9988 16.75 17.9988H10.9648L5.57814 21.8159C5.12752 22.1351 4.50337 22.0287 4.18407 21.5781C4.06432 21.4091 4 21.2071 4 21.0002L3.9992 17.9988H3.25C1.45507 17.9988 0 16.5439 0 14.7491V6.24964C0 4.45484 1.45507 2.99986 3.25 2.99986H10.0218C9.375 4.01009 9 5.21107 9 6.49962C9 10.0892 11.9101 12.9992 15.5 12.9992Z" fill="#5FB32E"/>
                  <circle cx="16" cy="6" r="6" fill="#FF0000"/></svg>
                  </div>
              </div>
            </div>
          </div>
        </div>
        `
      }
      else {
        return `
          <div class=" tasks-lists my-1	h-14	py-3 px-data.length > 01.5	cursor-pointer flex gap-8 pb-5 rounded">
            <div class="task-inner-div" id="${element.matrix_id}">
              <div class="task-info " id="rowdiv" >
                <input type="hidden" id="rowid" value="">
                <div class="list-name">
                  <h5>
                   <p class="user-content">${element.task_name.slice(0,20)}</p>
                  </h5>
                </div>
              </div>
              <div class="text-base  leading-6 text-gray-900 no-underline " id="modal-title">
                <p id="due-date">${element.dates.slice(0, 16)}</p>
              </div>
            </div>
            <div class="second-div">
              <div class="text-base leading-6 text-gray-900 no-underline model-title " id="modal-title">
                <div class="add-Cmt">
                <div class="fetchedComment">
                    <p class="fetchCmt">${element.comments}</p>
                </div>
                </div>
              </div>
              <div class="text-base leading-6 text-gray-900 no-underline " id="modal-title">
                <div class="change">
                  <div class="Task-progress pt-px	">
                      <div class="round" >
                        <label for="checkbox" class="roundCheck" id ="${element.id}" title="Complete"></label>
                      </div>
                  </div>
                  <div class="make-changes">
                    <button id="editBtn" data-role="update" data-id="${element.id}"><i class="fa-solid fa-pen"></i></button>
                    <button class="commentAdded" data-id="${element.id}" title="Add Comment"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 6.49962C21 9.53698 18.5376 11.9992 15.5 11.9992C12.4624 11.9992 10 9.53698 10 6.49962C10 3.46227 12.4624 1 15.5 1C18.5376 1 21 3.46227 21 6.49962ZM16.5285 2.99986H15.0965C14.8881 2.99986 14.7015 3.12914 14.6283 3.32428L13.5033 6.32407C13.3808 6.65093 13.6224 6.99959 13.9715 6.99959H14.75L13.9773 9.31749C13.8655 9.65295 14.1152 9.99938 14.4688 9.99938C14.6442 9.99938 14.8077 9.91068 14.9032 9.76366L17.5283 5.72535C17.7314 5.4129 17.5072 4.99973 17.1345 4.99973H16.5L16.9967 3.67538C17.1192 3.34853 16.8776 2.99986 16.5285 2.99986ZM15.5 12.9992C17.2465 12.9992 18.8321 12.3104 20 11.1897V14.7491C20 16.5439 18.5449 17.9988 16.75 17.9988H10.9648L5.57814 21.8159C5.12752 22.1351 4.50337 22.0287 4.18407 21.5781C4.06432 21.4091 4 21.2071 4 21.0002L3.9992 17.9988H3.25C1.45507 17.9988 0 16.5439 0 14.7491V6.24964C0 4.45484 1.45507 2.99986 3.25 2.99986H10.0218C9.375 4.01009 9 5.21107 9 6.49962C9 10.0892 11.9101 12.9992 15.5 12.9992Z" fill="#5FB32E"/>
                    <circle cx="16" cy="6" r="6" fill="#FF0000"/></svg></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          `
      }

    }).join("")

    let anotherTask = data.map((element) => {
      return `
      <div class="tasks-lists my-1	h-14	py-3 px-data.length > 01.5	cursor-pointer flex gap-8 pb-5 rounded">
      <div class="completed-task-inner-div" id="${element.matrix_id}">
        <div class="task-info " id="rowdiv" >
          <input type="hidden" id="rowid" value="">
          <div class="list-name">
             <p class="user-content w-56">${element.task_name.slice(0,20)}</p>
          </div>
        </div>
        <div class="text-base  leading-6  text-gray-900 no-underline " id="modal-title">
          <p id="due-date w-3" >${element.dates.slice(0, 16)}</p>
        </div>
        <div class="text-base leading-6 text-gray-900 no-underline " id="modal-title w-56" >
          <button type="button" id="btnDelete" data-id="${element.id}"><i class="fa-regular fa-trash-can" style="color:#5fb32e"></i></button>
        </div>
      </div>
    </div>
          `
    }).join("")

    if (getType) {
      taskDiv.innerHTML = datas
    }
    else {
      taskDiv.innerHTML = anotherTask
    }
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

  // -------------------------below code is for remove the task from UI------------------------------------
  // UI delete function code here //
  let deleteBtn = document.querySelectorAll('#btnDelete')
  // console.log(deleteBtn)
  for (let i = 0; i < deleteBtn.length; i++) {

    deleteBtn[i].addEventListener('click', () => {
      tasks_list[i].remove()
    })
  }


  let cmtBtn = document.querySelectorAll("#addComment")
  let comment = document.querySelectorAll("#comment")
  let addCommentBtn = document.querySelectorAll(".add-comment-btn")
  let addedCommentIcon = document.querySelectorAll(".addedCommentIcon")
  let nfetchedComment = document.querySelectorAll(".nfetchedComment")
  let addedCommentIcn = document.querySelectorAll(".addedCommentIcn")


  for (let a = 0; a < cmtBtn.length; a++) {
    const element = cmtBtn[a];

    element.addEventListener("click", () => {
      modalTitle[i].style.visibility = "visible"
    })

  }


  //======================newly added Comment section================================
  let inputCommentBox = document.querySelectorAll("#comment")
  let inputCommentBtn = document.querySelectorAll("#addComment")
  let relative = document.querySelectorAll("#relativeDiv")
  let addComentBtn = document.querySelectorAll(".addComentBtn")
  let commentAddeds = document.querySelectorAll(".commentAddeds")
  for (let q = 0; q < inputCommentBox.length; q++) {
    const inputBtn = inputCommentBtn[q];
    inputBtn.addEventListener("click", () => {
      // alert("btn")
      let commentId = inputCommentBox[q].dataset.id
      let commentValue = inputCommentBox[q].value
      $.ajax({
        url: "/addComment",
        data: {
          id: commentId,
          comments: commentValue
        },
        type: "POST",
        success: function (response) {
          $("#succcess").css("display", "block");
          relative[q].remove()
          addComentBtn[q].remove()
          commentAddeds[q].style.display = "block"
        }
      })

    })

  }

  // ==============================addedCommentfetching=============================
  let commentAddedsBtn = document.querySelectorAll(".commentAddeds")
  let fetchedComments = document.querySelectorAll(".fetchedComments")

  for (let v = 0; v < commentAddedsBtn.length; v++) {
    const element = commentAddedsBtn[v];
    element.addEventListener("click", () => {
      let id = commentAddedsBtn[v].id
      console.log(id)
      let matId = taskInnerDiv[v].id
      $.ajax({
        url: "/commFetch",
        data: {
          id: id,
          matrixId: matId
        },
        type: "POST",
        success: function (res) {
          let fetCmt = JSON.parse(res);
          fetchedComments[v].style.visibility = "visible"
          fetchedComments[v].innerText = fetCmt
        }
      });
    })
  }
  ///========================commment fetching ======================================
  // let addedCommentIcon = document.querySelectorAll(".commentAdded")
  let taskInnerDiv = document.querySelectorAll(".task-inner-div")
  let fetchedComment = document.querySelectorAll(".fetchedComment")
  for (let v = 0; v < addedCommentIcon.length; v++) {
    const element = addedCommentIcon[v];
    element.addEventListener("click", () => {
      let id = addedCommentIcon[v].dataset.id
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

  $(document).on("click", "#btnDelete", function (e) {

    let taskid = e.target.parentElement.dataset.id;
    /**  sending task id to backend */
    $.ajax({
      url: "/deleteTask",
      data: { id: taskid },
      type: "POST",
      success: function (response) {
      
      }
    });
  })





}


function completedTaskFun(tasks) {

  if (tasks.length > 0) {
    popUpHeader.innerHTML = `<button type="submit" id="${tasks[0].matrix_id}" class="completedBtn showDataBtn focus:outline-none font-medium rounded-lg text-sm px-5 py-2">COMPLETED TASK </button>`

    let showUserDataBtn = document.querySelector(".showDataBtn");
    showUserDataBtn.addEventListener("click", () => {
      if (fetchFilterData == 0) {
        fetchFilterData = 1;
        showUserDataBtn.innerText = "COMPLETED TASK";
        datas(unCompletedTask, fetchFilterData)
      } else {
        fetchFilterData = 0;
        showUserDataBtn.innerText = "INCOMPLETED TASK";
        datas(completedTask, fetchFilterData)
      }
    })

  }

}
//  ===========================edit form backend============================================================

$(document).on("click", '[data-role=update]', function (e) {
  let id = $(this).data('id')
  $.ajax({
    url: "/editTask",
    data: {
      id: id,
    },
    type: "POST",
    success: function (response) {
      let EditTask_Responce = JSON.parse(response);
      EditFilling(EditTask_Responce);

    }
  })
})

function EditFilling(EditTask_Responce) {
  let editbtn = document.querySelectorAll("#editBtn")
  let editForm = document.querySelector('.editForm')
  for (let i = 0; i < editbtn.length; i++) {
    editbtn[i].addEventListener("click", (e) => {
      // $("#popUpWindow").hide();
      $(".black-screen").show();
      $(".editForm").show()
      // editForm.style.display = "block"

      EditTask_Responce.forEach(editContent => {

        let editHtml = `<div class="updateCloseBtn" id="updateFormCloseBtn">
              <div>
                <span>X</span>
              </div>
            </div>

            <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
             type="text" hidden name="userId" placeholder="Task Name" value=${editContent.user_id} id="userId"   >
            <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Task Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="editTask" type="text" required name="editTaskName" placeholder="Task Name" value=${editContent.task_name} id="editTaskName">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Date
            </label>
            <input required
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="editDate" type="date" name=editTaskdate placeholder="Date" value=${editContent.dates} >
        </div>
        <div class="flex items-center justify-center">
        <button
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="button"  id="updateTask" data-id=${editContent.id}>
            Update
        </button>
      </div>`
        editForm.innerHTML = editHtml

      });

      let updateFormCloseBtn = document.querySelector('.updateCloseBtn')
      updateFormCloseBtn.addEventListener('click', () => {
        // editForm.style.display = "none"
        $(".editForm").hide()
        $(".black-screen").hide();


      })

      $("#updateTask").on("click", () => {
        let editId = $("#updateTask").attr("data-id");
        let editTaskName = $("#editTask").val();
        let editTaskdate = $("#editDate").val();
        let user_id = $("#userId").val();


        const url = '/updateTask';
        const data = {
          editId: editId,
          editTaskName: editTaskName,
          editTaskdate: editTaskdate,
          user_id: user_id
        };

        $.ajax({
          type: "POST",
          url: url,
          data: data,
          success: function (result) {
            window.location.replace("/list")
          }
        })
      })

    })
  }
}

function close(params) {
  for (let i = 0; i < commentInput.length; i++) {
    if (commentInput[i].classList.contains('addvisibility')) {
      commentInput[i].classList.remove(' addvisibility')
    }
  }
}

// ===================================Below ajax code is for send the task id to backend for complete task functionality=============================================
let TaskCompleted = document.querySelectorAll(".roundCheck");
// console.log(Task);
$(document).on("click", ".roundCheck", function (e) {
  // popUpHeader.innerHTML = `<button type="submit" id="${tasks[0].matrix_id}" class="completedBtn showDataBtn focus:outline-none font-medium rounded-lg text-sm px-5 py-2">COMPLETED TASK </button>`
  completedTaskFun(completedTask)
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
          $("#toastMsg").text("Succesfully Added");
          $("#succcess").css("display", "block");
          setTimeout(() => {
            $("#succcess").css("display", "none");
          }, 3000)
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
          $("#toastMsg").text("Succesfully Removed");
          $("#succcess").css("display", "block");
          setTimeout(() => {
            $("#succcess").css("display", "none");
          }, 3000)
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

let AddHabisDiv = document.querySelector(".Habits-div")

let matrixdiv = document.querySelector(".page-content")

let closeHabitdiv = document.querySelector("#close-habit-div");


habiticon.addEventListener("click", () => {
  $(".black-screen").show();
  AddHabisDiv.style.display = "block"
})

closeHabitdiv.addEventListener("click", () => {
  $(".black-screen").hide();
  location.reload()
  AddHabisDiv.style.display = "none"
})
// ===============================================================

for (let i = 0; i < check.length; i++) {
  check[i].addEventListener("click", (e) => {
    // console.log(e.target);
  })

}


// =================permanent delete functionlity==============
let permanentBtn = document.querySelectorAll('#btnDelete');
let btnDelete = document.querySelector("#btnDelete")

$(document).on("click", "#btnDelete", function (e) {
  confirm("Are you sure to Delete permanently?");

  // let listName = document.querySelector(".task-inner-div")
  let taskid = e.target.parentElement.dataset.id;
  /**  sending task id to backend */
  $.ajax({
    url: "/permanentDel",
    data: { id: taskid },
    type: "POST",
    success: function (response) {

      btnDelete.parentElement.remove()



    }
  });
})


// ==================================  Profile functions ========================================== 

let profile = document.querySelector("#profile");
let view_profile = document.querySelector("#view-profile");
let getUserinfo = document.querySelector("#getUserinfo")

let User_detailsdiv = document.querySelector("#User_details");
let closeProfileDiv = document.querySelector("#close-profile-div")
// console.log(closeProfileDiv);


function OpenProfile() {
  $(".black-screen").show();
  view_profile.classList.toggle("viewProfile");
}
$(document).mouseup(function () {
  if (view_profile.classList.contains("viewProfile")) {
    $(".black-screen").hide();
    view_profile.classList.remove("viewProfile");
  }
});


getUserinfo.addEventListener("click", (e) => {
  $(".black-screen").show();
  User_detailsdiv.classList.toggle("showuserdata");
})


closeProfileDiv.addEventListener("click", () => {
  $(".black-screen").hide();
  User_detailsdiv.classList.remove("showuserdata");
})




// ===========================================profile page===========================================================


let profileView = document.querySelector(".profileId");

$(document).on("click", '.profileId', function (e) {
  let id = e.target.id;
  $.ajax({
    url: "/profileView",
    data: {
      id: id,
    },
    type: "POST",
    success: function (response) {
      let datas = JSON.parse(response)
      profilePage(datas)
      console.log(datas);
    }

  })
})

function profilePage(datas) {
  let inputdiv = document.querySelector('.inputs')

  datas.forEach(profile => {


    let Html = `<div class="data-input">

    <div> <label for="">Name</label>
      <input type="text" readOnly class="editRemove" value="${profile.username}">
    </div>
    <div> <label for="">Email</label>
      <input type="gmail" readOnly  class="editRemove" value="${profile.email_id}">
    </div>
    <div> <label for="">Password</label>
      <input type="password" readOnly  class="editRemove" value="${profile.password}">
    </div>
  </div>`

    inputdiv.innerHTML = Html;

  })


  let EditProfile = document.querySelector(".editProfile");
  let UpdateProfile = document.querySelector("#UpdateProfile");
  let readOnlyRemove = document.querySelectorAll(".editRemove");



  EditProfile.addEventListener("click", (e) => {
    EditProfile.classList.add("hidebtn")
    UpdateProfile.classList.remove("hidebtn")
    for (let i = 0; i < readOnlyRemove.length; i++) {
      readOnlyRemove[i].removeAttribute('readonly');
    }


  })

  UpdateProfile.addEventListener("click", (e) => {
    EditProfile.classList.remove("hidebtn");
    EditProfile.classList.add("showbtn");
    UpdateProfile.classList.add("hidebtn");
    for (let i = 0; i < readOnlyRemove.length; i++) {
      readOnlyRemove[i].setAttribute('readonly');
    }
  });
}

editProfilebtn = document.querySelector('.editProfile');

profileinputs = document.querySelector('.Profile-data');
// -----------
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
          $('#imagePreview').css('background-image', 'url('+e.target.result +')');
          $('#imagePreview').hide();
          $('#imagePreview').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$("#imageUpload").change(function() {
  readURL(this);
}); 
// ------- 

// =================================================================================

// search input functionality///////////////////////////////////////////

const searchInput = $("#default-search");

const content = document.querySelectorAll(".search")

$("#default-search").on("keyup", (e) => {
  let searchValue = e.target.value.toLowerCase().trim();
  content.forEach(ele => {
    if (ele.innerText.toLowerCase().indexOf(searchValue) != -1) {
      ele.style.display = "block"
    } else {
      ele.style.display = "none"
    }
  })
})

// =========================================================================

