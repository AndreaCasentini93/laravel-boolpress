<template>
    <section>
        <div class="container d-flex justify-content-center align-items-center">
            <img :src="image" alt="Anteprima Wordpress">
        </div>
    </section>
</template>

<script>
export default {
    name: 'WorkInProgress',
    props: {
        image: String
    }
}
</script>

<style lang="scss" scoped>
    section {
        div {
            height: calc(100vh - 161px);

            img {
                display: block;
                width: 80%;
            }
        }
    }
</style>