<template>
<div class="container">
    <h1 class="my-5">Our blog</h1>
    <div v-if="films">
       <article class="mb-4" v-for="film in films" :key="`film-${ film.id }`">
           <h2>{{ film.name }}</h2>
           <div class="mb-4">{{ formatDate(film.created_at) }}</div>
           <div class="mb-4">{{ getExept(film.cast, 100) }}</div>
       </article>
       <!--Pagiunazione-->

       <button
            class="btn btn-primary mr-3" 
            :disabled='pagination.current === 1' 
            @click="getFilms(pagination.current - 1)"
       >
           Prev
       </button>

       <button v-for="i in pagination.last"
               :key="`page_${i}`"
               @click="getFilms(i)"
               class="mr-3 btn"
               :class="pagination.current === i ? 'btn-primary' : 'btn-secondary'"
       >
           {{i}}
       </button>

        <button
            class="btn btn-primary mr-3" 
            :disabled='pagination.current === pagination.last' 
            @click="getFilms(pagination.current + 1)"
       >
           Next
       </button>
    </div>
    <Loader v-else/>
</div>
</template>

<script>
import axios from 'axios';
import Loader from '../components/Loader';

export default {
    name:'App',
    components:{
        Loader
    },
    data() {
        return {
            films: null,
            pagination: null,
        }
    },
    created() {
        this.getFilms();
    },
    methods: {
        getFilms(page = 1) {
            axios.get(`http://localhost:8000/api/film?page=${page}`)
                 .then(res => {
                     console.log(res);

                     this.films = res.data.data;
                     this.pagination = {
                         current: res.data.current_page,
                         last: res.data.last_page,
                     };
                 });
        },
        getExept(text, maxLength){
            if(text.length > maxLength){
                return text.substr(0, maxLength) + '...';
            }
            return text;
        },
        formatDate(filmDate){
            const date = new Date(filmDate);
            const formatted = new Intl.DateTimeFormat('it-IT').format(date);
            return formatted
        }

    },
}
</script>

<style lang='scss'>
div{
    h1{
        text-transform: uppercase;
    }
}
</style>