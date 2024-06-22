<template>
  <div class="MainBookPage" v-if="!showReadtext">
    <div class="LeftBookPage">
      <div class="LeftBookInfo">
        <div class="LeftBookImage">
          <img 
            :src="book.image_url"
            class="first-img" alt=""/>
        </div>
        <div class="LeftBookButton">
          <button class="ButtonBook" @click="bookId = book.id; showReadtext = true;">
            Читать
          </button>
        </div>
        <div class="close">
          <button class="closebutton" @click="$emit('close')">
              Назад
            </button>
        </div>
      </div>
    </div>
    <div class="RightBookPage">
      <div class="TopRightBookPage">
        <div>
          <h1 class="TitleBook">
            {{ book.title }}
          </h1>
          <h6 class="AutorBook">
            {{ book.description }}
          </h6>
        </div>
      </div>
      <div class="DownRightBookPage">
        <div class="DownRightContentPage">
        <div class="DownContent">
            {{ book.content }}
        </div>
        </div>
      </div>
    </div>
  </div>

      <Readtext
      v-if="showReadtext" 
      :bookId="bookId" 
      @close="showReadtext = false"
      />

</template>
  
<script>
import axios from 'axios';
import Readtext from './Readtext.vue';

export default {
  props: ['bookId'],

  components: {
      Readtext,
    },

  data ()
  {
    return {
      book: [],
      showReadtext: false,
    }
  },

  mounted() {
    axios.get(`/books/${this.bookId}`)
        .then(response => {
          this.book = response.data;
        })
        .catch(error => {
          console.error('Error fetching book:', error);
        });
  },
}
</script>
  
<style>
.MainBookPage {
  font-family: "Roboto", sans-serif;
    font-weight: 500;
    color: #e0e0e0;
    max-width: 1320px;
    width: 100%;
    padding: 24px 86px;
    min-height: -webkit-calc(100vh - 64px);
    min-height: -moz-calc(100vh - 64px);
    min-height: calc(100vh - 64px);
    box-sizing: inherit;
    display: flex;
    position: relative;
    margin:0 auto;
}

.LeftBookPage {
  width: 156px;
  position: sticky;
    top: 80px;
}

.LeftBookInfo {
  text-align: center;
    padding-top: 20px;
}

.LeftBookImage {
  margin: 0 0 8px;
    position: relative;
    overflow: hidden;
    border-radius: 0.125rem;
}

.ButtonBook {
  padding: 8px 4px;
    -webkit-border-radius: 16px;
    -moz-border-radius: 16px;
    border-radius: 12px;
    margin-bottom: 16px;
    width: 100%;
    font-weight: 600;
    color: #e0e0e0;
    background: #C08000;
    border: 0;
    cursor: pointer;
    margin: 0;
    display: inline-flex;
    outline: 0;
    position: relative;
    align-items: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
    vertical-align: middle;
    --moz-appearance: none;
    justify-content: center;
    text-decoration: none;
    --webkit-appearance: none;
    -webkit-tap-highlight-color: transparent;
    min-width: auto;
    box-sizing: border-box;
    touch-action: manipulation;
    text-transform: uppercase;
    padding: 8px 16px;
    font-size: 12px;
    font-weight: 400;
    line-height: 1.5;
    border-radius: 8px;
    letter-spacing: .055em;
    overflow: hidden;
    flex-direction: row;
    transition: all 0.3s ease;
    text-decoration: none;
    box-sizing: border-box;
}

.ButtonBook:hover {
  background-color: #a76f01;
}

.closebutton {
  color:#c5c5c5;
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    padding: 15px;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.closebutton:hover {
  color: #a7a7a7;
}

.RightBookPage {
  padding: 0px;
  margin: 0;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  flex-grow: 1;
  max-width: 100%;
  flex-basis: 0;
}

.TopRightBookPage {
  border-bottom: var(--border);
    padding: 0px 8px 0px 36px;
}

.TitleBook {
  font-size: 2rem;
}

.AutorBook {
  font-size: 14px;
  color:#c0c0c0;
}

.DownRightBookPage {
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-flex-wrap: nowrap;
    -ms-flex-wrap: nowrap;
    flex-wrap: nowrap;
    -webkit-box-align: stretch;
    -webkit-align-items: stretch;
    -moz-box-align: stretch;
    -ms-flex-align: stretch;
    align-items: stretch;
    -webkit-align-content: stretch;
    -ms-flex-line-pack: stretch;
    align-content: stretch;
    -webkit-box-pack: flex-start;
    -webkit-justify-content: flex-start;
    -moz-box-pack: flex-start;
    -ms-flex-pack: flex-start;
    justify-content: flex-start;
    border-top: 1px solid #303030;
}

.DownRightContentPage {
  border-bottom: var(--border);
  padding: 15px 8px 12px 36px;
}

.DownContent {
  margin-bottom: 1rem;
  max-width: 950px;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.7;
}
</style>