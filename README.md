# SINT — Corporate Web Platform & Integrated E-Commerce System

A full-stack, multi-page corporate web application integrated with a comprehensive e-commerce system and a custom administrative backoffice dashboard. Developed as part of an intensive Web Development training program to simulate real-world B2B and B2C operational workflows.

## 🚀 Live Phase
*This repository is currently undergoing an upgrading and modernizing phase to implement advanced data security, deployment protocols, and refactored state management.*

---

## 🛠️ Tech Stack & Architecture

* **Backend & Server-side Logic:** PHP (Session management, authentication, multi-step business workflows)
* **Database & Relational Modeling:** MySQL (Custom relational schema design, query optimization)
* **Frontend & UI/UX:** HTML5, CSS3 / SCSS, JavaScript, Bootstrap (Fully responsive interface)
* **API Integration:** PayPal REST API (Payment execution and authentication concepts)

---

## 📊 Core Features & System Modules

### 1. Corporate Web Platform & Client Onboarding
* **Dynamic Service Showcases:** Dedicated modules for company services and commercial tariff plans (`diensten.php`, `tarieven.php`).
* **Interactive Client Onboarding:** Structured registration and onboarding forms tailored to capture precise lead data (`klant_worden.php`, `partner_worden.php`).

### 2. Full-Stack E-Commerce System
* **Catalog & Product Management:** Dynamic filtering by categories and brands (`shop_categories.php`, `shop_brands.php`).
* **Cart & Checkout Lifecycle:** Secure client-side shopping cart management, persistence of cart states, and automated total calculation (`shopping-cart.php`, `checkout.php`).
* **Secure Order Tracking:** Personalized customer portals to view transaction history and active delivery statuses (`my-orders.php`).

### 3. Database Engineering & System Analysis
* **Relational Data Model:** Backed by a structured database schema (`sint.sql`) optimizing relationships between users, products, categories, orders, and logs.
* **Security & Authentication:** Implemented secure user authentication layers (login/register/logout), server-side input validation, and secure session isolation.

### 4. Custom Administrative Backoffice (`/admin`)
* **Content & Catalog Moderation:** Private dashboard allowing administrators to dynamically manage product inventories, review user comments (`product_comment.php`), and execute content updates.
* **Order Processing Control:** Centralized panel for tracking company orders and handling client requests.

---

## 🔧 Database Setup & Installation

1. Clone the repository to your local server directory (e.g., `www/` or `htdocs/`):
   ```bash
   git clone https://github.com
   ```
2. Import the relational database schema into your MySQL server using the provided SQL file:
   * File: `sint.sql`
3. Configure your server-side database connection parameters within the configuration files (located in the `includes/` directory).
4. Launch your local server (Apache/Nginx) and navigate to `index.php`.
