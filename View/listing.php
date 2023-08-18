<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Listing page</title>
  <link rel="stylesheet" href="../CSS/listing.css" />
  <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>
  <!-- this is the main container of the application -->
  <div class="main-container">
    <div class="inner-container">
      <header class="header">
        <div>
          <div class="left-section">
            <img src="../Images/logo.png">
            <span>What's Up
              <h1 class="username">
                <?php echo $_SESSION['username']; ?>...
              </h1>
            </span>
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
                <input type="search" id="default-search" class="block rounded-lg search-box" placeholder="Search" required>
              </div>
            </div>
            <!-- ---- -->
            <ul class="icons">
              <li class="right-icon">
                <i class="fa-regular fa-bell notification" onclick="openNotofy()"></i>
              </li>
              <li class="right-icon">
                <i class="fa-solid fa-pen-to-square Habits-icon"></i>
                <!-- <img src="../Icons/line-icon-for-habits-vector-removebg-preview.png" style="height: 30px;" class="Habits-icon"> -->
              </li>
              <li class="right-icon">
                <i class="fa-regular fa-moon theme-btn"></i>
              </li>
              <li class="right-icon">
                <a href="/logout">
                  <i class="fa-solid fa-arrow-right-from-bracket logout"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div>

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
                <div class="input-type-btn">
                  <img src="../Icons/single.png" class="type-btn" id="1" ><span class="typeName">Single</span>
                </div>
                <div class="input-type-btn">
                <img src="../Icons/multi.png" class="type-btn" id="2" ><span class="typeName">Multiple</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- -----------Notification div -------------------- -->
      <div id="succcess">
        <div class="notification-success" style="display: flex;">
          <img src="/Images/success.gif" alt="" height="20px" width="20px" class="notifyIcon">
          <p>Succesfully Added</p>
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
      <!-- this below section is for add button -->

      <div class="taskDetailBox">
        <main class="page-content">
          <div class="card-div">
            <h2 class="title">DO FIRST</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content">
                  <?php foreach ($fetchAllDataDo as $key => $do) : ?>
                    <?php if ($key < 4) : ?>
                      <div class="flex items-center gap-2	">
                        <i class="fas fa-dot-circle" style="color: #99CC11; font-size: 20px; opacity: 90%;"></i>
                        <div class="nameDateDiv">
                          <p class="copy text-start	w-60"> <?php echo $do->task_name; ?></p>
                          <p class="date text-right	"><?php echo $do->dates; ?></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
                <div class="viewBtnDiv1">
                  <!-- view task button injected here -->
                  <div class="showMoreBtn">
                    <i class="fa-solid fa-circle-chevron-down" style="color: #5fb32e; font-size: 24px; " id="getid" name="matrixId" data-id="<?php echo "1" ?>"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-div">
            <h2 class="title">DEFER</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content">
                  <?php foreach ($fetchAllDataDefer as $key => $defer[0]) : ?>
                    <?php if ($key < 4) : ?>
                      <div class="flex items-center gap-2	">
                        <i class="fas fa-dot-circle" style="color: #4588EE; font-size: 20px; opacity: 90%;"></i>
                        <div class="nameDateDiv">
                          <p class="copy text-start	w-60"><?php echo $defer[0]->task_name ?></p>
                          <p class="date text-right	"><?php echo $defer[0]->dates; ?></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
                <div class="viewBtnDiv2">
                  <!-- <form action="/viewAllTask" method="post"> -->
                  <div class="showMoreBtn">
                    <i class="fa-solid fa-circle-chevron-down" style="color: #5fb32e; font-size: 24px;" id="getid" name="matrixId" data-id="<?php echo "2" ?>"></i>
                  </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>
          </div>
          <div class="card-div" >
            <h2 class="title">DELEGATE</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content">
                  <?php foreach ($fetchAllDataDelegate as $key => $Delegate) : ?>
                    <?php if ($key < 4) : ?>
                      <div class="flex items-center gap-2	">
                        <i class="fas fa-dot-circle" style="color: #F7A821; font-size: 20px; opacity: 90%;"></i>
                        <div class="nameDateDiv">
                          <p class="copy text-start	w-60"><?php echo $Delegate->task_name ?></p>
                          <p class="date text-right	"><?php echo $Delegate->dates; ?></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
                <div class="viewBtnDiv3">
                  <!-- <form action="/viewAllTask" method="post"> -->
                  <div class="showMoreBtn">
                    <i class="fa-solid fa-circle-chevron-down" style="color: #5fb32e; font-size: 24px;" id="getid" name="matrixId" data-id="<?php echo "3" ?>"> </i>
                  </div>
                  <!-- </form> -->
                </div>
              </div>
            </div>
          </div>
          <div class="card-div">
            <h2 class="title">DELETE</h2>
            <div class="main-card">
              <div class="card-color"></div>
              <div class="card">
                <div class="content">
                  <?php foreach ($fetchAllDataDelete as $key => $delete) : ?>
                    <?php if ($key < 4) : ?>
                      <div class="flex items-center gap-2	taskDetailcont">
                        <i class="fas fa-dot-circle" style="color: #CE4317; font-size: 20px; opacity: 90%;"></i>
                        <div class="nameDateDiv">
                          <p class="copy text-start	w-60"><?php echo $delete->task_name ?></p>
                          <p class="date text-right	"><?php echo $delete->dates; ?></p>
                        </div>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
                <div class="viewBtnDiv4">
                  <!-- <button class="showMoreBtn" id="getid" name="matrixId" data-id="<?php echo "4" ?>">View Task..</button> -->
                  <div class="showMoreBtn">
                    <i class="fa-solid fa-circle-chevron-down" style="color: #5fb32e; font-size: 24px; " id="getid" name="matrixId" data-id="<?php echo "4" ?>"> </i>
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
                  <div class="px-4 py-3 sm:flex justify-center items-center px-3">
                    <div class="taskListDiv text-base leading-6 text-gray-900 no-underline " id="modal-title">
                      <div class="carts tasks-lists bg-zinc-200 my-1	h-14	py-3 px-1.5	cursor-pointer flex gap-8 pb-5 rounded">
                      </div>
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

    <div class="Habits-div">
      <form action="/addTask" method="post">
        <div class="body-mainDiv">
          <div class="body-content">
            <div class="close-btn close-habit-div" id="close-habit-div">
              <div>
                <span>X</span>
              </div>
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
            <label for="project">Urgent</label>
            <br>
            <label for="css">Yes</label>
            <input type="radio" class="urgent-priority-btn " required id="1" value="1" name="urgent">
            <label for="css">No</label>
            <input type="radio" class="urgent-priority-btn " required id="1" value="0" name="urgent">
          </div>
          <div class="ImportantDiv">
            <label for="project">Important</label><br>
            <label for="css">Yes</label>
            <input type="radio" class="important-priority-btn datas" id="1" required value="1" name="important">
            <label for="css">No</label>
            <input type="radio" class="important-priority-btn datas" required id="1" value="0" name="important">
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