<template>
  <div class="profile-home">
    <!-- <section class="hero">
      <div class="hero-content">
        <h1 class="profile-greeting">Hello, {{ profileName }}!</h1>
        <p class="profile-tagline">Welcome to your personalized portfolio experience</p>
        
        <div class="hero-actions">
          <router-link :to="{ name: recommendedSection }" class="action-button primary">
            <i class="fas fa-play"></i> View {{ recommendedSection }}
          </router-link>
          <button class="action-button secondary" @click="toggleInfo">
            <i class="fas fa-info-circle"></i> More Info
          </button>
        </div>
        
        <div v-if="showInfo" class="info-box">
          <p>This is a personalized view based on your profile. Explore sections that match your interests!</p>
          <p>Profile type: <strong>{{ profileName }}</strong></p>
        </div>
      </div>
    </section> -->
    
    <section class="featured-gif">
      <div class="gif-container">
        <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOTZ5eWwwbjRpdWM1amxyd3VueHhteTVzajVjeGZtZGJ1dDc4MXMyNCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9dg/16u7Ifl2T4zYfQ932F/giphy.gif" 
             alt="Featured content" class="featured-image">
        <div class="gif-overlay">
          <div class="overlay-content">
            <h2>Misrilal Sah - Software Engineer</h2>
            <p> Skilled developer with expertise in PHP, its frameworks, and Node.js, focused on scalable web applications.
              I contributed to building robust backend systems handling a high volume of daily users efficiently.</p>
            <div class="overlay-actions">
              <a class="overlay-button resume" href="/images/home/Misrilal_Sah_Resume.pdf" target="_blank" style="text-decoration: none;">
                <img src="/images/home/play-svgrepo-com.svg" class="button-icon" alt="Play"> Resume
              </a>
              <a class="overlay-button linkedin" href="https://www.linkedin.com/in/misrilal-sah/" target="_blank" style="text-decoration: none;">
                <img style="width: 20px; height: 20px;" src="/images/home/linkedin-svgrepo-com.svg" class="button-icon" alt="LinkedIn"> Linkedin
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content-row continue-top-picks">
      <h2 class="row-title" style="margin: 2px;">Top Picks for You</h2>
      <div class="content-slider">
        <div v-for="(item, index) in topPicks" :key="'top-'+index" 
             class="content-item" @click="navigateTo(item.section)">
          <div class="content-card">
            <div class="card-image" :style="{ backgroundImage: `url(${item.image})` }"></div>
            <div class="card-info">
              <h3>{{ item.title }}</h3>
              <div class="item-meta">{{ item.type }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content-row continue-watching">
      <h2 style="margin-top: 0px;" class="row-title">Continue Watching</h2>
      <div class="content-slider">
        <div v-for="(item, index) in continueWatching" :key="'continue-'+index" 
             class="content-item" @click="navigateTo(item.section)">
          <div class="content-card">
            <div class="card-image" :style="{ backgroundImage: `url(${item.image})` }"></div>
            <div class="progress-bar">
              <div class="progress" :style="{ width: item.progress + '%' }"></div>
            </div>
            <div class="card-info">
              <h3>{{ item.title }}</h3>
              <div class="item-meta">{{ item.progress }}% viewed</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  </div>
</template>

<script>
export default {
  name: 'ProfileHome',
  data() {
    return {
      showInfo: false,
      profileData: {
        blue: {
          name: 'Recruiter',
          recommended: 'experience',
          topPicks: [
            { title: 'Work History', type: 'Experience', section: 'experience', image: '/images/cards/work-experience.jpg' },
            { title: 'Skills', type: 'Technical Skills', section: 'skills', image: '/images/cards/skills.jpg' },
            { title: 'Certifications', type: 'Professional Development', section: 'certifications', image: '/images/cards/certification.jpg' },
            { title: 'Hire Me', type: 'Get in Touch', section: 'contact', image: '/images/cards/contact_me.jpg' },
          ],
          continueWatching: [
            { title: 'About Me', type: 'Personal Info', section: 'about', progress: 73, image: '/images/cards/about_me.jpg' },
            { title: 'Project Gallery', section: 'projects', progress: 45, image: '/images/cards/projects.jpg' },
          ]
        },
        grey: {
          name: 'Developer',
          recommended: 'projects',
          topPicks: [
            { title: 'Developer Story', section: 'about', progress: 40, image: '/images/cards/about_me.jpg' },
            { title: 'Developer Background', type: 'Experience', section: 'experience', image: '/images/cards/work-experience.jpg' },
            { title: 'Skills & Technologies', type: 'Tech Stack', section: 'skills', image: '/images/cards/skills.jpg' },
            { title: 'Collaboration', type: 'Open Source', section: 'contact', image: '/images/cards/contact_me.jpg' },
          ],
          continueWatching: [
            { title: 'Tech Stack', section: 'skills', progress: 60, image: '/images/cards/skills.jpg' },
            { title: 'Project Showcase', section: 'projects', progress: 80, image: '/images/cards/projects.jpg' },
            { title: 'Certifications', type: 'Professional Development', section: 'certifications', progress: 24, image: '/images/cards/certification.jpg' },
          ]
        },
        red: {
          name: 'Stalker',
          recommended: 'about',
          topPicks: [
            { title: 'About Me', type: 'Personal Info', section: 'about', image: '/images/cards/about_me.jpg' },
            { title: 'Contact Information', type: 'Get in Touch', section: 'contact', image: '/images/cards/contact_me.jpg' },
            { title: 'Work History', type: 'Career Path', section: 'experience', image: '/images/cards/work-experience.jpg' },
            { title: 'Personal Projects', type: 'Portfolio', section: 'projects', image: '/images/cards/projects.jpg' },
          ],
          continueWatching: [
            { title: 'Certifications', type: 'Professional Development', section: 'certifications', progress: 27, image: '/images/cards/certification.jpg' },
            { title: 'Tech Stack', section: 'skills', progress: 60, image: '/images/cards/skills.jpg' },
            { title: 'Recent Work', section: 'experience', progress: 55, image: '/images/cards/work-experience.jpg' },
          ]
        },
        yellow: {
          name: 'Adventurer',
          recommended: 'projects',
          topPicks: [
            { title: 'Exciting Projects', type: 'Innovations', section: 'projects', image: '/images/cards/projects.jpg' },
            { title: 'Certifications', type: 'Professional Development', section: 'certifications', image: '/images/cards/certification.jpg' },
            { title: 'Tech Explorer', type: 'Skills', section: 'skills', image: '/images/cards/skills.jpg' },
            { title: 'Connect', type: 'Collaboration', section: 'contact', image: '/images/cards/contact_me.jpg' },
          ],
          continueWatching: [
            { title: 'My Story', section: 'about', progress: 40, image: '/images/cards/about_me.jpg' },
            { title: 'Skill Journey', section: 'skills', progress: 40, image: '/images/cards/skills.jpg' },
            { title: 'Professional Path', section: 'experience', progress: 30, image: '/images/cards/work-experience.jpg' },
          ]
        }
      }
    };
  },
  computed: {
    profileType() {
      const type = this.$route.params.type || 'blue';
      localStorage.setItem('profileType', type);
      return type;
    },
    profileName() {
      return this.profileData[this.profileType]?.name || 'Visitor';
    },
    recommendedSection() {
      return this.profileData[this.profileType]?.recommended || 'projects';
    },
    topPicks() {
      return this.profileData[this.profileType]?.topPicks || [];
    },
    continueWatching() {
      return this.profileData[this.profileType]?.continueWatching || [];
    }
  },
  methods: {
    toggleInfo() {
      this.showInfo = !this.showInfo;
    },
    navigateTo(section) {
      this.$router.push({ name: section });
    }
  }
};
</script>

<style scoped>
.profile-home {
  margin-top: -80px;
}

.hero {
  height: 80vh;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.4) 60%, rgba(20, 20, 20, 1) 100%), 
              url('/images/hero-bg.jpg') no-repeat center center;
  background-size: cover;
  display: flex;
  align-items: center;
  padding: 0 60px;
  position: relative;
}

.hero-content {
  max-width: 650px;
  position: relative;
  z-index: 2;
}

.profile-greeting {
  font-size: 3.5rem;
  margin-bottom: 10px;
  font-weight: 700;
}

.profile-tagline {
  font-size: 1.5rem;
  margin-bottom: 30px;
  color: #ddd;
}

.hero-actions {
  display: flex;
  gap: 15px;
  margin-bottom: 20px;
}

.action-button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 12px 24px;
  border-radius: 4px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1.1rem;
  transition: all 0.3s ease;
  border: none;
  cursor: pointer;
}

.action-button i {
  margin-right: 8px;
}

.primary {
  background-color: #E50914;
  color: white;
}

.primary:hover {
  background-color: #f40612;
  transform: scale(1.05);
}

.secondary {
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
}

.secondary:hover {
  background-color: rgba(255, 255, 255, 0.3);
}

.info-box {
  background-color: rgba(20, 20, 20, 0.8);
  border-left: 4px solid #E50914;
  padding: 15px 20px;
  border-radius: 4px;
  margin-top: 20px;
  animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

/* .content-row {
  padding: 20px 20px;
} */

.continue-top-picks {
  padding: 20px 20px 0px 20px;
}

.continue-top-picks .content-slider {
  overflow-x: auto;
  padding-bottom: 10px;
  margin-bottom: 20px;
}

/* Hide scrollbar for top picks section only */
.continue-top-picks .content-slider::-webkit-scrollbar {
  display: none;
}

.continue-top-picks .content-slider {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

/* Hide scrollbar for continue-watching section only */
.continue-watching .content-slider::-webkit-scrollbar {
  display: none;
}

.continue-watching .content-slider {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

.continue-watching {
  padding: 0px 20px 20px 20px;
}

.row-title {
  font-size: 1.8rem;
  margin-bottom: 20px;
  font-weight: 600;
}

.content-slider {
  display: flex;
  gap: 20px;
  overflow-x: auto;
  padding: 10px 0 30px;
  scroll-behavior: smooth;
  /* We'll still keep these for browsers that don't support the custom scrollbar */
  scrollbar-width: thin;
  -ms-overflow-style: none;
}

/* Only hide the scrollbar on browsers that support the custom styling */
@supports (scrollbar-width: thin) or (-webkit-scrollbar: 8px) {
  .content-slider::-webkit-scrollbar {
    height: 6px;
  }
  
  .content-slider::-webkit-scrollbar-track {
    background: transparent;
    margin: 0 60px;
  }
  
  .content-slider::-webkit-scrollbar-thumb {
    background: #E50914;
    border-radius: 3px;
  }
  
  .content-slider::-webkit-scrollbar-thumb:hover {
    background: #FF0F1F;
  }
}

.content-item {
  flex: 0 0 300px;
  transition: transform 0.3s ease;
  cursor: pointer;
}

.content-item:hover {
  transform: scale(1.05);
  z-index: 10;
}

.content-card {
  position: relative;
  border-radius: 6px;
  overflow: hidden;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
  background-color: #333;
  height: 170px;
}

.card-image {
  width: 100%;
  height: 150px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  border-radius: 4px 4px 0 0;
  position: relative;
  transition: transform 0.3s ease;
}

.content-item:hover .card-image {
  transform: scale(1.1);
}

.card-info {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.9), transparent);
  padding: 20px 15px 15px;
  transition: transform 0.3s ease;
  padding-bottom: 30px;
}

.card-info h3 {
  margin: 0 0 5px 0;
  font-size: 1.2rem;
}

.item-meta {
  font-size: 0.9rem;
  color: #ccc;
}

.progress-bar {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 4px;
  background-color: #555;
  z-index: 5;
}

.progress {
  height: 100%;
  background-color: #E50914;
}

/* .featured-gif {
  padding: 0 60px 60px;
} */

.gif-container {
  position: relative;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  margin-top: 50px;
  height: 70vh;
}

.featured-image {
  width: 100%;
  display: block;
}

.gif-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.7) 50%, transparent 100%);
  padding: 80px 40px 20px;
}

.overlay-content h2 {
  font-size: 2rem;
  margin-bottom: 15px;
}

.overlay-content p {
  font-size: 1.1rem;
  color: #ccc;
  margin-bottom: 20px;
  max-width: 800px;
}

.overlay-actions {
  display: flex;
  gap: 15px;
}

.resume{
  background-color: white !important;
  color: black !important;
}

.resume:hover {
  background-color: #909090 !important;
}

.linkedin{
  background-color: #0077b5;
  color: white;
}

.overlay-button {
  background-color: rgba(255, 255, 255, 0.2);
  color: white;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
  display: flex;
  align-items: center;
}

.overlay-button:hover {
  background-color: rgba(255, 255, 255, 0.3);
}

.overlay-button i {
  margin-right: 8px;
}

.button-icon {
  width: 16px;
  height: 16px;
  margin-right: 8px;
  /* filter: invert(100%); */
}

@media (max-width: 768px) {
  .hero {
    padding: 0 30px;
    height: 70vh;
  }
  
  .profile-greeting {
    font-size: 2.5rem;
  }
  
  .profile-tagline {
    font-size: 1.2rem;
  }
  
  /* .content-row {
    padding: 20px 30px;
  } */
  
  .content-item {
    flex: 0 0 250px;
  }
  
  /* .featured-gif {
    padding: 0 30px 40px;
  } */
  
  .gif-overlay {
    padding: 60px 30px 30px;
  }
  
  .overlay-content h2 {
    font-size: 1.6rem;
  }
  
  .overlay-content p {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .hero-actions {
    flex-direction: column;
  }
  
  .action-button {
    width: 100%;
  }
  
  .content-item {
    flex: 0 0 220px;
  }
  
  .overlay-actions {
    flex-direction: column;
  }
  
  /* .overlay-button {
    width: 100%;
  } */
}
</style> 