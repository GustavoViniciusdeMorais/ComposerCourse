# Composer

```

docker-compose up -d --build

docker exec -it composercourse_php_1 sh

composer init

composer install

composer require --dev phpunit/phpunit

composer require monolog/monolog

# After creating the psr-4 at the composer.json
# when you run composer dump-autoload the src maps goes to
# ./vendor/composer/autoload_psr4.php

composer dump-autoload

chmod +x composer.sh
./composer.sh

composer require squizlabs/php_codesniffer

vendor/bin/phpcs --standard=PSR2 src/Controllers/MainController.php # show file errors

vendor/bin/phpcbf --standard=PSR2 src/Controllers/MainController.php # fix file errors

```