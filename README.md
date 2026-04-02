# WanderingSouls Travel Website

## Project Overview

WanderingSouls is a full-stack travel website developed to simplify the process of discovering and booking travel destinations. The platform allows users to explore travel packages, customize their trips based on personal preferences, and book travel experiences conveniently through an interactive web interface.

The system also includes a login and registration system, an admin dashboard for managing the platform, and a travel experience section where users can share their stories. The website is designed to provide an engaging and user-friendly travel planning experience.

This project demonstrates the implementation of full-stack web development concepts including frontend design, backend logic, database integration, and session-based authentication.

---

## Features

### User Features

* User Registration and Login system
* Explore different travel packages
* Trip customization quiz to recommend destinations
* Travel booking functionality
* Share travel experiences
* Contact support form
* View trending travel destinations

### Admin Features

* Admin login authentication
* Admin dashboard access
* User management through database
* Website monitoring and management

---

## Technologies Used

### Frontend

* HTML
* CSS
* JavaScript
* Bootstrap

### Backend

* PHP

### Database

* MySQL

### Tools and Platforms

* XAMPP
* phpMyAdmin
* GitHub

---

## Project Structure

project-folder
│
├── index.php (Login and Registration system)
├── home.php (Main homepage of the website)
├── Aboutus.php (About the travel website)
├── contact.php (Contact form and information)
├── customize.php (Trip customization quiz and booking form)
├── booking.php (Booking confirmation page)
├── admin.php (Admin dashboard)
├── experience.php (Travel experience sharing page)
├── connection.php (Database connection file)
└── README.md

---

## Installation and Setup

Follow these steps to run the project locally.

1. Install XAMPP on your system.
2. Start Apache and MySQL from the XAMPP control panel.
3. Copy the project folder into the **htdocs** directory.

Example path:

C:/xampp/htdocs/wanderingsouls

4. Open your browser and run the project using:

http://localhost/wanderingsouls

---

## Database Setup

1. Open phpMyAdmin in your browser.

http://localhost/phpmyadmin

2. Create a new database:

login_db

3. Create the users table using the following SQL query:

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
email VARCHAR(50),
password VARCHAR(50),
user_type VARCHAR(20)
);

4. The connection to the database is handled in **connection.php**.

---

## Backend Functionality

The backend of the project is developed using PHP and handles several core functionalities such as:

* User authentication and login validation
* Registration system
* Session management for logged-in users
* Admin role verification
* Booking data handling
* Database interaction using SQL queries

---

## Future Improvements

* Online payment integration
* Real-time travel package availability
* User profile management
* Booking history tracking
* Email notifications for bookings

---

## Author

Khushi Sain
Bachelor of Computer Applications (BCA)
Lovely Professional University

---

## License

This project is developed for educational and learning purposes.
