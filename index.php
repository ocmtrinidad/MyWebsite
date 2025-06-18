<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    <!-- This action keeps data on this page. Can also just leave empty. -->
    <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="num1" placeholder="Number one">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="num2" placeholder="Number two">
        <button>Calculate</button>
    </form> -->

    <?php 
        // Checks if inputs are submitted through a from and not hardcoded in the url.
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Get data from inputs
            // filter_input specifically used to sanitize POST data.
            $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
            $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
            // Use htmlspecialchars for sanitizing strings.
            $operator = htmlspecialchars($_POST["operator"]);
            
            // Error handlers
            $errors = false;
            if (empty($num1) || empty($num2) || empty($operator)) {
                echo "Fill in all fields";
                $errors = true;
            }
            if (!is_numeric($num1) || !is_numeric($num2)) {
                echo "Only write numbers";
                $errors = true;
            }
            
            // Calculate the numbers if no errors.
            if (!$errors) {
                $result = 0;
                if ($operator === "add") {
                    $result = $num1 + $num2;
                } else if ($operator === "subtract") {
                    $result = $num1 - $num2;
                } else if ($operator === "multiply") {
                    $result = $num1 * $num2;
                } else if ($operator === "divide") {
                    $result = $num1 / $num2;
                } else {
                    echo "ERROR";
                    quit();
                }
                echo "<h1>Result = " . $result . "</h1>";
            }
            
        }
    ?>
</body>
</html>