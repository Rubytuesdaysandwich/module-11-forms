
<?php
function validate_subject($subject) {
    $error_message = [];//error array gethers errors as it goes through the function dumps them all at the same time on return $errors

    // investment_amount
    if(is_blank($subject['investment_amount'])) {//if menu name is blank return error
      $error_message[] = "Amount cannot be blank.";
    } elseif(!has_length($subject['investment_amount'], ['min' > 0])) {//prevents an input of greater than 255
      $error_message[] = "investment amount must be a valid number greater than 0.";
    }

    // interest rate
    // be valid number
    // greater than 0
    // less than or equal to 15
    $interest_rate = (int) $subject['interest_rate'];//requires interest rate to be more than 0 and less than 15
    if($interest_rate <= 0) {
      $error_message[] = "interest rate must be a valid number greater than 0.";
    }
    if($years > 31) {
      $error_message[] = "years must be less than 31.";//position value must be less than 999
    }

    // years
    // must be valid whole number
    // greater than 0
    // less than 31
    return $error_message;
  }



  if(is_blank($subject['menu_name'])) {//if menu name is blank return error
    $errors[] = "Name cannot be blank.";
  } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {//prevents an input of greater than 255
    $errors[] = "Name must be between 2 and 255 characters.";
  }
  ?>