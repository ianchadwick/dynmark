## Dynmark PHP API

Dynmark are leading providers of SMS and SMS intelligence services allowing you to make your SMS messaging smart.

This package allows you to send text messages using their API.[See website](http://www.dynmark.com/)

## Requirements 

PHP 5.4+

## Installation using Composer

Add ianchadwick/dynmark to the require part of your composer.json file

```
"require": {
  "ianchadwick/dynmark": "1.0.*"
}
```

Then update your project with composer

```
composer update
```

## Basic Usage

```
use Dynmark\Dynmark;
use Dynmark\Commands\Sms\Send;

class MyClass {
  public function sendSms()
  {
    // init the Dynmark helper
    $dynmark = new Dynmark('myusername', 'mypassword');
    
    // create the command with the basic text details
    $command = new Send('0770000000', 'Dynmark', 'Hello there!');
    
    // send the text
    $response = $dynmark->fire($command);
  }
}
```