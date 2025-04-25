<?php
  error_reporting(E_ERROR);
  //print_r($_SERVER);exit;
  $filename = basename($_SERVER['REQUEST_URI']);
  //echo $filename;exit;
  //$http_ref = basename($_SERVER['HTTP_REFERER']);
  //echo basename($_SERVER['HTTP_REFERER']);exit;
  //echo $_SERVER['PHP_SELF'];exit;
  //$id=$_GET['id'];
  //echo $filename;exit;
?>
<main class="d-flex flex-nowrap pos">

  <div class="d-flex flex-column align-items-stretch flex-shrink-0 p-3 bg-light" style="width: 230px;overflow-y: scroll;scrollbar-width: none;">
    <img class="ml-5" src="images/logo1.png" alt="" height="80" width="100">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto" id="hm">
      <li>
        <a href="dashboard.php" id="dashboard" class="nav-link <?php echo ($filename == "dashboard.php") ? 'active' : '' ; ?>">
          <i class="fa-solid fa-gauge-high"></i>
          Dashboard
        </a>
      </li>

      <li>
        <a href="order.php" id="orders" class="nav-link <?php echo ($filename == "order.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/order_detail.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/order_status.php") ? 'active' : '' ; ?>">
          <i class="fa-regular fa-calendar-days"></i>
          Orders
        </a>
      </li>

      <li>
        <a href="order_report.php" id="report" class="nav-link <?php echo ($filename == "order_report.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/order_report.php") ? 'active' : '' ; ?>">
        <i class="fa-regular fa-file-lines"></i>
          Order Report
        </a>
      </li>

      <li>
        <a href="book.php" id="books" class="nav-link <?php echo ($filename == "book.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/b_update.php") ? 'active' : '' ; ?>">
        <i class="fa-solid fa-book"></i>
          Books
        </a>
      </li>
      <li>
        <a href="user.php" id="users" class="nav-link <?php echo ($filename == "user.php") ? 'active' : '' ; ?>">
          <i class="fa-regular fa-user"></i>
          Users
        </a>
      </li>

      <li>
        <a href="course.php" id="courses" class="nav-link <?php echo ($filename == "course.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/c_update.php") ? 'active' : '' ; ?>">
        <i class="fa-solid fa-laptop-code"></i>
          Courses
        </a>
      </li>

      <li>
        <a href="inquiry.php" id="inquiry" class="nav-link <?php echo ($filename == "inquiry.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/inquiry_status.php") ? 'active' : '' ; ?>">
          <i class="fa-solid fa-headset"></i>
          User Inquiry
        </a>
      </li>

      <li>
        <a href="teacher.php" id="teacher" class="nav-link <?php echo ($filename == "teacher.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/t_update.php") ? 'active' : '' ; ?>">
        <i class="fa-solid fa-chalkboard-user"></i>
          Teacher
        </a>
      </li>

      <li>
        <a href="faculty_apply_admin.php" id="teacher" class="nav-link <?php echo ($filename == "faculty_apply_admin.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/faculty_apply_status.php") ? 'active' : '' ; ?>">
        <i class="fa-solid fa-newspaper"></i>
          Application
        </a>
      </li>

      <li>
        <a href="admin_about.php" id="teacher" class="nav-link <?php echo ($filename == "admin_about.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/content_update.php" || $_SERVER['PHP_SELF'] == "/StudyBuddy/faq_update.php") ? 'active' : '' ; ?>">
        <i class="fa-solid fa-newspaper"></i>
          About Us
        </a>
      </li>
      
      <li>
        <a href="book_note_admin.php" id="teacher" class="nav-link <?php echo ($filename == "book_note_admin.php") ? 'active' : '' ; ?>">
        <i class="fa-solid fa-file-pdf"></i>
          Book Note
        </a>
      </li>

      <li>
        <a href="logout_admin.php" id="logout" class="nav-link">
        <i class="fa-solid fa-right-from-bracket"></i>
          Logout
        </a>
      </li>
    </ul>


    
  </div>

  <div class="b-example-divider b-example-vr"></div>
</main>
