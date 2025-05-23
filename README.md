# 📚 Bookstore Web Application (Laravel 10 + PHP 8.1)

This is a Laravel 10 application studycase for a bookstore owned by John Doe. The application helps manage books, authors, and ratings to identify the most popular books and authors.

![Laravel](https://img.shields.io/badge/Laravel-10-red)
![PHP](https://img.shields.io/badge/PHP-8.1-blue)
![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)

---

## 🚀 Features

* 🔍 **List of Books with Filter**: Search by book or author name and limit the number of records shown.
* 🏆 **Top 10 Most Famous Authors**: Based on the total number of ratings.
* ⭐ **Rating Input**: Allows customers to rate books from 1 to 10.

---

## 🧰 Tech Stack

* Laravel 10
* PHP 8.1
* MySQL
* Blade (View templates)

---

## 📦 Requirements

Ensure you have the following installed:

* PHP >= 8.1
* Composer
* MySQL or compatible database
* Git

---

## ⚙️ Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/mynameisalvn/books-review-apps.git
cd books-review-apps
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Setup Environment Configuration

```bash
cp .env.example .env
```

Edit the `.env` file:

```
APP_NAME=BooksReviewApps
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

QUEUE_CONNECTION=sync
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Seed the Database

```bash
php artisan db:seed
```
```bash
// Optional : See the state of seeding process
php artisan db:seed -vvv
```

> ⚠️ Seeding this amount of data may take several minutes.

### 6. Serve the Application

```bash
php artisan serve
```

🔗 Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 🌐 Available Pages

| URL            | Description                |
| -------------- | -------------------------- |
| `/`            | Book List with Filter      |
| `/authors/top` | Top 10 Most Famous Authors |
| `/rating`      | Submit a Rating            |

---


## 🤝 Contributing

```bash
git checkout -b feature/your-feature-name
git add .
git commit -m "Add your feature"
git push origin feature/your-feature-name
```

Then submit a pull request.

---

## 📚 Resources

* [Laravel 10 Documentation](https://laravel.com/docs/10.x)

---

## 📝 License

This project is open-source and available under the [MIT license](LICENSE).




