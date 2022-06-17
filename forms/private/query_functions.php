<?php
function validate($investment,$interest_rate,$years){
    $error_message ="";
if($investment < 0 || is_blank($investment)){
    $error_message  .="Must be a valid number greater than 0 ";

if($interest_rate > 15){
    $error_message  .="interest rate must be less than or equal to 15 ";
}elseif($interest_rate <= 0){
    $error_message  .="interest rate must be greater than 0 ";
}

if($years > 31){
    $error_message  .="years should be less than or equal to 31 ";
}elseif($years <= 0){
    $error_message  .="Years should be greater than 0 ";
}

return $error_message;
}

}

?>