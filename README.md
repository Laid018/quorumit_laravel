# Requirements 
* Port **80** and **3006** free. That is, you cannot have another webserver up at the time of initializing the installation. (If necessary, it can be changed in ``docker-compose.yml`` to the desired port mapping).
* Download any docker from the previous version installed with ``docker compose down``, inside the project folder.

# Docker installation 
1. Docker Desktop
    * [Instalación Ubuntu](https://docs.docker.com/engine/install/ubuntu/)
    * [Instalación Fedora](https://docs.docker.com/engine/install/fedora/)
    * [Instalación Docker Desktop Windows](https://docs.docker.com/desktop/windows/install/)
2. Docker Compose
    * [Instalación General](https://docs.docker.com/compose/install/)

# Installing the app
```bash
git clone git@github.com:Laid018/quorumite_laravel.git
cd quorumite_laravel
```
```bash
composer install
```

# Use with docker
Enter the terminal and run ``docker-compose up -d --build``, to run the application with docker.

Run Laravel with docker:
```bash
docker-compose up -d --build
```

In case of connection failure, re-execute command ``docker-compose up -d --build``

Run Laravel migrations:
```bash
docker exec -it app php artisan migrate:fresh --seed
```
Run npm install:
```bash
docker exec -it app npm install
```
Run npm run build:
```bash
docker exec -it app npm run build
```
Run npm run dev:
```bash
docker exec -it app npm run dev
```

It is only necessary to enter the project folder and run ``docker compose up -d`` to raise the services. And the services are downloaded with ``docker compose down``.

# Use locally
Enter the terminal and execute the following commands to run the application without problems.
```bash 
composer install
```
```bash
npm install
```

For the database you must create the database in mysql.
Database name: ``quorumitdb_laravel``
Once the database is created, run the migrations
``php artisan migrate --seed``

To run the app run
```bash 
php artisan serve
```
```bash
npm run dev
```

# URLs to enter:

* APP [http://localhost:8000/](http://localhost:8000/)

* Verify that the browser has not changed the HTTP protocol to HTTPS (If so, it must be disabled in the browser settings so that it does not do so)

# Data Database
host: **127.0.0.1**

db: **quorumitdb_laravel**

user: **root**

pass: **admin**

Run Laravel migrations:
```bash
docker exec -it app php artisan migrate:fresh --seed
```

Show containers running:
```bash
docker compose ps
```

to compile **assets** vite.js:
```bash
docker exec -it app npm run build
```

to run locally **assets** vite.js:
```bash
docker exec -it app npm run dev
```