let form = document.querySelector(".multiple-form")
// ---------------below code for form open a form by clicking the type button(sinle btn and multiple btn)------------------
let inputBtn = document.querySelectorAll(".input-type-btn");
let innerContainer = document.querySelector(".inner-container");
let cancelBtn = document.querySelector(".cancel-btn");
let empty = document.querySelector(".forms-inner-div")
// below selectore for task type btn (single or multiple)
let typeBtn = document.querySelectorAll(".type-btn")
let typeName = document.querySelectorAll(".typeName")

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
    $(".black-screen").hide();
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
      <textarea id=${multiformCnt} placeholder="Enter your task" ></textarea> 
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

  buttonActions()
  closeBtnActions()

}

// --------- classList add and remove function------------
function buttonActions(params) {
  let taskType = document.querySelectorAll(".typeBtn");
  let urgentBtn = document.querySelectorAll(".urgent-priority-btn");
  let importantBtn = document.querySelectorAll(".important-priority-btn");

  for (let i = 0; i < taskType.length; i++) {
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

  let mainDivCloseBtn = document.querySelectorAll(".main-div-closeBtn");
  let multipleFormsDiv = document.querySelectorAll(".multiple-forms-div");

  for (let i = 0; i < mainDivCloseBtn.length; i++) {
    mainDivCloseBtn[i].addEventListener("click", () => {
      cnt--;
      if (cnt == 0) {
        innerContainer.classList.remove("active");
        $(".black-screen").hide();
        $("#multi-form").hide()
        multipleFormsDiv[i].remove();
      }
      else {
        multipleFormsDiv[i].remove();
      }
    })

  }
}



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


// ===============================This below function is about the after add the habit change it to added ===

$(function () {
  $('.add').each(function () {
    $(this).click(function (e) {
      var addText = $(e.target).text()
      var addedValue = $(e.target).attr("name")
      var valuee = $(e.target).siblings().attr("value")
      console.log(valuee)
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
          console.log(response)
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
      console.log(paren)
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
          }, 1000)

          paren.remove()

        }

      });

    });

  });

});

// =======================fetching user added habits using jquery and ajax===========================

// $(document).ready(function () {

//   var notification = $("#notification");
//   console.log(notification);
//   notification.click(function () {
//     var id = $("#notification").attr("value");
//     console.log(id)
//     $.ajax({
//       url: "/addedTaskDetails",
//       data: {id: id},
//       type: "POST",
//       success: function (response) {
//         console.log(response)
//       }
//     });
//   })

//   })

// var succcess = $("#succcess")


// =================== profile information div
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