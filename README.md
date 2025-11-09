📚 Home Library Management System
Laravel MVC Web Application

A clean, modern library management web app built with Laravel, designed for the S4 module exercise.
It enables efficient management of a home or institutional library through a simple interface — including cataloguing, borrowing, and user management.

📄 Description

This project demonstrates:

-   Object-oriented PHP using the Laravel framework
-   MVC architecture and Blade templating
-   Database relationships and migrations
-   RESTful routing and CRUD operations

Users can:

-   Add, edit, and delete books
-   Register borrowings and returns
-   Manage members and administrators
-   View summaries and reports

💻 Technologies Used
Category Tools
Backend: PHP ≥ 8.1, Laravel 10
Database: SQLite (default), MySQL (optional)
Frontend: Blade, Tailwind CSS, HTML
Package & Build Tools: Composer, npm (optional for assets)
Dev Utilities: Artisan CLI, Git & GitHub

📋 Requirements

Before starting, ensure you have:
PHP ≥ 8.1
Composer ≥ 2.0
SQLite (included with PHP — no setup required)
Node.js & npm (optional, for building frontend assets)
Git (for cloning the repository)

🛠️ Installation
⚙️ 1. Clone and install dependencies
git clone https://github.com/ascargo/LMS.git
cd LMS
composer install

🗝️ 2. Environment configuration
cp .env.example .env
php artisan key:generate

Ensure your .env contains:

APP_ENV=local
APP_DEBUG=true
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

🧱 3. Create the SQLite database
mkdir -p database
touch database/database.sqlite

🧪 4. Run migrations and seeders
php artisan migrate:fresh --seed

Expected result:
INFO Running migrations.
Database seeding completed successfully.

5. (Optional) Install frontend dependencies
   npm install && npm run dev

▶️ Execution

Start the local development server:

php artisan serve

Visit: http://127.0.0.1:8000

Default login credentials:

Email: test@example.com
Password: password

From the dashboard you can manage:

-   📚 Books
-   👥 Members
-   📅 Borrowings and Returns
-   ⚙️ Administrative tasks

🌐 Deployment (Production)

Upload the project to your web server (e.g., /var/www/html/lms).

Run:

composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

Set correct permissions:

chmod -R 775 storage bootstrap/cache

Point your web server to the /public directory.

Access via https://yourdomain.com

🤝 Contributions

Contributions are welcome!
Follow the Gitflow
workflow:

git checkout -b feature/my-new-feature

# make changes

git commit -m "feat: add my new feature"
git push origin feature/my-new-feature

Then open a Pull Request on GitHub with a clear description.
