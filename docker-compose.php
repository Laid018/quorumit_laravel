version: "3.8"

services:
  server:
    image: nginx:alpine
    restart: unless-stopped
    ports:
      - 81:80
    networks:
      - app-network
    volumes:
      - ./:/var/www
      - ./nginx/conf.d/:/etc/nginx/conf.d/

  db:
    image: mysql:5.7.33
    restart: unless-stopped
    env_file:
      - .env
    environment:
      MYSQL_DATABASE: $DB_DATABASE
      MYSQL_ROOT_PASSWORD: $DB_PASSWORD
    networks:
      - app-network
    volumes:
      - dbdata:/var/lib/mysql

  ### PHP 8.1 - Laravel - Siarhu v2 ############################################

  php81:
    container_name: "app"
    image: au6usto/php-fpm:8.1
    environment:
      - TZ=America/Argentina/Tucuman
    restart: unless-stopped
    # working_dir: /usr/share/nginx/html
    volumes:
      - ./:/var/www
    networks:
      - app-network

  app:
    build: .
    restart: unless-stopped
    networks:
      - app-network
    volumes:
      - ./:/var/www

  node:
    image: node:18-alpine
    working_dir: /var/www
    volumes:
      - ./:/var/www
      - /var/www/node_modules
    command: sh /var/www/node_start.sh
    depends_on:
      - app

networks:
  app-network:
    driver: bridge

volumes:
  dbdata: