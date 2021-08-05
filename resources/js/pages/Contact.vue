<template>
    <section>
        <div class="container">
            <h1 class="text-center mb-3">Contattaci</h1>
            <form @submit.prevent="sendMessage()">
                <div v-if="success" class="text-center alert alert-success">Il messaggio è stato ricevuto!<br>Vi risponderemo appena possibile.</div>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" placeholder="Inserisci Email" v-model="name" :class="errors.name? 'is-invalid':'' ">
                    <small v-for="error, index in errors.name" :key="index">{{ error }}</small>
                </div>
                <div class="form-group">
                    <label for="email">Indirizzo Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Inserisci Email" v-model="email" :class="errors.name? 'is-invalid':'' ">
                    <small v-for="error, index in errors.email" :key="index">{{ error }}</small>
                </div>
                <div class="form-group">
                    <label for="message">Messaggio</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Scrivi Messaggio" v-model="message" :class="errors.name? 'is-invalid':'' "></textarea>
                    <small v-for="error, index in errors.message" :key="index">{{ error }}</small>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="d-flex align-items-center btn btn-warning mt-3" :disabled="sending">{{ !sending? 'Invia':'' }}<i :class="sending? 'fas fa-spinner':'' "></i></button>
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
            errors: {},
            success: false,
            sending: false
        }
    },
    methods: {
        sendMessage: function() {
            this.sendign = true;
            axios
                .post('http://127.0.0.1:8000/api/leads', {
                    name: this.name,
                    email: this.email,
                    message: this.message
                })
                .then( res => {
                    if (res.data.errors) {
                        this.errors = res.data.errors;
                        this.success = false;
                        this.sendign = false;
                    } else {
                        this.errors = {};
                        this.name = '';
                        this.email = '';
                        this.message = '';
                        this.success = true;
                        this.sendign = false;
                    }
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

            small {
                color: $special-red;
                text-shadow: 1px 1px 2px $black;
                letter-spacing: 1px;
            }

            i {
                font-size: 20px;
                color: $black;
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