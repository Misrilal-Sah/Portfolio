<div style="position: relative; width: 100%; height: 280px; background: #0f0f1e; overflow: hidden; margin-bottom: 40px; border-radius: 8px; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
  <svg style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" viewBox="0 0 1200 280" preserveAspectRatio="none">
    <defs>
      <linearGradient id="diagonalGradient" x1="0%" y1="100%" x2="100%" y2="0%">
        <stop offset="0%" style="stop-color:#0f0f1e;stop-opacity:1" />
        <stop offset="40%" style="stop-color:#1a1a3e;stop-opacity:1" />
        <stop offset="100%" style="stop-color:#6366f1;stop-opacity:1" />
      </linearGradient>
    </defs>
    <polygon points="0,280 1200,280 1200,0 0,100" fill="url(#diagonalGradient)" />
  </svg>

  <div style="position: relative; z-index: 10; padding: 50px 40px; height: 100%; display: flex; flex-direction: column; justify-content: center;">
    <h1 style="font-size: 3.8em; font-weight: 900; color: #ffffff; margin: 0; letter-spacing: 3px; text-shadow: 0 6px 30px rgba(0,0,0,0.4); font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;">
      NETFLIX PORTFOLIO
    </h1>
    <p style="font-size: 1.3em; color: #e0e7ff; margin: 8px 0 0 0; font-weight: 500; letter-spacing: 1px; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">
      Entertainment • Innovation • Showcase
    </p>
  </div>
</div>

<p style="text-align: center; font-size: 1.1em; color: #4b5563; margin: 20px 0; font-weight: 500;">
A Netflix-inspired portfolio website built with <strong>Laravel</strong> and <strong>Vue.js</strong><br/>to showcase skills, projects, experience, and certifications with style.
</p>

<div style="text-align: center; margin: 30px 0; display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">

![Netflix Portfolio](https://img.shields.io/badge/Netflix%20Portfolio-v1.0-ef4444?style=flat-square&logo=netflix)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-4FC08D?style=flat-square&logo=vue.js&logoColor=white)

</div>

<div style="text-align: center; margin-top: 20px; border-top: 2px solid #ef4444; border-bottom: 2px solid #ef4444; padding: 15px 0;">

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow?style=flat-square)](https://opensource.org/licenses/MIT)
[![Status: Active](https://img.shields.io/badge/Status-Active-brightgreen?style=flat-square)](https://github.com/Misrilal-Sah/Portfolio)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen?style=flat-square)](https://github.com/Misrilal-Sah/Portfolio)

</div>

<p style="text-align: center; margin-top: 20px; font-size: 0.95em; color: #667085;">
<strong>⚡ Quick Navigation:</strong> <a href="#-usage">Demo</a> • <a href="#-installation-and-setup">Setup</a> • <a href="#-features">Features</a> • <a href="#-get-in-touch">Contact</a>
</p>

---

## 📋 Overview

This project is a creative take on a personal portfolio website that **mimics the Netflix interface**. Instead of movies and shows, it showcases projects, skills, and professional information in a familiar and engaging Netflix-style UI.

The portfolio is fully responsive, feature-rich, and designed to impress visitors with an intuitive, entertainment-industry-style presentation of your professional background.

---

## ✨ Features

<table>
<tr>
<td width="50%">

🎥 **Netflix-inspired UI**
- Familiar Netflix interface reimagined as a portfolio
- Sleek dark theme with red accents

📱 **Responsive Design**
- Perfect on desktop, tablet, and mobile
- Touch-optimized navigation

</td>
<td width="50%">

🎭 **Dynamic Content**
- Projects presented as "shows"
- Skills in Netflix categories
- Professional certifications

📧 **Contact Integration**
- Email functionality built-in
- Direct communication form

</td>
</tr>
</table>

---

## 🛠️ Tech Stack

| Layer | Technology | Purpose |
|-------|-----------|---------|
| **Backend** | Laravel | Server-side logic & API |
| **Frontend** | Vue.js | Interactive UI components |
| **Styling** | CSS, Bootstrap | Responsive design |
| **Database** | MySQL | Data persistence |
| **Mail** | Laravel Mail | Email notifications |

---

## 🚀 Installation and Setup

### Prerequisites
- PHP 7.4 or higher
- Composer
- Node.js & npm
- MySQL database

### Quick Start

```bash
# Clone the repository
git clone https://github.com/Misrilal-Sah/Portfolio.git
cd Portfolio

# Install dependencies
composer install
npm install

# Environment setup
cp .env.example .env
php artisan key:generate

# Configure database in .env file

# Run migrations & build assets
php artisan migrate
npm run dev

# Start development server
php artisan serve
```

Visit `http://localhost:8000` in your browser to view the portfolio.

---

## 📱 Usage

### Main Sections

| Section | Description |
|---------|-------------|
| 🏠 **Home** | Netflix-style landing page with featured content |
| 🎥 **Projects** | Showcased as "shows" with thumbnails and descriptions |
| 💼 **Skills** | Technical capabilities organized in Netflix categories |
| 📈 **Experience** | Professional experience in timeline format |
| 📜 **Certifications** | Professional certifications and achievements |
| ✉️ **Contact** | Reach out directly through the integrated form |

---

## 🤝 Contributing

Contributions are welcome! Feel free to:
- Report bugs
- Suggest improvements
- Submit pull requests

---
## 📧 Get In Touch

**Have questions or want to collaborate?** Reach out through any of these channels:

- 📧 **Email:** [misrilalsah09@gmail.com](mailto:misrilalsah09@gmail.com)
- 💼 **LinkedIn:** [https://www.linkedin.com/in/misrilal-sah/](https://www.linkedin.com/in/misrilal-sah/)
- 🐙 **GitHub:** [Misrilal-Sah](https://github.com/Misrilal-Sah)

## 📄 License

This project is open-sourced under the **MIT License** - Feel free to use, modify, and distribute.

---
**Made with ❤️ by Misrilal Sah** | ⭐ [Star the repo](https://github.com/Misrilal-Sah/Portfolio) if you found this helpful!


