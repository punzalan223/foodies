# Foodies

Foodies is a web application for managing food orders with cart functionality.

## Features

- **CRUD Operations**: Manage food items.
- **Cart Management**: Add, update, and remove items.
- **Cart Submission**: Submit the cart for processing.

## Setup

### Prerequisites

- **PHP**: 8.3+
- **Laravel**: 11
- **Livewire**: 3
- **Tailwind CSS**

### Installation

1. **Install Dependencies**

    Run the following commands to install PHP and JavaScript dependencies:

    ```bash
    composer install
    npm install
    ```

2. **Run Migrations**

    Migrate the database to set up the required tables:

    ```bash
    php artisan migrate
    ```

3. **Insert the Table**

    Import the `menu` table from the `menus.sql` or `insert the data` file located in the `database` folder:

4. **Serve the Application**

    Start the development server:

    ```bash
    php artisan serve
    ```

    The application will be available at `http://localhost:8000`.
