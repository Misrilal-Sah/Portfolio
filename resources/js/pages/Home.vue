<template>
  <div class="intro-page" @click="goToBrowse">
    <div class="netflix-intro" @click="goToBrowse">
      <img src="/images/logo-2.png" alt="Netflix Portfolio" class="netflix-logo" :class="{ 'animate': isAnimating }">
      <div v-if="showOverlay" class="overlay"></div>
    </div>
    <!-- <p class="intro-text">Click to enter</p> -->
    <audio ref="netflixSound" src="/images/netflix-sound.a13a4aedfb5da5a27f04.mp3" preload="auto"></audio>
  </div>
</template>

<script>
export default {
  name: 'Home',
  data() {
    return {
      isAnimating: false,
      showOverlay: false,
      soundPlayed: false
    }
  },
  mounted() {
    // Preload the audio
    if (this.$refs.netflixSound) {
      this.$refs.netflixSound.load();
    }
    
    // Handle autoplay restrictions by allowing sound on any user interaction
    document.addEventListener('click', this.enableAudio, { once: true });
  },
  beforeDestroy() {
    document.removeEventListener('click', this.enableAudio);
  },
  methods: {
    enableAudio() {
      // Create a silent audio context to unlock audio on iOS/Safari
      const AudioContext = window.AudioContext || window.webkitAudioContext;
      if (AudioContext) {
        const audioContext = new AudioContext();
        // Create and play a silent buffer to unlock the audio
        const buffer = audioContext.createBuffer(1, 1, 22050);
        const source = audioContext.createBufferSource();
        source.buffer = buffer;
        source.connect(audioContext.destination);
        source.start(0);
      }
    },
    goToBrowse() {
      // Prevent multiple clicks
      if (this.isAnimating) return;
      
      // Play Netflix sound
      const sound = this.$refs.netflixSound;
      if (sound && !this.soundPlayed) {
        sound.volume = 0.7; // Set volume to 70%
        sound.play().catch(e => {
          console.log('Audio playback failed:', e);
          // Continue with animation even if sound fails
          this.animateAndNavigate();
        });
        
        // Listen for sound playing to ensure animation is synced with audio
        sound.onplay = () => {
          this.soundPlayed = true;
          this.animateAndNavigate();
        };
      } else {
        // If sound already played or not available, just animate
        this.animateAndNavigate();
      }
    },
    animateAndNavigate() {
      this.isAnimating = true;
      this.showOverlay = true;
      
      setTimeout(() => {
        this.$router.push({ name: 'browse' });
      }, 1200);
    }
  }
}
</script>

<style scoped>
.intro-page {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #000;
  overflow: hidden;
}

.netflix-intro {
  position: relative;
  cursor: pointer;
}

.netflix-logo {
  width: 300px;
  height: auto;
  transition: all 0.3s ease;
}

.netflix-logo:hover {
  transform: scale(1.05);
  filter: drop-shadow(0 0 10px rgba(229, 9, 20, 0.7));
}

.netflix-logo.animate {
  animation: netflixIntro 1.2s ease-out forwards;
  z-index: 150;
  position: relative;
}

.overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: black;
  z-index: 120;
  animation: fadeToBlack 1.2s ease-in forwards;
}

.intro-text {
  margin-top: 40px;
  color: #E50914;
  font-size: 18px;
  opacity: 0.8;
  animation: pulse 1.5s infinite alternate;
}

@keyframes netflixIntro {
  0% {
    transform: scale(1);
  }
  30% {
    transform: scale(1.2);
    filter: drop-shadow(0 0 15px rgba(229, 9, 20, 0.9));
  }
  100% {
    transform: scale(15);
    opacity: 0;
  }
}

@keyframes fadeToBlack {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.5;
  }
  100% {
    opacity: 1;
  }
}

@keyframes pulse {
  from {
    opacity: 0.5;
  }
  to {
    opacity: 1;
  }
}

@media (max-width: 768px) {
  .netflix-logo {
    width: 200px;
  }
  
  .intro-text {
    font-size: 16px;
  }
}
</style> 