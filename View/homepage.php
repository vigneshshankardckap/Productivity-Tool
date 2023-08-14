<?php
//var_dump($tasks);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../CSS/homepage.css" />
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/52d2b40c3f.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>
  <!-- this is the main container of the application -->
  <div class="container">
    <div class="inner-container">
      <header class="header">
        <div class="left-section">
          <img src="../Images/logo.png">
          <span>What's Up
            <h1 class="username">
              <?php echo $_SESSION['username']; ?>...
            </h1>
          </span>
        </div>

        <div class="right-section">
          <div class="search-icon-div">
            <i class="fa-solid fa-magnifying-glass"></i>
          </div>
          <input placeholder="search" type="search" class="input-box" />
          <ul class="icons">
            <!-- <form action="/addedTaskDetails" method="post"> -->
            <li class="right-icon" onclick="openNotofy()" id="notification" value="<?php echo $_SESSION['userid'] ?>">
              <i class="fa-regular fa-bell notification"></i>
            </li>
            <!-- </form> -->
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
      </header>
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
      <!-- <form action="/addTask" method="post"> -->
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