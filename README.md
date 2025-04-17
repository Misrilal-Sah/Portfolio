# Netflix Portfolio

A Netflix-inspired portfolio website built with Laravel and Vue.js to showcase my skills, projects, experience, and certifications.

## 📋 Overview

This project is a creative take on a personal portfolio website that mimics the Netflix interface. Instead of movies and shows, it showcases projects, skills, and professional information in a familiar and engaging Netflix-style UI.

## ✨ Features

- **Netflix-inspired UI**: The familiar Netflix interface reimagined as a portfolio
- **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices
- **Dynamic Content**: Projects, skills, and experience presented as "shows" and "categories"
- **Contact Form**: Integrated email functionality for direct communication
- **Certificate Showcase**: Display professional certifications and achievements

## 🛠️ Technologies Used

- **Backend**: Laravel 
- **Frontend**: Vue.js
- **Styling**: CSS, Bootstrap
- **Database**: MySQL
- **APIs**: Laravel Mail for contact form

## 🚀 Installation and Setup

1. Clone the repository:
   ```bash
   git clone https://github.com/Misrilal-Sah/Portfolio.git
   ```

2. Navigate to the project directory:
   ```bash
   cd Portfolio
   ```

3. Install PHP dependencies:
   ```bash
   composer install
   ```

4. Install JavaScript dependencies:
   ```bash
   npm install
   ```

5. Create a copy of the `.env.example` file:
   ```bash
   cp .env.example .env
   ```

6. Generate an application key:
   ```bash
   php artisan key:generate
   ```

7. Configure your database connection in the `.env` file.

8. Run migrations:
   ```bash
   php artisan migrate
   ```

9. Compile assets:
   ```bash
   npm run dev
   ```

10. Start the development server:
    ```bash
    php artisan serve
    ```

## 📱 Usage

Visit `http://localhost:8000` in your browser to view the portfolio. Browse through different sections:

- **Home**: A Netflix-style landing page
- **Projects**: Showcased as "shows" with thumbnails and descriptions
- **Skills**: Technical capabilities presented in Netflix categories
- **Experience**: Professional experience in a timeline format
- **Contact**: Form to reach out directly

## 📧 Contact

For questions or collaborations, reach out through:
- The contact form on the website
- Email: misrilalsah09@gmail.com

## 📄 License

This project is open-sourced under the MIT license.
