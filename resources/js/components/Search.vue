<template>
    <form @submit.prevent="search" class="search">
      <input type="text" v-model="searchQuery" name="search" placeholder="Введите запрос">
      <button type="submit">Найти</button>
    </form>
    <div v-if="results">
      <!-- Здесь вы можете отобразить результаты поиска -->
      <div v-for="result in results" :key="result.id">
        {{ result.name }}
      </div>
    </div>
  </template>
  
  <script>
import axios from 'axios';

export default {
  name: 'Search',
  emits: ['getresult'],  // Добавлено объявление события

  data() {
    return {
      searchQuery: '',
      results: null
    };
  },

  methods: {
    search() {
      axios.post('/search', {
        query: this.searchQuery
      })
      .then((response) => {
        this.results = response.data;
        console.log(this.results);
        this.$emit('getresult', this.results);
      })
      .catch((error) => {
        console.error("There was an error!", error);
      });
    }
  },
};
</script>

<style>
.search {
    position: fixed;
    height: 40px;
    left: 33%;
    top: 8px;
    z-index: 10;
}

.search input {
    width: 31vw;
    height: 40px;
    padding-left: 15px;
    border: 2px solid #303030;
    border-radius: 40px;
    outline: none;
    background: #161616;
    color: #f5f5f5;
    font-size: 14px;
    font-weight: 400;
}

.search button {
    position: absolute;
    padding-left: 7px;
    display: inline-flex;
    align-items: center; 
    top: 0;
    right: 12px;
    width: 55px;
    height: 40px;
    border: none;
    color: #f5f5f5;
    background: #303030;
    border-radius: 0 40px 40px 0;;
    cursor: pointer;
}

.header-text {
    display: inline-flex;
    position: relative;
    align-items: center;
    padding: 0 12px;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
</style>