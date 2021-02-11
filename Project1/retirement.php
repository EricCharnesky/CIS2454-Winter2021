<?php
    // getting the data from the form
    $currentAge = filter_input(INPUT_GET, 'current_age', FILTER_VALIDATE_INT);
    $desiredRetirementAge = filter_input(INPUT_GET, 'desired_retirement_age', FILTER_VALIDATE_INT);
    
    $current_savings = filter_input(INPUT_GET, 'current_savings', FILTER_VALIDATE_FLOAT);
    $current_investments = filter_input(INPUT_GET, 'current_investments', FILTER_VALIDATE_FLOAT);
    
    $yearly_savings = filter_input(INPUT_GET, 'additional_yearly_savings', FILTER_VALIDATE_FLOAT);
    $yearly_investments = filter_input(INPUT_GET, 'additional_yearly_investments', FILTER_VALIDATE_FLOAT);
    
    
    $starting_savings = $current_savings;
    $starting_investment = $current_investments;
    
    $yearsUntilRetirement = $desiredRetirementAge - $currentAge;
            
    $result = '';
    
    for ( $year = 1; $year <= $yearsUntilRetirement; $year++)
    {
        $current_savings = ( $current_savings + $yearly_savings ) * 1.02;
        
        $current_investments =  ( $current_investments + $yearly_investments ) * 1.08;
        
        $age = $currentAge + $year;
        
        $pretty_savings = number_format($current_savings, 2);
        $pretty_investing =number_format($current_investments, 2);
        $result .= "At age $age - Savings Balance: $ $pretty_savings - Investment Balance : $ $pretty_investing </br>";
    }
    
    $total_balance = $current_savings + $current_investments;
    $future_value = $total_balance / ( 1.02 ** $yearsUntilRetirement );
    
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Retirement Calculations</h1>
        <span><?php echo "age: $currentAge" ?></span></br>
        <span><?php echo "retirement age: $desiredRetirementAge" ?></span></br>
        <span><?php echo "current savings: $starting_savings" ?></span></br>
        <span><?php echo "current investments: $starting_investment" ?></span></br>
        <span><?php echo "yearly savings: $yearly_savings" ?></span></br>
        <span><?php echo "yearly investments: $yearly_investments" ?></span></br>
        <span><?php echo "Projections:</br> $result" ?></span></br>
        <span><?php echo "Total Retirement Balance: $" . number_format($total_balance, 2) ?></span></br>
        <span><?php echo "Future Value assuming 2% inflation: $" . number_format($future_value, 2) ?></span></br>
    </body>
</html>
