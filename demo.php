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
        <html>
            <head>
                <style>
                    h1{
                        text-align: center;
                    }

                    table{
                        padding: 10px;
                    }

                    .logo{
                        height: 53px;
                        width: 62px;
                        margin: auto;
                        display: block;
                    }
                </style>
            </head>
            <body>
                <br><br><br>
                <img src="images/logo.jpg" alt="" class="logo">
                <h1>INVOICE</h1>
                <br><br>
                <h4>Order Id : '.$row1['id'].' </h4>
                <h4>Order Date : '.date("d-m-Y",strtotime($row1["order_date"])).'</h4>
                <table border="2">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Mobile No.</th>
                            <th>Email</th>
                            <th>Address</th>
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
                                    <td>'.$row['phone'].'</td>
                                    <td>'.$row['email'].'</td>
                                    <td>'.$row['address'].'</td>
                                </tr>';
                            }
                        }
            $content .= '</tbody>
                </table><br><br>
                <h3>Product Details</h3>
                <table border="2">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Book</th>
                            <th>Products</th>
                            <th>Price</th>
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
                                $p_price = $row['p_price'];
                                $p_price = explode(",", $p_price);
                                for($i=0;$i<count($item);$i++){
                                $content .= '<tr>
                                        <td>'.$s.'</td>
                                        <td><img class="book" src="book_images/'.$img[$i].'" height="78" width="60"></td>
                                        <td>'.$item[$i].'</td>
                                        <td>'.$p_price[$i].'</td>
                                        <td>'.$qty[$i].'</td>
                                    </tr>';
                                    $s++;
                                }
                                
                            }
                        }
            $content .= '</tbody>
                </table>
                <h4>Payment Type : '. $row1['payment_type'].'</h4>
                <h4>Total Amount : '. $row1['total'].'</h4>
            </body>
            </html>
        ';

        $pdf->writeHTML($content);
        ob_end_clean();
        $time = time();
        $pdf->Output("invoice_$time.pdf",'D');
        // $pdf->Output("C:/xampp/htdocs/StudyBuddy/Report/invoice.pdf",'F');
    }
?>