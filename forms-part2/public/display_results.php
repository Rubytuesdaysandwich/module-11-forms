<?php
require_once('../private/initialize.php');

//$errors="";

    // get the data from the form
    $investment = $_POST["investment"];
    $interest_rate = $_POST["interest_rate"];
    $years = $_POST["years"];

    // validate investment inputs here
   
   //echo display_errors($errors);
    

    // if an error message exists, go to the index page
    if ($error_message != '') {
        include('index.php');
        exit(); }

    // calculate the future value
    $future_value = $investment;
    for ($i = 1; $i <= $years; $i++) {
        $future_value = 
            $future_value + ($future_value * $interest_rate * .01); 
    }

    // apply currency and percent formatting
    $investment_f = '$'.number_format($investment, 2);
    $yearly_rate_f = $interest_rate.'%';
    $future_value_f = '$'.number_format($future_value, 2);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>
    </main>
</body>
</html>
