# PHP Product CRUD

A simple PHP application for managing a product catalog, allowing users to add, view, and delete various types of products (Books, DVDs, Furniture).

This project was created as a test assignment for Scandiweb.

## Features

*   List existing products.
*   Add new products (Book, DVD, Furniture) with type-specific attributes.
*   Mass delete selected products.

## Setup Instructions

1.  **Clone the Repository:**
    ```bash
    git clone <your-repository-url>
    cd Products-CRUD
    ```

2.  **Install Dependencies:**
    Make sure you have [Composer](https://getcomposer.org/) installed.
    ```bash
    composer install
    ```

3.  **Database Setup:**
    *   Make sure you have a MySQL server running.
    *   Create a database (e.g., `product_crud_db`).
    *   Import the database schema using the `Database-Setup.sql` file:
        ```bash
        mysql -u your_mysql_user -p your_database_name < Database-Setup.sql
        ```
        (Replace `your_mysql_user` and `your_database_name`)

4.  **Environment Configuration:**
    *   Create a `.env` file in the project root.
    *   Copy the following content into the `.env` file and replace the placeholder values with your actual database credentials:
        ```dotenv
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_user
        DB_PASSWORD=your_database_password
        ```

5.  **Run the Application:**
    *   **Using a Local Server (Apache/Nginx):** Configure your server to point the document root to the project's public directory (which is the root directory in this case). Ensure `mod_rewrite` (or equivalent) is enabled for URL rewriting if you plan to remove `index.php` from URLs later.
    *   **Using PHP Built-in Server:** For development purposes, you can use the PHP built-in server. Navigate to the project root in your terminal and run:
        ```bash
        php -S localhost:8000
        ```
    *   Access the application in your browser (e.g., `http://localhost:8000`).

## Project Structure (Simplified)

*   `/Core`: Core classes (Database, Router, Validator, etc.).
*   `/Http`: HTTP related classes (Controllers, Product classes).
*   `/Views`: PHP files for rendering HTML.
*   `/vendor`: Composer dependencies.
*   `index.php`: Main entry point.
*   `bootstrap.php`: Application bootstrapping (DI container, environment loading).
*   `routes.php`: Defines application routes.
*   `Database-Setup.sql`: SQL script for database schema.
*   `composer.json`: PHP dependencies.
