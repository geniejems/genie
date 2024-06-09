<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculator</title>
</head>
<body>  
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Calculator</h1>
        <label>First Calculator I create using PHP</label>
            <input type="number" name="num1" placeholder="type a number">
            <select name="operator">
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="num2" placeholder="type a number">
            <button>Calculate</button>
        </form>
    </div>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // grab data from inputs
            $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
            $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator = htmlspecialchars($_POST["operator"]);

            // error handlers
            $errors = false;

            if(empty($num1) || empty($num2) || empty($operator)){
                echo "<p>  </p>";
                $errors = true;
            }

            if(!is_numeric($num1) ||  !is_numeric($num2)){
                echo "<p> </p>";
                $errors = true;
            }

            // calculate ni diri na numbers na walay errors
            if(!$errors){
                $value = 0;
                switch($operator){
                    case "add":
                        $value = $num1 + $num2;
                        break;
                    case "subtract":
                        $value = $num1 - $num2;
                        break;
                    case "multiply":
                        $value = $num1 * $num2;
                        break;
                    case "divide":
                        $value = $num1 / $num2;
                        break;
                    default:
                        echo "WRONG GURO IMONG NGI TYPE";
                }
                echo  "<p class='cal-result'>  $value </p>";
            }



        }
    ?>

</body>
</html>