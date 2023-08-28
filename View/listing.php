<?php
// var_dump($tasks); 
?>
<!DOCTYPE html class="h-full">
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Listing page</title>
  <link rel="stylesheet" href="../CSS/listing.css" /> <!--stylesheet link here -->
  <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script> <!--fontawesome link here-->
  <script src="https://cdn.tailwindcss.com"></script> <!--Tailwind link here-->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script> <!--Jquery link here-->
</head>

<body class="h-full">
  <!-- this is the main container of the application -->
  <div class="main-container">
    <div class="inner-container">
      <nav class="header">
        <div class="left-section">
          <img src="../Images/logo.png">
          <h1>What's Up
            <span class="username">
              <?php echo $_SESSION['username']; ?>...
            </span>
          </h1>
        </div>
        <!-- this is our right side contents -->
        <div class="right-section">
          <!-- search input code -->
          <div>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 search-icon " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
              </div>
              <input type="search" id="default-search" class="block rounded-lg search-box" placeholder="Search" title="Find your tasks here" required>
            </div>
          </div>
          <!-- ---- -->
          <ul class="icons">
            <li class="right-icon">
              <i class="fa-regular fa-bell notification" title="Notification" onclick="openNotofy()"></i>
            </li>
            <li class="right-icon">
              <!-- <i class="fa-solid fa-pen-to-square Habits-icon" title="Daily Habits"></i> -->
              <i class="fa-solid fa-person-walking-arrow-loop-left Habits-icon"></i>
            </li>
            <li class="right-icon">
              <i class="fa-regular fa-moon theme-btn" title="Dark Mode"></i>

            </li>
            <li class="right-icon">
              <!-- <a href="/logout">
                <i class="fa-solid fa-arrow-right-from-bracket logout" title="Log out"></i>
              </a> -->
              <!-- <div class="User_profile" id="profile" onclick="OpenProfile()" ><img src="/Images/profile1-removebg-preview.png" alt=""></div> -->
              <i class="fa-regular fa-user" title="Profile" onclick="OpenProfile()"></i>
            </li>
          </ul>
        </div>
      </nav>
      <div class="settings" id="view-profile">

        <div class="Change-info" id="getUserinfo">
          <p><i class="fa-regular fa-user"></i></p>
          <h1 id="<?php echo  $_SESSION['userid'];  ?>" class="profileId">Profile</h1>
        </div>
        <a href="/logout">
          <div class="Change-info">

            <p><i class="fa-solid fa-arrow-right-from-bracket logout" title="Log out"></i></i></p>
            <h1>Log out</h1>
          </div>
        </a>
      </div>

      <div class="mt-24 body-contaienr">
        <div class="switchDiv">
          <div>
            <button name="category_id" class="font-menu selectedCatagory category_id" id="1">PROFESSIONAL</button>
          </div>
          <div>
            <button class="font-menu px-4	category_id" name="category_id" id="2">PERSONAL</button>
          </div>
        </div>
        <div class="add-todo-btn-section">
          <div class="add-todo-inner-section">
            <div class="add-btn">
              <i class="fa-sharp fa-light fa-plus fa-xl"></i>
            </div>
            <div class="input-type">
              <div class="input-type-btn" id="1">
                <img src="../Icons/single.png" class="type-btn"><span class="typeName">Single</span>
              </div>
              <div class="input-type-btn" id="2">
                <img src="../Icons/multi.png" class="type-btn"><span class="typeName">Multiple</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- -----------Notification div -------------------- -->
      <div id="succcess">
        <div class="notification-success" style="display: flex;">
          <img src="/Images/success.gif" alt="" height="20px" width="20px" class="notifyIcon">
          <p>Succesfully deleted</p>
        </div>
      </div>
      <!-- -----------habits div -------------------- -->
      <div class="Habitsdiv">
        <div class="notification-title">
          <h4>Notification </h4>
          <div>
            <button class="cancelicon" id="close-notificationList">X</button>
          </div>
        </div>
        <hr>
        <form method="post" action="/deleteAddedTask">
          <?php foreach ($tasks as $key => $value) : ?>
            <div class="Tasklist">
              <p><?php echo $value['name'] ?></p>
              <button class="removetask" name="<?php echo $value['id'] ?>" type="button">Remove</button>
            </div>
          <?php endforeach; ?>
        </form>
      </div>
      <div class="taskDetailBox" id="overAll">
        <main class="page-content">
          <div class="card-div">
            <h2 class="title">Do it now</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content1 search">
                  <!-- fetched tasks injected here -->
                </div>
                <div class="viewBtnDiv1">
                  <div class="showMoreBtn" id="1">
                    <i class="fa-solid fa-circle-chevron-down" title="View All" style="color: #5fb32e; font-size: 24px; " id="getid" name="matrixId" data-id="<?php echo "1" ?>"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-div">
            <h2 class="title">Schedule a time to Do it</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content2 search">
                  <!-- fetched tasks injected here -->
                </div>
                <div class="viewBtnDiv2">
                  <div class="showMoreBtn" id="2">
                    <i class="fa-solid fa-circle-chevron-down" title="View All" style="color: #5fb32e; font-size: 24px;" id="getid" name="matrixId" data-id="<?php echo "2" ?>"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-div">
            <h2 class="title">Who can Do it for you</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content3 search">
                  <!-- fetched tasks injected here -->
                </div>
                <div class="viewBtnDiv3">
                  <div class="showMoreBtn" id="3">
                    <i class="fa-solid fa-circle-chevron-down" title="View All" style="color: #5fb32e; font-size: 24px;" id="getid" name="matrixId" data-id="<?php echo "3" ?>"> </i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-div">
            <h2 class="title">Eleminate it</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content4 search">
                  <!-- fetched tasks injected here -->
                </div>
                <div class="viewBtnDiv4">
                  <div class="showMoreBtn" id="4">
                    <i class="fa-solid fa-circle-chevron-down" title="View All" style="color: #5fb32e; font-size: 24px; " id="getid" name="matrixId" data-id="<?php echo "4" ?>"> </i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- pop up window code here -->
      <div class="testing-window" id="popUpWindow">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div class="fixed inset-0 bg-gray-400 bg-opacity-60 transition-opacity"></div>
          <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <div class="relative  overflow-hidden rounded-lg bg-white text-left shadow-xl sm:my-8 w-11/12 m-auto">
                <div class=" px-4 py-3 sm:flex justify-between items-center px-3	">
                  <h3 class="text-base font-semibold leading-6 text-gray-900 text-xl" id="modal-title">DO FIRST</h3>
                  <div class="flex gap-32 ">
                    <div class="popUpHeader">

                    </div>
                    <button type="submit" class="rounded-md bg-white h-8 w-8	text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 text-red-600" id='popUpCloseBtn'>X</button>
                  </div>
                </div>
                <hr>
                <div class="task-heading-2  sm:flex justify-between task-box-heading ">
                  <span class="text-base leading-6 text-gray-900 no-underline " id="modal-title">TASK NAME</span>
                  <span class="text-base leading-6 text-gray-900 no-underline " id="modal-title">DUE DATE&TIME</span>
                  <span class="text-base leading-6 text-gray-900 no-underline " id="modal-title">PROGRESS</span>
                </div>
                <hr>
                <div class="bg-white">
                  <div class="px-4 py-3 sm:flex justify-center items-center px-3 list-parent-div">
                    <div class="taskListDiv text-base leading-6 text-gray-900 no-underline " id="modal-title">
                      <!-- fetched tasks and other functcartsionality buttons injected here -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- black screen -->
    <div class="black-screen"></div>

    <div class="editForm">
      <!-- edit form injected here -->
    </div>

    <div class="Habits-div">
      <!-- <div class="fixed inset-0 bg-gray-400 bg-opacity-60 transition-opacity"></div> -->
      <form action="/addTask" method="post">
        <div class="body-mainDiv">
          <div class="body-content">
            <div class="close-btn close-habit-div" id="close-habit-div">
              <form action="/list" method="post">
                <div>
                  <span>X</span>
                </div>
              </form>

            </div>
            <h3>Let's Start With Some Good Habits</h3>
            <div class="pre-define-todo">
              <div class="contents">
                <div>
                  <img src="../Images/glass.png" />
                </div>
                <p>Drink Water, Keep Healthy</p>
                <div>
                  <button class="add" name="1" type="button">ADD</button>
                </div>
              </div>
              <div class="contents">
                <div>
                  <img src="../Images/human.png" />
                </div>
                <p>Go Exercising</p>
                <div>
                  <button class="add" name="2" type="button">ADD</button>
                </div>
              </div>
              <div class="contents">
                <div>
                  <img src="../Images/ph_moon-fill.png" />
                </div>
                <p>Go To Bed Early</p>
                <div>
                  <button class="add" name="3" type="button">ADD</button>
                </div>
              </div>
              <div class="contents">
                <div>
                  <img src="../Images/ph_book-fill.png" />
                </div>
                <p>Keep Reading</p>
                <div>
                  <button class="add" name="4" type="button">ADD</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <div class="Profile-container">
      <div class="profile-div" id="User_details">
        <div>
          <div class="close-btn close-habit-div" id="close-profile-div">
            <form action="/list" method="post">
              <div>
                <span>X</span>
              </div>
            </form>
          </div>
          <h1>My Profile</h1>
          <div class="Profile-data">
            <div class="Profile-img">
              <div class="image"> <img src="/Images/profile1-removebg-preview.png" alt="">
              </div>
              <button>Change profile</button>
              <button>Remove profile</button>
            </div>
            <div class="data-input">
              <div> <label for="">Name</label>
                <input type="text" value="prasanth">
              </div>
              <div> <label for="">Email</label>
                <input type="gmail" value="prasanthndckap@gmail.com">
                <p>Change Email</p>
              </div>
              <div> <label for="">Password</label>
                <input type="password" value="prasanthndckap@gmail.com">
                <p>Change Password</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="single-input-form" id="single-form">
      <form action="/store" method="post">
        <div class="close-btn" id="singleCloseBtn">
          <div>
            <span>X</span>
          </div>
        </div>
        <p>Pick Category</p>
        <div class="Task_Type">
          <div class="wrapper">
            <input name="user_id" class="user_id" value="<?= $_SESSION['userid'] ?>" type="hidden">

            <input type="radio" name="task_type" id="option-1" value="1" required class=".typeBtn" checked>
            <input type="radio" name="task_type" id="option-2" value="2" required class=".typeBtn">

            <label for="option-1" class="option option-1">
              <div class="dot"></div>
              <span>Professional</span>
            </label>

            <label for="option-2" class="option option-2">
              <div class="dot"></div>
              <span>Personal</span>
            </label>
          </div>
        </div>
        <div>
          <div class="inputdiv">
            <div>
              <label for="grid-first-name">
                What is on your Task
              </label>
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-black focus:bg-white" id="grid-first-name" type="text" required placeholder="projectName" name="Task_name">
            </div>
            <div>
              <label for="project" placeholder="Get Date/Time">What on your due?</label>
              <input type="datetime-local" placeholder="Get Date/Time" required class="dateTime" value="" name="dateTime" />
            </div>
          </div>
        </div>
        <div class="matix">
          <div class="urgentDiv">
            <label for="project" style="padding-left: 30px;">Urgent</label>
            <br>
            <div>
              <label for="css">Yes</label>
              <input type="radio" class="urgent-priority-btn" value="1" name="urgent" required>
              <label for="css">No</label>
              <input type="radio" class="urgent-priority-btn" value="0" name="urgent" required>
            </div>
          </div>
          <div class="ImportantDiv">
            <label for="project" style="padding-left: 15px;">Important</label>
            <br>
            <div>
              <label for="css">Yes</label>
              <input type="radio" class="important-priority-btn datas" value="1" name="important" required>
              <label for="css">No</label>
              <input type="radio" class="important-priority-btn datas" value="0" name="important" required>
            </div>
          </div>
        </div>
        <button type="submit" onclick="store()" class="submit-btn">Submit</button>
      </form>
    </div>
    <!-- this is multiple-input-form  -->
    <div class="multiple-input-form" id="multi-form">`
      <form action="" method="post" class="multiple-form">
        <div class="forms-inner-div">
          <!-- multiple forms injected here  -->
        </div>
        <div class="addOneMoreTodo">
          <span class="addDivBtn" onclick="AddOneMoreForm()">+</span>
        </div>
        <div class="multiForm-btn-div">
          <!-- <button type="button" class="cancel-btn">Cancel</button> -->
          <button type="button" class="submit-btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <script src="../JS/listing.js"></script>
</body>

</html>