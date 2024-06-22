<template>
    <div v-if="!showCatalog" class="catalogbody">
        <div class="stylecatalog">
            <h2>Жанры</h2>
            <div v-for="category in filterCategory" :key="category.id" class="filterstyle">
                <ul>
                    <li @click="selectedcriteria = category; isCriteria = true; filterBook(books, category, tag = null, isCriteria, isTag); this.isCriteria = false;">
                        {{ category.title }}
                    </li>
                </ul>
            </div>

            <div>Теги</div>
            <div v-for="tag in filterTag" :key="tag.id" class="filterstyle">
                <ul>
                    <li @click="selectedtag = tag; isTag = true; filterBook(books, category = null, tag, isCriteria, isTag); this.isTag = false;">
                        {{ tag.title }}
                    </li>
                </ul>
            </div>
            <div class="filtercatalog">
                <button @click="deletefiltres" class="filterdelete">Сбросить фильтр</button>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
    props: {
        books: {
            type: Array,  // Изменено на Array, так как books должен быть массивом
            default: () => []
        },
    },

    data() {
        return {
            showCatalog: false,
            filteredBooks: [],  // Изменено на filteredBooks
            filterCategory: [],
            filterTag: [],
            categories: [],
            isCriteria: false,
            isTag: false,
            selectedcriteria: null,
            selectedtag: null,
        }
    },

    mounted() {
        this.populateCategories(); 
        this.populateTags();
        if (this.isCriteria && this.isTag) {
            this.filterBook(this.books, this.selectedcriteria, this.selectedtag, this.isCriteria, this.isTag);
            this.selectedcriteria = null;
            this.selectedtag = null;
        }
    },

    methods: {
        filterBook(books, criteria, tag, isCriteria, isTag) {
            this.filteredBooks = [];
            if (isCriteria && isTag){
                books.forEach(book => {
                    if (book.category.id === criteria.id) {
                        this.filteredBooks.push(book);
                    }
                });

                this.filteredBooks.forEach(book => {
                    if (book.tag.id === tag.id) {
                        this.filteredBooks.push(book);
                    }
                });

                this.$emit('filter', this.filteredBooks);

            } else if (isCriteria) {
                books.forEach(book => {
                    if (book.category.id === criteria.id) {
                        this.filteredBooks.push(book);
                    }
                });

                this.$emit('filter', this.filteredBooks);

            } else if (isTag) {
                books.forEach(book => {
                    if (book.tag.id === tag.id) {
                        this.filteredBooks.push(book);
                    }
                });
                this.$emit('filter', this.filteredBooks);
            }
            
        },

        populateCategories() {  // Переименованный метод
            this.categories = [];
            this.books.forEach(book => {
                if (!this.categories.some(category => category.id === book.category.id)) {
                    this.categories.push(book.category);
                }
            });
            this.filterCategory = this.categories;
        },

        populateTags() {  // Переименованный метод
            this.tags = [];
            this.books.forEach(book => {
                if (!this.tags.some(tag => tag.id === book.tag.id)) {
                    this.tags.push(book.tag);
                }
            });
            this.filterTag = this.tags;
        },

        deletefiltres() {
            this.selectedcriteria = null;
            this.selectedtag = null;
            this.isCriteria = false;
            this.isTag = false;

            this.$emit('filter', null);
        }
    },

    
});
</script>
      
<style>

.catalogbody {
    position: absolute;
    flex-basis: 250px;
    flex-shrink: 0;
    left: 75px;
    padding: 5px 0;
    top: 75px;
    max-width: 200px;
}

.stylecatalog {
    margin-bottom: 16px;
}

.stylecatalog>* {
    padding: 0 0 8px;
}

.filterstyle {
    display: block;
    top: 0;
    left: 0;
    height: 100%;
    opacity: .7;
    border: 2px solid #303030;
    box-shadow: 0 0 0 1px rgba(0,0,0,.07);
    padding: 0 12px;
    border-radius: 16px;
    position: relative;
    cursor: pointer;
    color: var(--text-primary);
    display: inline-flex;
    position: relative;
    font-size: 1rem;
    box-sizing: border-box;
    align-items: center;
    margin-bottom: 8px;
    margin-right: 4px;
}

.filterstyle:active {
    border: 2px solid #C08000;
    color: #C08000;
}

.filterstyle:focus {
    border: 2px solid #C08000;
    color: #C08000;
}

.filtercatalog {
    position: relative;
    margin-top: 10px;
}

.filterdelete {
    position: absolute;
    left: 8.5%;
    font-size: 17px;
    border: 2px solid #C08000;
    border-radius: 16px;
    padding: 0 12px;
}
</style>