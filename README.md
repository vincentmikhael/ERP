# ERP System

This is a web-based ERP system built using Laravel. The application is designed to streamline and integrate various business operations, including inventory management, etc.

## Installation Guide

To set up the ERP system on your local environment, first, clone the repository using the command `git clone https://github.com/your-username/erp-system.git`. Navigate into the project folder using `cd erp-system` and install all necessary dependencies by running `composer install` or `composer update`.

Next, create a `.env` file in the project root by copying the existing `.env.example` file. You can do this using the command `cp .env.example .env`. Open the `.env` file and configure your database connection by setting the following values:

After configuring the database, import the provided `erp_database.sql` file into your MySQL database. To do this, open phpMyAdmin in your browser, create or select a database named `erp`, click the **Import** tab, and upload the `erp_database.sql` file. Once the import is complete, the database structure and initial data will be ready.

Finally, generate the application key using the command `php artisan key:generate`. To start the development server, run `php artisan serve` and open the application in your browser at the displayed URL. Your ERP system should now be up and running.
