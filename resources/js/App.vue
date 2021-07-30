<template>
    <div>
        <Header />

        <main>
            <Posts/>
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