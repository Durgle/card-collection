
# Collectible Card Collection Manager

A modern web application built with **Laravel 12**, **Vue 3**, **Inertia.js**, and **Tailwind CSS v4**. This platform enables users to create and manage personalized collections and decks of collectible cards, offering features like browsing existing cards and series.

## Features

-   **Deck Creation**: Design and manage custom decks.
    
-   **Personalized Collections**: Organize cards into user-defined collections.
    
-   **Card & Series Catalog**: Browse through existing cards and their respective series.
    
-   **Interactive UI**: Seamless single-page application experience using Inertia.js.
    

## Tech Stack

-   **Backend**: Laravel 12
    
-   **Frontend**: Vue 3 with Inertia.js
    
-   **Styling**: Tailwind CSS v4
    
-   **Build Tool**: Vite

-   **Authentication**: Laravel Sanctum

-   **Routing**: Ziggy for route management
    

## Installation

### Prerequisites

-   PHP >= 8.2
    
-   Composer
    
-   Node.js >= 18
    
-   npm

-   SQLite (or another supported database)
    

### Steps

1.  **Clone the Repository**
    
    ```
    git clone https://github.com/Durgle/card-collection.git cd card-collection
    ```
    
2.  **Install PHP Dependencies**
    
    ```bash
    composer install
    ```
    
3.  **Install Node.js Dependencies**
    
    ```bash
    npm install
    ``` 
    
4.  **Environment Setup**
    
    ```bash
    cp .env.example .env 
    php artisan key:generate
    ```
    
    Configure your database and other environment variables in the `.env` file.
    
5.  **Database Migration**
    
    ```bash
    php artisan migrate
    ``` 
    
6.  **Run Development Servers**
    
    
    ```bash
    npm run dev
    php artisan serve
    ```
    
    Access the application at `http://localhost:8000`.
    

## Project Structure

-   `resources/js/Pages/`: Vue components for different pages.
    
-   `resources/js/Components/`: Reusable Vue components.
    
-   `resources/views/`: Blade templates.
    
-   `routes/web.php`: Application routes.
    
-   `app/Models/`: Eloquent models.
    
-   `app/Http/Controllers/`: Controller classes.
    

## Deployment

For production deployment:

```bash
npm run build
php artisan migrate --force
``` 

Ensure proper configuration of your web server (e.g., Nginx, Apache) and environment variables.