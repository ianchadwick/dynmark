## Dynmark PHP API

Dynmark are leading providers of SMS and SMS intelligence services allowing you to make your SMS messaging smart.

This package allows you to send text messages using their API.[See website](http://www.dynmark.com/)

## Requirements 

PHP 5.4+

## Installation using Composer

Add ianchadwick/dynmark to the require part of your composer.json file

```
"require": {
  "ianchadwick/dynmark": "dev-master"
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
    
    // create the command
    $command = new Send($dynmark);

    // set the text details
    $command->setFrom('Ian')
        ->setPhone('0770000000')
        ->setText('Hello there!');
    
    // send the text
    $response = $command->fire();
  }
}
```