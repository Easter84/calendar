<?php
declare(strict_types= 1);
/**
 * This module contains functions needed to calculate how many days are in a month, to get a list of months,
 * create a list of years and fetch any appointments in the month.
 */

// Creating a base url for use so my views go to the right index.
define('BASE_URL', 'http://localhost/class/calendar2');

// Declaring Constants to be used.
const STARTING_DAY = 01;
const MAX_DAYS = 7;
const MAX_MONTHS = 12;

/**
 * Create a list of years based of current year +/- 1
 * @return array An array of integers
 */
function get_years(): array {
    $years = [];

    $current_year = new DateTime();
    $current_year_number = intval($current_year->format("Y"));
    $previous_year = clone $current_year;
    $previous_year -> modify('-1 year');
    $years[] = intval($previous_year -> format('Y'));
    $years[] = $current_year_number;
    $next_year = clone $current_year;
    $next_year -> modify('+1 year');
    $years[] = intval($next_year -> format('Y'));
    return $years;
}


/**
 * Creates a list of months by name using a DateTime object and a for loop.
 * @return array An array of strings
 */
function get_months(): array {
    $months = [];
    
    $date = new DateTime('first day of January');
    for ($i = 0; $i < MAX_MONTHS; $i++) {
        $month_names = $date->format('F');
        $months[] = $month_names;
        $date->modify('+1 month');
    }

    return $months;
}

/**
 * Determines the amount of days in a given month using DateTime format
 * @return int The number of days as a whole integer
 */
function days_in_month(string $month, string $year): int 
{
    $year = intval($year);
    $date = new DateTime("$year-$month-".STARTING_DAY);
    $days_in_month = $date->format("t");

    return intval($days_in_month);
}


/**
 * Determines if there are any appointments in a month by converting the month and years
 * into a DateTime format, then passing the days starting at 1 into that format and calling
 * the get_dates method, if get_dates is true add an appointment to the the day it is true on.
 * @return array An array of appointments with their day being the key, and appointments being the value.
 */
function get_appointments_for_month(string $years, string $month): array 
{
    $days = days_in_month($month, $years);
    $appointments = [];

    $month_num = DateTime::createFromFormat('F', $month);
    $month_num = $month_num->format('n');

    for ($day = 1; $day <= $days; $day++) 
    {
        $date = "$years-$month_num-$day";
        $daily_appointments = get_dates($date);
        $appointments[$day] = $daily_appointments;
    }

    return $appointments;
}