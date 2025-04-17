<template>
  <div>
    <img src="/images/logo-2.png" alt="Portfolio Logo" class="netflix-title-image">
  </div>
</template>

<script>
export default {
  name: 'NetflixTitle',
  props: {
    text: {
      type: String,
      required: true
    }
  }
}
</script>

<style>
.netflix-title-image {
  height: 40px;
  transition: all 0.3s ease;
}

.netflix-title-image:hover {
  transform: scale(1.05);
  filter: drop-shadow(0 0 3px rgba(229, 9, 20, 0.7));
}

@media (max-width: 768px) {
  .netflix-title-image {
    height: 30px;
  }
}
</style> 