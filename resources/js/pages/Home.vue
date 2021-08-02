<template>
    <section>
        <div class="container py-5">
            <h1 class="text-center mb-3">Home</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate facilis ratione, eligendi nihil odio sequi quasi rem officia! Id, eaque ex, maxime ipsum dignissimos laborum perferendis iusto soluta consequatur nam velit ipsam quod autem quibusdam dolor optio tenetur ad magni exercitationem odit. Reiciendis quaerat obcaecati provident exercitationem reprehenderit fuga, asperiores repellendus ipsa laudantium, eveniet qui, consequuntur ratione cumque. Quo unde repellendus deserunt laudantium quos dolorem facere, quam obcaecati doloremque beatae porro delectus quae, accusamus amet nostrum et id aut eaque. Dicta consectetur voluptatibus non, facere praesentium quisquam saepe est corrupti perferendis quae nihil nesciunt accusamus nisi voluptatem atque, aperiam quibusdam.</p>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Home'
}
</script>

<style lang="scss" scoped>
    @import '../../sass/partials/variables.scss';

    section {

        h1 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
            color: $base-color-1;
            text-shadow: 1px 1px 2px $base-color-2;
        }

        p {
            font-size: 18px;
            color: $base-color-2;
        }
    }
</style>