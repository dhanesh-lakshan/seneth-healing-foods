# 🌿 Seneth Healing Foods

**Seneth Healing Foods** (trading as *Seneth Exports*) is the company website for a Gampaha, Sri Lanka based plant-based / vegan food producer and exporter. The site showcases the company's plant-based product range — vegan ready meals, high-fiber meat alternatives, egg substitutes, condiments, and plant-based beverages — and lets prospective customers, distributors, and buyers get in touch through a contact/enquiry form. A companion **PHP/MySQL admin panel** lets staff manage food categories, food items, admin accounts, and customer enquiries.

Built for the Seneth Healing Foods team to present their product catalog online and to collect and manage business enquiries without needing a full e-commerce backend.

---

## 📑 Table of Contents

- [✨ Features](#-features)
- [🛠️ Tech Stack](#️-tech-stack)
- [📁 Project Structure](#-project-structure)
- [✅ Prerequisites](#-prerequisites)
- [⚙️ Installation & Setup](#️-installation--setup)
- [🗄️ Database Setup](#️-database-setup)
- [🚀 Usage](#-usage)
- [📸 Screenshots](#-screenshots)
- [🔑 Folder/File Highlights](#-folderfile-highlights)
- [🤝 Contributing](#-contributing)
- [👥 Author/Team](#-authorteam)
- [📄 License](#-license)

---

## ✨ Features

**Public-facing website**
- 🏠 Home page with hero section and plant-based product highlights (`index.php`)
- ℹ️ About Us page (`about.php`)
- 🛍️ Product catalog across 5 categories, each with a listing page and a detail page:
  - Vegan Plant-Based Ready Meals (`our_product1.php`, `our_product_description1.php`)
  - High-Fiber Plant-Based Vegan Meat Alternatives — incl. jackfruit-based products (`our_product2.php`, `our_product_description2.php`)
  - Vegan Egg Substitutes (`our_product3.php`, `our_product_description3.php`)
  - Vegan Accompaniments, Condiments, and Desserts (`our_product4.php`, `our_product_description4.php`)
  - Plant-Based Beverages and Milk Supplements (`our_product5.php`, `our_product_description5.php`)
- 📩 Contact/Enquiry form with country & country-code selectors, embedded Google Map, and submission stored directly in the database (`contact.php` → `project/Adddatabase.php`)
- 📱 Responsive layout built on Bootstrap, with AOS scroll animations

**Admin panel** (`project/`)
- 🔐 Admin login with session-based authentication (`project/index.php`)
- 📊 Dashboard with live counts of admins, enquiries, and total food items across all categories (`project/Dashbord.php`)
- 🍲 Food management — add, edit, and delete food items (with multi-image upload) per category (`project/Add.php`, `project/newfile.php`, `project/delete_food.php`, `project/deletefood.php`)
- 📬 Enquiry management — view and delete customer enquiries (`project/view_details.php`, `project/delete_enquiry.php`, `project/download_details.php`)
- 👤 Admin account management — add/remove admin users (`project/manageAdmin.php`, `project/deleteAdmin.php`)
- 🚪 Logout / session termination (`project/logout.php`)

---

## 🛠️ Tech Stack

![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

- **Frontend:** HTML5, CSS3, vanilla JavaScript, Bootstrap 5, Bootstrap Icons, AOS (Animate On Scroll)
- **Backend:** PHP (procedural, `mysqli`)
- **Database:** MySQL / MariaDB

---

## 📁 Project Structure

```
seneth-healing-foods/
├── index.php                     # Home page
├── about.php                     # About Us page
├── contact.php                   # Contact / enquiry form
├── our_product1.php ... 5.php    # Product category listing pages
├── our_product_description1.php  # Product detail pages
│   ... 5.php
│
├── assets/
│   ├── css/main.css              # Site-wide custom styles
│   ├── js/main.js                # Site-wide custom scripts
│   ├── image/                    # Homepage / about images
│   └── img/                      # Logo, hero images, icons
│
├── connection/
│   └── connection.php            # Public site DB connection (mysqli)
│
├── inc/
│   ├── header.php                # Shared header include
│   ├── footer.php                # Shared footer include
│   └── links.php                 # Shared <head> CSS/font links
│
├── new images/                   # Additional product/marketing images
│
└── project/                      # Admin panel
    ├── index.php                 # Admin login
    ├── Dashbord.php               # Admin dashboard
    ├── Add.php                   # Add admin form
    ├── Adddatabase.php           # Handles contact form submission
    ├── newfile.php               # Add/manage food items
    ├── delete_food.php / deletefood.php
    ├── manageAdmin.php / deleteAdmin.php
    ├── Manage_order.php          # Order/enquiry section
    ├── view_details.php          # View enquiry details
    ├── delete_enquiry.php
    ├── download_details.php
    ├── logout.php
    ├── connection.php            # Admin panel DB connection (mysqli)
    ├── image/                    # Uploaded food/product images
    └── Menu/                     # Admin panel navbar/footer includes
```

---

## ✅ Prerequisites

Make sure you have the following installed before setting up the project:

- [XAMPP](https://www.apachefriends.org/) or [WAMP](https://www.wampserver.com/) (Apache + MySQL + PHP)
- **PHP** 7.4 or higher (PHP 8.x recommended)
- **MySQL** 5.7+ / MariaDB (bundled with XAMPP/WAMP)
- A modern web browser (Chrome, Firefox, Edge)

---

## ⚙️ Installation & Setup

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   ```

2. **Move the project into your server's document root**

   For XAMPP on Windows:
   ```bash
   move SenethHealingFoods\seneth-healing-foods C:\xampp\htdocs\seneth-healing-foods
   ```

3. **Start Apache and MySQL**
   - Open the **XAMPP Control Panel**
   - Start the **Apache** and **MySQL** modules

4. **Create the database**
   - Open [phpMyAdmin](http://localhost/phpmyadmin)
   - Create a new database named `food_delivery`
   - Create the required tables (`admin`, `enquiries`, `vegan_plant`, `fiber_plant`, `vegan_egg`, `vegan_accompaniments`, `plant_based_beverages`, and their related `_details` / `_description` tables) — see [Database Setup](#️-database-setup) below

5. **Configure the database connection**

   Update the credentials in both connection files to match your local MySQL setup:
   - [`connection/connection.php`](connection/connection.php) — used by the public site
   - [`project/connection.php`](project/connection.php) — used by the admin panel

   ```php
   define('LOCALHOST', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_NAME', 'food_delivery');
   ```

6. **Open the site in your browser**
   ```
   http://localhost/seneth-healing-foods/index.php
   ```

---

## 🗄️ Database Setup

⚠️ This repository does not currently include a `.sql` schema/export file. Based on the queries used throughout the PHP code, the database (`food_delivery`) requires at least the following tables:

- `admin` — admin usernames/passwords
- `enquiries` — contact form submissions (`fname`, `sname`, `contact`, `email`, `address`, `country`, `enquiry`, `date`)
- `vegan_plant`, `fiber_plant`, `vegan_egg`, `vegan_accompaniments`, `plant_based_beverages` — one table per product category
- Matching `*_details` and `*_description` tables for each category (e.g. `vegan_plant_details`, `vegan_plant_description`)

**If a `.sql` file is added to the repo**, import it via phpMyAdmin:

1. Open [phpMyAdmin](http://localhost/phpmyadmin)
2. Create/select the `food_delivery` database
3. Go to the **Import** tab
4. Choose the `.sql` file and click **Go**

---

## 🚀 Usage

**Browsing the public site**
- Visit `http://localhost/seneth-healing-foods/index.php` to view the homepage
- Navigate to **Our Products** to browse each product category, or **Contact** to submit an enquiry

**Logging in as admin**
- Go to `http://localhost/seneth-healing-foods/project/index.php`
- Sign in with a username/password stored in the `admin` table
- On success you'll land on the **Dashboard**, from which you can manage food items, admin accounts, and enquiries via the top navigation bar

---

## 📸 Screenshots

> _Add screenshots below once available._

![Home Page](path/to/homepage-screenshot.png)
![Product Catalog](path/to/products-screenshot.png)
![Admin Dashboard](path/to/dashboard-screenshot.png)

---

## 🔑 Folder/File Highlights

| File / Folder | Purpose |
|---|---|
| `index.php` | Public homepage — hero section and product highlights |
| `contact.php` | Contact/enquiry form, submits to `project/Adddatabase.php` |
| `inc/header.php`, `inc/footer.php`, `inc/links.php` | Shared layout includes for all public pages |
| `connection/connection.php` | Database connection used by the public-facing site |
| `project/index.php` | Admin login page and authentication logic |
| `project/Dashbord.php` | Admin dashboard with summary stats |
| `project/newfile.php` | Add new food items with image uploads |
| `project/Adddatabase.php` | Server-side handler that inserts contact form data into `enquiries` |
| `project/connection.php` | Database connection used by the admin panel |
| `project/Menu/` | Shared navbar/footer includes for the admin panel |

---

## 🤝 Contributing

This project was built as a team/university-style collaboration. Contributions are welcome:

1. Fork the repository
2. Create a feature branch
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes
   ```bash
   git commit -m "Add: your feature description"
   ```
4. Push to your branch
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a Pull Request describing your changes

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).
