# TripPlanner

Given a stack of boarding cards for various transportations that will take you from a point A to point B via several stops on the way. All of the boarding cards are out of order and don't know where your journey starts, nor where it ends. So TripPlanner sort those trips.

##Setup
To setup one need to have `composer` and run `composer install`. Composer is only being used for auto-loading purpose and installing one dependency that is `phpspec`.

Also run `composer dump-autoload`.

##Usage

###Card Format
Card will be available as Associative Array, following is a sample format:
```php
[
    'from' => 'Barcelona',
    'to' => 'Gerona Airport',
    'transport' => [
        'medium' => 'AirportBus',
        'seat' => 'No seat assignment'
    ]
]
```


##Running Tests
`phpspec run`
