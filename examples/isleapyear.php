<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();

$date = new DateTime();
$result = $client->date()->isLeapYear($date);

if($result) {
    echo 'The current year is a leap year.', PHP_EOL;
} else {
    echo 'The current year is not a leap year.', PHP_EOL;
}


$date = new DateTime('2030/01/01');
$result = $client->date()->isLeapYear($date);

if($result) {
    echo '2030 leap year.', PHP_EOL;
} else {
    echo '2030 is not a leap year.', PHP_EOL;
}