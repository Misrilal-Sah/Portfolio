<template>
  <div class="contact-page">
    <div class="profile-card">
      <div class="profile-content">
        <div class="profile-image-container">
          <img src="/images/Misril.jpeg" alt="Misrilal Sah" class="profile-image">
        </div>
        
        <div class="profile-info">
          <h1 class="profile-name">Misrilal Sah</h1>
          <h2 class="profile-title">Software Engineer</h2>
          
          <p class="profile-description">
           With 2+ years of experience as a Full Stack Developer, proficient in PHP and JavaScript
            technologies and specializing in the edge-technologies.
          </p>
          
          <p class="profile-location">
            Pune, Maharashtra, India
          </p>
          
          <a href="https://www.linkedin.com/in/misrilal-sah/" class="profile-button" target="_blank" style="text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
            <span style="background-color: #0077b5; border-radius: 2px; display: inline-flex; align-items: center; justify-content: center; width: 24px; height: 24px; margin-right: 8px;">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="#FFFFFF">
                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/>
              </svg>
            </span>
            View Profile
          </a>
        </div>
      </div>
    </div>

    <p style="color: grey; text-align: center;" class="profile-location">
      <a href="mailto:misrilalsah09@gmail.com" style="color: grey;">misrilalsah09@gmail.com</a>
      |
      <a style="color: grey;" href="tel:+918237138622">+91 8237138622</a>
    </p>

    <div class="contact-header">
      <h1 class="page-title">Get In Touch</h1>
      <div class="subtitle">Let's start a conversation</div>
    </div>
    
    <div class="contact-grid">
      <div class="contact-form-container">
        <h2 class="section-title">Send a Message</h2>
        <form class="contact-form" @submit.prevent="submitForm">
          <div class="form-group">
            <label for="name">Name</label>
            <input 
              type="text" 
              id="name" 
              v-model="form.name" 
              :class="{ 'has-error': errors.name }"
              placeholder="Your name"
              required
            >
            <span v-if="errors.name" class="error-message">{{ errors.name }}</span>
          </div>
          
          <div class="form-group">
            <label for="email">Email</label>
            <input 
              type="email" 
              id="email" 
              v-model="form.email" 
              :class="{ 'has-error': errors.email }"
              placeholder="Your email address"
              required
            >
            <span v-if="errors.email" class="error-message">{{ errors.email }}</span>
          </div>
          
          <div class="form-group">
            <label for="subject">Subject</label>
            <input 
              type="text" 
              id="subject" 
              v-model="form.subject" 
              :class="{ 'has-error': errors.subject }"
              placeholder="What is this regarding?"
              required
            >
            <span v-if="errors.subject" class="error-message">{{ errors.subject }}</span>
          </div>
          
          <div class="form-group">
            <label for="message">Message</label>
            <textarea 
              id="message" 
              v-model="form.message" 
              :class="{ 'has-error': errors.message }"
              placeholder="Your message here..."
              rows="5"
              required
            ></textarea>
            <span v-if="errors.message" class="error-message">{{ errors.message }}</span>
          </div>
          
          <!-- reCAPTCHA v2 Checkbox -->
          <div class="form-group recaptcha-container">
            <div id="recaptcha-widget"></div>
            <span v-if="errors.recaptcha" class="error-message">{{ errors.recaptcha }}</span>
          </div>
          
          <button type="submit" class="submit-button" :disabled="submitting">
            <span v-if="!submitting">Send Message</span>
            <span v-else><i class="fas fa-spinner fa-spin"></i> Sending...</span>
          </button>
          
          <div v-if="formStatus" :class="['form-status', formStatus.type]">
            {{ formStatus.message }}
          </div>
        </form>
      </div>
      
      <!-- Success Animation -->
      <div class="success-animation" v-if="showSuccessAnimation">
        <div class="success-animation-container">
          <div class="tick-container">
            <img src="/images/contact/icons8-tick.svg" alt="Success" class="tick-icon">
          </div>
          <h2 class="success-title">Message Sent!</h2>
          <p class="success-message">Thanks for reaching out. I'll get back to you as soon as possible.</p>
        </div>
      </div>
      
      <div class="contact-info-container">
        <h2 class="section-title">Contact Information</h2>
        
        <div class="contact-info">
          <div class="info-item">
            <div class="info-icon">
              <img src="/images/contact/location-svgrepo-com.svg" alt="Location" class="contact-svg">
            </div>
            <div class="info-content">
              <h3>Location</h3>
              <p>Pune, Maharashtra, India</p>
            </div>
          </div>
          
          <div class="info-item">
            <div class="info-icon">
              <img src="/images/contact/email-svgrepo-com.svg" alt="Email" class="contact-svg">
            </div>
            <div class="info-content">
              <h3>Email</h3>
              <p><a href="mailto:misrilalsah09@gmail.com">misrilalsah09@gmail.com</a></p>
            </div>
          </div>
          
          <div class="info-item">
            <div class="info-icon">
              <img src="/images/contact/phone-call-svgrepo-com.svg" alt="Phone" class="contact-svg">
            </div>
            <div class="info-content">
              <h3>Phone</h3>
              <p><a href="tel:+918237138622">+91 8237138622</a></p>
            </div>
          </div>
        </div>
        
        <div class="social-links">
          <h3>Connect With Me</h3>
          <div class="social-icons">
            <a href="https://github.com/Misrilal-Sah" target="_blank" class="social-icon">
              <img src="/images/contact/connect/git-svgrepo-com.svg" alt="GitHub" class="social-svg">
            </a>
            <a href="https://www.linkedin.com/in/misrilal-sah/" target="_blank" class="social-icon">
              <img src="/images/contact/connect/linkedin.svg" alt="LinkedIn" class="social-svg">
            </a>
            <a href="https://www.instagram.com/sah._099/" target="_blank" class="social-icon">
              <img src="/images/contact/connect/instagram-1-svgrepo-com.svg" alt="Instagram" class="social-svg">
            </a>
            <a href="https://reddit.com/u/Sad-Expression6099" target="_blank" class="social-icon">
              <img src="/images/contact/connect/reddit-svgrepo-com.svg" alt="Reddit" class="social-svg">
            </a>
            <a href="https://discord.com/users/misrilalsah" target="_blank" class="social-icon">
              <img src="/images/contact/connect/discord-icon-svgrepo-com.svg" alt="Discord" class="social-svg">
            </a>
            <a href="https://wa.me/918237138622" target="_blank" class="social-icon">
              <img src="/images/contact/connect/whatsapp-svgrepo-com.svg" alt="WhatsApp" class="social-svg">
            </a>
            <a href="https://t.me/John715" target="_blank" class="social-icon">
              <img src="/images/contact/connect/telegram-svgrepo-com.svg" alt="Telegram" class="social-svg">
            </a>
          </div>
        </div>
        
        <div class="availability">
          <h3>Availability</h3>
          <div class="availability-status">
            <div class="status-indicator available"></div>
            <p>Available for freelance work</p>
          </div>
          <p class="response-time">
            <i class="fas fa-clock"></i> Average response time: 24 hours
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Contact',
  data() {
    return {
      form: {
        name: '',
        email: '',
        subject: '',
        message: ''
      },
      errors: {
        name: '',
        email: '',
        subject: '',
        message: '',
        recaptcha: ''
      },
      submitting: false,
      formStatus: null,
      showSuccessAnimation: false,
      recaptchaLoaded: false
    }
  },
  mounted() {
    // Initialize recaptcha when component mounts
    this.loadRecaptcha();
  },
  methods: {
    // Load reCAPTCHA dynamically
    loadRecaptcha() {
      // If reCAPTCHA script already loaded
      if (window.grecaptcha) {
        this.renderRecaptcha();
        return;
      }

      // If not loaded, load it
      const script = document.createElement('script');
      script.src = 'https://www.google.com/recaptcha/api.js?onload=onRecaptchaLoaded&render=explicit';
      script.async = true;
      script.defer = true;
      
      // Define global callback
      window.onRecaptchaLoaded = this.renderRecaptcha;
      
      document.head.appendChild(script);
    },
    
    // Render the reCAPTCHA widget
    renderRecaptcha() {
      if (window.grecaptcha && document.querySelector('.recaptcha-container')) {
        window.grecaptcha.render('recaptcha-widget', {
          // Using reCAPTCHA v2 Checkbox site key
          sitekey: '6Lc73xsrAAAAAMlkii-gBy989vJSlV6h7imsvV1V'
        });
        this.recaptchaLoaded = true;
      }
    },
    
    validateForm() {
      let isValid = true;
      this.errors = {
        name: '',
        email: '',
        subject: '',
        message: '',
        recaptcha: ''
      };
      
      if (!this.form.name.trim()) {
        this.errors.name = 'Name is required';
        isValid = false;
      }
      
      if (!this.form.email.trim()) {
        this.errors.email = 'Email is required';
        isValid = false;
      } else if (!this.validateEmail(this.form.email)) {
        this.errors.email = 'Please enter a valid email address';
        isValid = false;
      }
      
      if (!this.form.subject.trim()) {
        this.errors.subject = 'Subject is required';
        isValid = false;
      }
      
      if (!this.form.message.trim()) {
        this.errors.message = 'Message is required';
        isValid = false;
      } else if (this.form.message.trim().length < 10) {
        this.errors.message = 'Message should be at least 10 characters';
        isValid = false;
      }
      
      // Validate reCAPTCHA
      if (!this.recaptchaLoaded) {
        this.errors.recaptcha = 'Please wait for reCAPTCHA to load';
        isValid = false;
      } else {
        const recaptchaResponse = window.grecaptcha && window.grecaptcha.getResponse();
        if (!recaptchaResponse) {
          this.errors.recaptcha = 'Please verify that you are not a robot';
          isValid = false;
        }
      }
      
      return isValid;
    },
    
    validateEmail(email) {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    },
    
    async submitForm() {
      if (!this.validateForm()) {
        return;
      }
      
      this.submitting = true;
      this.formStatus = null;
      
      try {
        // Get reCAPTCHA response
        const recaptchaToken = window.grecaptcha.getResponse();
        
        // Add token to form data
        const formData = {
          ...this.form,
          recaptcha_token: recaptchaToken
        };
        
        const response = await axios.post('/api/contact', formData);
        
        if (response.data.status === 'success') {
          this.formStatus = {
            type: 'success',
            message: response.data.message || 'Your message has been sent successfully!'
          };
          
          // Show success animation
          this.showSuccessAnimation = true;
          setTimeout(() => {
            this.showSuccessAnimation = false;
          }, 5000);
          
          // Reset the form
          this.form = {
            name: '',
            email: '',
            subject: '',
            message: ''
          };
        } else {
          this.formStatus = {
            type: 'error',
            message: response.data.message || 'Something went wrong. Please try again.'
          };
        }
      } catch (error) {
        console.error('Error sending message:', error);
        
        if (error.response && error.response.data.errors) {
          // Handle validation errors
          this.errors = error.response.data.errors;
          this.formStatus = {
            type: 'error',
            message: 'Please correct the errors in the form.'
          };
        } else {
          this.formStatus = {
            type: 'error',
            message: 'Failed to send message. Please try again later.'
          };
        }
      } finally {
        this.submitting = false;
        // Reset reCAPTCHA
        if (window.grecaptcha) {
          window.grecaptcha.reset();
        }
      }
    }
  }
};
</script>

<style scoped>
.contact-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.profile-card {
  background-color: #333;
  border-radius: 10px;
  overflow: hidden;
  margin-bottom: 20px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
}

.profile-content {
  display: flex;
  align-items: center;
  padding: 20px;
}

.profile-image-container {
  flex: 0 0 85px;
  margin-right: 20px;
}

.profile-image {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  /* border: 3px solid #E50914; */
}

.profile-info {
  flex: 1;
}

.profile-name {
  font-size: 2rem;
  margin: 0 0 5px;
}

.profile-title {
  font-size: 1.2rem;
  color: #aaa;
  margin: 0 0 15px;
  font-weight: normal;
}

.profile-description {
  margin-bottom: 15px;
  color: #ddd;
  line-height: 1.5;
}

.profile-location {
  color: #aaa;
  margin-bottom: 15px;
  font-size: 0.9rem;
}

.profile-button {
  display: inline-block;
  background-color: #E50914;
  color: white;
  padding: 8px 15px;
  border-radius: 5px;
  text-decoration: none;
  font-size: 0.9rem;
  transition: background-color 0.3s;
}

.profile-button:hover {
  background-color: #f40612;
}

.contact-header {
  text-align: center;
  margin: 40px 0;
}

.page-title {
  font-size: 2.5rem;
  margin-bottom: 10px;
}

.subtitle {
  color: #aaa;
  font-size: 1.1rem;
}

.contact-grid {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: flex-start;
  gap: 40px;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
}

.contact-form-container, .contact-info-container {
  width: 100%;
  max-width: 550px;
}

.section-title {
  font-size: 1.8rem;
  margin-bottom: 25px;
  position: relative;
  padding-bottom: 10px;
  text-align: left;
}

.section-title::after {
  content: '';
  position: absolute;
  left: 0;
  transform: none;
  bottom: 0;
  width: 50px;
  height: 3px;
  background-color: #E50914;
}

.contact-form {
  background-color: #333;
  padding: 35px;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  display: flex;
  flex-direction: column;
  align-items: center;
}

.form-group {
  margin-bottom: 20px;
  width: 100%;
}

label {
  display: block;
  margin-bottom: 8px;
  color: #ddd;
}

input, textarea {
  width: 100%;
  padding: 12px;
  background-color: #444;
  border: 1px solid #555;
  border-radius: 5px;
  color: white;
  font-size: 1rem;
}

input:focus, textarea:focus {
  outline: none;
  border-color: #E50914;
}

.has-error {
  border-color: #E50914;
}

.error-message {
  color: #E50914;
  font-size: 0.85rem;
  margin-top: 5px;
  display: block;
}

.submit-button {
  background-color: #E50914;
  color: white;
  border: none;
  padding: 12px 35px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
  transition: background-color 0.3s, transform 0.2s;
  position: relative;
  overflow: hidden;
  margin-top: 10px;
}

.submit-button:hover:not(:disabled) {
  background-color: #f40612;
}

.submit-button:active:not(:disabled) {
  transform: scale(0.98);
}

.submit-button:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width 0.6s, height 0.6s;
}

.submit-button:active:not(:disabled):before {
  width: 200px;
  height: 200px;
  opacity: 0;
}

.submit-button:disabled {
  background-color: #555;
  cursor: not-allowed;
}

.form-status {
  margin-top: 20px;
  padding: 15px;
  border-radius: 4px;
  font-weight: 500;
  text-align: center;
  width: 100%;
}

.form-status.success {
  background-color: rgba(25, 135, 84, 0.2);
  color: #19a574;
  border: 1px solid rgba(25, 135, 84, 0.3);
}

.form-status.error {
  background-color: rgba(229, 9, 20, 0.2);
  color: #E50914;
  border: 1px solid rgba(229, 9, 20, 0.3);
}

.contact-info-container {
  padding: 0 0 30px;
}

.contact-info {
  margin-bottom: 30px;
}

.info-item {
  display: flex;
  align-items: center;
  margin-bottom: 25px;
}

.info-icon {
  width: 50px;
  height: 50px;
  background-color: rgba(229, 9, 20, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-right: 15px;
  color: #E50914;
  font-size: 1.2rem;
}

.contact-svg {
  width: 25px;
  height: 25px;
  filter: invert(14%) sepia(89%) saturate(5266%) hue-rotate(353deg) brightness(87%) contrast(114%);
}

.social-svg {
  width: 40px;
  height: 40px;
}

.info-content h3 {
  margin: 0 0 5px;
  font-size: 1.1rem;
}

.info-content p {
  margin: 0;
  color: #aaa;
}

.info-content a {
  color: #aaa;
  text-decoration: none;
  transition: color 0.3s;
}

.info-content a:hover {
  color: #E50914;
}

.social-links {
  margin-bottom: 30px;
}

.social-links h3 {
  font-size: 1.1rem;
  margin-bottom: 15px;
}

.social-icons {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}

.social-icon {
  width: 55px;
  height: 55px;
  background-color: #444;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  text-decoration: none;
  transition: all 0.3s;
}

.social-icon:hover {
  background-color: white;
  transform: translateY(-3px);
}

.netflix-icon {
  font-family: 'Arial', sans-serif;
  font-weight: bold;
  font-size: 1.2rem;
}

.availability h3 {
  font-size: 1.1rem;
  margin-bottom: 15px;
}

.availability-status {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.status-indicator {
  width: 12px;
  height: 12px;
  border-radius: 50%;
  margin-right: 10px;
}

.available {
  background-color: #28a745;
  box-shadow: 0 0 5px #28a745;
}

.unavailable {
  background-color: #dc3545;
  box-shadow: 0 0 5px #dc3545;
}

.response-time {
  color: #aaa;
  font-size: 0.9rem;
}

.response-time i {
  margin-right: 5px;
}

/* Success Animation */
.success-animation {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.85);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
  animation: fadeIn 0.3s ease-in-out;
  backdrop-filter: blur(3px);
}

.success-animation-container {
  background-color: #1f1f1f;
  border-radius: 10px;
  padding: 40px;
  text-align: center;
  box-shadow: 0 0 30px rgba(229, 9, 20, 0.3);
  max-width: 500px;
  width: 90%;
  animation: scaleIn 0.5s ease-in-out;
  border: 1px solid rgba(229, 9, 20, 0.2);
  display: flex;
  flex-direction: column;
  align-items: center;
}

.success-title {
  font-size: 2rem;
  margin: 20px 0 15px;
  color: #fff;
}

.success-message {
  font-size: 1.1rem;
  color: #aaa;
  margin-bottom: 0;
}

.tick-container {
  width: 100px;
  height: 100px;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 20px;
}

.tick-icon {
  width: 100px;
  height: 100px;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  object-fit: contain;
  animation: blink-fade 2s infinite, scale-up 0.5s ease-out;
}

@keyframes blink-fade {
  0% {
    opacity: 1;
    filter: drop-shadow(0 0 8px rgba(229, 9, 20, 0.8));
  }
  50% {
    opacity: 0.7;
    filter: drop-shadow(0 0 15px rgba(229, 9, 20, 0.5));
  }
  100% {
    opacity: 1;
    filter: drop-shadow(0 0 8px rgba(229, 9, 20, 0.8));
  }
}

@keyframes scale-up {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  70% {
    transform: scale(1.2);
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes scaleIn {
  from { transform: scale(0.8); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}

@media (max-width: 992px) {
  .contact-grid {
    flex-direction: column;
    align-items: center;
  }
  
  .contact-form-container, .contact-info-container {
    max-width: 550px;
  }
  
  .section-title {
    text-align: center;
  }
  
  .section-title::after {
    left: 50%;
    transform: translateX(-50%);
  }
}

@media (max-width: 768px) {
  .profile-content {
    flex-direction: column;
    text-align: center;
  }
  
  .profile-image-container {
    margin-right: 0;
    margin-bottom: 20px;
  }
  
  .contact-form-container, .contact-info-container {
    max-width: 100%;
    padding: 0 10px;
  }
  
  .info-icon {
    width: 40px;
    height: 40px;
    font-size: 1rem;
  }
  
  .success-animation-container {
    padding: 30px;
    width: 85%;
  }
  
  .success-title {
    font-size: 1.8rem;
  }
  
  .success-message {
    font-size: 1rem;
  }
  
  /* .social-icons {
    justify-content: flex-start;
  } */
  
  .social-icon {
    width: 45px;
    height: 45px;
  }
  
  /* .social-svg {
    width: 25px;
    height: 25px;
  } */
}

.recaptcha-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 20px;
  width: 100%;
}

.g-recaptcha {
  margin-bottom: 10px;
  transform-origin: left top;
}

@media (max-width: 400px) {
  .g-recaptcha {
    transform: scale(0.8);
  }
}
</style> 