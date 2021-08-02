<template>
    <section v-if="post.title != undefined && !loading">
        <div class="container py-5">
            <h1 class="text-center mb-3">{{ post.title }}</h1>
            <p>{{ post.content }}</p>
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
            color: $base-color-1;
        }

        p {
            font-size: 18px;
            color: $base-color-2;
        }
    }
</style>