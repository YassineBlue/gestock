# Gestock

Gestock is a PHP & MySQL stock management system with admin authentication and protected CRUD operations for managing products.

---

## Features
- Admin login (session-based authentication)
- Role-based access control
- Add products
- List products
- Edit products
- Delete products
- Form validation and feedback messages

---

## Tech Stack
- PHP (procedural)
- MySQL
- Bootstrap 5
- HTML / CSS
- Sessions

---

## Structure
- `index.php` → dashboard
- `login.php` → authentication
- `logout.php` → session destroy
- `ajout_form.php` → add product
- `lister.php` → list products
- `edit.php` → edit product
- `delete.php` → delete product
- `validation.php` → form processing
- `config.php` → database connection
- `css/` → styles

---

## Setup
1. Import `stock.sql` into MySQL
2. Configure `config.php`
3. Run on XAMPP/WAMP
4. Open `login.php`
