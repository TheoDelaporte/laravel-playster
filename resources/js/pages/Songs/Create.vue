<template>
    <div>
      <h1>Ajouter une Musique</h1>
      <form @submit.prevent="createSong">
        <div>
          <label for="title">Titre</label>
          <input type="text" v-model="form.title" required />
        </div>
        <div>
          <label for="artist">Artiste</label>
          <input type="text" v-model="form.artist" required />
        </div>
        <div>
          <label for="album">Album</label>
          <input type="text" v-model="form.album" />
        </div>
        <div>
          <label for="duration">Durée (en secondes)</label>
          <input type="number" v-model="form.duration" />
        </div>
        <div>
          <label for="file_path">Fichier (Chemin)</label>
          <input type="text" v-model="form.file_path" required />
        </div>
        <button type="submit">Créer</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          title: '',
          artist: '',
          album: '',
          duration: '',
          file_path: '',
        },
      };
    },
    methods: {
      createSong() {
        this.$inertia.post('/songs', this.form);
      },
    },
  };
  </script>
  