FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
     --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# COPY --from=node:latest /usr/local/lib/node_modules /usr/local/lib/node_modules
# COPY --from=node:latest /usr/local/bin/node /usr/local/bin/node
# RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm

WORKDIR /var/www/html
COPY . /var/www/html

RUN composer install --ignore-platform-req=ext-zip

#Installing node 16.x
RUN curl -sL https://deb.nodesource.com/setup_16.x| bash -
# RUN apt-get install -y nodejs npm
# RUN apt-get update && apt-get install -y nodejs npm
RUN apt-get update && apt-get install -y npm

RUN npm install

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000