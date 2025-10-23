# Laravel 12 + React Authentication (Backend Setup)

This project is a **Laravel 12 API backend** built for a React frontend application.  
It provides secure user authentication including **login, registration, logout, and user info** using **Laravel Breeze (API)** and **Laravel Sanctum**.

---

## 🚀 Features

- Laravel 12 (latest version)
- RESTful API structure
- User Registration & Login
- Token-based Authentication (Sanctum)
- Logout & Get Authenticated User
- API Ready for React frontend
- CORS configured for frontend communication

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Authentication:** Laravel Breeze (API), Sanctum
- **Database:** MySQL
- **Frontend:** React (to be integrated later)

---

## ⚙️ Installation Steps

### 1️⃣ Clone Repository
```bash
git clone https://github.com/your-username/myapp.git
cd myapp
```

### 2️⃣ Install Dependencies
```bash
composer install
```

### 3️⃣ Configure Environment
Copy the .env file and set your database credentials:
```bash
cp .env.example .env
```
Update .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myapp_db
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

## 🔒 Sanctum & CORS Configuration
Edit config/cors.php:
```bash
'paths' => ['api/*', 'sanctum/csrf-cookie'],
'allowed_methods' => ['*'],
'allowed_origins' => ['http://localhost:5173'], // React dev server
```

## ▶️ Run the Application
```bash
php artisan serve
```
