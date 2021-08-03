<template>
    <section v-if="post.title != undefined && !loading">
        <div class="container">
            <h1 class="text-center mb-3">{{ post.title }}</h1>
            <div v-if="post.tags[0] || post.category" class="text-center mb-3">
                <router-link :to="{ name: 'category', params: { 'slug': post.category.slug } }" v-if="post.category" class="badge badge-success">{{ post.category.name }}</router-link>
                <router-link v-for="tag in post.tags" :key="tag.id" :to="{ name: 'tag', params: { 'slug': tag.slug } }" class="badge badge-pill badge-dark mr-2">{{ tag.name }}</router-link>
            </div>
            <p>{{ post.content }}</p>
            <div class="text-center">
                <router-link :to="{ name:'blog' }" class="btn btn-light">Torna al Blog</router-link>
            </div>
        </div>
    </section>
    <NotFound v-else-if="post.title == undefined && !loading"/>
    <Loader v-else/>
</template>

<script>
import NotFound from '../components/NotFound';
import Loader from '../components/Loader';

export default {
    name: 'SinglePost',
    components: {
        NotFound,
        Loader
    },
    data: function() {
        return {
             post: {},
             loading: true
        }
    },
    methods: {
        getPost: function(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/posts/${slug}`)
                .then( res => {
                    if (res.data.title) {
                        this.post = res.data;
                    } else {
                        this.post = {};
                    }
                    this.loading = false;
                })
                .catch( err => {
                    console.log(err);
                })
        }
    },
    created: function() {
        this.getPost(this.$route.params.slug);
    }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/partials/variables.scss';

    section {

        h1 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
            color: $base-color-0;
            text-shadow: 1px 1px 2px $black;
        }

        p {
            font-size: 18px;
            color: $base-color-0;
            text-shadow: 1px 1px 2px $black;
        }
    }
</style>