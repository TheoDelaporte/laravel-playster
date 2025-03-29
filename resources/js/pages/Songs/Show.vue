<template>
    <div>
      <h1>{{ song.title }} - {{ song.artist }}</h1>
      <p>{{ song.album }}</p>
      <p>{{ song.duration }} secondes</p>
      <p>{{ song.file_path }}</p>
  
      <inertia-link :href="'/songs/' + song.id + '/edit'">Modifier</inertia-link>
      <form @submit.prevent="deleteSong">
        <button type="submit">Supprimer</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      song: Object,
    },
    methods: {
      deleteSong() {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette chanson ?')) {
          this.$inertia.delete(`/songs/${this.song.id}`);
        }
      },
    },
  };
  </script>
  