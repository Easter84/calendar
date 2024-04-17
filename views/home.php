<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendar</title>
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <div class="top_bar">
        <br><label>Calendar Application</label>
    </div>
    <div class="side_bar">
        <label>Main Menu</label><br><br>
        <a href="<?= BASE_URL ?>/index.php" class="link">Home</a>
    </div>
    <div class="main">
        <h1>Year and Month</h1><hr>
        <form method="post" action="index.php">
        <input type="hidden" name="action" value="month"><br>
            <label for="year">Select Year:</label>
            <select name="year">
                <?php foreach ($years as $year): ?>
                    <option><?= $year ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <label for="month">Select Month:</label>
            <select name="month">
                <?php foreach ($months as $month): ?>
                    <option><?= $month ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="checkbox" name="whole">
            <label for="whole">Show whole year: </label><br><br>
            <input type="submit" value="Select">
        </form>
    </div>

</body>
</html>