<?php 
require_once('../private/initialize.php');
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; } 
    if (!isset($interest_rate)) { $interest_rate = ''; } 
    if (!isset($years)) { $years = ''; } 
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(!empty($_POST['investment'])){
        $investment = $_POST['investment'];
    }else{
        $investment="";
        //echo "enter investment ";
    }

    if(!empty($_POST['interest_rate'])){
        $investment = $_POST['interest_rate'];
    }else{
        $investment="";
        //echo "enter interest rate ";
    }

    if(!empty($_POST['years'])){
        $investment = $_POST['years'];
    }else{
        $investment="";
        //echo "enter years ";
    }
    


// get the data from the form
// $investment = $_POST["investment"];
// $interest_rate = $_POST["interest_rate"];
// $years = $_POST["years"];

// validate investment inputs here

//echo display_errors($errors);


// if an error message exists, go to the index page
// if ($error_message != '') {
//     echo "error";
// }

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
}
$error_message = validate($investment,$interest_rate,$years);
//$error_message = validate($investment,$interest_rate,$years);//gives error message
?>

    <main>
    <h1>Future Value Calculator</h1>
    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form action="index.php" method="post">

        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php echo htmlspecialchars($investment); ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo htmlspecialchars($interest_rate); ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo htmlspecialchars($years); ?>">
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"><br>
        </div>

    </form> 
    </main>
</body>
</html>