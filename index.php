<?php
// For allowing type declarations
declare(strict_types=1);

// Starts a session for this page.
// session_start();

// "Thor" will be remembered by any page with a session_start().
// $_SESSION["username"] = "Thor";

// Deletes 1 session data.
// unset($_SESSION["username"]);

// Deletes ALL session data.
// session_unset();

// Deletes ALL session data WHEN you go to a different page.
// session_destroy();

// Use both unset & destroy to end a session.

// Imports session and configs.
require_once "./includes/configSession.inc.php";
require_once "./includes/signup_view.inc.php";
?>

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
    </form> -->

    <?php
    // // Checks if inputs are submitted through a from and not hardcoded in the url.
    // if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // // Get data from inputs
    // // filter_input specifically used to sanitize POST data.
    //  $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
    //  $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
    // // Use htmlspecialchars for sanitizing strings.
    //  $operator = htmlspecialchars($_POST["operator"]);
    // // Checks if variable is empty
    //  empty($num1)
    // // Checks if variable is a number
    //  is_numeric($num1)
    // }

    // // ARRAYS
    // $fruits = ["apple", "banana", "cherry"];
    // $fruits2 = ["apple", "banana", "cherry"];
    // // Removes item from array. Leaves null. Does not move other items.
    // unset($fruits[1]);
    // // Removes item from array. array_splice(array name, starting index, number of items ahead, new item)
    // array_splice($fruits, 0, 1);
    // array_splice($fruits, 2, 0, $fruits2);
    // // Associative arrays. Uses keys (the strings) to identify items.
    // $tasks = [
    //     "laundry" => "Daniel", 
    //     "trash" => "Frida",
    //     "vacuum" => "Basse",
    //     "dishes" => "Bella"
    // ];
    // Sorts array. Causes print_r() to show indexes instead of keys.
    // sort($tasks);
    // // Pushes new item to array. Only works for indexed arrays.
    // array_push($fruits, "mango");
    // // Pushes new item to array. For associative arrays. $array["key"] = "value" 
    // $tasks["dusting"] = "Tara";
    // // Multi-dimensional arrays.
    // $test = [["apple", "mango"], "banana"];
    // echo $test[0][1];
    // // Associative array with multi-dimensional array.
    // $foods = [
    //     "fruits" => ["apple", "banana"],
    //     "meats" => ["beef", "fish"],
    //     "vegetables" => ["carrot"]
    // ];
    // echo $foods["meats"][0];
    // // Checks if array.
    // is_array($fruits);
    // // Removes last item.
    // array_pop($fruits);
    // // Reverses array.
    // array_reverse($fruits);
    // // Joins arrays.
    // $array2 = ["kiwi"];
    // array_merge($fruits, $array2);
    // // Prints out array with indexes or keys.
    // print_r($fruits);

    // // STRINGS
    // $string = "Hello World!";
    // // Gets length of string including spaces.
    // strlen($string);
    // // Gets index of first value that matches.
    // strpos($string, "o");
    // // Replaces string. Replaces "World" from $string with "Daniel".
    // str_replace("World", "Daniel", $string);
    // // To lower or upper case.
    // strtolower($string);
    // strtoupper($string);
    // // Gets substring. substr(string, start, end);
    // substr($string, 2, 2);
    // // Divides string into arrays. explode(divider, string)
    // print_r(explode(" ", $string));

    // // NUMBERS
    // $number = -5.5;
    // // Gets absolute value. Removes negatives and positives.
    // echo abs($number);
    // // To the power of.
    // pow(2, 3);
    // // Square root.
    // sqrt(16);
    // // Get random number.
    // rand(1, 100);

    // // DATE & TIME
    // // date("YEAR-month-day HOUR:minute:seconds"). Y & H have to be capitalized.
    // date("Y-m-d H:i:s");
    // // Gets UNIX timestamp.
    // time();
    // // Translates date to UNIX time.
    // strtotime(date("Y-m-d H:i:s"));

    // // FUNCTIONS
    // // Add data type before parameter for type declaration
    // function calculator(int $num1, int $num2)
    // {
    //     return $num1 + $num2;
    // };
    // echo calculator(1, 1);

    // // SCOPES
    // // Global scope variable.
    // $test = "Daniel";
    // function myFunction() {
    //     // // Local scope variable.
    //     // $localVar = "HELLO";
    //     // // $test is inaccessible even if a global variable because functions have own scope.
    //     // // Add global scope variable into parameters.
    //     // // OR use as global (not recommended) with global $variable OR $GLOBALS["variable"].
    //     // global $test;
    //     // return $localVar;
    //     // // Static variable.
    //     // // Shared between different instances of the function.
    //     // static $staticVar = 0;
    //     // $staticVar++;
    //     // return $staticVar;
    // }
    // echo myFunction();

    // // STATIC (Constant)
    // // List this at top of code.
    // define("name", "Thor");

    // // LOOPS
    // // For loop
    // for ($i = 0; $i < 10; $i++) {
    //     echo "This is iteration {$i} <br>";
    // };
    // // While loop
    // $test = 5;
    // while ($test < 10) {
    //     echo $test;
    //     $test++;
    // }
    // // Do while loop
    // // Will always loop through once as the check comes after.
    // do {
    //     echo $test;
    //     $test++;
    // } while ($test < 10);
    // // Foreach loop
    // $fruits = ["apple" => "red", "banana" => "yellow", "orange" => "orange"];
    // // Use => if it is an associative array.
    // foreach ($fruits as $fruit => $color) {
    //     echo "This is a {$fruit} that is {$color} <br>";
    // };
    ?>

    <h3>Login</h3>

    <form action="./includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button>Login</button>
    </form>

    <h3>Signup</h3>

    <form action="./includes/signup.inc.php" method="post">
        <?php signUpInputs() ?>
        <button>Signup</button>
    </form>

    <?php
    checkSignupErrors();
    ?>
</body>

</html>