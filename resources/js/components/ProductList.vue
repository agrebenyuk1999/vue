<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Остаток: {{ remainder }}</h3>
                <div v-if="!is_refresh">Последнее обновление: {{lastUp}}</div>
                <div v-else="is_refresh">Обновление...</div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID in DataBase</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, i) in items" :key="item.id">
                        <td>{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.quantity }}</td>
                        <td>{{ item.quantity === 0 ? item.price : item.price * item.quantity }}</td>
                        <td>
                            <i class="fas fa-minus-circle" @click="destroyCountItem(i)"></i>
                            <i class="fas fa-plus-circle" @click="addCountItem(i)"></i>
                            <i class="fas fa-times-circle" @click="zeroingCountItem(i)"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style>
    i {
        cursor: pointer;
        color: #007BFF;
    }
</style>

<script>
    import {mapGetters} from 'Vuex'

    export default {
        data() {
            return {
                remainder: 70.00,
                lastUp: '',
                is_refresh: false
            }
        },
        computed: {
            ...mapGetters({
                items: 'getItems'
            })
        },
        methods: {
            addCountItem: function (i) {
                this.is_refresh = true
                if (this.remainder < this.items[i].price) {
                    alert('кэш закончился, убейте пару драконов и получите за них несколько злотых')
                } else {
                    axios.post('/add-quantity', {
                        id: this.items[i].id
                    })
                        .then((response) => {
                            this.items[i].quantity = response.data
                            this.is_refresh = false
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    this.items[i].count++
                    this.remainder -= this.items[i].price
                    this.getUpdateTime()
                }
            },
            destroyCountItem: function (i) {
                this.is_refresh = true
                if (this.items[i].quantity === 0) {
                    this.items[i].quantity = 0
                } else {
                    axios.post('/take-away-quantity', {
                        id: this.items[i].id
                    })
                        .then((response) => {
                            this.items[i].quantity = response.data
                            this.is_refresh = false
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    this.items[i].quantity--
                    this.remainder += this.items[i].price
                    this.getUpdateTime()
                }
            },
            zeroingCountItem: function (i) {
                this.is_refresh = true
                axios.post('/zeroing-quantity', {
                    id: this.items[i].id
                })
                    .then((response) => {
                        this.items[i].quantity = response.data
                        this.is_refresh = false
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                var sum = this.items[i].quantity * this.items[i].price
                this.remainder += sum
                this.getUpdateTime()
            },
            getUpdateTime() {
                axios.get('/last-update').then((response) => {
                    this.lastUp = response.data[0].updated_at
                })
            }
        },
        mounted(){
            this.getUpdateTime()
        },
        created() {
            axios.get('/get-products').then((response) => {
                this.$store.dispatch('loadProducts', response.data)
            })
        }
    }
</script>
