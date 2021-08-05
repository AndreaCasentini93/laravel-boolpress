<template>
    <section>
        <div class="container">
            <h1 class="text-center mb-3">Contattaci</h1>
            <form @submit.prevent="sendMessage()">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" placeholder="Inserisci Email" v-model="name">
                </div>
                <div class="form-group">
                    <label for="email">Indirizzo Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Inserisci Email" v-model="email">
                </div>
                <div class="form-group">
                    <label for="message">Messaggio</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Scrivi Messaggio" v-model="message"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-warning mt-3">Invia</button>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Contact',
    data: function() {
        return {
            name: '',
            email: '',
            message: '',

        }
    },
    methods: {
        sendMessage: function() {
            axios
                .post('http://127.0.0.1:8000/api/leads', {
                    name: this.name,
                    email: this.email,
                    message: this.message
                })
                .then( res => {
                    console.log(res.data);
                })
                .catch( err => {
                    console.log(err);
                })
        }
    }
}
</script>

<style lang="scss" scoped>
    @import '../../sass/front.scss';

    section {

        h1 {
            text-transform: uppercase;
            font-size: 50px;
            font-weight: 700;
            color: $base-color-0;
            text-shadow: 1px 1px 2px $black;
        }

        form {

            label {
                font-size: 18px;
                color: $base-color-0;
                text-shadow: 1px 1px 2px $black;
            }

        }

    }

</style>