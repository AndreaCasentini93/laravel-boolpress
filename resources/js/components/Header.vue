<template>
    <header class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <nav class="d-flex justify-content-between align-items-center">
                <a href="/">
                    <img src="/images/logo-wordpress.png" alt="Logo WordPress">
                </a>
                <ul class="d-flex align-items-center">
                    <li :class="$route.name == 'home'? 'active':'' ">
                        <router-link :to="{ name: 'home' }">Home</router-link>
                    </li>
                    <li :class="$route.name == 'blog'? 'active':'' ">
                        <router-link :to="{ name: 'blog' }">Blog</router-link>
                    </li>
                    <li :class="$route.name == 'about'? 'active':'' ">
                        <router-link :to="{ name: 'about' }">Chi Siamo</router-link>
                    </li>
                    <li :class="$route.name == 'contact-us'? 'active':'' ">
                        <router-link :to="{ name: 'contact-us' }">Contattaci</router-link>
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
        height: 89px;
        background-color: $white;
        box-shadow: 0 0 10px 1px $gray;
        z-index: 10;

        .container {
            height: 100%;
        }

        nav {
            width: 100%;
            height: 100%;

            a {
                img {
                    width: 180px;
                }
            }

            ul {
                height: 100%;
                li {
                    display: flex;
                    align-items: center;
                    height: 100%;
                    padding: 30.5px 0;
                    border-bottom: 4px solid #00000000;
                    margin: 0 20px;
                    transition: border .3s;

                    &:hover,
                    &.active {
                        border-bottom: 4px solid $base-color-1;
                    }

                    a {
                        text-transform: uppercase;
                        text-decoration: none;
                        font-weight: 500;
                        color: $base-color-2;
                        transition: color .3s;

                        &:hover {
                            color: $base-color-1;
                        }
                    }
                }
            }

        }
    }
</style>