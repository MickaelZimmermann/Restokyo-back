# Welcome to project ResTokyo

You are now in the back office of the project, we will first show you what you need to do to run this project step by step

- Step 1 : You need to go to the deposit git, and do a `git clone git@github.com:O-clock-Boson/projet-restokyo-back.git`
  
- Step 2 : open your terminal and run `composer install`, `composer update` and `sudo composer self-update`

- Step 3 : create a file `.env.local` at the root of the project. inside you need to copy this : `DATABASE_URL="mysql://explorateur:Ereul9Aeng@127.0.0.1:3306/restokyo?serverVersion=mariadb-10.3.25"` 
  this will connect to the database on your machine. `explorateur` is your name, `Ereul9Aeng` your password and `restokyo` the name of the database

- Step 4 : Create database by runing : `bin/console doctrine:database:create`
  
- Step 5 : Your database is now create, but you don't have anything in there. Don't worry and run `bin/console make:migration` & `yes`
  
- Step 6 : `bin/console doctrine:migrations:migrate` & `yes`
  
- Step 7 : `bin/console doctrine:fixtures:load`