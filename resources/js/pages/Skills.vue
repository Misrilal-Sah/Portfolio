<template>
  <div class="skills-page">
    
    <div class="skills-category" v-for="(category, categoryIndex) in categories" :key="categoryIndex">
      <h2 class="category-title">{{ category.title }}</h2>
      <div class="skills-grid">
        <div class="skill-card" v-for="(skill, skillIndex) in category.skills" :key="skillIndex" :class="{'active': skill.active}">
          <div class="skill-icon" :class="skill.iconClass">
            <img :src="skill.icon" :alt="skill.name">
          </div>
          <h3 class="skill-name" :style="{ '--index': skillIndex }">{{ skill.name }}</h3>
          <div class="skill-description" :style="{ '--index': skillIndex }">{{ skill.description }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Skills',
  data() {
    return {
      categories: [
        {
          title: 'Backend',
          skills: [
            {
              name: 'PHP',
              description: 'Backend Language',
              icon: '/images/skills/icons8-php.svg',
              iconClass: 'php',
              // active: true
            },
            {
              name: 'Python',
              description: 'Backend Language',
              icon: '/images/skills/python-svgrepo-com.svg',
              iconClass: 'python'
            },
            {
              name: 'Node.js',
              description: 'Backend Runtime',
              icon: '/images/skills/icons8-node-js.svg',
              iconClass: 'node'
            }
          ]
        },
        {
          title: 'Frontend',
          skills: [
            {
              name: 'HTML5',
              description: 'Web Markup',
              icon: '/images/skills/icons8-html.svg',
              iconClass: 'html'
            },
            {
              name: 'CSS3',
              description: 'Web Styling',
              icon: '/images/skills/icons8-css.svg',
              iconClass: 'css'
            },
            {
              name: 'JavaScript',
              description: 'Frontend Language',
              icon: '/images/skills/icons8-javascript.svg',
              iconClass: 'js'
            },
            {
              name: 'Vue.js',
              description: 'Frontend Framework',
              icon: '/images/skills/vue-js-svgrepo-com.svg',
              iconClass: 'vue'
            },
            {
              name: 'React',
              description: 'Frontend Library',
              icon: '/images/skills/react-fill-svgrepo-com.svg',
              iconClass: 'react'
            }
          ]
        },
        {
          title: 'Database',
          skills: [
            {
              name: 'MySQL',
              description: 'Relational Database',
              icon: '/images/skills/icons8-mysql.svg',
              iconClass: 'mysql'
            },
            {
              name: 'PostgreSQL',
              description: 'Relational Database',
              icon: '/images/skills/icons8-postgresql.svg',
              iconClass: 'postgresql'
            }
          ]
        },
        {
          title: 'Frameworks',
          skills: [
            {
              name: 'Laravel',
              description: 'PHP Framework',
              icon: '/images/skills/laravel-svgrepo-com.svg',
              iconClass: 'laravel'
            },
            {
              name: 'Yii',
              description: 'PHP Framework',
              icon: '/images/skills/yii-svgrepo-com.svg',
              iconClass: 'yii'
            },
            {
              name: 'Bootstrap',
              description: 'CSS Framework',
              icon: '/images/skills/bootstrap-svgrepo-com.svg',
              iconClass: 'bootstrap'
            }
          ]
        },
        {
          title: 'Cloud & DevOps',
          skills: [
            {
              name: 'AWS',
              description: 'Cloud Platform',
              icon: '/images/skills/aws-svgrepo-com.svg',
              iconClass: 'mysql'
            },
            {
              name: 'Netlify',
              description: 'Frontend Deployment Platform',
              icon: '/images/skills/netlify.svg',
              iconClass: 'postgresql'
            }
          ]
        },
        {
          title: 'Others',
          skills: [
            {
              name: 'Stripe',
              description: 'Payment Processing',
              icon: '/images/skills/icons8-stripe.svg',
              iconClass: 'stripe'
            }
          ]
        }
      ]
    }
  }
}
</script>

<style scoped>
.skills-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

.page-title {
  font-size: 2.5rem;
  margin-bottom: 40px;
  position: relative;
  display: inline-block;
}

.page-title::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -10px;
  width: 60px;
  height: 4px;
  background-color: #E50914;
}

.skills-category {
  margin-bottom: 60px;
}

.category-title {
  font-size: 2rem;
  margin-bottom: 30px;
  text-align: center;
  position: relative;
  display: block;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
}

.category-title::after {
  content: '';
  position: absolute;
  bottom: -15px;
  left: 50%;
  transform: translateX(-50%);
  width: 100px;
  height: 3px;
  background-color: #E50914;
}

.skills-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 25px;
  width: 100%;
}

/* For sections with only one or two items, ensure they take equal width */
.skills-category:nth-child(3) .skills-grid,
.skills-category:nth-child(4) .skills-grid,
.skills-category:nth-child(6) .skills-grid {
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
}

/* For specific categories with only one item, make it take more width */
.skills-category:nth-child(6) .skills-grid {
  display: flex;
  justify-content: center;
}

.skills-category:nth-child(6) .skill-card {
  width: 250px;
}

.skill-card {
  background-color: #1f1f1f;
  border-radius: 8px;
  padding: 25px 20px 25px 20px;
  text-align: center;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.skill-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 20px rgba(229, 9, 20, 0.5);
  border: 1px solid rgba(229, 9, 20, 0.3);
  background-color: #292929;
}

.skill-card.active {
  box-shadow: 0 0 20px rgba(229, 9, 20, 0.5);
  border: 1px solid rgba(229, 9, 20, 0.3);
}

.skill-card.active::after,
.skill-card:hover::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  box-shadow: inset 0 0 15px rgba(229, 9, 20, 0.3);
  border-radius: 8px;
  pointer-events: none;
}

.skill-icon {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 15px;
  background-color: #ab1919;
  padding: 12px;
}

.skill-icon img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.skill-name {
  font-size: 1.2rem;
  margin-bottom: 8px;
  color: white;
  animation: dropIn 0.6s ease-in-out forwards;
  animation-delay: calc(var(--index, 0) * 0.1s);
  opacity: 0;
  transform: translateY(-20px);
}

.skill-description {
  font-size: 0.9rem;
  color: #b3b3b3;
  animation: dropIn 0.6s ease-in-out forwards;
  animation-delay: calc((var(--index, 0) * 0.1s) + 0.2s);
  opacity: 0;
  transform: translateY(-15px);
  margin-bottom: 15px;
}

@keyframes dropIn {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

@media (max-width: 768px) {
  .skills-grid {
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 15px;
  }
  
  .skill-card {
    padding: 20px 15px;
  }
  
  .skill-icon {
    width: 50px;
    height: 50px;
  }
  
  .skill-name {
    font-size: 1.1rem;
  }
}
</style> 