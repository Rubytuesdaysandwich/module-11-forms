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

    if(!empty($_POST['investment'])){//if the post index is empty assign it to investment
        $investment = $_POST['investment'];
    }else{
        $investment=0;//if the entry box on the form has nothing in it, it will default to 0
        
    }

    if(!empty($_POST['interest_rate'])){//if the post index is empty assign it to interest rate
        $interest_rate = $_POST['interest_rate'];
    }else{
        $interest_rate=0;//if the entry box on the form has nothing in it, it will default to 0
       
    }

    if(!empty($_POST['years'])){//if the post index is empty assign it to years
        $years = $_POST['years'];
    }else{
        $years=0;//if the entry box on the form has nothing in it, it will default to 0
       
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

// echo (nl2br( " investment {$investment_f}\n"));
// echo (nl2br( " Yearly rate {$yearly_rate_f}\n"));
// echo (nl2br( "Future Value {$future_value_f}\n"));
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
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo (nl2br( " investment {$investment_f}\n"));
    echo (nl2br( " Yearly rate {$yearly_rate_f}\n"));
    echo (nl2br( "Future Value {$future_value_f}\n"));
    }
    ?>
    </main>
</body>
</html>