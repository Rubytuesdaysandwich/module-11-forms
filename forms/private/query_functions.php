
<?php
function validate() {
    $errors = [];//error array gethers errors as it goes through the function dumps them all at the same time on return $errors

    // investment_amount
    //be greater than 0
  
   if($investment > 0){
    $errors ="The investment amount must br greater than 0";
   }

    // interest rate
    // be valid number
    // greater than 0
    // less than or equal to 15
    //requires interest rate to be more than 0 and less than 15
    if($interest_rate <= 0) {
      $errors[] = "interest rate must be a valid number greater than 0.";
    }
    if($years > 31) {
      $errors[] = "years must be less than 31.";//position value must be less than 999
    }

    // years
    // must be valid whole number
    // greater than 0
    // less than 31
    return $errors;
  }



  ?>