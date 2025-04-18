<template>
  <div class="experience-page">
    <h1 class="page-title">Work Experience</h1>
    
    <div class="experience-timeline">
      <!-- Work experience items -->
      <div v-for="(experience, index) in experiences.slice(0, 3)" :key="index" class="timeline-item" :class="{'right': index % 2 !== 0}">
        <div class="timeline-marker" data-tooltip="Work Experience">
          <img src="/images/work-experience/suitcase-svgrepo-com.svg" alt="Work" class="timeline-icon">
          <div class="date-container" :class="{'date-right': index % 2 === 0, 'date-left': index % 2 !== 0}">
            {{ experience.period }}
          </div>
        </div>
        <div class="timeline-content">
          <h3 class="timeline-title">{{ experience.title }}</h3>
          <h4 class="timeline-company">{{ experience.company }}</h4>
          <div class="timeline-description">
            <ul>
              <li v-for="(point, pointIndex) in experience.description" :key="pointIndex">
                {{ point }}
              </li>
            </ul>
          </div>
          <div class="timeline-tech" v-if="experience.technologies">
            <span class="tech-title">Technologies:</span>
            <div class="tech-tags">
              <span v-for="(tech, techIndex) in experience.technologies" :key="techIndex" class="tech-tag">
                {{ tech }}
              </span>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Education section using existing data (the last item from experiences array) -->
      <div class="timeline-item right">
        <div class="timeline-marker education-marker" data-tooltip="Education">
          <img src="/images/work-experience/graduation-hat-alt-1-svgrepo-com.svg" alt="Education" class="timeline-icon">
          <div class="date-container date-left">
            {{ experiences[3].period }}
          </div>
        </div>
        <div class="timeline-content timeline-content-study">
          <h3 class="timeline-title">{{ experiences[3].title }}</h3>
          <div class="timeline-description">
            <ul>
              <li v-for="(point, pointIndex) in experiences[3].description" :key="pointIndex">
                {{ point }}
              </li>
            </ul>
          </div>
        </div>
      </div>
      
      
      <div class="timeline-item right">
        <div class="timeline-marker education-marker over-marker" data-tooltip="Education">
          <img src="/images/work-experience/start.svg" alt="Star" class="timeline-icon">
        </div>
      </div>
      
      <!-- Just the star marker at the end -->
      <!-- <div class="timeline-end">
        <div class="timeline-marker star-marker" data-tooltip="Career Start">
          <img src="/images/work-experience/start.svg" alt="Star" class="timeline-icon">
        </div>
      </div> -->
    </div>
  </div>
</template>

<script>
export default {
  name: 'Experience',
  data() {
    return {
      experiences: [
        {
          period: "2024 - Present",
          title: "Software Engineer",
          company: "Ciklum India",
          description: [
          "Enhanced platform usability with new features.",
          "Built site reporting to analyze subscribers and customers.",
          "Created dynamic, auto-generated movie pages for promotions.",
          "Added tracking for clicks, downloads, and interactions with visualized insights."
        ],
          technologies: ["Node.js", "Vue.js", "PHP", "Laravel", "MySQL", "AWS","Git"]
        },
        {
          period: "2023 - 2024",
          title: "Software Engineer",
          company: "Infogen Labs Pvt Limited",
          description: [
            "Optimized data processing, resolving timeout errors.",
            "Integrated third-party services to enhance platform.",
            "Fixed Stripe billing issues.",
            "Automated post management via Facebook Graph API.",
            "Implemented cron jobs for live engagement metrics."
             ],
          technologies: ["PHP", "Laravel", "Node.js", "Vue.js", "MySQL", "AWS","Git"]
        },
        {
          period: "2022 - 2022",
          title: "Web Designer (Intern)",
          company: "Gadre Infotech Pvt Limited",
          description: [
            "Built a school website",
            "The website is responsive on all devices"
          ],
          technologies: ["HTML", "CSS", "Bootstrap","JavaScript","Git"]
        },
        {
          period: "2019 - 2023",
          title: "Bachelor of Computer Engineering",
          company: "University of Mumbai",
          description: [
            "Studied Computer Engineering",
            "Graduated with an 8.8 CGPA",
            "Created vFurnature eCommerce website"
          ],
        }
      ],
      study: [
      {
          period: "2019 - 2023",
          title: "Vellore Institute of Technology Bachelor",
          description: [
            "Studied Computer Engineering",
            "Graduated with an 8.8 CGPA",
            "Created vFurnature eCommerce website"
          ],
        }
      ]
    }
  }
}
</script>

<style scoped>
.experience-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  margin-bottom: 30px;
}

.page-title {
  font-size: 2.5rem;
  margin-bottom: 50px;
  position: relative;
  display: block;
  text-align: center;
  width: 100%;
  color: #fff;
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

.experience-timeline {
  position: relative;
  max-width: 1000px;
  margin: 0 auto;
}

.experience-timeline::before {
  content: '';
  position: absolute;
  top: 0;
  bottom: 0;
  width: 4px;
  background-color: #E50914;
  left: 50%;
  transform: translateX(-50%);
  z-index: 0;
}

.timeline-item {
  padding: 10px 40px;
  position: relative;
  width: 50%;
  box-sizing: border-box;
  margin-bottom: 50px;
}

.timeline-marker {
  position: absolute;
  width: 60px;
  height: 60px;
  background-color: #68b612;
  border-radius: 50%;
  top: 15px;
  right: -30px;
  z-index: 2;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 0 0 4px #141414, 0 0 0 8px rgba(229, 9, 20, 0.5);
}

.timeline-marker::before {
  content: attr(data-tooltip);
  position: absolute;
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  padding: 5px 10px;
  border-radius: 5px;
  font-size: 0.8rem;
  visibility: hidden;
  opacity: 0;
  transition: all 0.3s ease;
  width: max-content;
}

.timeline-item:not(.right) .timeline-marker::before {
  right: 70px;
  top: 50%;
  transform: translateY(-50%);
}

.timeline-item.right .timeline-marker::before {
  left: 70px;
  top: 50%;
  transform: translateY(-50%);
}

.timeline-marker:hover::before {
  visibility: visible;
  opacity: 1;
}

.timeline-icon {
  width: 30px;
  height: 30px;
  filter: invert(100%);
}

.education-marker {
  background-color: #4479b1;
  box-shadow: 0 0 0 4px #141414, 0 0 0 8px rgba(0, 123, 255, 0.5);
}

.timeline-item.right {
  left: 50%;
}

.timeline-item.right .timeline-marker {
  left: -30px;
  right: auto;
}

.timeline-content {
  background-color: #b7f3b7;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
  position: relative;
}

.timeline-content::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  background-color: inherit;
  top: 20px;
  transform: rotate(45deg);
  z-index: 1;
}

.timeline-item:not(.right) .timeline-content::after {
  right: -10px;
  margin-right: 0px;
}

.timeline-item.right .timeline-content::after {
  left: -10px;
  margin-left: 0px;
}

.timeline-item:not(.right) .timeline-content {
  margin-right: 25px;
}

.timeline-item.right .timeline-content {
  margin-left: 25px;
}

.date-container {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 6px 10px;
  border-radius: 5px;
  font-weight: bold;
  z-index: 3;
  border: 1px solid yellow;
  font-size: 0.9rem;
  width: max-content;
}

.date-right {
  left: 85px;
}

.date-left {
  right: 85px;
}

.timeline-title {
  font-size: 1.5rem;
  color: black;
  margin: 0 0 5px;
}

.timeline-company {
  font-size: 1.1rem;
  color: black;
  margin: 0 0 15px;
  font-weight: normal;
}

.timeline-description ul {
  margin: 0;
  padding-left: 20px;
}

.timeline-description li {
  color: black;
  margin-bottom: 10px;
  line-height: 1.5;
}

.timeline-tech {
  margin-top: 20px;
}

.tech-title {
  display: block;
  color: black;
  margin-bottom: 8px;
}

.tech-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.tech-tag {
  background-color: rgba(229, 9, 20, 0.2);
  border: 1px solid #E50914;
  color: #E50914;
  padding: 5px 10px;
  border-radius: 15px;
  font-size: 0.8rem;
  display: inline-block;
}

.star-marker {
  background-color: #ffd700;
  box-shadow: 0 0 0 4px #141414, 0 0 0 8px rgba(255, 215, 0, 0.5);
  position: relative;
  z-index: 10;
}

.timeline-end {
  position: absolute;
  bottom: -30px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 5;
}

.timeline-content-study {
  background-color: #FFE5B4;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.4);
  position: relative;
}

.over-marker {
  background-color: #ffd700 !important;
  box-shadow: 0 0 0 4px #141414, 0 0 0 8px rgba(255, 215, 0, 0.5) !important;
}

.timeline-content-study::after {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  background-color: inherit;
  top: 20px;
  left: -10px;
  transform: rotate(45deg);
  z-index: 1;
  margin-left: 0px;
}

@media (max-width: 768px) {
  .experience-timeline::before {
    left: 40px;
  }
  
  .timeline-item {
    width: 100%;
    padding-left: 80px;
    padding-right: 0;
  }
  
  .timeline-marker {
    left: 10px;
    right: auto;
  }
  
  .timeline-item.right {
    left: 0;
  }
  
  .timeline-item.right .timeline-marker {
    left: 10px;
  }
  
  .date-container {
    position: absolute;
    top: -40px;
    left: auto;
    right: auto;
  }
  
  .date-left, .date-right {
    left: 60px;
  }
  
  .timeline-content::after {
    display: none;
  }
  
  .timeline-end {
    position: absolute;
    bottom: -30px;
    left: 40px;
    transform: none;
  }
  
  .timeline-item:not(.right) .timeline-content,
  .timeline-item.right .timeline-content {
    margin-left: 0;
    margin-right: 0;
  }
  
  .star-marker {
    left: 0;
    position: relative;
  }
}
</style> 