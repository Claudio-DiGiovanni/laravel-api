<template>
    <div>
        <div class="container">
            <h1>Frontoffice in Vue</h1>
            <div class="row g-3">
                <div v-for="post in arrPosts" :key="post.id" class="col-6 col-md-3">
                    <div class="card text-bg-dark h-100">
                        <img :src="post.image" class="card-img-top" :alt="post.title">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ post.title }}</h5>
                            <p v-for="category in arrCategories" :key="category.id" v-show="category.id == post.category_id" class="card-text flex-grow-1">{{ category.name  }}</p>
                            <a :href="'/posts/' + post.slug" class="btn btn-secondary">Leggi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  name: 'App',
  data() {
    return {
        arrPosts: [],
        arrCategories: [],
    };
  },
  created() {
    axios.get('/api/posts')
      .then(response => this.arrPosts = response.data.posts);
    axios.get('/api/posts')
      .then(response => this.arrCategories = response.data.categories);
  }
}
</script>

<style lang="scss">
    @import '~bootstrap/scss/bootstrap';
</style>
