<template>
    <div>
        <Header />

        <main>
            <Posts />
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from './components/Header';
import Posts from './components/Posts';
import Footer from './components/Footer';

export default {
    name: 'App',
    components: {
        Header,
        Posts,
        Footer
    },
    data: function() {
        return {
            image: require('../../public/img/anteprima-wordpress.png'),
            posts: [],
            current_page: 1,
            last_page: 1
        }
    },
    methods: {
        getPosts: function() {
            axios
                .get('http://127.0.0.1:8000/api/posts')
                .then(res => {
                    this.posts = res.data.posts.data;
                    this.current_page = res.data.posts.current_page;
                    this.last_page = res.data.posts.last_page;
                })
                .catch(err => {
                    console.log('Errore: ', err);
                })
        },
        truncateText: function(text, words) {
            text.substr(0, words) 
        }
    },
    created: function() {
        this.getPosts();
    }
}
</script>

<style lang="scss">
    @import '../sass/front.scss';

    main {
        min-height: calc(100vh - 149px);
        margin-top: 89px;
    }
</style>