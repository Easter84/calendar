<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Day</title>
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <div class="top_bar">
        <br>
        <label>Calendar Application</label>
    </div>

    <div class="side_bar">
        <label>Main Menu</label><br><br>
        <a href="<?= BASE_URL ?>/index.php" class="link">Home</a><br>
    </div>
    
    <div class="main">
    <h1>Daily appointments</h1>
    <hr>
    <form method="post" action="index.php">
        <input type="hidden" name="action" value="day">
        <br>
        <h2><?= $day . ", " . $month . " " . $year ?></h2>
        <div>
            <?php foreach ($appointments as $appointment): ?>
                <p>Appointment: <?= $appointment['title']; ?></p>
                <p>Description: <?= $appointment['description']; ?></p>
                <p>Category: <?= $appointment['category']; ?></p>
            <?php endforeach; ?>
        </div>
    </form>
</div>

</body>
</html>