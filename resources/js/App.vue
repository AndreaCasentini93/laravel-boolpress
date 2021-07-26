<template>
    <div>
        <WorkInProgress :image="image"/>
    </div>
</template>

<script>
import WorkInProgress from './components/WorkInProgress.vue';

export default {
    name: 'App',
    components: {
        WorkInProgress
    },
    data: function() {
        return {
            image: require('../../public/img/anteprima-wordpress.png')
        }
    }
}
</script>

<style lang="scss">

</style>