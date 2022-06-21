<?php
require_once('../private/initialize.php');
$investment="";
$interest_rate="";
$years="";

    // get the data from the form
    $investment = $_POST["investment"];
    $interest_rate = $_POST["interest_rate"];
    $years = $_POST["years"];

    // validate investment inputs here
    $error_message = validate($investment,$interest_rate,$years);
   //echo display_errors($errors);
    

    // if an error message exists, go to the index page
    if ($error_message != '') {
      echo $error_message;
    
    }elseif ($error_message == ''){
        $future_value = $investment;
        for ($i = 1; $i <= $years; $i++) {
            $future_value = 
                $future_value + ($future_value * $interest_rate * .01); 
        }
    
    }

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

<?php
//$error_message=validate($investment,$interest_rate,$years);//same page processing pulling from the query functions




// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $error_message ="";
// if($investment < 0 || is_blank($investment)){
//     $error_message  .="Must be a valid number greater than 0 ";
// }
// if($interest_rate > 15){
//     $error_message  .="interest rate must be less than or equal to 15 ";
// }elseif($interest_rate <= 0){
//     $error_message  .="interest rate must be greater than 0 ";
// }

// if($years > 31){
//     $error_message  .="years should be less than or equal to 31 ";
// }elseif($years <= 0){
//     $error_message  .="Years should be greater than 0 ";
// }

// return $error_message;

// }

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