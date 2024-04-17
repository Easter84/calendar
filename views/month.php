<?php
declare(strict_types= 1);

// Calculate the number of days in the given month and year.
$days_in_month = days_in_month( $month, $year );

// Create a DateTime object for the first day of the given month and year.
$first_day_of_month = new DateTime("$month-$year-01");

// Determine the index of the starting day (0 for Sunday, 1 for Monday, etc.).
$starting_day = (int)$first_day_of_month->format("w");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Month</title>
  <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <div class="top_bar">
        <br>
        <label>Calendar Application</label>
    </div>
    <div class="side_bar">
        <label>Main Menu</label><br><br>
        <a href="<?= BASE_URL ?>/index.php" class="link">Home</a>
    </div>
    <div class="main">
        <h1>Select Day</h1>
        <hr>
        <form method="post" action="index.php">
            <br>
            <h2><?=$month . " " . $year ?></h2>
            <br>
            <div class="table_container">
                <table class="table_design">
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Creates blank cells if the starting day of the month is not on Sunday -->
                            <?php for ($day = 0; $day < $starting_day; $day++): ?>
                                <td style="background-color: black;"></td>
                            <?php endfor; ?>
                            
                            <!-- Loop through days of the month -->
                            <?php for ($day = 1; $day <= $days_in_month; $day++): ?>
                            <td style="background-color: beige;">
                                <?php 
                                // Determine if the current day has appointments
                                $selected_values = array($day, $month, $year); 
                                $hasAppointments = count($appointments[$day]) > 0;
                                ?>
                                <!-- Link to select the current day -->
                                <a href="<?= BASE_URL ?>/index.php?action=selected_day&values=<?= implode(',', $selected_values) ?>">
                                <?= $day ?><?php if ( $hasAppointments ): ?>**<?php endif; ?>
                                </a>
                            </td>
                            <!-- Start a new row if the week ends -->
                            <?php if (($day + $starting_day) % MAX_DAYS == 0): ?>
                            </tr><tr>
                            <?php endif; ?>
                            <?php endfor; ?>
                            <?php
                            // Creating blank cells at the end of the month to fill it out.                 
                            $remaining_days = (MAX_DAYS - ($days_in_month + $starting_day) % MAX_DAYS) % MAX_DAYS;
                            for ($day = 0; $day < $remaining_days; $day++): ?>
                            <td style="background-color: black;"></td>
                            <?php endfor; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</body>
</html>