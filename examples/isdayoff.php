<?php

require_once __DIR__ . '/../vendor/autoload.php';

use isDayOff\Client\IsDayOff;

$client = new IsDayOff();

$date = new DateTime('now');
$result = $client->date()->isDayOff($date);

if($result)
{
    echo 'Выходной.';
}
else
{
    echo 'Рабочий день.';
}