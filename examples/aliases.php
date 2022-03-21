<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();

// Tomorrow example 
$tomorrowDate = new DateTime();
$tomorrowDate->modify('+1 day');
$result = $client->date()->tomorrow();

if($result) {
    echo $tomorrowDate->format('Y-m-d') . ' is day off.' . PHP_EOL;
} else {
    echo $tomorrowDate->format('Y-m-d') . ' working day.' . PHP_EOL;
}

// Today example 
$todayDate = new DateTime();
$result = $client->date()->today();

if($result) {
    echo $todayDate->format('Y-m-d') . ' is day off.' . PHP_EOL;
} else {
    echo $todayDate->format('Y-m-d') . ' working day.' . PHP_EOL;
}