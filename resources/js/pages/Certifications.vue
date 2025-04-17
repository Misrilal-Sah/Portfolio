<template>
  <div class="certifications-page">
    <h1 class="page-title">Certifications</h1>
    
    <div class="certifications-grid">
      <div class="certification-card" v-for="(cert, index) in certifications" :key="index">
        <div class="cert-logo">
          <img :src="cert.logo" :alt="cert.provider + ' Logo'" class="provider-logo">
        </div>
        <div class="cert-content">
          <h2 class="cert-title">{{ cert.title }}</h2>
          <div class="external-link" @click.stop="openCertificate(cert.url)" title="View Certificate">
            <img src="/images/external-link.svg" alt="External Link" class="link-icon">
          </div>
        </div>
        <div class="cert-provider">{{ cert.provider }}</div>
        <div class="cert-date" v-if="cert.date">Issued {{ cert.date }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Certifications',
  data() {
    return {
      certifications: [
        {
          title: 'Stripe Certified Professional Developer',
          provider: 'Stripe',
          logo: '/images/certification/stripe-svgrepo-com.svg',
          date: 'Apr 2025 - Apr 2027',
          url: 'https://stripecertifications.credential.net/520127d0-f32f-4a97-ab3c-3db946d60430#acc.rSIwnGlV'
        },
        {
          title: 'Complete python developer in 2022 : Zero to Mastery',
          provider: 'Udemy',
          logo: '/images/certification/udemy-svgrepo-com.svg',
          date: 'Aug 2022',
          url: 'https://udemy-certificate.s3.amazonaws.com/pdf/UC-8a656259-27f9-4b44-8430-05babd6407a5.pdf'
        },
        {
          title: 'PHP: Object-Oriented Programming',
          provider: 'LinkedIn Learning',
          logo: '/images/certification/linkedin.svg',
          date: 'Sept 2023',
          url: 'https://www.linkedin.com/learning/certificates/0e2d7bead3b48051a0233c962ba0a4c1cbe12acdb3da4c6199d90cdd81ee5fc4?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_certifications_details%3B3g25T%2BL4SSKZ2dn9p%2F5Uxw%3D%3D'
        },
        {
          title: 'Introduction to Structured Query Language (SQL)',
          provider: 'University of Michigan',
          logo: '/images/certification/coursera-svgrepo-com.svg',
          date: 'Jul 2023',
          url: 'https://www.coursera.org/account/accomplishments/certificate/Y2T4EM8NLHTQ'
        },
        {
          title: 'Introduction to VueJS Framework',
          provider: 'Codio',
          logo: '/images/certification/codio-svgrepo-com.svg',
          date: '2024',
          url: 'https://www.coursera.org/account/accomplishments/verify/UN8PK696WV9Y'
        },
        {
          title: 'NodeJS - The Complete Guide (MVC, REST APIs, GraphQL, Deno)',
          provider: 'Udemy',
          logo: '/images/certification/udemy-svgrepo-com.svg',
          date: 'June 2024',
          url: 'https://www.udemy.com/certificate/UC-c8b201aa-fa9d-45b5-b579-b0df00c433b3/'
        },
        {
          title: 'React Basics',
          provider: 'Meta',
          logo: '/images/certification/coursera-svgrepo-com.svg',
          date: 'Mar 2023',
          url: 'https://www.coursera.org/account/accomplishments/certificate/C39V4L7RTF3U'
        },
        {
          title: 'The Ultimate MySQL Bootcamp: Go from SQL Beginner to Expert',
          provider: 'Udemy',
          logo: '/images/certification/udemy-svgrepo-com.svg',
          date: 'Nov 2023',
          url: 'https://www.udemy.com/certificate/UC-94d534d9-468a-46a6-b981-7814e67b79eb/'
        },
        {
          title: 'PHP Essential Training',
          provider: 'LinkedIn Learning',
          logo: '/images/certification/linkedin.svg',
          date: 'Sept 2023',
          url: 'https://www.linkedin.com/learning/certificates/d4af2e5d7c8856f2e05f14ece5634b217e117fbbb2b306e200f99fff11a8e55c?lipi=urn%3Ali%3Apage%3Ad_flagship3_profile_view_base_certifications_details%3B3g25T%2BL4SSKZ2dn9p%2F5Uxw%3D%3D'
        },
        {
          title: 'Introduction to Cloud Computing',
          provider: 'IBM',
          logo: '/images/certification/coursera-svgrepo-com.svg',
          date: 'july 2024',
          url: 'https://www.coursera.org/account/accomplishments/verify/N7XUWJJJJ3YT'
        },
        {
          title: 'Yii 2: From Beginner to Expert',
          provider: 'Udemy',
          logo: '/images/certification/udemy-svgrepo-com.svg',
          date: 'Dec 2023',
          url: 'https://www.udemy.com/certificate/UC-13d6816e-824e-40b6-b9bc-b4e4fbe8801b/'
        }
      ]
    }
  },
  methods: {
    openCertificate(url) {
      if (url) {
        window.open(url, '_blank');
      }
    }
  }
}
</script>

<style scoped>
.certifications-page {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
  margin-bottom: 50px;
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

.certifications-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

.certification-card {
  background-color: #1f1f1f;
  border-radius: 8px;
  padding: 25px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: default;
  display: flex;
  flex-direction: column;
  border: 1px solid transparent;
  min-height: 220px;
  position: relative;
}

.certification-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 0 20px rgba(229, 9, 20, 0.5);
  border: 1px solid rgba(229, 9, 20, 0.3);
  background-color: #292929;
}

.cert-logo {
  margin-bottom: 15px;
  height: 35px;
  display: flex;
  align-items: center;
}

.provider-logo {
  width: 35px;
  height: 35px;
  object-fit: contain;
  filter: brightness(0) saturate(100%) invert(63%) sepia(47%) saturate(6030%) hue-rotate(192deg) brightness(93%) contrast(92%);
}

.cert-content {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  margin-bottom: 15px;
}

.cert-title {
  font-size: 1.3rem;
  color: #fff;
  margin: 0;
  flex: 1;
  padding-right: 10px;
  word-break: break-word;
  line-height: 1.4;
}

.external-link {
  width: 24px;
  height: 24px;
  flex-shrink: 0;
  color: #E50914;
  margin-top: 4px;
  cursor: pointer;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  position: relative;
}

.external-link::after {
  content: '';
  position: absolute;
  top: -5px;
  left: -5px;
  right: -5px;
  bottom: -5px;
  border-radius: 50%;
  background-color: transparent;
  transition: background-color 0.3s ease;
}

.external-link:hover::after {
  background-color: rgba(229, 9, 20, 0.2);
}

.external-link:hover {
  transform: scale(1.2);
}

.link-icon {
  width: 24px;
  height: 24px;
  color: #E50914;
  filter: invert(14%) sepia(89%) saturate(5266%) hue-rotate(353deg) brightness(87%) contrast(114%);
}

.cert-provider {
  font-size: 1rem;
  color: #aaa;
  margin-bottom: 12px;
}

.cert-date {
  font-size: 0.85rem;
  color: #666;
  margin-top: auto;
  padding-top: 15px;
  position: relative;
}

@media (max-width: 768px) {
  .certifications-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
  }
  
  .certification-card {
    padding: 20px;
    min-height: 200px;
  }
  
  .cert-title {
    font-size: 1.1rem;
  }
}
</style> 