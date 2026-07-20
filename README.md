# 🧠 FitMind — Nutrition Quiz Platform

A PHP + MySQL web application where **educators** create nutrition quizzes and
**learners** take them, get scored, leave feedback, and even recommend new questions.
Built as a role-based e-learning platform around healthy-eating topics.

> **University:** King Saud University — Information Technology
> **Course:** IT329 — Web Application Development

**Live demo:** _add your hosting link here after deployment_

**Demo accounts** (from the seed data):
| Role     | Email                | Password     |
|----------|----------------------|--------------|
| Educator | `Norah@gmail.com`    | `Norah@123`  |
| Learner  | `Alanoud@gmail.com`  | `Alanoud@123`|

## Features
**Educators**
- Create quizzes by topic and add multiple-choice questions (with images).
- Edit and delete questions.
- See per-quiz stats: number of questions, how many learners took it, average
  score, and average feedback rating with comments.
- Review question recommendations submitted by learners (accept / reject).

**Learners**
- Browse quizzes by topic and take them.
- Get an instant score and leave a rating + comment as feedback.
- Recommend new questions to an educator for a quiz.

## Security
- Passwords are hashed with `password_hash` and checked with `password_verify`.
- Login and the data operations use **prepared statements** (parameterized queries)
  to prevent SQL injection.
- Database credentials are loaded from `db_config.php` (git-ignored), never hard-coded
  in the committed source.

## Tech stack
PHP 8 · MySQL/MariaDB · vanilla HTML/CSS/JS (with a little AJAX)

## Run it locally (MAMP / XAMPP)
1. Copy this folder into your web root (e.g. `C:\MAMP\htdocs\fitmind`).
2. Create a database and import the schema:
   ```sql
   CREATE DATABASE quiz CHARACTER SET utf8mb4;
   ```
   Then import `schema.sql` (phpMyAdmin, or `mysql -u root -p quiz < schema.sql`).
3. If your MySQL login isn't `root` / `root`, copy `db_config.example.php` to
   `db_config.php` and set your values (or set `DB_HOST` / `DB_USER` / `DB_PASS` /
   `DB_NAME` environment variables).
4. Open `http://localhost/fitmind/System_Homepage.html` and log in with a demo account.

## Project structure
```
System_Homepage.html   landing page
Log-in.php / Sign_up    authentication
LoginCheck.php          verifies credentials, starts the session
educator_homepage.php   educator dashboard (quizzes, stats, recommendations)
learner_homepage.php    learner dashboard (browse & take quizzes)
Take_quiz.php           take a quiz + submit answers
add.php / edit.php      manage quiz questions
Recommend_question.php  learner suggests a new question
db_connection.php       shared DB connection (reads db_config.php)
schema.sql              database structure + seed data
Image/ , uploads/       UI images and quiz question images
```
