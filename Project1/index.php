<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <h1>Retirement Projections</h1>
        <form action="retirement.php" method="get">
            <div id="data">
                <label>Current Age</label>
                <input type="text" name="current_age"><br>
                
                <label>Desired Retirement Age</label>
                <input type="text" name="desired_retirement_age"><br>
                
                <label>Current Savings Balance</label>
                <input type="text" name="current_savings"><br>
                
                <label>Current Investments Balance</label>
                <input type="text" name="current_investments"><br>
                
                <label>Additional Yearly Savings</label>
                <input type="text" name="additional_yearly_savings"><br>
                
                <label>Additional Yearly Investments</label>
                <input type="text" name="additional_yearly_investments"><br>
            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="See Estimate"><br>
            </div>
        </form>
    </body>
</html>
