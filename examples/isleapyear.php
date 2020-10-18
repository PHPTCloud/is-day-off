<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();

$date = new DateTime();
$result = $client->date()->isLeapYear($date);

if($result)
{
    echo 'Текущий год високосный.';
}
else
{
    echo 'Текущий год не високосный.';
}

/**
 * next date
 */

$date = new DateTime('2030/01/01');
$result = $client->date()->isLeapYear($date);

if($result)
{
    echo '2030 високосный год.';
}
else
{
    echo '2030 не високосный год.';
}