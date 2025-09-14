# ApexPlanet Internship - Final Project (PHP & MySQL)
**Simple Blog Application** — final project for Task-5 (ApexPlanet internship)

## Features
- User registration & login (password hashing)
- Roles: admin / editor / user
- CRUD for posts (create / read / update / delete)
- Search posts (by title/content)
- Pagination
- PDO prepared statements for DB safety
- Basic client-side & server-side validation
- Instructions to run locally (XAMPP/WAMP/MAMP)

## Setup (local)
1. Install XAMPP/WAMP/MAMP and start Apache & MySQL.
2. Create a database named `blog`.
3. Import the SQL schema from `db/schema.sql` (or run manually).
4. Place project folder in your web server root (e.g., `htdocs`).
5. Update DB credentials in `includes/db.php` if needed.
6. Open `http://localhost/final_project_apexplanet` (or its folder name).

## Test accounts
- admin@example.com / Password: `Admin@123` (role: admin)
- editor@example.com / Password: `Editor@123` (role: editor)
- user@example.com / Password: `User@123` (role: user)

## Deliverables to submit
- Public GitHub repo containing this project
- LinkedIn video demo uploaded to Featured section (show all features)
- Submit links on ApexPlanet portal per instructions

## Notes
This is a minimal but complete starting point. For production, add CSRF protection,
stronger session handling, HTTPS, and more thorough input sanitization.
