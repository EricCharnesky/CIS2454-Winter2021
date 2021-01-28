<?php
    // getting the data from the form
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    
    
    /* six data types
     * integers - whole numbers
     * doubles - numbers with decimal places
     * boolean - true/false
     * string - bunch of text
     * arrays - ? - we will get to this later
     * objects - ? - we will get to this later
     */
    
    // do stuff with our variables
    $height_squared = $height * $height;
    $bmi = $weight / $height_squared;
    
    $rounded_bmi = number_format($bmi, 1);
    
    
    $bmi_string = "Your BMI is $rounded_bmi";
    
    if ( $rounded_bmi >= 40 ) {
        $bmi_string .= ", your BMI indicates extreme obesity";
    } else if ( $rounded_bmi >= 30 ) {
        $bmi_string .= ", your BMI indicates obesity";
    } else if ( $rounded_bmi >= 25 ) {
        $bmi_string .= ", your BMI indicates you are overweight";
    } else {
        $bmi_string .= ", your BMI indicates you are healthy";
    }
    
    
    // instead of $bmi_string = $bmi_string + " something here"
    
    $today = date('Y-m-d')
       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>BMI Calculator - <?php echo $today ?></h1>
        <span><?php echo $bmi_string ?></span>
    </body>
</html>
