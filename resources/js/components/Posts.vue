<template>
    <section>
        <div class="container d-flex flex-wrap justify-content-center">
            <div v-for="post in posts" :key="post.id" class="card">
                <h4>{{ post.title }}</h4>
                <p>{{ post.excerpt }}</p>
                <a href="/">Leggi</a>
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
</template>

<script>
export default {
    name: 'Posts',
    data: function() {
        return {
            posts: [],
            current_page: 1,
            last_page: 1
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

    section {
        min-height: calc(100vh - 149px);
        padding: 50px 0;
        background-image: url('../../../public/img/background-posts.jpg');
        background-position: top;
        background-size: cover;
        background-repeat: no-repeat;

        .card {
            width: calc(100% / 4 - 30px);
            padding: 20px;
            border-radius: 10px;
            margin: 15px;
            background-color: $white;
            box-shadow: inset 0 0 10px 1px $gray;
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