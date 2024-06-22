<template>
<div class="MainBookRead">
    <div class="MainBookReadgg">
        <pre class="Text">{{ book.main_content }}</pre>
    </div>
</div>
<button class="closebutton1" @click="$emit('close')">
  Назад к описанию
</button>
</template>
    
<script>
  import axios from 'axios';
  
  export default {
    props: ['bookId'],
  
    data ()
    {
      return {
        book: [],
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
.MainBookRead {
    max-width: 900px;
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    margin: auto;
    width: 100%;
    font-family: "Roboto", sans-serif;
    font-weight: 500;
    color: #e0e0e0;
}

.MainBookReadgg {
    position: relative;
}

.Text {
    color: var(--text-primary);
    font-size: 19px;
    line-height: 1.7;
    padding: 32px;
    min-height: 100px;
    padding: 24px 16px;
    background: var(--bg-primary);
    text-align: center;
}

.closebutton1 {
    color:#c5c5c5;
    border: none;
    outline: none;
    background: none;
    cursor: pointer;
    padding: 15px;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    position: fixed;
    left: 20px;
    top: 55px;
}
  
.closebutton1:hover {
    color: #a7a7a7;
}
</style>