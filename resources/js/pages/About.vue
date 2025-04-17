<template>
  <div class="about-page">
    <h1 class="page-title">About Me</h1>
    
    <div class="about-content">
      <div class="about-image">
        <div class="profile-image"></div>
      </div>
      
      <div class="about-text">
        <p class="intro">
          Hi, I'm a Dedicated engineer with 2+ years of experience as a Full Stack Developer, proficient in PHP and JavaScript technologies and specializing in the ed-tech sector. Demonstrated expertise in building modern web applications using Laravel, Yii, Vue.js, and Node.js frameworks. Skilled in developing end-to-end solutions, from responsive frontend interfaces to robust backend systems. Strong experience in database design using MySQL, implementing secure payment solutions through Stripe integration, and working with business automation tools like vTiger CRM and PHPRunner for rapid application development.
        </p>
        
        <h2 class="section-title">My Journey</h2>
        <p>
          I began my programming journey in 2023 and have been creating digital solutions ever since. I'm passionate about tackling complex challenges and transforming ideas into reality with clean, efficient code.
        </p>

        <h2 class="section-title">My Hobbies</h2>
      <p>
        I enjoy playing football, diving into online games, and watching anime and movies. In my free time, I also love exploring new genres of music and travelling. These activities help me relax and inspire new ideas, both in my personal life and in my work.
      </p>

        <h2 class="section-title">My Skills</h2>
        <div class="skills-container">
          <div class="skill-category">
            <h3>Frontend</h3>
            <ul>
              <li>HTML5 & CSS3</li>
              <li>JavaScript</li>
              <li>Vue.js</li>
              <li>React</li>
              <li>Responsive Design</li>
            </ul>
          </div>
          
          <div class="skill-category">
            <h3>Backend</h3>
            <ul>
              <li>PHP</li>
              <li>Python</li>
              <li>Node.js</li>
            </ul>
          </div>

          <div class="skill-category">
            <h3>Database</h3>
            <ul>
              <li>MySQL</li>
              <li>PostgreSQL</li>
            </ul>
          </div>

          <div class="skill-category">
            <h3>Framework</h3>
            <ul>
              <li>Laravel</li>
              <li>Yii</li>
              <li>Bootstrap</li>
            </ul>
          </div>

          <div class="skill-category">
            <h3>Tools</h3>
            <ul>
              <li>Siteground</li>
              <li>VTiger</li>
              <li>PHPRunner</li>
              <li>XAMPP</li>
              <li>Jira</li>
              <li>Git</li>
            </ul>
          </div>
          
          <div class="skill-category">
            <h3>Other</h3>
            <ul>
              <li>AWS</li>
              <li>Stripe</li>
              <li>RESTful APIs</li>
              <li>Meta Graph API</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'About'
}
</script>

<style scoped>
.about-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.page-title {
  font-size: 2.5rem;
  margin-bottom: 40px;
  position: relative;
  display: block;
  text-align: center;
  width: 100%;
}

.page-title::after {
  content: '';
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  bottom: -10px;
  width: 60px;
  height: 4px;
  background-color: #E50914;
}

.about-content {
  display: flex;
  gap: 40px;
}

.about-image {
  flex: 0 0 300px;
}

.profile-image {
  width: 100%;
  height: 400px;
  background-color: #333;
  background-image: url('/images/about/Misril-about.jpg');
  background-size: cover;
  background-position: center;
  border-radius: 5px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.about-text {
  flex: 1;
}

.intro {
  font-size: 1.3rem;
  line-height: 1.6;
  margin-bottom: 30px;
  color: #e5e5e5;
}

.section-title {
  font-size: 1.8rem;
  margin: 30px 0 15px;
  color: #e5e5e5;
}

p {
  line-height: 1.6;
  margin-bottom: 20px;
  color: #b3b3b3;
}

.skills-container {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  margin-top: 20px;
}

.skill-category {
  flex: 1;
  min-width: 200px;
}

.skill-category h3 {
  font-size: 1.2rem;
  color: #E50914;
  margin-bottom: 15px;
  position: relative;
}

.skill-category h3::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -5px;
  width: 30px;
  height: 2px;
  background-color: #E50914;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

li {
  padding: 5px 0;
  color: #b3b3b3;
  position: relative;
  padding-left: 20px;
}

li::before {
  content: '\2022';
  color: #E50914;
  position: absolute;
  left: 0;
}

@media (max-width: 768px) {
  .about-content {
    flex-direction: column;
  }
  
  .about-image {
    flex: 0 0 auto;
  }
  
  .profile-image {
    height: 300px;
  }
  
  .skills-container {
    flex-direction: column;
    gap: 20px;
  }
}
</style> 