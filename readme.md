# Sample app showing how events can be used in Laravel 6.*
## How to use
```Bash
git clone git@github.com:xelber/laravel-events.git laravel-events
cd laravel-events
cp .env.example .env
# Update .env file as needed, (update DB credentials)
composer install
npm install
npm run dev
php artisan migrate
```
Please setup a vhost or artisan serve to test the deployment.

## Configuration
Please update the following in your .env for the mail to work(mailtrap)  
```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=d8dc74376326ce
MAIL_PASSWORD=c5c2f6231706a2
MAIL_FROM_ADDRESS=support@foodbyus.com
MAIL_FROM_NAME=Support
MAIL_ENCRYPTION=null
```
Update the following for the queue to take effect
```
QUEUE_CONNECTION=database
```

## Testing
Please create a user to test the area protected by is_admin flag. /admin url is only accessible by users with is_admin set to 1. You can do so by going in to /register and creating a user. Create two user with Is Admin checked and unchecked.
```
php artisan user:regexpired 1
```
Will send UserRegExpired event
```
php artisan queue:work
```
Will activate the worker.  
NotifyUserExpiredReg::handle is set to use Laravel Notification API to send an email
