FROM php:8.1-fpm-bullseye AS base
EXPOSE 5173

ARG USERNAME=developer
ARG GROUPNAME=developer
ARG UID=1000
ARG GID=1000
RUN groupadd -g $GID $GROUPNAME && \
    useradd -m -s /bin/bash -u $UID -g $GID $USERNAME
WORKDIR /workspace

# timezone environment
ENV TZ=UTC \
  # locale
  LANG=en_US.UTF-8 \
  LANGUAGE=en_US:en \
  LC_ALL=en_US.UTF-8 \
  # composer environment
  COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer \
  NPM_VERSION=9.6.1 \
  NODE_VERSION=16.14.0

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

RUN apt-get update \
  && apt-get -y install --no-install-recommends \
    locales \
    git \
    vim \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* \
  && locale-gen en_US.UTF-8 \
  && localedef -f UTF-8 -i en_US en_US.UTF-8 \
  && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    bcmath \
  && composer config -g process-timeout 3600 \
  && composer config -g repos.packagist composer https://packagist.org \
  && composer require laravel/ui

RUN apt update \
  && apt install -y nodejs npm \
  && npm install -g n \
  && n stable \
  && apt purge -y nodejs npm
ENV N_PREFIX=/usr/local PATH=$PATH:/usr/local/bin
RUN npm install -g npm@${NPM_VERSION} \
  && npm i @vitejs/plugin-vue

FROM base AS development

COPY ./infra/docker/php/php.development.ini /usr/local/etc/php/php.ini

FROM development AS development-xdebug

RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

COPY ./infra/docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

FROM base AS deploy

COPY ./infra/docker/php/php.deploy.ini /usr/local/etc/php/php.ini
COPY ./src /workspace

RUN composer install -q -n --no-ansi --no-dev --no-scripts --no-progress --prefer-dist \
  && chmod -R 777 storage bootstrap/cache \
  && php artisan optimize:clear \
  && php artisan optimize \
  && php aritisan ui vue