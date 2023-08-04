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
    <div class="Habitsdiv">
      <div class="notification-title">
        <h4>Notification </h4>
        <button class="cancelicon" id="close-notificationList">X</button>
      </div>
      <hr>
      <?php foreach ($tasks as $key => $value) : ?>
        <div class="Tasklist">
          <p><?php echo $value['name'] ?></p>
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
          <h1>What's Up<span class="username"><?php echo $_SESSION['username']; ?></span></h1>
        </div>
        <!-- <?php echo $_SESSION['name']; ?> -->
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
      <!--      <form method="post" action="/addedTaskDetails">-->
      <!--                <button name="addedTask">AddedTask</button>-->
      <!--            </form>-->
      <!-- this is the body content (suggesed todo) -->
      <form action="/addTask" method="post">
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
                  <button class="add" name="1">ADD</button>
                </div>
              </div>
              <div class="contents">
                <div>
                  <img src="../Images/human.png" />
                </div>
                <p>Go Exercising</p>
                <div>
                  <button class="add" name="2">ADD</button>
                </div>
              </div>
              <div class="contents">
                <div>
                  <img src="../Images/ph_moon-fill.png" />
                </div>
                <p>Go To Bed Early</p>
                <div>
                  <button class="add" name="3">ADD</button>
                </div>
              </div>
              <div class="contents">
                <div>
                  <img src="../Images/ph_book-fill.png" />
                </div>
                <p>Keep Reading</p>
                <div>
                  <button class="add" name="4">ADD</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    <!-- this section is our single input form ----------- (it is separated from the inner container div for background blur)-->
    <div class="single-input-form">
      <!-- <form action="/store" method="post"> -->
      <div class="close-btn">
        <div>
          <span>X</span>
        </div>
      </div>
      <p>Pick Category</p>
      <div class="Task_Type">
        <input name="user_id" class="user_id" value="<?= $_SESSION['userid'] ?>" type="hidden">
        <input type="button" class="typeBtn firstFrom category" name="task_type" value="Professional" id=1 />
        <input type="button" class="typeBtn firstFrom category" name="task_type" value="Personal" id="2" />
      </div>
      <div>
        <div class="inputdiv">
          <div>
            <label for="project">What is on your task?</label>
            <input type="text" placeholder="E.g Make Task " name="Task_name" class="projectName" />
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
  </div>
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