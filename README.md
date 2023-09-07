# Respawn Entertainment

![Respawn Entertainment](public\assets\images\logo.png)

## Overview

This is a tailored Customer Relationship Management (CRM) system designed to address the unique challenges faced by gaming cafes and shops. It leverages Laravel, Tailwind CSS, and SQLite to provide a comprehensive solution that enhances customer engagement, streamlines operations, and ensures compliance.

## Features

### 1. Online Presence

-   Establish an online presence for your gaming cafe or shop.
-   Allow users to explore products, place orders, and engage with the community beyond physical confines.

### 2. Unified User Experience

-   Integrate user data and interactions to provide a unified experience.
-   Offer tailored services seamlessly based on user preferences and history.

### 3. Automated Operations

-   Automate order management, reservations, and payments to streamline processes.
-   Reduce errors and enhance operational efficiency.

### 4. Personalization

-   Leverage customer insights to suggest personalized products and promotions.
-   Foster customer loyalty and satisfaction by offering customized experiences.



## Technologies Used

-   Laravel: A powerful PHP framework for building web applications.
-   Tailwind CSS: A utility-first CSS framework for creating responsive and customizable UI components.
-   SQLite: A lightweight and easy-to-use database engine.

## Installation

1. Clone this repository to your local machine:

    ```shell
    git clone https://github.com/LaXnZ/respawn-entertainment.git
    ```

2. Change to the project directory:

    ```shell
    cd gaming-cafe-crm
    ```

3. Install Composer dependencies:

    ```shell
    composer install
    ```

4. Install NPM dependencies:

    ```shell
    npm install
    ```

5. Create a copy of the `.env.example` file and name it `.env`:

    ```shell
    cp .env.example .env
    ```

6. Generate an application key:

    ```shell
    php artisan key:generate
    ```

7. Configure your database connection in the `.env` file:

    ```shell
    DB_CONNECTION=sqlite
    DB_DATABASE=database.sqlite
    ```

8. Migrate the database:

    ```shell
    php artisan migrate
    ```

9. Start the development server:

    ```shell
    php artisan serve
    ```

10. Visit `http://localhost:8000` in your web browser to access the CRM system.

---

**Note:** This README provides a high-level overview of the Gaming Cafe and Shop CRM system. For detailed documentation and usage instructions, please refer to the project's documentation or the [Wiki](https://github.com/yourusername/gaming-cafe-crm/wiki) section.

![Powered by Laravel and Tailwind CSS](powered-by-laravel-tailwind.png)
