# Laravel + Vue + Inertia Project

## 📌 Project Description

This project is built using **Laravel** with **Laravel Breeze (Vue + Inertia)**.  
Authentication is handled by Breeze, access control is managed using **Spatie Permissions**, and the development environment is powered by **Laravel Sail (Docker + MySQL)**.

---

## 🛠 Tech Stack:

-   **Laravel** – PHP framework
-   **Laravel Breeze (Vue + Inertia)** – Authentication and Vue components
-   **Laravel Sail** – Containerized environment (Docker + MySQL)
-   **Spatie Permissions** – Role and permission management

---

## 🚀 Project Setup

### 1️⃣ Install Dependencies

```bash
git clone https://github.com/YOUR-REPOSITORY.git
cd YOUR-REPOSITORY
composer install
npm install
```

### 2️⃣ Create the `.env` File

```bash
cp .env.example .env
```

-   In the `.env` file, update the database credentials if necessary.

### 3️⃣ Generate Application Key

```bash
php artisan key:generate
```

### 4️⃣ Start the Development Server

If using Laravel Sail (Docker):

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate --seed
```

Otherwise:

```bash
php artisan migrate --seed
php artisan serve
npm run dev
```

---

## 🔐 Authentication & Permissions

-   Laravel Breeze provides authentication with Vue + Inertia.
-   Spatie Permissions is used for role-based access control.

---

## 📌 Available Commands

### Run Migrations

```bash
php artisan migrate
```

### Seed the Database

```bash
php artisan db:seed
```



### Start the Development Server

```bash
php artisan serve
npm run dev
```


