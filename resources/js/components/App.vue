<template>
  <div class="netflix-app">
    <header class="app-header" v-if="!isHiddenHeaderPage">
      <div class="logo">
        <router-link :to="{name: 'home'}">
          <netflix-title text="My Portfolio" />
        </router-link>
      </div>
      <!-- Desktop Navigation Menu -->
      <nav class="main-nav" :class="{'mobile-hidden': isMobileMenuHidden}">
        <!-- Close button for mobile menu -->
        <div class="menu-close-button" @click="closeMobileMenu">
          <img src="/images/cross-svgrepo-com.svg" alt="Close" class="close-icon">
        </div>
        
        <!-- Profile section only shown in mobile menu -->
        <div class="profile-item">
          <div class="profile-menu-item" @click="navigateToProfiles">
            <img :src="profileImageSrc" alt="Profile" class="profile-menu-image">
            <span>Profile</span>
          </div>
        </div>
        
        <router-link :to="{name: 'profile-home', params: {type: currentProfileType}}" @click="closeMobileMenu">Home</router-link>
        <router-link :to="{name: 'about'}" @click="closeMobileMenu">About</router-link>
        <router-link :to="{name: 'projects'}" @click="closeMobileMenu">Projects</router-link>
        <router-link :to="{name: 'experience'}" @click="closeMobileMenu">Experience</router-link>
        <router-link :to="{name: 'skills'}" @click="closeMobileMenu">Skills</router-link>
        <router-link :to="{name: 'certifications'}" @click="closeMobileMenu">Certifications</router-link>
        <router-link :to="{name: 'contact'}" @click="closeMobileMenu">Contact</router-link>
      </nav>
      <!-- Mobile Menu Button -->
      <div class="mobile-menu-button" @click="toggleMobileMenu">
        <img src="/images/menu-svgrepo-com.svg" alt="Menu" class="menu-icon">
      </div>
      <!-- Desktop Profile Icon -->
      <div class="profile-container">
        <router-link :to="{name: 'browse'}" class="profile-icon">
          <img :src="profileImageSrc" alt="Profile" class="profile-image">
        </router-link>
      </div>
    </header>
    
    <main class="main-content" :class="{ 'no-padding': isHiddenHeaderPage }">
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
    
    <footer class="app-footer">
      <p>&copy; {{ new Date().getFullYear() }} Portfolio Created with Laravel and Vue.js, Inspired by Netflix</p>
    </footer>
  </div>
</template>

<script>
import NetflixTitle from './NetflixTitle.vue';

export default {
  components: {
    NetflixTitle
  },
  data() {
    return {
      isMobileMenuHidden: true,
      currentProfileType: localStorage.getItem('profileType') || 'grey'
    };
  },
  mounted() {
    // Listen for changes to localStorage
    window.addEventListener('storage', this.handleStorageChange);
  },
  beforeDestroy() {
    // Remove the listener when component is destroyed
    window.removeEventListener('storage', this.handleStorageChange);
  },
  watch: {
    '$route'() {
      // Close mobile menu on route change
      this.closeMobileMenu();
      
      // Update profile type if navigating to a profile page
      if (this.$route.name === 'profile-home' && this.$route.params.type) {
        this.currentProfileType = this.$route.params.type;
        localStorage.setItem('profileType', this.$route.params.type);
      }
    }
  },
  computed: {
    isHiddenHeaderPage() {
      return this.$route.name === 'home' || this.$route.name === 'browse';
    },
    profileImageSrc() {
      return `/images/${this.currentProfileType || 'grey'}.png`;
    }
  },
  methods: {
    toggleMobileMenu() {
      this.isMobileMenuHidden = !this.isMobileMenuHidden;
    },
    closeMobileMenu() {
      this.isMobileMenuHidden = true;
    },
    navigateToProfiles() {
      this.closeMobileMenu();
      this.$router.push({ name: 'browse' });
    },
    handleStorageChange(event) {
      if (event.key === 'profileType') {
        this.currentProfileType = event.newValue;
      }
    }
  }
};
</script>

<style>
body {
  margin: 0;
  padding: 0;
  font-family: 'Helvetica Neue', Arial, sans-serif;
  background-color: #141414;
  color: #ffffff;
}

.netflix-app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.app-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 50px;
  background-color: rgba(0, 0, 0, 0.8);
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 100;
}

.logo {
  font-size: 1.5rem;
  font-weight: bold;
}

.logo a {
  text-decoration: none;
  display: block;
}

.main-nav {
  display: flex;
  gap: 20px;
  margin-right: auto;
  margin-left: 30px;
}

.main-nav a {
  color: #e5e5e5;
  text-decoration: none;
  font-size: 16px;
  transition: color 0.3s;
  position: relative;
  padding-bottom: 5px;
}

.main-nav a::after {
  content: '';
  position: absolute;
  bottom: -2px;
  left: 0;
  width: 100%;
  height: 3px;
  background-color: #E50914;
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.main-nav a:hover {
  color: #ffffff;
}

.main-nav a:hover::after {
  transform: scaleX(0.5);
}

.main-nav a.router-link-active {
  color: #ffffff;
  font-weight: 500;
}

.main-nav a.router-link-active::after {
  transform: scaleX(1);
}

.profile-container {
  margin-left: 20px;
}

.profile-icon {
  display: block;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  overflow: hidden;
  border: 2px solid transparent;
  transition: border-color 0.3s;
}

.profile-icon:hover {
  border-color: #E50914;
}

.profile-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.main-content {
  flex: 1;
  padding-top: 80px;
}

.main-content.no-padding {
  padding-top: 0;
}

.app-footer {
  text-align: center;
  /* padding: 20px; */
  background-color: rgba(0, 0, 0, 0.8);
  font-size: 14px;
  color: #999;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}

/* Mobile Menu Styles */
.mobile-menu-button {
  display: none;
  cursor: pointer;
}

.menu-icon {
  width: 30px;
  height: 30px;
  filter: invert(100%);
}

.menu-close-button {
  display: none;
  position: absolute;
  /* top: 20px;
  right: 20px; */
  margin-left: 25px;
  cursor: pointer;
  z-index: 100;
}

.close-icon {
  width: 35px;
  height: 35px;
  filter: invert(100%);
}

.profile-item {
  display: none;
}

.profile-menu-item {
  display: flex;
  align-items: center;
  padding: 15px 25px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  margin-top: 40px;
  cursor: pointer;
}

.profile-menu-item:hover {
  background-color: rgba(229, 9, 20, 0.2);
}

.profile-menu-image {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
  margin-right: 15px;
}

@media (max-width: 1024px) {
  .app-header {
    padding: 15px 20px;
  }
  
  .mobile-menu-button {
    display: block;
    order: 3;
    margin-left: 20px;
  }
  
  .main-nav {
    position: fixed;
    top: 0;
    right: 0;
    width: 0;
    flex-direction: column;
    background-color: rgba(0, 0, 0, 0.95);
    margin: 0;
    padding: 20px 0 0 0;
    overflow-y: auto;
    transition: width 0.3s ease;
    z-index: 90;
    gap: 0;
    height: 100vh;
  }
  
  .main-nav.mobile-hidden {
    width: 0;
  }
  
  .main-nav:not(.mobile-hidden) {
    width: 250px;
    box-shadow: -5px 0 15px rgba(0, 0, 0, 0.5);
  }
  
  .main-nav:not(.mobile-hidden) .menu-close-button {
    display: block;
  }
  
  .main-nav a {
    padding: 15px 25px;
    font-size: 18px;
    width: 100%;
    box-sizing: border-box;
  }
  
  .main-nav a::after {
    display: none;
  }
  
  .main-nav a:hover,
  .main-nav a.router-link-active {
    background-color: rgba(229, 9, 20, 0.2);
  }
  
  .profile-container {
    display: none;
  }
  
  .profile-item {
    display: block;
  }
}

@media (max-width: 767px) {
  .app-header {
    padding: 10px 15px;
  }
  
  .logo {
    font-size: 1.2rem;
  }
}

/* Custom Scrollbar Styling */
::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}

::-webkit-scrollbar-track {
  background: #141414;
}

::-webkit-scrollbar-thumb {
  background: #E50914;
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: #FF0F1F;
}

/* Firefox scrollbar */
* {
  scrollbar-width: thin;
  scrollbar-color: #E50914 #141414;
}

/* For Edge */
::-webkit-scrollbar-button {
  display: none;
}
</style> 