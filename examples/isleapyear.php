<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();

$date = new DateTime();
$result = $client->date()->isLeapYear($date);

if($result)
{
    echo 'The current year is a leap year.';
}
else
{
    echo 'The current year is not a leap year.';
}

/**
 * next date
 */

$date = new DateTime('2030/01/01');
$result = $client->date()->isLeapYear($date);

if($result)
{
    echo '2030 leap year.';
}
else
{
    echo '2030 is not a leap year.';
}