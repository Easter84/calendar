<?php
declare(strict_types=1);
/**
 * Created By: Timothy Easter
 * Assignment: HW3 Calendar
 * For Database creation and data insertion see the Readme.
 */

// Declaring the modules the application needs.
require_once 'model/database.php';
require_once 'model/appointments_db.php';
require_once 'includes/calendar_functions.php';

// Checking if there is a Get or Post
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'pick';
    }
}

// Checking if the checkbox in home.php was checked.
if (isset($_POST['whole'])) {
    // If it was change the $action to whole.
    $action = 'whole';
}


/**
 * This switch is used to deteremine what page to load based of the $_POST or $_GET
 */
switch ($action) {

    case 'month':
        $year = $_POST['year'];
        $month = $_POST['month'];
        $appointments = get_appointments_for_month($year, $month);
        require 'views/month.php';
        break;

    case 'selected_day':
        // Checks for the needed variables from the $_GET
        if(isset($_GET['action']) && $_GET['action'] === 'selected_day' && isset($_GET['values'])){
            // Extracts them from the array
            $values = explode(',', $_GET['values']);
        }

        // Assigns the variables
        $day = $values[0];
        $month = $values[1];
        $year = $values[2];
        $month_num = DateTime::createFromFormat('F', $month);
        $month_num = $month_num->format('n');
        $date = "$year-$month_num-$day";
        // Retrieves the appoinmtent information
        $appointments = get_dates($date);
        require 'views/day.php';
        break;

        case 'whole':
            // Gets the variables from the $_POST
            $year = filter_input(INPUT_POST,'year');
            $months = get_months();
            // Creates a list of months for use.
            $appointments = [];
            foreach ($months as $month) {
                $appointments[$month] = get_appointments_for_month($year, $month);
            }
            require 'views/yearly_calendar.php';
            break;

    default:
        $years = get_years();
        $months = get_months();
        require 'views/home.php';
        break;
}
