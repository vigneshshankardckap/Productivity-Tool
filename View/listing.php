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
            <input value="Professional" />
            <input type="button" value="Personal" />
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
      <?php foreach ($tasks as $key => $value) : ?>
        <div class="Tasklist">
          <p><?php echo $value['name'] ?></p>
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
                <?php if ($key < 5) : ?>
                  <p class="copy"> <?php echo $do->task_name; ?> <span class="date"><?php echo $do->dates; ?></span></p>
                  
                  
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">View Task..</button>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <h2 class="title">DEFER</h2>
              <?php foreach ($fetchAllDataDefer as $defer) : ?>
                <?php if ($key < 5) : ?>
                  <p class="copy"> <?php echo $defer->task_name ?><span class="date"><?php echo $defer->dates; ?></span></p>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">View Task..</button>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <h2 class="title">DELEGATE</h2>
              
              <?php foreach ($fetchAllDataDelegate as $Delegate) : ?>
                <?php if ($key < 5) : ?>
                <p class="copy"> <?php echo $Delegate->task_name ?><span class="date"><?php echo $Delegate ->dates; ?></span></p>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">View Task..</button>
            </div>
          </div>
          <div class="card">
            <div class="content">
              <h2 class="title">DELETE</h2>
              <?php foreach ($fetchAllDataDelete as $delete) : ?>
                <?php if ($key < 5) : ?>

                <p class="copy"> <?php echo $delete->task_name ?><span class="date"><?php echo $delete ->dates; ?></span></p>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div>
              <button class="showMoreBtn">View Task..</button>
            </div>
          </div>
        </main>
      </div>
      <!-- pop up window code here -->
      <div class="testing-window invisible">
        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
          <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
          <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
              <div class="relative  overflow-hidden rounded-lg bg-white text-left shadow-xl sm:my-8 w-11/12 m-auto">
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                  <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" id='popUpCloseBtn'>X<button>
                </div>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                  <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                      <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">DO FIRST</h3>
                      <div class="mt-2">
                        <?php foreach ($fetchAllDataDo as $key => $do) : ?>
                          <div class="task-info">
                            <div class="list-name">
                              <h5 id="Task-Name" class="text-sm text-gray-500">
                                <?php echo $do->task_name; ?>
                              </h5>
                              <h4 id="due-date"> <?php echo $do->dates; ?></h4>
                            </div>
                            <div class="add-Cmt">
                              <input type="text" placeholder="comment here ">
                              <button><i class="fa-solid fa-upload"></i></button>
                            </div>
                            <div>
                              <div class="change">
                                <div class="Task-progress">
                                  <div class="round">
                                    <input type="checkbox" id="checkbox" />
                                    <label for="checkbox"></label>
                                  </div>
                                </div>
                                <div class="make-changes">
                                  <button><i class="fa-solid fa-pen"></i></button>
                                  <button><i class="fa-solid fa-trash-can"></i></button>
                                  <button class="add-comment-btn"><i class="fa-solid fa-comment"></i></i></button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
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
            <input name="user_id" class="user_id" value="<?=$_SESSION['userid']?>" type="hidden">

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
          <!-- <label for="css">Professional</label><br>
            <input type="radio" class="typeBtn firstFrom category" id="1" value="1" name="task_type">
            <label for="css">Personal</label><br>
            <input type="radio" class="typeBtn firstFrom category" id="2" value="2" name="task_type"> -->
        </div>





        <div>
          <div class="inputdiv">
            <div>
              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                What is on your Task
              </label>
              <input
                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-black focus:bg-white"
                id="grid-first-name" type="text" placeholder="projectName"  name="Task_name" >
             
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
            <input type="radio" class="urgent-priority-btn data" id="1" value="1" name="urgent">
            <label for="css">No</label>
            <input type="radio" class="urgent-priority-btn data" id="2" value="0" name="urgent">
          </div>
          <div class="ImportantDiv">
            <label for="project">Important</label><br>
            <label for="css">Yes</label>
            <input type="radio" class="important-priority-btn" id="1" value="1" name="important">
            <label for="css">No</label>
            <input type="radio" class="important-priority-btn" id="2" value="0" name="important">
          </div>
        </div>
        <button type="submit" onclick="store()" class="submit-btn">Submit</button>
      </form>
    </div>
  </div>
  <script src="../JS/listing.js"></script>
</body>

</html>