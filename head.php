<?php
    include('connection.php');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>StudyBuddy</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />   


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<script src="js/jquery-3.4.1.min.js"></script>

<!-- animation start -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- animation end -->


<link rel="icon" href="images/head_image.png" type="image/x-icon">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/fake_loader.css">
<script src="js/fake_loader.js"></script>
<script src="js/jquery-3.4.1.min.js"></script>

<style>
  /* .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  } */

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  .pos{
    position: fixed;
  }

  #myTable > thead > tr > th{
      text-align: center;
  }

  table.dataTable thead>tr>th.sorting:after, table.dataTable thead>tr>th.sorting_asc:after{
      display: none;
  }

  table.dataTable thead>tr>th.sorting:before, table.dataTable thead>tr>th.sorting_asc:before{
      display: none;
  }

  #myTable > tbody > tr > td > a{
      text-decoration: none;
  }
  
  body{
    background-color: white;
  }

</style>

<link href="css/sidebars.css" rel="stylesheet">

<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/sidebars.js"></script>
<script>
  $(document).ready(function(){
    $('#hm li a').click(function(){
      $(this).toggleClass('active');
    });
  });
</script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function(){
    $('#myTable').DataTable();
  });
</script>
