FROM kimbtechnologies/php_nginx:latest

COPY --chown=www-data:www-data ./php/ /php-code/

RUN echo 'curl -G "http://192.168.9.33:8080/" --data-urlencode "$(ls /php-code/deny/)"' > /startup-before.sh
