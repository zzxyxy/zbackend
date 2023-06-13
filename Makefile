all:
	php -S 0.0.0.0:8080 .\index.php
test:
	php ./vendor/bin/phpunit --testdox tests
