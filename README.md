# Quetta Skills

Quetta Skills is a complete PHP + MySQL university final project: a local education and freelancing platform for Quetta. It includes public pages, dynamic course/freelancer listings, inquiries, secure admin sessions, CRUD management, and validated image uploads.

## Run with XAMPP

1. Install XAMPP from https://www.apachefriends.org/ and start **Apache** and **MySQL**.
2. Extract this folder into `C:\xampp\htdocs\` so the project is at `C:\xampp\htdocs\quetta-skills`.
3. Open `http://localhost/phpmyadmin`, create/import the database by choosing **Import** and selecting `database/quetta_skills.sql`. The SQL creates the `quetta_skills` database and demo records.
4. If your MySQL setup uses a password, update `DB_PASS` in `config/config.php`. The default XAMPP password is empty.
5. Create the `uploads` folder if it does not exist and make it writable. This folder is included and stores uploaded course, academy, and freelancer images.
6. Visit `http://localhost/quetta-skills/`.

## Admin panel

Open `http://localhost/quetta-skills/admin/login.php`

- Email: `admin@quettaskills.local`
- Password: `password`

The admin dashboard provides management for academies, courses, course categories, freelancers, skills, and inquiries. Add/edit forms use prepared SQL statements, CSRF tokens, password hashing, session protection, and image MIME/size validation.

## Project structure

`index.php`, `about.php`, `courses.php`, `freelancers.php`, and `contact.php` are the public pages. Shared layout and database helpers are in `includes/` and `config/`. Admin pages are in `admin/`. The database import is `database/quetta_skills.sql`, styles are in `assets/css/`, and uploaded images belong in `uploads/`.

The included data is clearly fictional/demo data for presentation and viva purposes. Future enhancements could include payments, chat, company accounts, and certificate verification.

## Deploying on Render

Render runs this PHP project through the included `Dockerfile`. Because the project uses MySQL, create or use a reachable MySQL database separately, import `database/quetta_skills.sql`, and add these environment variables to the Render web service: `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASS`. The `render.yaml` file documents the service settings. Uploaded files on Render's free plan are temporary after redeploys; use a paid persistent disk or external object storage if permanent uploads are required.