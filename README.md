# HEXAGONAL PET STORE

Sr. Web Developer (Mr. Nguyen Tri)
* This project uses Laravel - The PHP Framework For Web Artisans

![Alt text](https://i.ibb.co/y5yFrc9/Screen-Shot-2019-08-26-at-11-26-40-PM.png?raw=true "Title")


## Installation PHP and Composer ( for Windown ) 

* https://devanswers.co/install-composer-php-windows-10/

## Installation ( for Mac) 

* https://www.thoughtco.com/how-to-install-php-on-a-mac-2694012
* https://duvien.com/blog/installing-composer-mac-osx

## Install Library and Testing before running

```
1. composer install
2. php artisan config:cache
3. composer dump-autoload
4. php ./vendor/phpunit/phpunit/phpunit
5. php artisan serve --port 8000
```

## Uses case

* The owner would like the system to give him a list of pets that should be in the showroom. Pets that have an option on them don’t need to be shown to customers. 

* Buy new pets ( Auto check spaces for the pet before buy ). If spaces are full, you will get the error messages to notice for you what is the space for the pet that still available. 
```
The formula for calculating free space for pets must satisfy the following conditions
1. Some pets will go to a veterinarian to implant the chip that will come back next week (in case no customers choose to buy)
2. Some animals will come back if there are warranty and customers change their mind 
3. At night, the pets will be back to Backyard
```

* Occupancy report, the pet shop owner would like to know how many cats, dogs, birds he should be buying. Keep in mind that the owner has to keep space for any possible pet returns (insurance).

## Database
* I have used JSON file for store the data and query too, you can find it in storage/app/json/data.json

## Domain Layer
* If I want to use my domain to another application, I simply copy the Domain directory because that does not rely on any libraries or frameworks

## Links Ref

* https://medium.com/azimolabs/ports-and-adapters-implementation-in-php-with-a-little-symfony-help-6d4fdbe830ba
* https://blog.ndepend.com/hexagonal-architecture/
* https://barryvanveen.nl/blog/49-what-is-a-command-bus-and-why-should-you-use-it
