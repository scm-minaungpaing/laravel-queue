<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <b-container>
      <!-- <a class="navbar-brand" href="#">Navbar</a> -->
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <nuxt-link to="/" class="nav-link">Home</nuxt-link>
          </li>
          <li class="nav-item">
            <nuxt-link to="/upload" class="nav-link">Upload</nuxt-link>
          </li>
        </ul>
      </div>
    </b-container>
  </nav>
</template>

<script>
export default {};
</script>

<style scoped>
nav {
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
}
.nav-link {
  font-weight: bold;
}
</style>
