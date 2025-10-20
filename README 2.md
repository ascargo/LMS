📚 Domus Libris — Laravel MVC Coursework Project
Laravel MVC Coursework (Sprint 4.01)

Domus Libris is a personal library management system built in Laravel following the MVC pattern.
It allows a library owner to manage books, patrons, and borrowings in a clean and user-friendly interface.

💡 Project Description

The project replaces the proposed “football league” scenario with a personal library application.
Users can:

View a public catalogue of books.

Request to become a patron.

Borrow and return books (managed by the owner).

The owner (authenticated user) can:

Add, edit, or delete books.

Manage patrons and borrowing records.

Track book statuses (Available, Borrowed, Reserved, Lost).

View library statistics in a private dashboard.

🧰 Technologies Used

Laravel 12

PHP 8.4

Tailwind CSS (UI styling)

Blade templating system

SQLite (local database)

Laravel Breeze (authentication)

Eloquent ORM

⚙️ Requirements

PHP ≥ 8.2

Composer ≥ 2.6

Node.js ≥ 18

NPM ≥ 9

SQLite or MySQL

Laravel CLI tools (artisan, tinker)

🛠️ Installation

Clone the repository:

git clone https://github.com/ascargo/LMS.git
cd LMS

Install dependencies:

composer install
npm install

Copy the environment file and configure database:

cp .env.example .env
php artisan key:generate

Run migrations and seeders:

php artisan migrate --seed

Link storage for cover images:

php artisan storage:link

Compile frontend assets:

npm run dev

Start the local server:

php artisan serve

▶️ Usage

Access the public interface at http://127.0.0.1:8000/

Log in with the test account created by the seeder:

Email: test@example.com
Password: password

The owner dashboard allows managing:

Books

Patrons

Borrowings

🌐 Deployment

For deployment:

Use a PHP hosting or VPS with Laravel support.

Configure the .env file for the production database and mail settings.

Run:

php artisan migrate --force
npm run build

🧭 Features Summary

✅ CRUD for Books, Patrons, Borrowings

✅ File upload (book covers)

✅ Status tracking (Available, Borrowed, Reserved, Lost)

✅ Authentication system (Breeze)

✅ Responsive Tailwind UI

✅ Organized Laravel structure and Gitflow branches

⚙️ Ready for future enhancements

🚀 Future Improvements

Add manual patron creation in the owner dashboard.

Integrate an ISBN API to auto-complete book details.

Implement Livewire for dynamic table updates.

Create a Service Layer for better data abstraction.

Enhance responsive layout and table UX consistency.

Optimize cover image compression (TinyPNG / Squoosh).

🤝 Contributions

Contributions and feedback are welcome.
Follow Gitflow:

git checkout -b feature/your-feature
git commit -m "feat: describe your change"
git push origin feature/your-feature

🧑‍🏫 Coursework Metadata

Sprint: 4.01 – Laravel MVC
Author: Asier W. C.
Mentor: Ruben Alcalde
Levels Completed: Level 1 & Level 2 ✅
Repository Name: 4.01-Laravel-MVC-Level2
