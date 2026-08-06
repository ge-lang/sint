# EVVA — Corporate Web Platform & Smart Shop

A PHP/MySQL corporate website with service pages, customer and partner onboarding, a smart shop, authentication, orders, and an administrative backoffice. This is a modernized version of an older training project.

## Live Demo

[Open the EVVA website](https://evasive-skier-ended.ngrok-free.dev/gts_index.php)

The demo is served through a temporary ngrok tunnel and may be unavailable when the local Docker environment is stopped.

---

## 🛠️ Tech Stack & Architecture

* **Backend:** PHP 8.1 with session-based authentication and server-side workflows
* **Database:** MySQL 8 with the schema in `sint.sql`
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap and Owl Carousel
* **Payments:** PayPal REST API in sandbox mode
* **Runtime:** Docker Compose with Apache, PHP and MySQL

---

## 📊 Core Features & System Modules

### 1. Corporate website and onboarding
* Service pages for telecom, internet, energy, solar panels, smart home and smart shop solutions.
* Customer and partner request forms in `klant_worden.php` and `partner_worden.php`.
* Dutch and English content via the `lang` query parameter.

### 2. Smart shop
* Product catalog with category and brand filtering.
* Product details, reviews, shopping cart and checkout flow.
* Customer order history in `my-orders.php`.

### 3. Administration
* The `/admin` area manages users, roles, services, categories, brands, products, team members, comments and orders.
* The database schema contains the relationships for users, products, services, categories, orders and order items.

## Local setup with Docker

1. Clone the repository:
   ```bash
   git clone https://github.com/ge-lang/sint.git
   cd sint
   ```

2. Create the environment file:
   ```bash
   cp .env.example .env
   ```

3. Add the PayPal sandbox credentials to `.env`, then start the project:
   ```bash
   docker compose up -d --build
   ```

4. Open the site at [http://localhost:8080/gts_index.php](http://localhost:8080/gts_index.php).

The database is initialized from `sint.sql`. phpMyAdmin is available at [http://localhost:8081](http://localhost:8081).

## Repository history

The original training project is preserved in the Git history. The modernized EVVA version is recorded in the `Modernize EVVA site and Docker setup` commit.
