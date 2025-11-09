# Home Library Management System

📄 Description – Exercise Brief
This project is a Laravel MVC web application developed as part of the S4 module exercise.
It allows users to manage a library’s catalogue, borrowings, and members efficiently through a web interface.
The system includes features for adding, editing, and deleting books, managing user accounts, registering borrowings and returns, and viewing reports.
It is designed to practise object-oriented PHP, MVC architecture, Blade templating, database relationships, and RESTful routing.

💻 Technologies Used

PHP (Laravel Framework 10)
SQLite (lightweight relational database)
Blade (templating engine)
HTML & Tailwind CSS (frontend)
Composer (dependency management)
Artisan (Laravel CLI)
Git & GitHub (version control)

📋 Requirements
To run this project locally, you need:
PHP ≥ 8.1
Composer ≥ 2.0
SQLite (no server setup required — included with PHP)
Node.js & npm (for frontend assets, optional)
Apache or Nginx web server
Git (for cloning the repository)

🛠️ Installation (database-specific step)
After copying .env, make sure these lines are set:

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database/database.sqlite

If the database.sqlite file doesn’t exist, create it:
touch database/database.sqlite

Then continue with:
php artisan migrate --seed

(Optional) Install frontend dependencies:
npm install && npm run dev

▶️ Execution

Start the Laravel development server:
php artisan serve

Open your browser and go to:
http://localhost:8000

Log in with the following details:
user: test@example.com
password: password
to access the main dashboard. From there, you can manage:

📚 Books
👥 Users and Members
📅 Borrowings and Returns
⚙️ Admin Functions

🌐 Deployment
To deploy the app to a production environment:
Upload all project files to your server (e.g., /var/www/html/lms).
Run the following commands on the server:
composer install --optimize-autoloader --no-dev
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

Set correct permissions for storage and bootstrap/cache:
chmod -R 775 storage bootstrap/cache
Ensure your web server points to the /public directory of the project.
Access your app via your domain or IP address (e.g. https://yourdomain.com).

🤝 Contributions
Contributions are welcome! Please follow these steps:
Fork the repository.
Create a new branch for your feature:
git checkout -b feature/NewFeature

Commit your changes:
git commit -m "Add NewFeature"

Push the branch:
git push origin feature/NewFeature

Open a Pull Request describing your updates clearly.
