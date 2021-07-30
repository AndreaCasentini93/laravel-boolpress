<template>
    <section>
        <div class="container">
            <div class="row">
                Card
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Posts'
}
</script>

<style lang="scss" scoped>
    @import '../../sass/front.scss';

    section {
        min-height: calc(100vh - 149px);
        background-image: url('../../../public/img/background-posts.jpg');
        background-position: top;
        background-size: cover;
        background-repeat: no-repeat;
    }
</style>