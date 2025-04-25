
<?php
    include('connection.php');
    $id = $_GET['id'];
    $sql="SELECT * FROM `order` where id=$id";
    $result=mysqli_query($conn,$sql);
    $row1 = mysqli_fetch_assoc($result);
    if(isset($_POST['download'])){
        define('K_PATH_MAIN', 'C:/xampp/htdocs/StudyBuddy/TCPDF-main/');
        require_once('C:/xampp/htdocs/StudyBuddy/TCPDF-main/tcpdf.php');
        // $pdf = new TCPDF('P',PDF_UNIT,PDF_PAGE_FORMAT,true,'UTF-8',false);
        // $pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf=new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // $pdf = new TCPDF('L','mm','A4',true,'UTF-8',true);
        $pdf->SetTitle('Invoice');

        $pdf->AddPage('P',"A4");

        // $pdf->SetFont('helvetica','',24);

        $content = '';

        $content .= '
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mt-4">Order Id : '.$row1['id'].'
                    </h4>
                </div>
                <div class="col-md-6">
                    <h4 class="mt-4">Order Date : '.date("d-m-Y",strtotime($row1["order_date"])).'
                    </h4>
                </div>
            </div>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>';
                
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `order` WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $content .= '<tr>
                                    <td>'.$row['fname'] . ' ' . $row['lname'].'</td>
                                    <td>'.$row['address'].'</td>
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['email'].'</td>
                                </tr>';
                            }
                        }
            $content .= '</tbody>
            </table><br><br>
            <table class="table text-center">
                <thead class="thead-dark">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Image</th>
                        <th>Products</th>
                        <th>Quantity</th>
                    </tr>
                </thead><br><br>
                <tbody>';
                
                        $id = $_GET["id"];
                        $sql = "SELECT * FROM `order` WHERE id=$id";
                        $result = mysqli_query($conn,$sql);
                        $s = 1;
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $item = $row['item'];
                                $item = explode(",", $item);
                                $qty = $row['qty'];
                                $qty = explode(",", $qty);
                                $img = $row['img'];
                                $img = explode(",", $img);
                                for($i=0;$i<count($item);$i++){
                                $content .= '<tr>
                                        <td>'.$s.'</td>
                                        <td><img src="book_images/'.$img[$i].'" height="78" width="60"></td>
                                        <td>'.$item[$i].'</td>
                                        <td>'.$qty[$i].'</td>
                                    </tr>';
                                    $s++;
                                }
                                
                            }
                        }
            $content .= '</tbody>
            </table>
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Total : '. $row1['total'].'
                        </h4>
                    </div>
                    <div class="col-md-6">
                        <h4>Payment Type : '. $row1['payment_type'].'
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        ';

        $pdf->writeHTML($content);
        ob_end_clean();
        $pdf->Output("invoice.pdf",'D');
    }
?>
<?php
    // include('connection.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `order` WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    $row1=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/head_image.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/fake_loader.css">
    <script src="js/fake_loader.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/form.css">

    <title>StudyBuddy</title>
    
    <style>
        body{
            background-color: white;
        }

        .container{
            width: 80%;
        }
    </style>
</head>

<body>

    <?php 
        include('fake_loader.php');
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="mt-4">Order Id : 
                    <?php 
                        echo $row1['id'];
                    ?>
                </h4>
            </div>
            <div class="col-md-6">
                <h4 class="mt-4">Order Date : 
                    <?php 
                        echo date('d-m-Y',strtotime($row1['order_date']));
                    ?>
                </h4>
            </div>
        </div>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <!-- <th>Order Id</th> -->
                    <th>Name</th>
                    <th>Address</th>
                    <th>Mobile No.</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `order` WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            echo"<tr>
                                <td>".$row['fname'] . " " . $row['lname']."</th>
                                <td>".$row['address']."</th>
                                <td>".$row['phone']."</th>
                                <td>".$row['email']."</th>
                            </tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Sr. No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `order` WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    $s = 1;
                    if($result){
                        while($row=mysqli_fetch_assoc($result)){
                            $item = $row['item'];
                            $item = explode(',', $item);
                            $qty = $row['qty'];
                            $qty = explode(',', $qty);
                            $img = $row['img'];
                            $img = explode(',', $img);
                            for($i=0;$i<count($item);$i++){
                                echo"<tr>
                                    <td>".$s."</th>
                                    <td><img src='book_images/".$img[$i]."' height='78' width='60'></td>
                                    <td>".$item[$i]."</th>
                                    <td>".$qty[$i]."</th>
                                </tr>";
                                $s++;
                            }
                            
                        }
                    }
                ?>
            </tbody>
        </table>
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-6">
                    <h4>Total : 
                        <?php 
                            echo $row1['total'];
                        ?>
                    </h4>
                </div>
                <div class="col-md-6">
                    <h4>Payment Type : 
                        <?php 
                            echo $row1['payment_type'];
                        ?>
                    </h4>
                </div>
                <form method="POST">
                    <button type="submit" name="download" class="btn btn-outline-secondary mx-auto mt-3">Download</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>