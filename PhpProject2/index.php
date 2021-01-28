<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>BMI Calculator</h1>
        <form action="bmi.php" method="post">
            <div id="data">
                <label>Height in meters</label>
                <input type="text" name="height"><br>
                
                <label>Weight in kilograms</label>
                <input type="text" name="weight"><br>
            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Calcluate BMI"><br>
            </div>
        </form>
        <h1>Hi!</h1>
        <form action="hi.php" method="get">
            <div id="data">
                <label>Name</label>
                <input type="text" name="name"><br>
            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Click me!"><br>
            </div>
        </form>
        <br>
        <h1>Hi!</h1>
        <form action="loops.php" method="get">
            <div id="data">
                <label>Times to loop</label>
                <input type="text" name="times"><br>
            </div>
            <div id="buttons">
                <label>&nbsp;</label>
                <input type="submit" value="Loop me!"><br>
            </div>
        </form>
        <br>
        <h2>Please Excuse ( My Dear ) ( Aunt Sally )</h2>
        <span>
            <label>12 / 2 * 6 = </label>
            <?php echo 12 / 2 * 6 ?>
        </span>
        <br>
        <span>
            <label>12 - 2 + 6 = </label>
            <?php echo 12 - 2 + 6 ?>
        </span>
    </body>
</html>
