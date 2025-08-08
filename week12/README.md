# Academic Management System

A comprehensive Laravel-based web application for managing academic entities including learners, educational programs, and faculty members.

## System Overview

### Learner Management
- Register new learners with secure credential encryption
- Display all learners in an organized data grid
- Modify learner information (with optional credential updates)
- Remove learner records
- View detailed learner profiles

### Educational Programs  
- Create new educational programs with titles and detailed descriptions
- Display all programs in a structured table format
- Update program information
- Remove program entries
- View individual program details

### Faculty Members
- Database repository containing 10 sample faculty records
- Displays seeded faculty data for demonstration purposes

## Installation Instructions

1. Transfer all project files to your development directory
2. Execute `composer install` to install dependencies
3. Create `.env` configuration file with database parameters
4. Run `php artisan key:generate` to generate application key
5. Ensure your database "laravel" is properly configured
6. Execute `php artisan migrate` to initialize database tables
7. Run `php artisan db:seed --class=ProfessorSeeder` to populate faculty data
8. Start the development server with `php artisan serve`
9. Navigate to http://localhost:8000 in your browser

## Database Schema

### Learners (existing table)
- id
- name  
- email
- password

### Educational Programs (new table)
- id
- name
- description
- created_at
- updated_at

### Faculty Members (new table)
- id
- name
- created_at
- updated_at

## Technical Features

- Modern Bootstrap framework for responsive design
- Comprehensive error handling with exception management
- Input validation and sanitization
- Secure password encryption
- Mobile-responsive interface design

## Navigation Structure

- Home page displays Learners list
- "Educational Programs" button for program management
- "Faculty Members" button for faculty directory
- Consistent navigation across all sections

