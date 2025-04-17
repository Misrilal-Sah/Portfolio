<template>
  <div class="browse-page">
    <h1 class="browse-title">Who's Watching?</h1>
    
    <div class="profiles-container">
      <div class="profile" @click="navigateToProfile('blue')">
        <div class="profile-avatar blue">
          <img src="/images/blue.png" alt="Recruiter" />
        </div>
        <span class="profile-name">Recruiter</span>
      </div>
      
      <div class="profile" @click="navigateToProfile('grey')">
        <div class="profile-avatar grey">
          <img src="/images/grey.png" alt="Developer" />
        </div>
        <span class="profile-name">Developer</span>
      </div>
      
      <div class="profile" @click="navigateToProfile('red')">
        <div class="profile-avatar red">
          <img src="/images/red.png" alt="Stalker" />
        </div>
        <span class="profile-name">Stalker</span>
      </div>
      
      <div class="profile" @click="navigateToProfile('yellow')">
        <div class="profile-avatar yellow">
          <img src="/images/yellow.png" alt="Adventurer" />
        </div>
        <span class="profile-name">Adventurer</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Browse',
  methods: {
    navigateToProfile(profileType) {
      this.$router.push({ name: 'profile-home', params: { type: profileType } });
    }
  }
}
</script>

<style scoped>
.browse-page {
  /* height: 100vh; */
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background-color: #141414;
}

.browse-title {
  font-size: 3rem;
  color: #ffffff;
  margin-bottom: 60px;
  text-align: center;
}

.profiles-container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 40px;
  max-width: 1000px;
}

.profile {
  display: flex;
  flex-direction: column;
  align-items: center;
  cursor: pointer;
  transition: all 0.3s ease;
}

.profile:hover {
  transform: scale(1.1);
}

.profile:hover .profile-name {
  color: #ffffff;
}

.profile-avatar {
  width: 150px;
  height: 150px;
  border-radius: .5rem;
  overflow: hidden;
  margin-bottom: 20px;
  border: 3px solid transparent;
  transition: border-color 0.3s ease;
}

.profile:hover .profile-avatar {
  border-color: #ffffff;
}

.profile-avatar img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.profile-name {
  font-size: 1.2rem;
  color: #888;
  transition: color 0.3s ease;
}

@media (max-width: 768px) {
  .profiles-container {
    gap: 20px;
  }
  
  .profile-avatar {
    width: 120px;
    height: 120px;
  }
  
  .browse-title {
    font-size: 2.2rem;
    margin-bottom: 40px;
  }
}

@media (max-width: 480px) {
  .profiles-container {
    gap: 15px;
  }
  
  .profile-avatar {
    width: 100px;
    height: 100px;
  }
}
</style> 