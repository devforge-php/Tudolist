# 📌 To-Do List API

<<<<<<< HEAD
![To-Do List Banner](https://static.vecteezy.com/system/resources/thumbnails/020/811/037/small/time-schedule-and-business-management-concept-businessman-planning-work-tasks-and-making-schedule-using-calendar-illustration-free-vector.jpg)  
=======
![To-Do List Banner](https://images.unsplash.com/photo-1523474253046-8cd2748b5fd2)  
>>>>>>> 7f3c8d5 (tudolist)

To-Do List API Laravel orqali qurilgan. Ushbu API yordamida foydalanuvchilar o'z vazifalarini yaratish, tahrirlash va o'chirishlari mumkin. API `Sanctum` orqali autentifikatsiya qilingan.

## 🚀 API Route'lar

### 🛡 Auth
| Route       | Method | Description  |
|------------|--------|--------------|
| `/register` | POST  | Ro'yxatdan o'tish |
| `/verify` | POST  | Email tasdiqlash |
| `/login` | POST  | Tizimga kirish |
| `/logout` | POST | Tizimdan chiqish (Auth required) |

### 📝 To-Do List
| Route        | Method  | Description |
|-------------|---------|--------------|
| `/search` | GET  | Vazifalarni qidirish (Auth required) |
| `/category` | GET/POST/PUT/DELETE  | Kategoriyalarni boshqarish (Auth required) |
| `/tudolist` | GET/POST/PUT/DELETE | To-Do listni boshqarish (Auth required) |

## 🔧 Texnologiyalar
- PHP 8+
- Laravel 10+
- Sanctum Authentication
- MySQL / PostgreSQL

## 📦 O'rnatish
```bash
git clone https://github.com/your-repo/todolist-api.git
cd todolist-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## 🛠 Muallif
👤 **Azizbek**

Ushbu API Laravel asosida qurilgan va ma'lumotlar bazasi sifatida **MySQL** dan foydalanadi. Qo'shimcha ma'lumotlar uchun bog'laning!

