<template>
    <section v-if="categories.length > 0 && !loading" class="text-center">
        <h1 class="mb-5">Elenco Categorie</h1>
        <div class="container d-flex justify-content-center align-items-center mb-5">
            <ul class="d-flex">
                <li v-for="category in categories" :key="category.id">
                    <router-link :to="{ name: 'category', params: { slug: category.slug } }" class="mx-1 btn btn-success">{{ category.name }}</router-link>
                </li>
            </ul>
        </div>
        <div class="text-center">
            <router-link :to="{ name:'blog' }" class="btn btn-light">Torna al Blog</router-link>
        </div>
    </section>
    <NotFound v-else-if="categories.length == 0 && !loading"/>
    <Loader v-else/>
</template>

<script>
import NotFound from '../components/NotFound';
import Loader from '../components/Loader';

export default {
    name: 'Categories',
    components: {
        NotFound,
        Loader
    },
    data: function() {
        return {
            categories: {},
            loading: true
        }
    },
    methods: {
        getCategories: function() {
            axios
                .get(`http://127.0.0.1:8000/api/categories`)
                .then( res => {
                    this.categories = res.data;
                    this.loading = false;
                })
                .catch( err => {
                    console.log(err);
                })
        }
    },
    created: function() {
        this.getCategories();
    }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/front.scss';

    section {
        
        h1 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
            color: $base-color-0;
            text-shadow: 1px 1px 2px $black;
        }
    }
</style>