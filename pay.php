<?php
include('connection.php');

session_start();

if (isset($_POST['add'])) {
  $card = $_POST['card'];
  $name = $_POST['name'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $number = $_POST['number'];
  $cvv = $_POST['cvv'];

  $insert = "INSERT INTO `card`(`card`, `name`, `month`, `year`, `number`, `cvv`) VALUES ('$card','$name','$month','$year','$number','$cvv')";

  $result =mysqli_query($cn,$insert);

  if ($result) {
    header("location:subscription.php");
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pay</title>
  <link rel="stylesheet" href="css/adminbootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>


<body>
  <div class="container mt-5">
    <div class="card border-2 p-5">
      <form class="row mb-4" method="POST">
        <h1 class="mt-5 mb-5"
          style="text-align: center; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; font-weight: 900;">
          Payment and Listen</h1>
        <div class="mb-3 col-12 col-md-12 mb-4">
          <h5 class="mb-3">Credit / Debit card</h5>
          <!-- Radio button -->
          <div class="d-inline-flex">
            <div class="form-check me-2">
              <input type="radio" id="paymentRadioOne" name="card" value="American Express" class="form-check-input" />
              <label class="form-check-label" for="paymentRadioOne"><img src="images/americanexpress.svg"
                  alt="" /></label>
            </div>
            <!-- Radio button -->
            <div class="form-check me-2">
              <input type="radio" id="paymentRadioTwo" name="card" value="Master Card" class="form-check-input" />
              <label class="form-check-label" for="paymentRadioTwo"><img src="./images/mastercard.svg" alt="" /></label>
            </div>
            <!-- Radio button -->
            <div class="form-check">
              <input type="radio" id="paymentRadioFour" name="card" value="VISA Card" class="form-check-input" />
              <label class="form-check-label" for="paymentRadioFour"><img src="./images/visa.svg" alt="" /></label>
            </div>
          </div>
        </div>
        <!-- Name on card -->
        <div class="mb-3 col-12 col-md-4">
          <label for="nameoncard" class="form-label">Name on card</label>
          <input id="nameoncard" type="text" class="form-control" name="name" placeholder="Name" required />
        </div>
        <!-- Month -->
        <div class="mb-3 col-12 col-md-4">
          <label class="form-label">Month</label>
          <select name="month" class="selectpicker form-control" data-width="100%">
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
        <!-- Year -->
        <div class="mb-3 col-12 col-md-4">
          <label class="form-label">Year</label>
          <select name="year" class="selectpicker form-control" data-width="100%">
            <option value="">Year</option>
            <option value="June">2018</option>
            <option value="July">2019</option>
            <option value="August">2020</option>
            <option value="Sep">2021</option>
            <option value="Oct">2022</option>
          </select>
        </div>
        <!-- Card number -->
        <div class="mb-3 col-md-8 col-12">
          <label for="cc-mask" class="form-label">Card Number</label>
          <input type="text" name="number" class="form-control" id="cc-mask"
            data-inputmask="'mask': '9999 9999 9999 9999'" inputmode="numeric" placeholder="xxxx-xxxx-xxxx-xxxx"
            required />
        </div>
        <!-- CVV -->
        <div class="mb-3 col-md-4 col-12">
          <div class="mb-3">
            <label for="cvv" class="form-label">CVV Code
              <i class="fe fe-help-circle ms-1" data-bs-toggle="tooltip" data-placement="top" title=""
                data-original-title="A 3 - digit number, typically printed on the back of a card."></i></label>
            <input type="password" class="form-control" name="cvv" id="cvv" placeholder="xxx" maxlength="3"
              inputmode="numeric" required />
          </div>
        </div>
        <!-- Button -->
        <div class="col-md-6 col-12">
          <button class="btn btn-primary" name="add" type="submit">Pay Now</button>
          <!-- <button
            class="btn btn-outline-secondary"
            type="button"
            data-bs-dismiss="modal"
          >
            Close
          </button> -->
        </div>
      </form>
    </div>
  </div>
  <script src="index.js"></script>
</body>

</html>