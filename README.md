# StudentHub — Yug Gandhi (25AIML013)

A student-friendly campus portal made with HTML, CSS, JavaScript, PHP and MySQL. It includes the supplied practical pages plus the missing support files needed to run the project locally.

## What's included
- Home page, About, Events, FAQ, Contact and Feedback pages
- Registration, login, logout and student dashboard
- Admin dashboard and event-management pages
- JSON events API (`api/events.php`) for the AJAX event-management practical
- Responsive CSS, mobile navigation and light/dark theme toggle
- MySQL schema and sample events

## Run locally (XAMPP / MAMP)
1. Install and start **Apache** and **MySQL**.
2. Copy the complete `StudentHub_YugGandhi` folder into your web server's document root (for XAMPP this is `htdocs`; for MAMP it is `htdocs`).
3. Open phpMyAdmin and import `database.sql`.
4. Open `config/db.php` and set your MySQL username/password if they differ from the defaults.
5. Visit `http://localhost/StudentHub_YugGandhi/`.

Do not open the PHP files by double-clicking them; use `localhost` so PHP and the API run.

## Create an admin account
1. Register normally from the website.
2. Open phpMyAdmin → `studenthub` database → SQL tab.
3. Run the following query, replacing the email with the email you registered:
   ```sql
   UPDATE users SET role='admin' WHERE email='your_registered_email@example.com';
   ```
4. Sign out and sign back in. The Admin link will appear in the navigation.

## Notes
- This is a classroom/demo project, not ready for public deployment without a security review.
- The API only allows admins to add or delete events; public visitors can read published events.
- Event poster uploads are supported by the supplied PHP practical page. Only upload images you trust.
- No external API key is required. The event API is a local PHP endpoint backed by MySQL.
- The supplied files did not contain the old name or ID text, so those occurrences could not be replaced in the original pages. The project identity is set to **Yug Gandhi — 25AIML013** in the footer and documentation.
