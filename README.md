# Adulis Website

## Introduction

Adulis is a web application that allows sellers to list their items and enables buyers to browse through the listed products. The project is built using HTML, CSS, JavaScript, and PHP, with MySQL used for the database. The project consists of two main folders: **BackEnd** and **FrontEnd**. Additionally, there is an **Images** folder that stores sellers' product images.

## Folder Structure

- **BackEnd**: Contains server-side scripts and classes responsible for handling various functionalities.
  - **services**: Holds files that manage functionalities like logging out, removing items, cart processing, payment processing, account management, etc.
  - **session**: Contains files that handle sessions for each user type (admin, seller, and buyers).
  - **classes**: Contains classes for admin, cart, seller, and users that store information and perform relevant actions.

- **FrontEnd**: Contains client-side files responsible for the website's user interface.
  - **assets**: Holds fonts and images used in the website.
  - **components**: Contains reusable components like the website's header and other repetitive views.
  - **view**: Holds the actual pages that users interact with.
  - **style**: Contains the CSS file for styling the website.

## Features

- Sellers can list their products with images.
- Buyers can browse and search for products.
- Cart functionality for adding items and making purchases.
- User account management and sessions handling.
- Responsive design for seamless user experience across devices.

## Getting Started

1. Clone the repository: `git clone https://github.com/yourusername/adulis.git`
2. Set up the database using the provided SQL script.
3. Configure the PHP files in the **BackEnd** folder to connect to your MySQL database.
4. Run the application using a local server (e.g., XAMPP, WAMP) or deploy it on a web hosting service.

## Contributors

- [Samuel Zewde](https://github.com/samicsc0)

Feel free to contribute to this project by creating pull requests or reporting issues.

For more information about the website and its functionalities, please refer to the code files and comments in the repository.
