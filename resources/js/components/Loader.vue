<template>
    <section id="loading">
        <div class="container d-flex flex-column justify-content-center align-items-center">
            <h1>Loading</h1>
            <i class="fas fa-spinner"></i>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Loader'
}
</script>

<style lang="scss" scoped>
    @import '../../sass/partials/variables.scss';

    #loading {
        height: calc(100vh - 249px);

        .container {
            height: 100%;

            h1 {
                margin-bottom: 20px;
                text-transform: uppercase;
                font-size: 40px;
                color: $base-color-0;
                text-shadow: 1px 1px 2px $black;
            }

            i {
                font-size: 32px;
                color: $base-color-0;
                text-shadow: 1px 1px 2px $black;
                animation: rotation 1s infinite linear;
            }
            @keyframes rotation {
                from {
                    transform: rotate(0deg);
                }
                to {
                    transform: rotate(360deg);
                }
            }
        }
    }
</style>