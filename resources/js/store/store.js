import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
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
            }]
    },
    getters: {
        getItems: state => state.items
    },
    actions: {
        addItem(context, items){
            context.commit('addItem', items)
        }
    },
    mutations: {
        addItem(state, [name, price]) {
            state.items.push({
                name: name,
                count: 0,
                price: price,
            })
        }
    }
})
