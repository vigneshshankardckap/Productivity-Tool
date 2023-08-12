<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/listing.css" />
  <link rel="stylesheet" href="">
  <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

</head>

<body>
  <!-- this is the main container of the application -->
  <div class="container">
    <div class="inner-container">
      <header class="header">
        <div>
          <div class="left-section">
            <img src="../Images/logo.png">
            <h1>What's Up<span class="username">
                <?php echo $_SESSION['username']; ?>
              </span></h1>
          </div>
          <!-- this is our right side contents -->
          <div class="right-section">
            <div class="search-icon-div">
              <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input placeholder="search" type="search" class="input-box" />
            <ul class="icons">
              <li class="right-icon">
                <i class="fa-regular fa-bell notification" onclick="openNotofy()"></i>
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
            <form action="\list" method="post">
              <button value="1" name="category_id" class="font-medium">PROFESSIONAL</button>
              <button value="2" class="font-medium" name="category_id">Personl</button>
            </form>

          </div>
          <div class="add-todo-btn-section">
            <div class="add-todo-inner-section">
              <h2 class="add-btn">ADD TASK</h2>
              <div class="input-type">
                <div class="input-type-btn">
                  <span>Single</span>
                </div>
                <div class="input-type-btn">
                  <span>Multiple</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
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
          <div class="main-card">
            <div class="card-color"></div>
            <div class="card">
              <div class="content">
                <h2 class="title">DO FIRST</h2>
                <?php foreach ($fetchAllDataDo as $key => $do) : ?>
                  <?php if ($key < 4) : ?>
                    <p class="copy"><?php echo $key + 1; ?> <?php echo $do->task_name; ?><span class="date"><?php echo $do->dates; ?></span></p>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <div class="viewBtnDiv1">
                <!-- view task button injected here -->
                <button class="showMoreBtn" id="getid" name="matrixId" data-id="<?php echo "2" ?>">View Task..</button>
              
              </div>
            </div>
          </div>
          <div class="main-card">
            <div class="card-color"></div>
            <div class="card">
              <div class="content">
                <h2 class="title">DEFER</h2>
                <?php foreach ($fetchAllDataDefer as $key => $defer[0]) : ?>
                  <?php if ($key < 4) : ?>
                    <p class="copy"><?php echo $key + 1; ?> <?php echo $defer[0]->task_name ?><span class="date"><?php echo $defer[0]->dates; ?></span></p>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <div class="viewBtnDiv2"> 

                <!-- <form action="/viewAllTask" method="post"> -->
                <button class="showMoreBtn" id="getid" name="matrixId" data-id="<?php echo "2" ?>">View Task..</button>
                <!-- </form> -->
              </div>
            </div>
          </div>
          <div class="main-card">
            <div class="card-color"></div>
            <div class="card">
              <div class="content">
                <h2 class="title">DELEGATE</h2>
                <?php foreach ($fetchAllDataDelegate as $key => $Delegate) : ?>
                  <?php if ($key < 4) : ?>
                    <p class="copy"><?php echo $key + 1; ?> <?php echo $Delegate->task_name ?><span class="date"><?php echo $Delegate->dates; ?></span></p>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <div class="viewBtnDiv3">
                <!-- <form action="/viewAllTask" method="post"> -->
                <button class="showMoreBtn" id="getid" name="matrixId" data-id="<?php echo "3" ?> ?>">View Task..</button>
                <!-- </form> -->
              </div>
            </div>
          </div>
          <div class="main-card">
            <div class="card-color"></div>
            <div class="card">
              <div class="content">
                <h2 class="title">DELETE</h2>
                <?php foreach ($fetchAllDataDelete as $key => $delete) : ?>
                  <?php if ($key < 4) : ?>
                    <p class="copy"><?php echo $key + 1; ?> <?php echo $delete->task_name ?><span class="date"><?php echo $delete->dates; ?></span></p>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
              <div class="viewBtnDiv4">
                <!-- <form action="/viewAllTask" method="post"> -->
                <button class="showMoreBtn" id="getid" name="matrixId" data-id="<?php echo "4" ?>">View Task..</button>
                <!-- </form> -->
              </div>
            </div>
          </div>
        </main>
      </div>
      <!-- pop up window code here -->
      <div class="testing-window invisible">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div class="fixed inset-0 bg-gray-400 bg-opacity-60 transition-opacity"></div>
          <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <div class="relative  overflow-hidden rounded-lg bg-white text-left shadow-xl sm:my-8 w-11/12 m-auto">
                <div class=" px-4 py-3 sm:flex justify-between items-center px-3	">
                  <h3 class="text-base font-semibold leading-6 text-gray-900 text-xl" id="modal-title">DO FIRST</h3>
                  <div class="flex gap-32">
                    <button type="submit" class="completedBtn focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">COMPLETED TASK 1</button>
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

    <div class="single-input-form">
      <form action="/store" method="post">
        <div class="close-btn">
          <div>
            <span>X</span>
          </div>
        </div>
        <p>Pick Category</p>
        <div class="Task_Type">
          <div class="wrapper">
            <input name="user_id" class="user_id" value="<?= $_SESSION['userid'] ?>" type="hidden">

            <input type="radio" name="task_type" id="option-1" value="1" class=".typeBtn" checked>
            <input type="radio" name="task_type" id="option-2" value="2" class=".typeBtn">

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
              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-black focus:bg-white" id="grid-first-name" type="text" placeholder="projectName" name="Task_name">
            </div>
            <div>
              <label for="project" placeholder="Get Date/Time">What on your due?</label>
              <input type="datetime-local" placeholder="Get Date/Time" class="dateTime" value="" name="dateTime" />
            </div>
          </div>
        </div>
        <div class="matix">
          <div class="urgentDiv">
            <label for="project">Urgent</label>
            <br>
            <label for="css">Yes</label>
            <input type="radio" class="urgent-priority-btn " id="1" value="1" name="urgent">
            <label for="css">No</label>
            <input type="radio" class="urgent-priority-btn " id="1" value="0" name="urgent">
          </div>
          <div class="ImportantDiv">
            <label for="project">Important</label><br>
            <label for="css">Yes</label>
            <input type="radio" class="important-priority-btn datas" id="1" value="1" name="important">
            <label for="css">No</label>
            <input type="radio" class="important-priority-btn datas" id="1" value="0" name="important">
          </div>
        </div>
        <button type="submit" onclick="store()" class="submit-btn">Submit</button>
      </form>
    </div>
    <!-- this is multiple-input-form  -->
    <div class="multiple-input-form">`
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

</div>


</html>