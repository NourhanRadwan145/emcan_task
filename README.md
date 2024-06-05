<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel LMS Project

This is a Learning Management System (LMS) built using Laravel for the junior Laravel developer position task at Emcan Solutions. The system allows users to manage courses, lessons, and enrollments with role-based access control.

## Table of Contents

- [Project Setup](#project-setup)
- [Database Schema](#database-schema)
- [Basic Functionality](#basic-functionality)
- [Additional Features](#additional-features)
- [Frontend](#frontend)
- [Testing](#testing)
- [License](#License)

## Project Setup

### 1. Clone the Repository
Clone the repository to your local machine using the following command:
- git clone https://github.com/yourusername/laravel-lms.git
- cd laravel-lms

### 2. Install Dependencies
Install the necessary dependencies using Composer and NPM:
- composer install
- npm install
- npm run dev

### 3. Set Up Environment Variables
Copy the .env.example file to .env and update the necessary configurations, such as database settings:
- cp .env.example .env
- php artisan key:generate

### 4. Database Migration
Run the following commands to migrate the database and seed the initial data:
- php artisan migrate

### 5. Start the Development Server
Start the Laravel development server:
- php artisan serve
- The application will be accessible at http://localhost:8000.

## Database Schema
The database schema consists of the following tables:

- Users: Managed by Laravel Breeze or Jetstream for authentication.
- Courses: Stores course information.
    - Fields: id, title, description, created_at, updated_at
- Lessons: Stores lesson information.
    - Fields: id, title, content, course_id, created_at, updated_at
- Enrollments: Tracks user enrollments in courses.
    - Fields: id, user_id, course_id, created_at, updated_at

## Basic Functionality
- CRUD Operations for Courses and Lessons: Implemented to allow administrators to create, read, update, and delete courses and lessons.
- User Enrollment: Allows users to enroll in courses.
- List of Enrolled Courses: Displays a list of courses a user is enrolled in.
- List of Lessons for a Course: Displays a list of lessons for a specific course.

## Additional Features
- Role-Based Access Control:
    - Only authenticated users can enroll in courses.
    - Only admin users can create, update, or delete courses and lessons.
- Search Functionality: Allows users to search for courses by title or description.

## Frontend
Blade Templates: Used to create a simple and clean UI for the LMS.
Responsive Design: Ensures the UI is responsive and user-friendly across different devices.

## Testing
Feature tests are written to cover the main functionalities such as course creation and user enrollment. Run the tests using the following command:
- php artisan test

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
