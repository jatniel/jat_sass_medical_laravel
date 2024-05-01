deploy:
	ssh o2switch "cd /home/username/public_html/ && git pull origin main && make install"

#install
install: vendor/autoload.php .env public/storage public/build/manifest.json
	php artisan cache:clear
	php artisan migrate

# .env verifications
.env:
    cp .env.example .env
    php artisan key:generate

# Public Storage
public/storage:
	php artisan storage:link

#Composer
vendor/autoload.php: composer.lock
	composer install
	touch vendor/autoload.php

# npm
public/build/manifes.json: package.json
	npm install
	npm run build
