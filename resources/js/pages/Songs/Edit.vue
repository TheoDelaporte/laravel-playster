<template>
    <div>
      <h1>Modifier une Musique</h1>
      <form @submit.prevent="updateSong">
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
        <button type="submit">Mettre à jour</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      song: Object,
    },
    data() {
      return {
        form: {
          title: this.song.title,
          artist: this.song.artist,
          album: this.song.album,
          duration: this.song.duration,
          file_path: this.song.file_path,
        },
      };
    },
    methods: {
      updateSong() {
        this.$inertia.put(`/songs/${this.song.id}`, this.form);
      },
    },
  };
  </script>
  