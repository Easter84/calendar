<?php
declare(strict_types=1);

// SELECT title, description, category
// FROM appointments
// WHERE appointment_date = '2025-01-25';

const GET_DATE_PARAM = ':date';

// This is the constat query for retreiving an appointment formteh DB
const SEARCH_DATE =
    'SELECT title, description, category FROM appointments WHERE appointment_date = :date';

/**
 * Calls the execute_query method to run the SEARCH_DATE query, and returns any 
 * values found in the selected day.
 * @return array An array of records for a given date. titel, description and category.
 */
function get_dates(string $date): array {
    return execute_query(SEARCH_DATE, [GET_DATE_PARAM => $date]);
}
