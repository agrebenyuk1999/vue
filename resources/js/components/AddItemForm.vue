<template>
    <div>
        <form action="">
            <input type="text" placeholder="Наименование" v-model="name">
            <input type="text" placeholder="Цена" v-model="price">
            <button type="button" class="btn btn-primary" @click="addItem">Добавить</button>
        </form>
    </div>
</template>

<script>
    import {mapGetters} from 'Vuex'

    export default {
        computed: {
            ...mapGetters({
                items: 'getItems'
            })
        },
        methods: {

            addItem: function () {
                // mapActions(['addItem', [this.name, this.price]])
                // this.$store.commit('addItem', [this.name, this.price]);

                this.$store.dispatch('addItem', [this.name, this.price])
                alert('Продукт ' + this.name + ' с ценой ' + this.price + ' успешно добавлен')
            }
        }
    }
</script>

<style scoped>

</style>
