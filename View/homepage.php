<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/homepage.css" />
  <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body class="h-full">
  <!-- this is the main container of the application -->
  <div class="main-container">
    <div class="inner-container">

      <nav class="bg-white">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="https://flowbite.com/" class="flex items-center">
            <img src="../Images/logo.png" class="h-8 mr-3 h-14" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white flex gap-3">What's Up
              <h1 class="username">
                <?php echo $_SESSION['username']; ?>...
              </h1>
            </span>
          </a>
          <div class="flex items-center md:order-2">
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
              <span class="sr-only">Open user menu</span>
              <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
              <div class="px-4 py-3">
                <span class="block text-sm text-gray-900 dark:text-white">Bonnie Green</span>
                <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">name@flowbite.com</span>
              </div>
              <ul class="py-2" aria-labelledby="user-menu-button">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                </li>
              </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
              </svg>
            </button>
          </div>
          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white ">
              <li>
                <a href="#" class="block py-2 pl-3 pr-4 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
              </li>
              <li>
                <a href="#" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-grey md:dark:hover:text-blue-500 dark:hover:text-grey md:dark:hover:bg-transparent dark:border-gray-700">About</a>
              </li>
              <li>
                <a href="#" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-grey md:dark:hover:text-blue-500 dark:hover:text-grey md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
              </li>
              <li>
                <a href="#" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-grey md:dark:hover:text-blue-500 dark:hover:text-grey md:dark:hover:bg-transparent dark:border-gray-700">Pricing</a>
              </li>
              <li>
                <a href="#" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-grey md:dark:hover:text-blue-500 dark:hover:text-grey md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- -----------Notification div -------------------- -->
      <div id="succcess">
        <div class="notification-success" style="display: flex;">
          <img src="/Images/success.gif" alt="" height="20px" width="20px" class="notifyIcon">
          <p>Succesfully Removed</p>
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
      <!-- this is the body content (suggesed todo) -->

      <div class="body-mainDiv">
        <div class="body-content">
          <h3>Let's Start With Some Good Habits</h3>
          <div class="pre-define-todo">
            <div class="contents">
              <div>
                <img src="../Images/glass.png" />
              </div>
              <p>Drink Water, Keep Healthy</p>
              <div>
                <form action="/addTask" method="post">
                  <input value="1" hidden>
                  <button class="add" name="1" type="button">ADD</button>
                </form>

              </div>
            </div>
            <div class="contents">
              <div>
                <img src="../Images/human.png" />
              </div>
              <p>Go Exercising</p>
              <div>
                <form action="/addTask" method="post">
                  <input value="1" hidden>
                  <button class="add" name="2" type="button">ADD</button>
                </form>
              </div>
            </div>
            <div class="contents">
              <div>
                <img src="../Images/ph_moon-fill.png" />
              </div>
              <p>Go To Bed Early</p>
              <div>
                <form action="/addTask" method="post">
                  <input value="1" hidden>
                  <button class="add" name="3" type="button">ADD</button>
                </form>
              </div>
            </div>
            <div class="contents">
              <div>
                <img src="../Images/ph_book-fill.png" />
              </div>
              <p>Keep Reading</p>
              <div>
                <form action="/addTask" method="post">
                  <input value="1" hidden>
                  <button class="add" name="4" type="button">ADD</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
    <!-- this section is our single input form ----------- (it is separated from the inner container div for background blur)-->
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
            <input name="user_id" class="user_id" value="<?= $_SESSION['userid'] ?>" required type="hidden">

            <input type="radio" name="task_type" id="option-1" value="1" class="category" checked>
            <input type="radio" name="task_type" id="option-2" value="2" class="category">

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
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
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
            <input type="radio" class="urgent-priority-btn data" required id="1" value="1" name="urgent">
            <label for="css">No</label>
            <input type="radio" class="urgent-priority-btn data" id="2" required value="0" name="urgent">
          </div>
          <div class="ImportantDiv">
            <label for="project">Important</label><br>
            <label for="css">Yes</label>
            <input type="radio" class="important-priority-btn datas" required id="1" value="1" name="important">
            <label for="css">No</label>
            <input type="radio" class="important-priority-btn datas" id="2" required value="0" name="important">
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
  <script src="../JS/homepage.js"></script>
</body>

</html>