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
    export default {
        computed: {
            items(){
                return this.$store.getters.getItems
            }
        },
        methods: {
            addItem: function () {
                // this.$store.commit('addItem', [this.name, this.price]);
                this.$store.dispatch('addItem', [this.name, this.price])
                alert('Продукт ' + this.name + ' с ценой ' + this.price + ' успешно добавлен')
            }
        }
    }
</script>

<style scoped>

</style>
