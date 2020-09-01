# Deck of Card Test
Playing cards will be given out to n(number) people
Theme: Playing cards will be given out to n(number) people
Purpose: Total 52 cards containing 1-13 of each Spade(S), Heart(H), Diamond(D), Club(C) will be
given to n people randomly.

## Technology Used
- Laravel 7.5
- HTML/jQuery
- Bootstrap
- Window 10 Based

## Frontend and Backend Explaination Detail
Laravel Framework  is used as backend to simply the process and because of flexibility to enhance in the future.
HomeController@index - Alghorithm to distribute 52 cards to n (number) of player randomly
HomeController@card - Card type and numbers.

HTML and JQUERY are  used as frontend to handle the form and show the result.

## Virtual Enviroment:
 Homestead
- Vagrant This will allow us to use the Homestead box. Installation is a step-by-step process.
- Virtualbox This is the virtualisation software used with Vagrant. 

## Install Homestead directly into your project

```
git clone git@github.com:khairulx/deck-of-cards.git deck-of-cards

cd deck-of-cards

composer require laravel/homestead --dev

cp .env.example .env

php artisan key:generate

- Windows
vendor\\bin\\homestead make

- Mac / Linux
php vendor/bin/homestead make

```

After the Homestead file has been (optionally) configured, you can now spin up the Virtual Machine:

```
vagrant up

192.168.10.10 or homestead.test

```
Changes Homestead.yaml

```
vagrant reload --provision

```

## Contact
If you have any question to ask, please email me at [khairulhafizbramli@gmail.com](mailto:khairulhafizbramli@gmail.com). 

