<template>
    <Catalog
        v-if="showCatalog"
        :books="books"
        @close="showCatalog = false"
        @filter="usefilter"
        />

        <AboutUs
        v-if="showAboutUs"
        @close="showAboutUs = false"
        />

        <UserAgreement
        v-if="showUserAgreement"
        @close="showUserAgreement = false"
        />

        <ConfidentialityAgreement
        v-if="showConfidentialityAgreement"
        @close="showConfidentialityAgreement = false"
        />

        <FAQ
        v-if="showFAQ"
        @close="showFAQ = false"
        />

        <Rules
        v-if="showRules"
        @close="showRules = false"
        />

        <DMCA
        v-if="showDMCA"
        @close="showDMCA = false"
        />

        <Copyright
        v-if="showCopyright"
        @close="showCopyright = false"
        />

    <Search
    @getresult="filterBook"
    />

<div class="bookmain">
    <div class="header-lk">
        <div class="katalog">
            <button @click="showCatalog = true; showBook = false; showBooks = true; showConfidentialityAgreement = false; showUserAgreement = false; showFAQ = false; showRules = false; showDMCA = false; showAboutUs = false; showCopyright = false;" class="margin-header-text">Каталог</button>
        </div>
    </div>
        <div v-if="!showBook && showBooks" class="bookpage">
                <div v-for="book in books" :key="book.id" class="book12">
                    <button @click="bookId = book.id; showBook = true; showCatalog = false;" class="book">
                        <div class="d-block">
                            <img :checkbook(book) :src="book.image_url" class="first-img" alt=""/>
                        </div>
                        <div class="bookname">
                            <span class="description">{{ book.description }}</span>
                                <h5 class="book-title">
                                    <div>{{ book.title }}</div>
                                </h5>
                        </div>
                    </button>
                </div>
        </div>
        <Book 
        v-if="showBook" 
        :bookId="bookId" 
        @close="showBook = false"
        />
</div>
<a href="javascript:scroll(0,0)" class="igor"> Наверх </a>
<div class='footer'>
            <div class="border-text">
                <div class="footer-mail">
                    <b class="F">Fabila</b><br><br>
                        Ответим на любой вопрос<br>
                        <a href="https://vk.com/im?media=&sel=-224993247" class="hoverLink" title="Задать вопрос" target="_blank" rel="noreferrer">Задать вопрос</a> <br><br>
                            Почта для связи: <br>
                        <a class="email-item" href="mailto:contactfabila@gmail.com">contactfabila@gmail.com</a> <br><br>
                    <p style="font-size:12px">Fabila © 2024</p>
                </div>

                <div class="info">
                    <b class="F">ИНФО</b><br><br>
                    <button class="margin-footer-text" @click="showUserAgreement = true; showBook = false; showCatalog = false; showBooks = false; showConfidentialityAgreement = false; showFAQ = false; showRules = false; showDMCA = false; showAboutUs = false; showCopyright = false;">ПОЛЬЗОВАТЕЛЬСКОЕ СОГЛАШЕНИЕ</button><br>
                    <button class="margin-footer-text" @click="showConfidentialityAgreement = true; showUserAgreement = false; showBook = false; showCatalog = false; showBooks = false; showFAQ = false; showRules = false; showDMCA = false; showAboutUs = false; showCopyright = false;">СОГЛАШЕНИЕ О КОНФИДЕНЦИАЛЬНОСТИ</button><br>
                    <button class="margin-footer-text" @click="showFAQ = true; showConfidentialityAgreement = false; showUserAgreement = false; showBook = false; showCatalog = false; showBooks = false; showRules = false; showDMCA = false; showAboutUs = false; showCopyright = false;">FAQ</button><br>
                </div>

                <div class="sections">
                    <b class="F">РАЗДЕЛЫ</b><br><br>
                    <button class="margin-footer-text" @click="showRules = true; showConfidentialityAgreement = false; showUserAgreement = false; showBook = false; showCatalog = false; showBooks = false; showFAQ = false; showDMCA = false; showAboutUs = false; showCopyright = false;">ПРАВИЛА</button><br>
                    <button class="margin-footer-text" @click="showDMCA = true; showConfidentialityAgreement = false; showUserAgreement = false; showBook = false; showCatalog = false; showBooks = false; showFAQ = false; showRules = false; showAboutUs = false; showCopyright = false;;">DMCA</button><br>
                    <button class="margin-footer-text" @click="showAboutUs = true; showConfidentialityAgreement = false; showUserAgreement = false; showBook = false; showCatalog = false; showBooks = false; showFAQ = false; showRules = false; showDMCA = false; showCopyright = false;">О НАС</button><br>
                    <button class="margin-footer-text" @click="showCopyright = true; showConfidentialityAgreement = false; showUserAgreement = false; showBook = false; showCatalog = false; showBooks = false; showFAQ = false; showRules = false; showDMCA = false; showAboutUs = false;">АВТОРСКОЕ ПРАВО</button><br>
                </div>
            </div>
        </div> 
</template>

<script>
import Book from './Book.vue';
import Search from './Search.vue';
import Catalog from './Catalog.vue';
import AboutUs from './Information/AboutUs.vue';
import UserAgreement from './Information/UserAgreement.vue';
import ConfidentialityAgreement from './Information/ConfidentialityAgreement.vue';
import FAQ from './Information/FAQ.vue';
import Rules from './Information/Rules.vue';
import DMCA from './Information/DMCA.vue';
import Copyright from './Information/Copyright.vue';
import axios from 'axios';

export default {
    components: {
        Book,
        Search,
        Catalog,
        AboutUs,
        UserAgreement,
        ConfidentialityAgreement,
        FAQ,
        Rules,
        DMCA,
        Copyright,
    },

    data () {
        return {
            books: [],
            book: null,
            bookId: null,
            showBook: false,
            showCatalog: false,
            showAboutUs: false,
            showUserAgreement: false,
            showConfidentialityAgreement: false,
            showFAQ: false,
            showRules: false,
            showDMCA: false,
            showCopyright: false,
            showBooks: true,
        }
    },

    mounted() {
        axios.get('/books')
                .then(response => {
                    this.books = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching books:', error);
                });
    },

    methods: {
        filterBook(results){
            console.log(this.books);
            this.books = results;
            console.log(this.books);
        },
        checkbook(book){
            
        },

        usefilter(filterBook) {
            if (filterBook === null) {
                axios.get('/books')
                .then(response => {
                    this.books = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching books:', error);
                });
            } else {
                this.books = filterBook;
            }
        }
    },
}
</script>
  
<style>
.katalog {
    display: inline-flex;
    position: fixed;
    align-items: center;
    padding: 0 0;
    height: 40px;
    left: 60px;
    top: 8px;
    z-index: 10;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.katalog:hover {
    color: #C08000;
}

.bookmain {
  padding: 30px; 	
  padding-bottom: 25px;
  margin-left: 270px;
  margin-right: 270px;
  display: -webkit-flex;
    display: flex;
    position: relative;
    -webkit-flex-direction: row;
    flex-direction: row;
    -webkit-align-items: center;
    align-items: center;
    -webkit-justify-content: space-between;
    justify-content: space-between;
}

.bookpage {
    color: #e0e0e0;
    display: grid;
    margin: 0 auto;
    width: 100%;
    grid-gap: 20px;
    grid-template-columns: repeat(auto-fill, minmax(200px, 200px));
    position: relative;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
}

.book {
    width: 156px;
  height: 234px;
  background-color: #161616;
  border: none;
    outline: none;
    background: none;
    cursor: pointer;
}

.book12 {
    margin-bottom: 40px;
}

.first-img {
  width: 156px;
  height: 234px;
  background-color: rgb(49, 49, 49);
  box-sizing: border-box;
  align-items: center;
  justify-content: center;
  display: flex;
  text-align: center;
  font-weight: bold;
}

.bookname {
    text-align: left;
}

.description {
    font-weight: 400;
    font-size: 12px;
    line-height: 2;
    margin: 0%;
    color:#c7c7c7;
}

.book-title {
    font-size: 16px;
    font-weight: 600;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    overflow: hidden;
    word-break: break-word;
    -webkit-box-orient: vertical;
    margin: 0%;
    color: #e0e0e0;
}


.footer {
    width: 100%;
    border-top: var(--border);
    padding: 40px 12px 8px;
    display: flex;
    align-items: center;
    flex-direction: column;
    border-top: 1px solid #303030;
}

.border-text {
    padding: 0 15% 0 15%;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    flex-wrap: wrap;
    margin:0 auto;
    position: relative;
    width: 100%;
    justify-content: space-between;
    align-items: stretch;
    max-width: -webkit-calc(1440px + (100vw/72*2)*2);
    max-width: -moz-calc(1440px + (100vw/72*2)*2);
    max-width: calc(1440px + (100vw/72*2)*2);
    padding-left: -webkit-calc(100vw/72*7);
    padding-left: -moz-calc(100vw/72*7);
    padding-left: calc(100vw/72*7);
    padding-right: -webkit-calc(100vw/72*7);
    padding-right: -moz-calc(100vw/72*7);
    padding-right: calc(100vw/72*7);
}

.F {
  font-size: 19px;
}

.margin-footer-text {
    color: #c5c5c5;
    display:inline-block;
    margin: 4px 0 16px 0;
    text-decoration: none;
}

.images-margin {
    margin-right: 14px;
}

.hoverLink {
    color: #c5c5c5;
    font-weight: 900;
    text-transform: uppercase;
    line-height: 1;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    text-decoration: none;
}

.hoverLink:hover {
  color: #C08000;
}

.email-item {
    color: #c5c5c5;
    text-decoration: none;
}

.margin-footer-text {
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.margin-footer-text:hover {
    color: #C08000;
}

.footer-mail {
    flex-grow: 1;
    flex-basis: 200;
}

.info {
    flex-grow: 1;
    flex-basis: 200;
}

.sections {
    flex-grow: 1;
    flex-basis: 200;
}
</style>