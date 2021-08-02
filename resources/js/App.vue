<template>
    <div>
        <Header />

        <main>
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from './components/Header';
import Footer from './components/Footer';

export default {
    name: 'App',
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss">
    @import '../sass/front.scss';

    main {
        min-height: calc(100vh - 149px);
        margin-top: 89px;
        padding: 50px 0;
        background-image: url('../../public/img/background-posts.jpg');
        background-position: top;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>