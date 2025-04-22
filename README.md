# 🎉 **Event Management System**

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
## 🛠 Prerequisites

Before running this project, make sure you have the following installed:
- Docker
- Docker Compose
- Make

## 🔧 Installation

```bash
git clone https://github.com/hatim-alouani/php-app
```

```bash
cd php-app
```

# 🔧 **Build and Start the Application**

```bash
make all
```
Builds Docker containers

Installs Composer dependencies

Starts the app with Docker Compose

# 🧪 **Run Tests**

```bash
make test
```

Initializes Composer (if needed)

Installs PHPUnit

Runs all unit tests inside tests/ using PHPUnit

# 🧹 **Clean Everything**

```bash
make clean
```

Stops all containers

Removes Docker containers and volumes

Deletes Composer files (vendor/, composer.lock, composer.phar)

# ⚠️ **Final Note**

Keep Windows open... but use Linux.

# 🛠️ **To-Do / Improvements**
Add pagination to lists

Implement user authentication

Admin panel UI improvements

Add API support (optional)

## 👤 Contributors
- **ALOUANI Hatim** - [GitHub](https://github.com/hatim-alouani)

## 📜 License
This project is licensed under the MIT License.
