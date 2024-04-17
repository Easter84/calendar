<?php
declare(strict_types=1);
$month_num = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Title</title>
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
        <h1>Calendar for: <?= $year ?></h1><br>
        <?php while ($month_num <= 12): ?>
            <?php 
            $month_name = new DateTime("$year-$month_num-01");
            $month_name = $month_name->format('F');
            $days_in_month = days_in_month($month_name, $year);
            $first_day_of_month = new DateTime("$year-$month_num-01");
            $starting_day = (int)$first_day_of_month->format('w');
            ?>
        <br>
    </div>

    <div class="table_container">
    <table class="sub_table_design">
        <caption><?= $month_name ?></caption>
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
            <!-- Making empty cells before the first day of the month -->
            <?php for ($day = 0; $day < $starting_day; $day++): ?>
                <td style="background-color: black;"></td>
            <?php endfor; ?>
            <!-- Loop through the days of the month -->
            <?php for ($day = 1; $day <= $days_in_month; $day++): ?>
            <td style="background-color: beige;">
                <!-- Link to select the current day -->
                <a href="<?= BASE_URL ?>/index.php?action=selected_day&values=<?= $day ?>,<?= $month_name ?>,<?= $year ?>">
                <label><?= $day ?></label>
                <?php 
                // Deteremine if the current day has appointments
                if (isset($appointments[$month_name][$day])) {
                    foreach ($appointments[$month_name][$day] as $appointment) {
                        echo '<label>' . '**' . '</label>';
                    }
                }
                ?>
            </td>
            <!-- Start a new row if the week ends -->
            <?php if (($day + $starting_day) % MAX_DAYS == 0): ?>
        </tr>
        <tr>
            <?php endif; ?>
            <?php endfor; ?>
            <?php
            // Setting any cells to empty at the end of the month if needed.
            $remaining_days = (MAX_DAYS - ($days_in_month + $starting_day) % MAX_DAYS) % MAX_DAYS;
            for ($day = 0; $day < $remaining_days; $day++): ?>
                <td style="background-color: black;"></td>
            <?php endfor; ?>
        </tbody>
    </table>
    <?php
        // Increasing the month_num counter by 1.
        $month_num++;
    ?>
    <?php endwhile; ?>
    </div>

</body>
</html>