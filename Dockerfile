FROM kimbtechnologies/php_nginx:latest


COPY --chown=www-data:www-data ./php/ /php-code/