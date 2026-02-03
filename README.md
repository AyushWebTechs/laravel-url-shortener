# URL Shortener – Laravel 10 Backend Assignment

This project is a role-based URL Shortener application built using **Laravel 10**.
The application demonstrates authentication, authorization, and role-based
data visibility.

---

## Dependencies

Ensure the following are installed on your system:

- PHP **8.1 or higher**
- Composer
- MySQL
- Git

Verify installations:
```bash
php -v
composer -V
mysql --version
```

---

## Local Setup

### 1. Clone the repository
```bash
git clone https://github.com/AyushWebTechs/laravel-url-shortener.git
cd laravel-url-shortener
```

---

### 2. Install dependencies
```bash
composer install
```

---

### 3. Create environment file
```bash
cp .env.example .env
```

---

### 4. Configure database

Edit `.env` and update your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=url_shortener
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Generate application key
```bash
php artisan key:generate
```

---

### 6. Run migrations and seeders

This will create all tables and seed required test data:
```bash
php artisan migrate:fresh --seed
```

---

### 7. Start the application
```bash
php artisan serve
```

Open in browser:
```
http://127.0.0.1:8000
```

---

## How to Test

### Login Credentials

Use the following seeded users for testing:

**SuperAdmin**
- Email: superadmin@gmail.com
- Password: password@1234

**Admin1**
- Email: admin1@company1.com
- Password: password

**Admin2**
- Email: admin2@company2.com
- Password: password

**Member1**
- Email: member1@company1.com
- Password: password

**Member2**
- Email: member2@company1.com
- Password: password

---

### Test Scenarios

**SuperAdmin**
- Can invite Admin and create a new company
- Can view all short URLs across all companies
- Cannot create short URLs

**Admin**
- Can invite Admin or Member within own company
- Can create short URLs
- Can view only short URLs belonging to own company

**Member**
- Can create short URLs
- Can view only short URLs created by themselves
- Cannot invite users

---

### AI Usage
- ChatGPT was used for syntax reference, Laravel commands, and understanding Eloquent relationships
- AI assistance was limited to debugging help and documentation-style guidance
- All core logic, role-based authorization, and application flow were implemented manually


### Notes
- Admin and Member users are seeded only for local testing
- The focus of this assignment is backend authorization logic

