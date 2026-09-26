# Stylin E-Commerce Website

A full-stack e-commerce website built with **PHP, MySQL, JavaScript, HTML, and CSS**.

The project includes separate **Admin** and **User** modules and was created as an earlier full-stack web development project.

> **Project Note**
>
> This is an older learning project and is preserved as part of my development journey.
>
> It reflects the web development practices I was using at that stage and is not intended to represent my current engineering architecture or stack.

## Features

### User Module

- User registration
- User login
- Product browsing
- Product details
- Shopping workflows
- Account-related functionality

### Admin Module

- Separate admin interface
- Product management
- Application management
- Database-backed operations

## Screenshots

<p align="center">
  <img src="project_images/ecom project (1).png" width="30%" />
  <img src="project_images/ecom project (2).png" width="30%" />
  <img src="project_images/ecom project (3).png" width="30%" />
</p>

<p align="center">
  <img src="project_images/ecom project (6).png" width="30%" />
  <img src="project_images/ecom project (7).png" width="30%" />
  <img src="project_images/ecom project (8).png" width="30%" />
</p>

## Tech Stack

- PHP
- MySQL
- JavaScript
- HTML
- CSS
- XAMPP

## Project Structure

```text
ecommerce-website/
│
├── admin/
├── assets/
├── config/
├── project_images/
├── stylin_db_backup/
├── user/
├── login.php
├── signup.php
├── style.css
└── README.md
```

## Local Setup

The project was designed to run locally using XAMPP.

### 1. Install XAMPP

Install XAMPP and start:

- Apache
- MySQL

### 2. Clone the Repository

Clone the project inside your XAMPP `htdocs` directory:

```bash
git clone https://github.com/himanshu240601/ecommerce-website.git
```

### 3. Create the Database

Open phpMyAdmin and create a database named:

```text
stylin_data
```

Import the database backup available inside:

```text
stylin_db_backup/
```

### 4. Run the Project

Open the project locally using:

```text
http://localhost/<folder-name>/ecommerce-website/user/
```

## Demo

A frontend-only GitHub Pages version is available at:

https://himanshu240601.github.io/ecommerce-website/

> The hosted version does not include PHP, MySQL, authentication, or other server-side functionality.

## What I Practiced

This project helped me gain experience with:

- Full-stack web development
- PHP
- MySQL databases
- Authentication flows
- Admin and user role separation
- Database-backed applications
- HTML and CSS layouts
- JavaScript interactions
- Local development using XAMPP
- Structuring a multi-module web application

## Project Status

This project is no longer under active development.

It is preserved as an earlier full-stack project and as part of my development history.

## Author

**Himanshu Goyal**

GitHub: [@himanshu240601](https://github.com/himanshu240601)

## License

No open-source license is currently specified for this repository.
