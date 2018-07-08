## Laravel request 

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Requirements

- [Vagrant >= 2.1.1](https://www.vagrantup.com/downloads.html)
- [VirtualBox >= 5.2](https://www.virtualbox.org/wiki/Downloads)
- [NodeJS](https://nodejs.org)
- [Composer (PHP >= 7.2)](https://getcomposer.org/)

## Installation

1) Clone repository, go to project path and install all dependencies by running
```shell
composer update
```
2) Create env file 
```shell
cp .env.example .env
```

3) Make Homestead config files

Using Windows
```shell
vendor\\bin\\homestead make
```

Using Linux \ MacOS
```shell
php vendor/bin/homestead make
```

4) Next run vagrant by
```shell
vagrant up
```
if you get error on step
```shell
Configuring and enabling network interfaces...
```
run this commands
```shell
vagrant ssh
cd code 
sudo apt-get install ifupdown
```

5) Log into vagrant ssh and go to project path by running
```shell
vagrant ssh
cd code
```

6) Make DB migrations and seeds and exit vagrant ssh
```shell
php artisan migrate
php artisan db:seed
exit
```

7) Build the client side by running
```shell
npm install
npm run dev
```

8) Generate application key
```shell
php artisan key:generate
```

9) Add this line to your hosts file
```shell
192.168.10.10 homestead.test
```

10) Finally open http://homestead.test in your browser


