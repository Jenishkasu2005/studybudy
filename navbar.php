<?php
    ob_start();
    error_reporting(E_ERROR);
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>
<!-- <header class="py-2">
    <div class="container">
        <a href="login_admin.php" class="text-dark" style="text-decoration: none;">
            <button class="btn btn-warning">
                <i class="fa-solid fa-user"></i>&nbsp;Admin
            </button>
        </a>&nbsp;
        <a href="login_teacher.php" class="text-dark">
            <button class="btn btn-warning">
                <i class="fa-solid fa-user-tie"></i>&nbsp;Teacher
            </button>
        </a>
    </div>
</header> -->
<nav class="navbar navbar-expand-lg sticky-top navbar-light" >
    <a class="navbar-brand" href="/StudyBuddy/"><img src="images/logo1.png" alt="" id="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item link">
                <a class="nav-link" href="/StudyBuddy/">Home</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="course_main.php">Courses</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="book_main.php">Books</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="faculty_main.php">Faculty</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <?php
                if(!isset($_SESSION['id'])){
            ?>
            <li class="nav-item link">
                <a class="nav-link" href="login1.php">Login</a>
            </li>
            <li class="nav-item link">
                <a class="nav-link" href="regi1.php">Registration</a>
            </li>
            <?php
                }
                if(isset($_SESSION['id'])){
            ?>
            <li class="nav-item link">
                <a class="nav-link" href="cart.php">
                <i class="fa-solid fa-cart-shopping"></i>
                    <!-- <button type="button" class="position-relative cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
                    </button> -->
                </a>
            </li>
            <?php }?>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="">
            <div class="InputContainer">
                <input type="text" name="search" value=
                "<?php
                    if($_GET['b_name']){
                        echo $_GET['b_name'];
                    }
                ?>"
                 id="input" placeholder="Search" required>
                <button class="btn" type="submit" name="search-book">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>
        <?php
            if(isset($_SESSION['id'])){
        ?>
        <ul class="navbar-nav">
            <li class="nav-item ml-2">
                <div class="dropdown">
                    <button class="dropbtn btn"><i class="fa-regular fa-user"></i></button>
                    <div class="dropdown-content">
                        <a href="user_detail.php" style="text-decoration: none;">Profile</a>
                        <a href="wishlist.php" style="text-decoration: none;">Wishlist</a>
                        <a href="myorder.php" style="text-decoration: none;">My Order</a>
                        <a href="myaddress.php" style="text-decoration: none;">My Address</a>
                        <a href="change_password.php" style="text-decoration: none;">Change Password</a>
                        <a href="logout_user.php" style="text-decoration: none;">Logout</a>
                    </div>
                </div>
            </li>
        </ul>
        <?php }
        if(isset($_POST['search-book'])){
            $search = $_POST['search'];
            header("Location: book_main.php?b_name=$search");
        }
        ?>
    </div>
</nav>