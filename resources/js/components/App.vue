<template>
  <div class="netflix-app">
    <header class="app-header" v-if="!isHiddenHeaderPage">
      <div class="logo">
        <router-link :to="{name: 'home'}">
          <netflix-title text="My Portfolio" />
        </router-link>
      </div>
      <nav class="main-nav" style="margin-left: 30px;">
        <router-link :to="{name: 'profile-home', params: {type: currentProfileType}}">Home</router-link>
        <router-link :to="{name: 'about'}">About</router-link>
        <router-link :to="{name: 'projects'}">Projects</router-link>
        <router-link :to="{name: 'experience'}">Experience</router-link>
        <router-link :to="{name: 'skills'}">Skills</router-link>
        <router-link :to="{name: 'certifications'}">Certifications</router-link>
        <router-link :to="{name: 'contact'}">Contact</router-link>
      </nav>
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
  name: 'App',
  components: {
    NetflixTitle
  },
  data() {
    return {
      storedProfileType: null
    };
  },
  created() {
    // Initialize the stored profile type when the app is created
    this.initializeProfileType();
    
    // Watch for route changes to update the stored profile type
    this.$watch('$route', (to, from) => {
      if (to.params.type && to.name === 'profile-home') {
        // Update stored profile type when navigating to a profile page
        this.updateStoredProfileType(to.params.type);
      }
    });
  },
  methods: {
    initializeProfileType() {
      // Get profile type from localStorage or default to 'blue'
      const storedType = localStorage.getItem('profileType');
      
      // If we're on a profile route, use that type and store it
      if (this.$route.params.type && this.$route.name === 'profile-home') {
        this.updateStoredProfileType(this.$route.params.type);
      } 
      // Otherwise use the stored type or default
      else if (storedType) {
        this.storedProfileType = storedType;
      } else {
        this.updateStoredProfileType('blue');
      }
    },
    updateStoredProfileType(type) {
      this.storedProfileType = type;
      localStorage.setItem('profileType', type);
    }
  },
  computed: {
    isHiddenHeaderPage() {
      return this.$route.name === 'browse' || this.$route.name === 'home';
    },
    profileImageSrc() {
      // Use the stored profile type for the image
      return `/images/${this.storedProfileType || 'blue'}.png`;
    },
    currentProfileType() {
      return this.storedProfileType || 'blue';
    }
  }
}
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
</style> 