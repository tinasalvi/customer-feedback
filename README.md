# Set up Project

GIT clone
Rename .evn.exmape to .env
Update .env file with proper data
php composer install -vvv

php artisan install:api
composer require laravel/ui
php artisan ui bootstrap --auth
npm install
npm run dev
php artisan migrate

composer require laravel/passport
php artisan migrate
php artisan passport:install
php artisan install:api --passport

php artisan passport:keys
php artisan passport:client --personal

php artisan cache:clear
php artisan config:clear
php artisan route:clear
