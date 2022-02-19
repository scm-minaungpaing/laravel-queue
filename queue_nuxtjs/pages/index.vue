<template>
  <div class="d-flex justify-content-center align-items-center home flex-column">
    <h1>Welcome from Laravel Queue</h1>
    <h5>(Job batching)</h5>
  </div>
</template>

<script>
export default {
  name: 'Index',
  head() {
    return {
        title: "Queue App",
    }
  }
}
</script>

<style scoped>
.home {
  min-height: 90vh;
}
h5 {
  color: gray;
}
</style>
