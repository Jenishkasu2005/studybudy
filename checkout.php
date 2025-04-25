<?php
    ob_start();
    session_start();
    error_reporting(E_ERROR);
    include('connection.php');

    // $id=$_GET['b_id'];
    $total1=$_GET['total'];
    $user_id = $_SESSION["id"];
    $sql="SELECT * FROM `cart` where user_id=$user_id";
    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if(!isset($_GET['success']) || $count == 0){
      header("Location:/StudyBuddy/");
    }

    $user_fetch = mysqli_query($conn,"SELECT * FROM `reg_user` WHERE id=$user_id");
    $user_row = mysqli_fetch_array($user_fetch);
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

  <!-- <link rel="stylesheet" href="css/adminbootstrap.min.css"> -->
  
  <link rel="stylesheet" href="css/fake_loader.css">
  <script src="js/fake_loader.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>

  <title>Checkout</title>
    
  <style>

    body{
      background-image: url('images/cr21.jpg');
    }
    .cards{
      height: auto;
      width: 35px;
    }
    .error{
      color: red;
      font-family: monospace;
    }
  </style>


</head>

<body>

    <?php   
        include('fake_loader.php');
    ?>


    <!-- navbar start -->

    <?php
        include('navbar.php');
    ?>

    <!-- navbar end --> 

  <div class="site-section my-5">
    <div class="container">
      <!-- <form action="" method="POST" id="checkout-selection" name="myform"> -->
      <form action="" method="POST" id="checkout-selection" onsubmit="return validate()">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Billing Details</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                  <input type="text" value="<?php echo $user_row['fname']?>" class="form-control" id="c_fname" name="fname" placeholder="Fisrt Name">
                  <span id="fnameError" class="error"></span>
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                  <input type="text" value="<?php echo $user_row['lname']?>" class="form-control" id="c_lname" name="lname" placeholder="Last Name">
                  <span id="lnameError" class="error"></span>
                </div>
              </div>

              <div class="form-group">
                <div class="com-md-12">
                  <label class="text-black" for="add">Address : <span class="text-danger">*</span>&nbsp;</label> <a href="myaddress.php?checkout=validate"> Add Address</a>
                  <select id="add" name="add" class="form-control" required>

                      <option value="" selected>Please Select your Address</option>

                      <?php
                        $u_id = $_SESSION["id"];
                        $address_result = mysqli_query($conn,"SELECT * FROM `address` where uid='$u_id' order by a_id desc")or die(mysqli_error($conn));
                        while($address_row=mysqli_fetch_assoc($address_result))
                        {
                      ?>

                      <option value="<?php echo $address_row["address"].",".$address_row["landmark"].",".$address_row["pincode"]."-".$address_row["city"]."."; ?>"><?php echo $address_row["address"].",".$address_row["landmark"].",".$address_row["pincode"]."-".$address_row["city"]."."; ?></option>

                      <?php }?>

                  </select>
                  <span id="addressError" class="error"></span>
                </div>
              </div>

              <!-- <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="add" placeholder="Address">
                </div>
              </div> -->

              <!-- <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_state_country" class="text-black">State <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_state_country" name="state"
                    placeholder="State">
                </div>
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Zip <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" maxlength="6" id="c_postal_zip" name="zip" placeholder="ZIP Code">
                </div>
              </div> -->

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" value="<?php echo $user_row['email']?>" class="form-control" id="c_email_address" name="email" placeholder="E-Mail">
                  <span id="emailError" class="error"></span>
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" value="<?php echo $user_row['mno']?>" class="form-control" maxlength="10" id="c_phone" name="mno" placeholder="Phone Number">
                  <span id="mnoError" class="error"></span>
                </div>
              </div>

              <div class="form-group">
                <label for="c_order_notes" class="text-black">Order Notes</label>
                <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="6" class="form-control"
                  placeholder="Write your notes here..."></textarea>
              </div>

            </div>
          </div>

          <div class="col-md-6">

            <div class="row mb-3">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">

                  <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                  <div class="input-group w-75">
                    <input type="text" class="form-control" id="c_code" placeholder="Coupon Code"
                      aria-label="Coupon Code" aria-describedby="button-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <!-- Payment Section Start -->
            
            <div class="mb-3 p-type">
              <h3 class="mb-3">Payment Type</h3>
              <div class="form-check me-2">
                <input type="radio" name="p_type" class="p_type" id="COD" value="COD">
                <label for="COD">COD</label><br>
              </div>
              <div class="form-check me-2">
                <input type="radio" name="p_type" class="p_type" id="Online" value="Online" data-toggle="modal" data-target="#exampleModal1">
                <label for="Online">Online</label>
              </div>
              <!-- <div class="form-check me-2">
                <input type="radio" name="p_type" class="p_type" id="Wallet" value="Wallet" data-toggle="modal" data-target="#exampleModal2">
                <label for="Wallet">Wallet</label>
              </div> -->
              <span class="error" id="ptypeError"></span>
            </div>

            <!-- Pay Through Cards Start -->

            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pay Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5 class="mb-3">Credit / Debit card</h5>
                    <!-- <form action="" method="post"> -->
                      <div class="container">
                        <div class="d-inline-flex">
                          <div class="form-check me-2">
                            <input type="radio" id="paymentRadioOne" name="card" value="American Express" class="form-check-input"/>
                            <label class="form-check-label" for="paymentRadioOne">
                              <img src="images/american.svg" alt="" class="cards" />
                            </label>&nbsp;
                          </div>
                          <!-- Radio button -->
                          <div class="form-check me-2">
                          &nbsp;<input type="radio" id="paymentRadioTwo" name="card" value="Master Card" class="form-check-input" />
                            <label class="form-check-label" for="paymentRadioTwo">
                              <img src="images/mastercard.svg" alt="" class="cards" />
                            </label>&nbsp;
                          </div>
                          <!-- Radio button -->
                          <div class="form-check me-2">
                          &nbsp;<input type="radio" id="paymentRadioThree" name="card" value="VISA Card" class="form-check-input" />
                            <label class="form-check-label" for="paymentRadioThree">
                              <img src="images/visa.svg" alt="" class="cards" />
                            </label>&nbsp;
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <label for="nameoncard" class="form-label mt-3">Name on card</label>
                            <input id="nameoncard" type="text" class="form-control" name="name" placeholder="Name"/>
                          </div>

                          <div class="col-md-6">
                            <label class="form-label mt-3">Month</label>
                            <select name="month" class="selectpicker form-control" id="month" data-width="100%">
                              <option value="">Month</option>
                              <option value="Jan">Jan</option>
                              <option value="Feb">Feb</option>
                              <option value="Mar">Mar</option>
                              <option value="Apr">Apr</option>
                              <option value="May">May</option>
                              <option value="June">June</option>
                              <option value="July">July</option>
                              <option value="Aug">Aug</option>
                              <option value="Sep">Sep</option>
                              <option value="Oct">Oct</option>
                              <option value="Nov">Nov</option>
                              <option value="Dec">Dec</option>
                            </select>
                          </div>

                          <div class="col-md-6">
                            <label class="form-label mt-3">Year</label>
                            <select name="year" class="selectpicker form-control" id="year" data-width="100%">
                              <option value="">Year</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                              <option value="2021">2021</option>
                              <option value="2022">2022</option>
                            </select>
                          </div>

                          <div class="col-md-8">
                            <label for="cc-mask" class="form-label mt-3">Card Number</label>
                            <input type="text" name="number" maxlength="16" class="form-control mb-3" id="cc-mask" 
                              inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx"
                              onkeypress="return formats(this,event)" onkeyup="return numberValidation(event)" />
                          </div>

                          <div class="col-md-4">
                            <label for="cvv" class="form-label mt-3">CVV Code</label>
                            <input type="password" class="form-control mb-3" name="cvv" id="cvv" placeholder="xxx" maxlength="3"
                            inputmode="numeric"/>
                          </div>

                        </div>
                      </div>
                    <!-- </form> -->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary d-flex justify-content-center" onclick="return validate_card();" data-dismiss="modal" name="online">Pay</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pay Through Cards End -->

            <!-- Pay Through Wallet Start -->

            

            <!-- Pay Through Wallet Start -->

            <!-- Payment Section End -->

            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                        <?php
                            if($result){

                                while($row=mysqli_fetch_array($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['p_name'];?> [ <?php echo $row['p_price'];?> ] <strong class="mx-2">x</strong> <?php echo $row['p_qty'];?></td>
                                            <td>
                                                <?php 
                                                    $a = (int)$row['p_price'];
                                                    $b = (int)$row['p_qty'];
                                                    $total = $a * $b;
                                                    echo $total;
                                                    $gt += $total;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                      
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>
                            <?php 
                                echo $gt;
                            ?>
                        </strong></td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Place Order</button>
                    <!-- <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="return validate();" name="submit" value="Place Order"> -->
                    <!-- <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="Place Order"> -->
                  </div>

                </div>
              </div>
            </div>
          </div>
          <!-- </form> -->
        </div>
      </form>
    </div>
  </div>

    <!-- Footer start-->

    <?php
        include('footer.php');
    ?>

    <!-- Footer end -->
  
    <?php
      
      if(isset($_POST['submit'])){
        $user_id = $_SESSION["id"]; 
        $sql="SELECT * FROM `cart` where user_id=$user_id";
        $result=mysqli_query($conn,$sql);
        
        While($row=mysqli_fetch_array($result))
        {
          $name[] = $row['p_name'];
          $qtyy[] = $row['p_qty'];
          $img[] = $row['p_img'];
          $price[] = $row['p_price'];
          $book_id[] = $row['b_id'];
        }

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $add = $_POST['add'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $email = $_POST['email'];
        $mno = $_POST['mno'];
        $item = implode(',',$name);
        $qty = implode(',',$qtyy);
        $img = implode(',',$img);
        $b_id = implode(',',$book_id);
        $status = "Pending";
        $payment_type= $_POST['p_type'];
        $p_price = implode(',',$price);
  
        // $insert = "INSERT INTO `order`(`u_id`,`fname`, `lname`, `address`, `state`, `zip`, `email`, `phone`, `item`, `qty`, `total`, `img`,`payment_type`,`status`) VALUES ('$user_id','$fname','$lname','$add','$state','$zip','$email','$mno','$item','$qty','$gt','$img','$payment_type','$status')";
        $insert = "INSERT INTO `order`(`u_id`,`fname`, `lname`, `address`, `email`, `phone`, `item`, `qty`,`p_price`, `total`, `img`,`payment_type`,`status`) VALUES ('$user_id','$fname','$lname','$add','$email','$mno','$item','$qty','$p_price','$gt','$img','$payment_type','$status')";
        //echo $insert;exit;
        $run = mysqli_query($conn,$insert);

        $card = $_POST['card'];
        $name = $_POST['name'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $number = $_POST['number'];
        $cvv = $_POST['cvv'];
        
        if(isset($_POST['card'])){
          $insert_card = "INSERT INTO `payment`(`card`, `name`, `month`, `year`, `number`, `cvv`) VALUES ('$card','$name','$month','$year','$number','$cvv')";
          $run_card = mysqli_query($conn,$insert_card);
        }
      }
      if(($run) || ($run && $run_card))
      {
        $sql = "DELETE FROM `cart` WHERE user_id=$user_id";
        $result = mysqli_query($conn,$sql);

        for($i=0; $i<count($qtyy); $i++){
          $select_query = "SELECT * FROM book WHERE b_id='$book_id[$i]'";
          $resultt = mysqli_query($conn,$select_query);
          $ROW = mysqli_fetch_array($resultt);
          $final_qty = $ROW['quantity'] - $qtyy[$i];
          if($final_qty <= 0){
            $final_qty = 0;
          }
          $update = mysqli_query($conn,"UPDATE `book` SET `quantity` = $final_qty WHERE `b_id`= $book_id[$i]");
        }
        header("Location: thankyou.php");
      }
    ?>


<script>
    function formats(ele,e){
      if(ele.value.length<19){
        ele.value= ele.value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
        return true;
      }else{
        return false;
      }
    }
      
    function numberValidation(e){
      e.target.value = e.target.value.replace(/[^\d ]/g,'');
      return false;
    }

    // document.getElementById('checkout-selection').addEventListener('submit', function (event) {
    //  if (!validate()) {
    //     event.preventDefault(); // Prevent form submission if validation fails
    //   }
    // });

    function validate() {
      var fname = document.getElementById("c_fname");
      var lname = document.getElementById("c_lname");
      var email = document.getElementById("c_email_address");
      var mno = document.getElementById("c_phone");
      var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      var address = document.getElementById("add").value;
      //alert(address);
      // var address = document.getElementsByName("add");
      // var address = document.forms["checkout-selection"]["add"];

      var fnameError = document.getElementById("fnameError");
      var lnameError = document.getElementById("lnameError");
      var emailError = document.getElementById("emailError");
      var mnoError = document.getElementById("mnoError");
      var addressError = document.getElementById("addressError");

      fnameError.textContent = "";
      lnameError.textContent = "";
      emailError.textContent = "";
      mnoError.textContent = "";
      addressError.textContent = "";

      var radios = document.getElementsByName('p_type');
      var isValid = false;

      for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
          isValid = true;
          break;
        }
      }

      if (fname.value == "") {
        // alert("Please Enter Your First Name");
        fnameError.textContent = "* Enter Your First Name";
        fname.focus();
        return false;
      }
      else if (lname.value == "") {
        // alert("Please Enter Your Last Name");
        lnameError.textContent = "* Enter Your Last Name";
        lname.focus();
        return false;
      }
      else if (address == "") {
        // alert("Please select your address");
        addressError.textContent = "* Select Your Address";
        address.focus();
        return false;
      }
      else if (email.value == "") {
        // alert("Please Enter Your Email");
        emailError.textContent = "* Enter Your Email";
        email.focus();
        return false;
      }
      else if (!(emailRegex.test(email.value)))
			{
				// alert("Please Enter Email In Valid Formate");
        emailError.textContent = "* Enter Email in Valid Format";
        email.focus();
				return false;
			}
      else if (mno.value == "") {
        // alert("Please Enter Your Mobile No.");
        mnoError.textContent = "* Enter Your Mobile No.";
        mno.focus();
        return false;
      }
      else if(mno.value.length < 10){
        // alert("Mobile No can't be Less Then 10 Digits");
        mnoError.textContent = "* Mobile No can't be Less Then 10 Digits";
        mno.focus();
				return false;
      }
      else if (!isValid) {
        // alert("Please Select Payment Mode");
        ptypeError.textContent = "* Select Payment Mode";
        return false;
      }
      else {
        return true;
      }
    }
</script>


</body>

</html>