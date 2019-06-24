FROM php:7.2-cli
WORKDIR /Item
COPY . ../Item
RUN docker-php-ext-install mbstring pdo pdo_mysql
EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
