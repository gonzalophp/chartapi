FROM php:7.2

RUN apt-get update && apt-get install -y procps less vim zip apache2

RUN docker-php-ext-install pdo pdo_mysql

RUN mkdir -p /home/sites/chartapi
WORKDIR /home/sites/chartapi
COPY ./ .

RUN mkdir composer
RUN curl -o composer/composer-setup.php https://getcomposer.org/installer && \
 	php composer/composer-setup.php --install-dir=/bin --filename=composer && \
 	composer install
