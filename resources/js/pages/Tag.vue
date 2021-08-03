<template>
    <section v-if="tag.name != undefined && !loading">
        <div class="container">
            <h1 class="text-center mb-3">Post con Tag "<span>{{ tag.name }}</span>"</h1>
            <div class="container d-flex flex-wrap justify-content-center">
                <div v-for="post in tag.posts" :key="post.id" class="post-card">
                    <h4>{{ post.title }}</h4>
                    <p class="text-left">{{ post.excerpt }}</p>
                    <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Leggi</router-link>
                </div>
            </div>
            <div class="text-center mt-3">
                <router-link :to="{ name:'blog' }" class="btn btn-light">Torna al Blog</router-link>
            </div>
        </div>
    </section>
    <NotFound v-else-if="tag.name == undefined && !loading"/>
    <Loader v-else/>
</template>

<script>
import NotFound from '../components/NotFound';
import Loader from '../components/Loader';

export default {
    name: 'Tag',
    components: {
        NotFound,
        Loader
    },
    data: function() {
        return {
            tag: {},
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
        getTag: function(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/posts/tag/${slug}`)
                .then( res => {
                    console.log(res.data);
                    if (res.data.name != undefined) {
                        this.tag = res.data;
                        res.data.posts.forEach(post => {
                            post.excerpt = this.truncateText(post.content, 200) + '...';
                        });
                    } else {
                        this.tag = {};
                    }

                    this.loading = false;
                })
                .catch( err => {
                    console.log(err);
                })
        }
    },
    created: function() {
        this.getTag(this.$route.params.slug);
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
                display: block;
                text-align: center;
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