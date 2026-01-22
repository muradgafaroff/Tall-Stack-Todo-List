# 📝 Professional TALL Stack Todo Application

A modern, reactive, and highly interactive Todo application built with the **TALL Stack** (Tailwind CSS, Alpine.js, Laravel, and Livewire). This project demonstrates full CRUD functionality with real-time UI updates and data validation.

## 🚀 Features

* **Real-time Interactions:** Powered by Laravel Livewire for a seamless user experience without page reloads.
* **Reactive Statistics:** Live counters for total and completed tasks.
* **Inline Editing:** Smooth transition between view and edit modes for individual tasks.
* **Robust Validation:** Server-side validation with real-time error messages, including whitespace trimming.
* **Keyboard Support:** Tasks can be added instantly by pressing the `Enter` key.
* **Modern UI:** Responsive design crafted with Tailwind CSS using an Indigo/Indigo theme.

## 🛠️ Technical Implementation

* **Backend:** Laravel 11.x
* **Frontend Logic:** Livewire 3.x
* **Styling:** Tailwind CSS 3.x
* **Database:** MySQL 8.x

## 🔧 Installation & Setup

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/muradgafaroff/Tall-Stack-Todo-pro.git](https://github.com/muradgafaroff/Tall-Stack-Todo-pro.git)
    cd Tall-Stack-Todo-pro
    ```

2.  **Install dependencies:**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Environment Setup:**
    * Copy `.env.example` to `.env`
    * Update `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` for MySQL.
    ```bash
    php artisan key:generate
    ```

4.  **Database Migration:**
    ```bash
    php artisan migrate
    ```

5.  **Run the application:**
    ```bash
    php artisan serve
    ```

---
Developed with ❤️ by [Murad Gafaroff](https://github.com/muradgafaroff)