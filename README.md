# 📚 Bribooks Laravel API (JWT + CRUD System)

A backend API built using **Laravel**, **MySQL**, and **JWT Authentication**.  
This project provides secure authentication and a complete CRUD system for managing books with search, pagination, and soft delete functionality.

---

## 🚀 Features

### 🔐 Authentication (JWT)
- User Registration
- User Login
- JWT Token Generation
- Protected Routes using Middleware
- Get Logged-in User Profile
- Logout (Token Invalidation)

### 📦 Books Module (CRUD)
- Add Book
- View All Books
- View Single Book
- Update Book
- Soft Delete Book (`_deleted = 1`)
- Search Books (title/author)
- Pagination Support

### ⚙️ Backend Features
- Laravel MVC Architecture
- RESTful API Design
- Input Validation
- Secure Password Hashing
- MySQL Database Integration
- JSON API Responses

---

## 🛠️ Tech Stack

- Laravel 10+
- PHP 8+
- MySQL
- JWT Auth (`tymon/jwt-auth`)
- Postman

---

## 📁 Project Structure

app/
├── Http/
│ ├── Controllers/
│ │ ├── AuthController.php
│ │ └── BookController.php
│ └── Middleware/
├── Models/
│ ├── User.php
│ └── Book.php

routes/
├── api.php

database/
├── migrations/

postman/
└── bribooks-api.postman_collection.json


---

## ⚙️ Installation Steps

### 1. Clone Repository
```bash
git clone https://github.com/your-username/bribooks-laravel-api.git
cd bribooks-laravel-api

### API Endpoints
Auth Routes
POST   /api/auth/register   -> Register user
POST   /api/auth/login      -> Login user
GET    /api/auth/profile    -> Get user profile (JWT required)
POST   /api/auth/logout     -> Logout user

Books Routes
POST   /api/books           -> Add book
GET    /api/books           -> List books (search + pagination)
GET    /api/books/{id}      -> Get single book
PUT    /api/books/{id}      -> Update book
DELETE /api/books/{id}      -> Soft delete book

Authorization: Bearer YOUR_JWT_TOKEN

/postman/bribooks-api.postman_collection.json

### Testing
1. Register User
2. Login User
3. Copy JWT Token
4. Set token in Postman Authorization
5. Test all Books APIs

## Author 
Sourav Chakraborty
