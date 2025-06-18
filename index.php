<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
        <!-- action sends inputs to selected file. -->
        <form action="./includes/formhandler.php" method="post">
            <label for="firstname">Firstname?</label>
            <input id="firstname" type="text" name="firstname" placeholder="firstname..."></input>
            <label for="lastname">Lastname?</label>
            <input id="lastname" type="text" name="lastname" placeholder="lastname..."></input>
            <label for="favoritepet">Favorite Pet?</label>
            <select id="favoritepet" name="favoritepet">
                <option value="none">None</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="bird">Bird</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </main>
</body>
</html>