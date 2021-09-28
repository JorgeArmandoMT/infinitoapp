# InfinitoApp 👾
### Web aplication for Infinito Computación

This web application controls the tasks assigned in a work group, incorporates a help desk where customers report problems and are followed up.

## Technologies 💻
- Laravel 6*
    - Migrations (Create DB)
    - Seeders (Insert to DB)
    - Auth (Laravel/ui)
- Bootstrap 4*
- JavaScript
    - JQuery

## Dependencies 🏗️
- Carbon (DateTime)

## Requirements 📋
- Apache2
- MySQL
- Composer
- Git

## Setup 🚀

### Step 1
Download the project

### Step 2
Open the project path in the terminal

### Step 3
Update dependeces with
```
composer update
```

### Step 4
Copy development file
````
cp .env.example .env
````

### Step 5
Generate key to hashing
```
php artisan key:generate
```

### Step 6
Modify file .env with your credentials mysql

### Step 7
Run migration and seeders with
````
php artisan migrate --seed
````

### Step 8
````
php artisan serve
````

### Step 9
Log in  with this credentials

#### option 1 (Admin)
````
email: admin@infinito.com
password: Admin123
````

#### option 2 (Employee)
````
email: employee@infinito.com
password: Employee123
````

#### option 3 (Client)
````
email: client@infinito.com
password: Client123
````

## Follow me 👨‍💻
Follow me for more projects and photos let's gooooo
* [github/moisesarrona](https://github.com/MoisesArrona/)
* [instagram/moisesarrona](https://www.instagram.com/moisesarrona/) 