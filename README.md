# 🎉 **Event Management System (Gestion d'Événements)**

This project is a full-featured **PHP-based Event Management System** that allows administrators to create and manage events, handle participant registrations, and view inscriptions. It follows a structured **MVC (Model-View-Controller)** architecture, is containerized with **Docker**, and includes automated testing using **PHPUnit**.

---

## 📁 **Project Structure**

## 🛠️ **How to Run**

We use a Makefile to simplify common development tasks:

# 🔧 **Build and Start the Application**

**make all**
Builds Docker containers

Installs Composer dependencies

Starts the app with Docker Compose

The app will be available at http://localhost

#🧪 **Run Tests**

make test
Initializes Composer (if needed)

Installs PHPUnit

Runs all unit tests inside tests/ using PHPUnit

# 🧹 **Clean Everything**

make clean
Stops all containers

Removes Docker containers and volumes

Deletes Composer files (vendor/, composer.lock, composer.phar)

# 📦 **Dependencies**
PHP 7.4+

PHPUnit 9

Composer

MySQL

Nginx (via Docker)

## 🛠️ **To-Do / Improvements**
Add pagination to lists

Implement user authentication

Admin panel UI improvements

Add API support (optional)

# 🧑‍💻 **Authors**
👨‍💻 Developer A: Backend / Database / Tests

🎨 Developer B: Frontend / UI Design

# 📃 **License**
MIT License. Free to use and adapt.
