# TripPlanner

Given a stack of boarding cards for various transportations that will take you from a point A to point B via several stops on the way. All of the boarding cards are out of order and don't know where your journey starts, nor where it ends. So TripPlanner sort those trips.

## Setup
To setup one need to have `composer` and run `composer install`. Composer is only being used for auto-loading purpose and installing one dependency that is `phpspec`.

Also run `composer dump-autoload`.

## Usage

### Card Format
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

Transport can have more or different attributes depends on medium. Here medium specifies different transport types.

### API Usage

You can get Trip Description in sorted order using following code, please note that `usage.php` is example of this API's usage.

```php
$trip = new Trip;
$sortedCards = $trip->sortCards($cards);

$cardManager = new CardManager;
$tripDescription = $trip->getTripDescriptionFromCards($cardManager, $sortedCards);
```
Here `$cards` contains array of unsorted cards.

## Adding more Transport Types

Any type of Transport implementation must implement `Transport` interface and provide implementation for:

`public function getBoardingCardInfo($card);`

and this method should return boarding card info.

In order to adding more transport types, you will also need to add more or different attributes in card's `transport` associative array. And `medium` property in transport associative array must have same name as new Transport Class name.


##Tests
We are using `phpspec` for testing purpose which was installed with composer. To run tests use following command:
`vendor/bin/phpspec run`
 and it will run all tests in specs directory. As tests are unit tests so dependencies are mocked.

##Further More
Other than that code can be found in `src` directory and Tests can be found in `spec` directory.
