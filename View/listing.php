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
  <style>
    .fetchdata {
      margin-left: 20px;
      padding: 10px;
      color: black;
    }

    li>span {
      margin-left: 10px;
    }

    .contents {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 70px;
    }
  </style>
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
                <!-- <?php echo $_SESSION['username']; ?> -->
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
                <i class="fa-regular fa-moon darkmode"></i>
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
          <div class="Task_Type">
            <input type="button" class="typeBtn firstFrom category" name="task_type" value="Professional" id=1 />
            <input type="button" class="typeBtn firstFrom category" name="task_type" value="Personal" id="2" />
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
          <button class="cancelicon" id="close-notificationList">X</button>
        </div>
        <hr>
        <?php foreach ($tasks as $key => $value) : ?>
          <div class="Tasklist">
            <p>
              <?php echo $value['name'] ?>
            </p>
            <form method="post" action="/deleteAddedTask">
              <button class="removetask" name="<?php echo $value['id'] ?>">Remove</button>
            </form>
          </div>
        <?php endforeach; ?>
      </div>
      <!-- this below section is for add button -->

      <div class="taskDetailBox">
        <main class="page-content">
          <div class="card">
            <div class="content">
              <h2 class="title">DO FIRST</h2>
              <?php foreach ($fetchAllDataDo as $key => $do) : ?>
                <div class="todoList">
                  <p class="copy"> <?php echo $do->task_name; ?></p>
                  <p class="copy"> <?php echo $do->task_name; ?></p>
                  <p class="copy"> <?php echo $do->task_name; ?></p>
                  <p class="copy"> <?php echo $do->task_name; ?></p>
                </div>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">Show More..</button>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <h2 class="title">DEFER</h2>
              <?php foreach ($fetchAllDataDefer as $defer) : ?>
                <p class="copy"> <?php echo $defer->task_name ?></p>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">Show More..</button>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <h2 class="title">DELEGATE</h2>
              <?php foreach ($fetchAllDataDelegate as $Delegate) : ?>
                <p class="copy"> <?php echo $Delegate->task_name ?></p>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">Show More..</button>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <h2 class="title">DELETE</h2>
              <?php foreach ($fetchAllDataDelete as $delete) : ?>
                <p class="copy"> <?php echo $delete->dates ?></p>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">Show More..</button>
            </div>
          </div>
        </main>
      </div>
      <section id="taskDetailView">

      </section>
      <!-- pop up window code here -->
      <div class="testing-window invisible">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
          <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <div class="relative  overflow-hidden rounded-lg bg-white text-left shadow-xl sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                  <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" id='popUpCloseBtn'>X<button>
                </div>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                      <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">DO FIRST</h3>
                      <div class="mt-2">
                        <?php foreach ($fetchAllDataDo as $key => $do) : ?>
                          <p class="text-sm text-gray-500"><?php echo $do->task_name; ?></p>
                          <p class="text-sm text-gray-500"><?php echo $do->task_name; ?></p>
                          <p class="text-sm text-gray-500"><?php echo $do->task_name; ?></p>
                          <p class="text-sm text-gray-500"><?php echo $do->task_name; ?></p>
                          <p class="text-sm text-gray-500"><?php echo $do->task_name; ?></p>
                          <p class="text-sm text-gray-500"><?php echo $do->task_name; ?></p>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
=======
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/listing.css" />
    <link rel="stylesheet" href="">
    <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
</head>

<body>

<!-- this is the main container of the application -->
<div class="container">
    <div class="Habitsdiv">
        <div class="notification-title">
            <h4>Notification </h4>
            <button class="cancelicon" id="close-notificationList">X</button>
        </div>
        <hr>
        <?php foreach ($tasks as $key => $value) :?>
            <div class="Tasklist">
                <p>
                    <?php echo $value['name'] ?>
                </p>
                <form method="post" action="/deleteAddedTask">
                    <button class="removetask" name="<?php echo $value['id'] ?>">Remove</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="inner-container">
        <header class="header">
            <div class="left-section">
                <img src="../Images/logo.png">
                <h1>What's Up<span class="username">
              <!-- <?php echo $_SESSION['username']; ?> -->
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
                        <i class="fa-regular fa-moon darkmode"></i>
                    </li>
                    <li class="right-icon">
                        <a href="/logout">
                            <i class="fa-solid fa-arrow-right-from-bracket logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </header>

        <!-- this below section is for add button -->
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
        <div class="taskDetailBox">
            <div class="do">
                <p class="heading">Do</p>
                <div class="doBox">
                    <div class="welcome">
                        <li>welcome</li>
                    </div>
                    <div class="time">
                        <li>15/7</li>
                        <li>12.00 PM</li>
                    </div>
                </div>
            </div>
            <div class="defer">
                <p class="heading">Defer</p>
                <div class="doBox"></div>
            </div>
            <div class="deleate">
                <p class="heading">Delegate</p>
                <div class="doBox"></div>
            </div>
            <div class="delete">
                <p class="heading">Delete</p>
                <div class="doBox"></div>
        <!-- --------------------------- -->
      </div>

      <!-- this section is our single input form ----------- (it is separated from the inner container div for background blur)-->
    <!-- this is the single form section -->
    <div class="single-input-form">
      <!-- <form action="/store" method="post"> -->
      <div class="close-btn">
        <div>
          <span>X</span>
        </div>
      </div>
      <p>Pick Category</p>
      <div class="Task_Type">
        <input type="button" class="typeBtn firstFrom category" name="task_type" value="Professional" id=1 />
        <input type="button" class="typeBtn firstFrom category" name="task_type" value="Personal" id="2" />
      </div>
      <div>
        <div class="inputdiv">
          <div>
            <label for="project">What is on your task?</label>
            <input type="text" placeholder="E.g Make task " name="Task_name" class="projectName" />
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
          <br />
          <input type="button" name="urgent-priority-btn" value="1" id="firstFrom" class="urgent-priority-btn data" />
          <input type="button" name="urgent-priority-btn" value="0" id="firstFrom" class="urgent-priority-btn data" />
        </div>
        <div class="ImportantDiv">
          <label for="">Important</label>
          <br />
          <input type="button" name="important-priority-btn" value="1" id="firstFrom" class="important-priority-btn datas" />
          <input type="button" name="important-priority-btn" value="0" id="firstFrom" class="important-priority-btn datas" />
        </div>
      </div>
      <button type="submit" onclick="store()" class="submit-btn">Submit</button>
      </form>
    </div>
    <!-- ------------------------------------------ -->

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

</html>