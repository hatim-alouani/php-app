# 🎉 **Event Management System (Gestion d'Événements)**

This project is a full-featured **PHP-based Event Management System** that allows administrators to create and manage events, handle participant registrations, and view inscriptions. It follows a structured **MVC (Model-View-Controller)** architecture, is containerized with **Docker**, and includes automated testing using **PHPUnit**.

---

## 📁 **Project Structure**

```
/php-app
├── Makefile
├── docker
│   ├── Dockerfile
│   ├── docker-compose.yml
│   └── nginx
│       ├── default.conf
│       └── ssl
│           ├── server.crt
│           └── server.key
├── eventManagement
│   ├── config
│   │   └── Database.php
│   ├── controllers
│   │   ├── EventController.php
│   │   ├── InscriptionController.php
│   │   └── ParticipantController.php
│   ├── index.php
│   ├── models
│   │   ├── EventModel.php
│   │   ├── InscriptionModel.php
│   │   └── ParticipantModel.php
│   ├── public
│   │   ├── css
│   │   │   └── style.css
│   │   └── js
│   │       └── script.js
│   ├── tests
│   │   ├── EventModelTest.php
│   │   ├── InscriptionModelTest.php
│   │   ├── ListEventsTest.php
│   │   ├── ListInscriptionsTest.php
│   │   ├── ParticipantModelTest.php
│   │   └── run_tests.sh
│   └── views
│       ├── events
│       │   ├── create_event.php
│       │   ├── delete_event.php
│       │   ├── edit_event.php
│       │   └── list_events.php
│       ├── inscriptions
│       │   └── list_inscriptions.php
│       ├── layout
│       │   ├── footer.php
│       │   └── header.php
│       └── participants
│           └── register_participant.php
└── screenshots
    ├── RegisterParticipant.png
    ├── createNewEvent.png
    ├── index.png
    ├── listOfEvents.png
    └── listOfRegistrations.png

```
## 🛠️ ***How to Run***

We use a Makefile to simplify common development tasks:

# 🔧 **Build and Start the Application**

**make all**

Builds Docker containers

Installs Composer dependencies

Starts the app with Docker Compose

# 🧪 **Run Tests**

**make test**

Initializes Composer (if needed)

Installs PHPUnit

Runs all unit tests inside tests/ using PHPUnit

# 🧹 **Clean Everything**

**make clean**

Stops all containers

Removes Docker containers and volumes

Deletes Composer files (vendor/, composer.lock, composer.phar)

# 📦 **Dependencies**
PHP 7.4+

PHPUnit 9

Composer

MySQL

Nginx (via Docker)

Docker

Docker Compose

# 🛠️ **To-Do / Improvements**
Add pagination to lists

Implement user authentication

Admin panel UI improvements

Add API support (optional)

# 🧑‍💻 **Author**
👨‍💻 ALOUANI Hatim

# 📃 **License**
MIT License. Free to use and adapt.
