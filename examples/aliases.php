<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();
$date = new DateTime();
$tomorrow = clone $date;
$tomorrow->modify('+1 day');
$result = $client->date()->tomorrow();

if($result)
{
    echo $tomorrow->format('Y-m-d') . ' is day off.' . PHP_EOL;
}
else
{
    echo $tomorrow->format('Y-m-d') . ' working day.' . PHP_EOL;
}

$result = $client->date()->today();
if($result)
{
    echo $date->format('Y-m-d') . ' is day off.' . PHP_EOL;
}
else
{
    echo $date->format('Y-m-d') . ' working day.' . PHP_EOL;
}