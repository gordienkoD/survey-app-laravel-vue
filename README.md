# Laravel + Vue + Inertia Project

## 📌 Project Description

This project is built using **Laravel** with **Laravel Breeze (Vue + Inertia)**.
Authentication is handled by Breeze, **Google authentication is integrated via Laravel Socialite**, and access control is managed using **Spatie Permissions**.
The development environment is powered by **Laravel Sail (Docker + MySQL)**.

---

## 🛠 Tech Stack:

-   **Laravel** – PHP framework
-   **Laravel Breeze (Vue + Inertia)** – Authentication and Vue components
-   **Laravel Socialite** – OAuth authentication (Google)
-   **Laravel Sail** – Containerized environment (Docker + MySQL)
-   **Spatie Permissions** – Role and permission management

---

## 🚀 Project Setup

### 1️⃣ Install Dependencies

```bash
git clone https://github.com/gordienkoD/survey-app-laravel-vue.git
cd survey-app-laravel-vue
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
-   Google Authentication is implemented using Laravel Socialite.

---

## 5️⃣ Configure Google OAuth Credentials

-   Go to Google Cloud Console and create a new project.
-   Enable OAuth consent screen (choose "External" if you're testing).
-   Go to Credentials → Create Credentials → OAuth Client ID.
-   Select "Web application" and set the following:
-   Authorized redirect URIs:

### Generate sail share URL

```bash
    ./vendor/bin/sail share
```

-   After creation, you'll receive Client ID and Client Secret.
-   Open .env and add:

```
GOOGLE_CLIENT_ID=your-google-client-id
GOOGLE_CLIENT_SECRET=your-google-client-secret
GOOGLE_REDIRECT_URI=http://sail-share-generate-URL/auth/google/callback
```

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
