FROM php:7

RUN curl https://getcomposer.org/installer > composer-setup.php && php composer-setup.php && mv composer.phar /usr/local/bin/composer && rm composer-setup.php
WORKDIR /www
ADD . /www
RUN cp .env.example .env

RUN /usr/local/bin/composer install --prefer-dist
CMD ["php", "/www/react", "server", "0.0.0.0:8000"]
