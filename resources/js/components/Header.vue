<template>
    <header>
        <div class="container d-flex align-items-center">
            <nav class="d-flex justify-content-between align-items-center">
                <a href="/">
                    <img src="../../../public/img/logo-wordpress.png" alt="Logo WordPress">
                </a>
                <ul class="d-flex align-items-center">
                    <li class="active">
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/">Blog</a>
                    </li>
                    <li>
                        <a href="/">Chi siamo</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
    @import '../../sass/partials/variables.scss';

    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: $white;
        box-shadow: 0 0 10px 1px $gray;
        z-index: 10;

        nav {
            width: 100%;

            a {
                img {
                    width: 180px;
                }
            }

            ul {
                li {
                    padding: 30px 0;
                    border-bottom: 4px solid rgba(0, 0, 0, 0);
                    margin: 0 20px;
                    transition: border .3s;

                    &:hover,
                    &.active {
                        border-bottom: 4px solid $base-color-1;
                    }

                    a {
                        text-transform: uppercase;
                        font-weight: 500;
                        color: $base-color-2;
                        transition: color .3s;

                        &:hover {
                            text-decoration: none;
                            color: $base-color-1;
                        }
                    }
                }
            }

        }
    }
</style>