# Sample app showing how events can be used in Laravel 6.*
## How to use
```Bash
git clone git@github.com:xelber/laravel-events.git laravel-events
cd laravel-events
cp .env.example .env
# Update .env file as needed
composer install
npm install
npm run dev
```
## Configuration
Please update the following in your .env for the mail to work  
MAIL_DRIVER=smtp . 
MAIL_HOST=smtp.mailtrap.io . 
MAIL_PORT=2525 . 
MAIL_USERNAME=[YOUR MAILTRAP USER NAME] . 
MAIL_PASSWORD=[YOUR MAILTRAP PASSWORD] . 
MAIL_FROM_ADDRESS=support@foodbyus.com . 
MAIL_FROM_NAME=Support . 
MAIL_ENCRYPTION=null . 
