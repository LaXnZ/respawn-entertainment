# Respawn Entertainment CRM System

![Respawn Entertainment](public/assets/images/logo.png)

## Overview

Welcome to the Respawn Entertainment CRM (Customer Relationship Management) system. This CRM is specifically designed to address the unique challenges faced by gaming cafes and shops. It leverages the power of Laravel, Tailwind CSS, and SQLite to provide a comprehensive solution that enhances customer engagement, streamlines operations, and ensures compliance.

## Features

### 1. Online Presence

- Establish an online presence for your gaming cafe or shop.
- Allow users to explore products, place orders, and engage with the community beyond physical confines.

### 2. Unified User Experience

- Integrate user data and interactions to provide a unified experience.
- Offer tailored services seamlessly based on user preferences and history.

### 3. Automated Operations

- Automate order management, reservations, and payments to streamline processes.
- Reduce errors and enhance operational efficiency.

### 4. Personalization

- Leverage customer insights to suggest personalized products and promotions.
- Foster customer loyalty and satisfaction by offering customized experiences.

## Technologies Used

- Laravel: A powerful PHP framework for building web applications.
- Tailwind CSS: A utility-first CSS framework for creating responsive and customizable UI components.
- SQLite: A lightweight and easy-to-use database engine.

## Installation

Follow these steps to set up the Respawn Entertainment CRM system on your local machine:

1. Clone this repository to your local machine:

    ```shell
    git clone https://github.com/LaXnZ/respawn-entertainment.git
    ```

2. Change to the project directory:

    ```shell
    cd respawn-entertainment
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

8. Add your Mailtrap details to the `.env` file:

    ```shell
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=your-mailtrap-username
    MAIL_PASSWORD=your-mailtrap-password
    MAIL_ENCRYPTION=null
    ```

9. Migrate the database:

    ```shell
    php artisan migrate
    ```

10. Start the development server:

    ```shell
    php artisan serve
    ```

11. Visit `http://localhost:8000` in your web browser to access the CRM system.

---

**Note:** Ensure you replace `your-mailtrap-username` and `your-mailtrap-password` with your actual Mailtrap SMTP credentials.

With these steps, you'll have the Respawn Entertainment CRM system up and running on your local environment.

Enjoy managing your gaming cafe or shop with our CRM system!
