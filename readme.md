# roof_storage
Laravel 5.8 model cloud storage. Basic file upload, download, delete, functions; equipped with recycle bin.

<h1><b>Requirements</b></h1>
SERVER: XAMPP
PHP: 7.1.17 or higher
Composer 1.6.5 or higher (1.8.3 used)

Laravel 5.8 model cloud storage. Basic upload, download, delete, functions; equipped with recycle bin.

<h1><b>Installation and Configuration</b></h1>
Download the zip and extract

Find file .env and create a database name according to the given in the file
Then set up the database in your terminal by migrating the tables and setting up the storage folder.

    php artisan migrate
    
    php artisan storage:link

Create a mailtrap.io account and change the mailtrap credentials in the .env file to yours

Type the command php artisan serve in your terminal.
E.g.
C:\xampp\htdocs\roof>php artisan serve

It will then be hosted locally on your system, and you can type the given url in your browser.


<h1><b>Built With</b></h1>
OS Used: Windows 10
PHP Framework: Laravel 5.8

<h1><b>Acknowledgements</b></h1>
Flaticon

<h1><b>Extra</b></h1>
The icons of the files may be changed by downloading the desired icon to the public folder and naming it after the extension it is meant for.




