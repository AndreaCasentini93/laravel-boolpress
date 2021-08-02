<template>
    <section id="error_404">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>Errore 404</h1>
            <h3>Oooops... La pagina non è stata trovata.</h3>
            <router-link :to="{ name: 'home' }" class="btn btn-dark">Torna alla Home</router-link>
        </div>
    </section>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>

<style lang="scss" scoped>
    @import '../../sass/partials/variables.scss';

    #error_404 {
        height: calc(100vh - 149px);

        .container {
            height: 100%;

            h1 {
                margin-bottom: 20px;
                text-transform: uppercase;
                font-size: 40px;
                color: $base-color-1;
            }
        
            h3 {
                margin-bottom: 20px;
                font-size: 25px;
                color: $base-color-2;
            }
        }
    }

</style>