<!-- No closing tag = pure php page -->
<?php
// Checks if inputs are sent through a POST form & not through hardcoding a url.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // htmlspecialchars() converts user inputs to html entities which stops them from being treated as code.
    // Use everytime you are getting data from user.
    $firstname = htmlspecialchars($_POST["firstname"]);
    $lastname = htmlspecialchars($_POST["lastname"]);
    $favoritepet = htmlspecialchars($_POST["favoritepet"]);

    // Checks if input is empty
    if (empty($firstname) || empty($lastname) || empty($favoritepet)) {
        // Exits script.
        exit();
        // Sends user back to index.php page.
        header("Location: ../index.php");
    }

    echo "User submitted data:";
    echo "<br>";
    echo $firstname;
    echo "<br>";
    echo $lastname;
    echo "<br>";
    echo $favoritepet;

    header("Location: ../index.php");
} else {
    header("Location: ../index.php");
}