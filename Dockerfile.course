FROM php:7.4-apache
COPY . .
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli

RUN chown nobody /var/www/html/uploads
RUN chmod -R 777 ./

ENV TZ Asia/Colombo