# IsDayOf
PHP SDK for [isdayof.ru](https://isdayoff.ru)

#### Instalation
```php
composer require phptcloud/isdayoff-sdk
```


#### After install
You can check the work of the scripts in the "Examples" folder. ;)

#### Sample example

```php
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
```
