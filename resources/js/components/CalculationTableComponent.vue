<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Остаток: {{ remainder }}</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Имя</th>
                        <th scope="col">Количество</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(item, i) in items">
                        <td>{{ item.name }}</td>
                        <td>{{ item.count }}</td>
                        <td>{{ item.count === 0 ? item.price : item.price * item.count }}</td>
                        <td>
                            <i class="fas fa-minus-circle" @click="destroyCountItem(i)"></i>
                            <i class="fas fa-plus-circle" @click="addCountItem(i)"></i>
                            <i class="fas fa-times-circle" @click="zeroingCountItem(i)"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <form action="">
                    <input type="text" placeholder="Наименование" v-model="name">
                    <input type="text" placeholder="Цена" v-model="price">
                    <button type="button" class="btn btn-primary" @click="addItem">Добавить</button>
                </form>
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
    export default {
        data: function () {
            return {
                remainder: 70.00,
                name: '',
                price: '',
                count: '',
                items: [
                    {
                        name: 'Товар 1',
                        count: 0,
                        price: 30,
                        showItem: false
                    },
                    {
                        name: 'Товар 2',
                        count: 0,
                        price: 20,
                        showItem: false
                    }
                ]
            }
        },
        methods: {
            addItem: function () {
                this.items.push({
                    name: this.name,
                    count: 0,
                    price: this.price,
                    showItem: false
                })
            },
            addCountItem: function (i) {
                if (this.remainder < this.items[i].price) {
                    alert('кэш закончился, убейте пару драконов и получите за них несколько злотых')
                } else {
                    this.items[i].count++
                    this.remainder -= this.items[i].price
                }
            },
            destroyCountItem: function (i) {
                if (this.items[i].count === 0) {
                    this.items[i].count = 0
                } else {
                    this.items[i].count--
                    this.remainder += this.items[i].price
                }
            },
            zeroingCountItem: function (i) {
                var sum = this.items[i].count * this.items[i].price
                this.remainder += sum
                this.items[i].count = 0
            }
        }
    }
</script>
