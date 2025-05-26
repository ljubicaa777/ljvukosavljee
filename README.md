git clone https://github.com/ljubicaa777/ljvukosavljee.git
cd ljvukosavljee

composer install
npm install
cp .env.example .env
php artisan migrate
php artisan key:generate
php artisan db:seed
php artisan serve
composer run dev
