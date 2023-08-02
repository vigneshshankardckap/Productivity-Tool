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
        <?php foreach ($tasks as $key => $value) :?>
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
                <h1>What's Up<span class="username"><?php echo $_SESSION['name'];?></span></h1>
            </div>
            <!-- <?php echo $_SESSION['name'];?> -->
            <!-- this is our right side contents -->
            <div class="right-section">
                <div class="search-icon-div">
                    <i class="fa-solid fa-magnifying-glass" style="color: #0c2001"></i>
                </div>
                <input placeholder="search" type="search" class="input-box" />
                <ul class="icons">
                    <!--              <form method="post" action="/addedTaskDetails">-->
                    <li class="right-icon">
                        <form method="post" action="/addedTaskDetails">
                            <button name="addedTaskDetails" type="button" style="border: none"><img class="notification" src="../Icons/clarity_notification-line.png" onclick="openNotofy()" />
                            </button>
                        </form>

                    </li>
                    <!--              </form>-->

                    <li class="right-icon">
                        <img class="darkmode" src="../Icons/dark_mode.png" />
                    </li>
                    <li class="right-icon">
                        <a href="/logout"><img src="../Icons/logout_FILL0_wght400_GRAD0_opsz48 1.png" /></a>
                    </li>
                </ul>
            </div>
        </header>

        <!-- this below section is for add button -->
        <div class="add-todo-btn-section">
            <div class="add-todo-inner-section">
                <h2 class="add-btn">ADD TODO</h2>
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
            </div>
        </div>
        <section id="taskDetailView">

        </section>
    </div>
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
            <input type="button" class="typeBtn firstFrom" name="task_type" value="Professional" id=1 />
            <input type="button" class="typeBtn firstFrom" name="task_type" value="Personal" id="2" />
        </div>
        <div>
            <div class="inputdiv">
                <div>
                    <label for="project">What on your todo?</label>
                    <input type="text" placeholder="E.g Make Todo " name="Task_name" class="projectName" />
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
                <input type="button" name="urgent-priority-btn" value="Yes" id="firstFrom" class="urgent-priority-btn" />
                <input type="button" name="urgent-priority-btn" value="No" id="firstFrom" class="urgent-priority-btn" />
            </div>
            <div class="ImportantDiv">
                <label for="">Important</label>
                <br />
                <input type="button" name="important-priority-btn" value="Yes" id="firstFrom" class="important-priority-btn" />
                <input type="button" name="important-priority-btn" value="No" id="firstFrom" class="important-priority-btn" />
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