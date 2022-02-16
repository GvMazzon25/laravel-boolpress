<template>
<div class="container">
    <h1 class="my-5">Our blog</h1>
    <div v-if="films">
       <article class="mb-4" v-for="film in films" :key="`film-${ film.id }`">
           <h2>{{ film.name }}</h2>
           <div class="mb-4">{{ film.created_at }}</div>
           <div class="mb-4">{{ film.cast }}</div>
       </article>
    </div>
    <div v-else>
        loading film..
    </div>
</div>
</template>

<script>
import axios from 'axios';

export default {
    name:'App',
    components:{

    },
    data() {
        return {
            films: null,
        }
    },
    created() {
        this.getFilms();
    },
    methods: {
        getFilms() {
            axios.get('http://localhost:8000/api/film')
                 .then(res => {
                     console.log(res);

                     this.films = res.data;
                 });
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