<template>
    <section v-if="posts.length > 0 && !loading" class="blog text-center">
        <h1 class="mb-3">Blog</h1>
        <div class="container d-flex flex-wrap justify-content-center">
            <div v-for="post in posts" :key="post.id" class="post-card">
                <h4>{{ post.title }}</h4>
                <p class="text-left">{{ post.excerpt }}</p>
                <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Leggi</router-link>
            </div>
        </div>
        <br>
        <div class="text-center">
            <button 
                v-show="current_page > 1" 
                type="button" 
                class="btn btn-light" 
                @click="getPosts(current_page - 1)">Prev</button>
            <button 
                v-for="n in last_page" :key="n"
                :class="current_page == n? 'btn-dark':'btn-light' "
                class="btn mx-1"
                @click="getPosts(n)">{{ n }}</button>
            <button 
                v-show="current_page < last_page" 
                type="button" 
                class="btn btn-light" 
                @click="getPosts(current_page + 1)">Next</button>
        </div>
    </section>
    <NotFound v-else-if="posts.length == 0 && !loading"/>
    <Loader v-else/>
</template>

<script>
import NotFound from './NotFound';
import Loader from './Loader';

export default {
    name: 'Posts',
    components: {
        NotFound,
        Loader
    },
    data: function() {
        return {
            posts: [],
            current_page: 1,
            last_page: 1,
            loading: true
        }
    },
    methods: {
        truncateText: function(text, charsNumber = 100) {
            if (text.length > charsNumber) {
                return text.substr(0, charsNumber)
            } else {
                return text
            }
        },
        getPosts: function(page) {
            axios
                .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(res => {
                    this.posts = res.data.posts.data;
                    this.current_page = res.data.posts.current_page;
                    this.last_page = res.data.posts.last_page;

                    res.data.posts.data.forEach(post => {
                        post.excerpt = this.truncateText(post.content, 200) + '...';
                    });

                    this.loading = false;

                })
                .catch(err => {
                    console.log('Errore: ', err);
                })
        }
    },
    created: function() {
        this.getPosts();
    }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/front.scss';

    section.blog {

        h1 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
            color: $base-color-0;
            text-shadow: 1px 1px 2px $black;
        }

        .post-card {
            width: calc(100% / 3 - 30px);
            padding: 30px;
            border-radius: 10px;
            margin: 15px;
            background-color: $white;
            box-shadow: inset 0 0 10px 1px $base-color-3;
            transition: transform .3s;

            &:hover {
                transform: scale(1.08);
            }

            h4 {
                margin-bottom: 25px;
                text-align: center;
                font-size: 18px;
            }

            p {
                font-size: 16px;
            }

            a {
                font-size: 14px;
                font-weight: 500;
                color: $base-color-1;
                transition: color .3s;

                &:hover {
                    text-decoration: none;
                    color: $base-color-3;
                }
            }
        }
    }
</style>