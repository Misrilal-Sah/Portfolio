<template>
  <div class="projects-page">
    <div class="projects-header">
      <h1 class="page-title">My Projects</h1>
      <div class="subtitle">Featured Work & Case Studies</div>
    </div>
    
    <div class="filter-bar">
      <button 
        v-for="category in categories" 
        :key="category.id"
        @click="filterProjects(category.id)"
        :class="['filter-button', { active: activeCategory === category.id }]">
        {{ category.name }}
      </button>
    </div>
    
    <div class="projects-grid">
      <div 
        v-for="project in filteredProjects" 
        :key="project.id" 
        class="project-card"
        @mouseenter="project.hovered = true"
        @mouseleave="project.hovered = false">
        
        <div class="project-thumbnail">
          <img :src="project.image" :alt="project.title">
          <div class="project-overlay" :class="{ active: project.hovered }">
            <div class="project-actions">
              <button @click="showComingSoonMessage('live', project.title)" class="action-button primary">
                <i class="fas fa-external-link-alt"></i>
                <span>View Live</span>
              </button>
              <button @click="showComingSoonMessage('code', project.title)" class="action-button secondary">
                <i class="fas fa-code"></i>
                <span>View Code</span>
              </button>
            </div>
          </div>
        </div>
        
        <div class="project-info">
          <h3 class="project-title">{{ project.title }}</h3>
          <div class="project-tags">
            <span v-for="(tag, index) in project.tags" :key="index" class="project-tag">{{ tag }}</span>
          </div>
          <p class="project-description">{{ project.description }}</p>
          <div class="project-meta">
            <div class="meta-item">
              <i class="fas fa-calendar"></i>
              <span>{{ project.date }}</span>
            </div>
            <div class="meta-item">
              <i class="fas fa-layer-group"></i>
              <span>{{ getCategoryName(project.categoryId) }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div v-if="filteredProjects.length === 0" class="no-projects">
      <div class="empty-state">
        <i class="fas fa-film empty-icon"></i>
        <h3>No projects found</h3>
        <p>Try selecting a different category or check back later.</p>
      </div>
    </div>
    
    <!-- Custom Popup -->
    <div class="custom-popup" v-if="showPopup" @click="closePopup">
      <div class="popup-content" @click.stop>
        <div class="popup-icon">
          <i class="fas fa-info-circle"></i>
        </div>
        <h3 class="popup-title">Coming Soon!</h3>
        <p class="popup-message" v-html="popupMessage"></p>
        <button @click="closePopup" class="popup-close-btn">Got it!</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Projects',
  data() {
    return {
      activeCategory: 'all',
      showPopup: false,
      popupMessage: '',
      categories: [
        { id: 'all', name: 'All Projects' },
        { id: 'web', name: 'Web Applications' },
        { id: 'mobile', name: 'Mobile Apps' },
        { id: 'ui', name: 'UI/UX Design' }
      ],
      projects: [
        {
          id: 1,
          title: 'Typing Practice',
          description: 'A web application designed to help users improve their typing speed and accuracy with various exercises and timed challenges.',
          image: '/images/Projects/typing-practice.jpg',
          categoryId: 'web',
          tags: ['HTML', 'CSS', 'JavaScript'],
          date: 'April 2021',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 2,
          title: 'School Website',
          description: 'A website for a school that includes sections for announcements, event calendars, and course listings, built with HTML, CSS, and JavaScript.',
          image: '/images/Projects/schhol.jpg',
          categoryId: 'ui',
          tags: ['HTML', 'CSS', 'JavaScript'],
          date: 'March 2022',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 3,
          title: 'Vfurniture Ecommerce',
          description: 'An e-commerce platform for furniture sales that features try-on, product listings, customer reviews, and order tracking, built with PHP.',
          image: '/images/Projects/vfurniture.jpg',
          categoryId: 'web',
          tags: ['PHP', 'MySQL', 'JavaScript'],
          date: 'February 2023',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 4,
          title: 'Color Detection',
          description: 'A color detection app that uses machine learning algorithms to identify and suggest color codes from images.',
          image: '/images/Projects/color-detection.jpg',
          categoryId: 'web',
          tags: ['Python', 'Machine Learning', 'OpenCV'],
          date: 'January 2022',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 5,
          title: 'Library Management System',
          description: 'A software solution to manage books, patrons, and transactions in a library. Built with Java and MySQL.',
          image: '/images/Projects/library-management.jpg',
          categoryId: 'desktop',
          tags: ['C++'],
          date: 'December 2021',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 6,
          title: 'Jewelry Shop Ecommerce',
          description: 'An e-commerce platform for a jewelry shop, featuring product galleries, secure checkout, and order management, built with React and Firebase.',
          image: '/images/Projects/jwellery.jpg',
          categoryId: 'web',
          tags: ['Node.js', 'React', 'Stripe API'],
          date: 'November 2024',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 7,
          title: 'Pharmacy Management System',
          description: 'A web-based system to manage prescriptions, patient data, and medical inventory for clinics and hospitals. Built with PHP and MySQL.',
          image: '/images/Projects/pharmacy.jpg',
          categoryId: 'web',
          tags: ['PHP', 'MySQL', 'JavaScript'],
          date: 'October 2024',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 8,
          title: 'Fruits Selling Ecommerce',
          description: 'An e-commerce platform for selling fruits online with features for order tracking, customer reviews, and payment processing, built with Vue.js and Firebase.',
          image: '/images/Projects/fruits-ecommerce.jpg',
          categoryId: 'web',
          tags: ['PHP', 'MySQL', 'JavaScript'],
          date: 'September 2024',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 9,
          title: 'Currency Converter',
          description: 'A simple currency converter that allows users to convert between different currencies using real-time exchange rates.',
          image: '/images/Projects/currency-converter.jpg',
          categoryId: 'web',
          tags: ['JavaScript', 'API'],
          date: 'August 2024',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 10,
          title: 'Calculator with different modes',
          description: 'A versatile calculator app that includes basic, scientific, and unit conversion functions all in one place.',
          image: '/images/Projects/calculator.jpg',
          categoryId: 'web',
          tags: ['JavaScript', 'HTML', 'CSS'],
          date: 'July 2023',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 11,
          title: 'File Manipulation Tool (PDF Merge, Split, Organize, convert type, etc.)',
          description: 'A tool for performing various file manipulation tasks such as merging, splitting, and organizing PDF files.',
          image: '/images/Projects/file-manipulation.jpg',
          categoryId: 'web',
          tags: ['Python'],
          date: 'June 2024',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 12,
          title: 'File Compressor Tool',
          description: 'A web-based tool that helps users compress files to reduce their size without compromising too much on quality.',
          image: '/images/Projects/file-compressor.jpg',
          categoryId: 'web',
          tags: ['Python', 'Image Optimization'],
          date: 'May 2023',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 13,
          title: 'Chess Clock',
          description: 'A digital chess clock for timing chess games, with adjustable time for both players and a countdown feature.',
          image: '/images/Projects/chess-clock.jpg',
          categoryId: 'web',
          tags: ['JavaScript', 'HTML', 'CSS'],
          date: 'April 2021',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 14,
          title: 'Tic Tac Toe Game',
          description: 'A simple Tic Tac Toe game with a grid-based interface, allowing two players to compete.',
          image: '/images/Projects/tic-tac.jpg',
          categoryId: 'web',
          tags: ['JavaScript', 'HTML', 'CSS'],
          date: 'March 2021',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        },
        {
          id: 15,
          title: 'Weather App',
          description: 'A weather app that provides real-time weather information for any location using a weather API.',
          image: '/images/Projects/wheather-app.jpg',
          categoryId: 'web',
          tags: ['JavaScript', 'API', 'CSS'],
          date: 'February 2021',
          liveUrl: '#',
          codeUrl: '#',
          hovered: false
        }
      ]
    };
  },
  computed: {
    filteredProjects() {
      if (this.activeCategory === 'all') {
        return this.projects;
      }
      return this.projects.filter(project => project.categoryId === this.activeCategory);
    }
  },
  methods: {
    filterProjects(categoryId) {
      this.activeCategory = categoryId;
    },
    getCategoryName(categoryId) {
      const category = this.categories.find(cat => cat.id === categoryId);
      return category ? category.name : 'Uncategorized';
    },
    showComingSoonMessage(type, projectTitle) {
      const action = type === 'live' ? 'live demo' : 'source code';
      this.popupMessage = `The ${action} for <strong>${projectTitle}</strong> is currently being set up.<br>Please check back later!`;
      this.showPopup = true;
      // Prevent scrolling when popup is open
      document.body.style.overflow = 'hidden';
    },
    closePopup() {
      this.showPopup = false;
      this.popupMessage = '';
      // Restore scrolling
      document.body.style.overflow = '';
    }
  }
};
</script>

<style scoped>
.projects-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.projects-header {
  margin-bottom: 50px;
  text-align: center;
}

.page-title {
  font-size: 2.5rem;
  margin-bottom: 15px;
  color: #fff;
  position: relative;
  display: inline-block;
}

.page-title::after {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 50%;
  transform: translateX(-50%);
  width: 60px;
  height: 4px;
  background-color: #E50914;
}

.subtitle {
  color: #b3b3b3;
  font-size: 1.2rem;
  margin-top: 20px;
}

.filter-bar {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 40px;
}

.filter-button {
  background-color: rgba(40, 40, 40, 0.8);
  color: #b3b3b3;
  border: none;
  padding: 10px 20px;
  border-radius: 30px;
  font-size: 0.9rem;
  cursor: pointer;
  transition: all 0.3s ease;
}

.filter-button:hover {
  background-color: rgba(60, 60, 60, 0.8);
  color: #fff;
}

.filter-button.active {
  background-color: #E50914;
  color: #fff;
}

.projects-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 30px;
}

.project-card {
  background-color: #1a1a1a;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.project-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
}

.project-thumbnail {
  position: relative;
  height: 200px;
  overflow: hidden;
}

.project-thumbnail img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.project-card:hover .project-thumbnail img {
  transform: scale(1.1);
}

.project-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.8);
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
}

.project-overlay.active {
  opacity: 1;
}

.project-actions {
  display: flex;
  gap: 15px;
}

.action-button {
  display: inline-flex;
  align-items: center;
  padding: 8px 16px;
  border-radius: 4px;
  font-size: 0.9rem;
  font-weight: 600;
  text-decoration: none;
  transition: background-color 0.3s;
}

.action-button.primary {
  background-color: #E50914;
  color: #fff;
}

.action-button.primary:hover {
  background-color: #f40612;
}

.action-button.secondary {
  background-color: rgba(255, 255, 255, 0.2);
  color: #fff;
}

.action-button.secondary:hover {
  background-color: rgba(255, 255, 255, 0.3);
}

.action-button i {
  margin-right: 8px;
}

.project-info {
  padding: 20px;
}

.project-title {
  font-size: 1.4rem;
  color: #fff;
  margin-bottom: 10px;
}

.project-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 15px;
}

.project-tag {
  background-color: rgba(229, 9, 20, 0.1);
  color: #E50914;
  font-size: 0.8rem;
  padding: 4px 10px;
  border-radius: 4px;
}

.project-description {
  color: #b3b3b3;
  line-height: 1.6;
  margin-bottom: 15px;
  font-size: 0.95rem;
}

.project-meta {
  display: flex;
  justify-content: space-between;
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 15px;
}

.meta-item {
  display: flex;
  align-items: center;
  color: #888;
  font-size: 0.85rem;
}

.meta-item i {
  margin-right: 6px;
  font-size: 0.9rem;
}

.no-projects {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 300px;
}

.empty-state {
  text-align: center;
  padding: 40px;
  background-color: #1a1a1a;
  border-radius: 8px;
  width: 100%;
  max-width: 500px;
}

.empty-icon {
  font-size: 3rem;
  color: #444;
  margin-bottom: 20px;
}

.empty-state h3 {
  color: #fff;
  margin-bottom: 10px;
}

.empty-state p {
  color: #888;
}

@media (max-width: 768px) {
  .projects-grid {
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  }
}

@media (max-width: 576px) {
  .projects-grid {
    grid-template-columns: 1fr;
  }
  
  .page-title {
    font-size: 2rem;
  }
  
  .filter-bar {
    flex-direction: column;
    align-items: center;
  }
  
  .filter-button {
    width: 100%;
    max-width: 200px;
  }
}

/* Custom Popup Styles */
.custom-popup {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  animation: fadeIn 0.3s ease-in-out;
  backdrop-filter: blur(3px);
}

.popup-content {
  background-color: #1f1f1f;
  border-radius: 10px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 0 30px rgba(229, 9, 20, 0.3);
  max-width: 400px;
  width: 90%;
  animation: scaleIn 0.5s ease-in-out;
  border: 1px solid rgba(229, 9, 20, 0.2);
}

.popup-icon {
  color: #E50914;
  font-size: 40px;
  margin-bottom: 15px;
}

.popup-title {
  font-size: 1.8rem;
  margin: 0 0 15px;
  color: #fff;
}

.popup-message {
  font-size: 1.1rem;
  color: #aaa;
  margin-bottom: 25px;
  line-height: 1.5;
}

.popup-close-btn {
  background-color: #E50914;
  color: white;
  border: none;
  padding: 10px 25px;
  border-radius: 5px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s;
}

.popup-close-btn:hover {
  background-color: #f40612;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes scaleIn {
  from { transform: scale(0.8); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
</style> 