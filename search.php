<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $usersearch = $_POST["usersearch"];

  try {
    require_once "./includes/dbh.inc.php";

    $query = "SELECT * FROM comments WHERE username = :usersearch;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":usersearch", $usersearch);

    $stmt->execute();

    // Fetches all data from query as an associative array.
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  };
} else {
  header("Location: index.php");
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <h3>Search results</h3>
  <?php 
    if (!$results) {
      ?>
      <div>
        <p>No results</p>
      </div>
      <?php
    } else {
      foreach($results as $row) {
        // Sanititze data when outputting data.
        ?>
        <div>
          <h4><?php echo htmlspecialchars($row["username"]); ?></h4>
          <p><?php echo htmlspecialchars($row["comment_text"]); ?></p>
          <p><?php echo htmlspecialchars($row["created_at"]); ?></p>
        </div>
        <?php
      };
    };
  ?>

</body>
</html>