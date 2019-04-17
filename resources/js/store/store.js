import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        items: ''
    },
    getters: {
        getItems: state => state.items
    },
    actions: {
        addItem(context, items){
            context.commit('addItem', items)
        },
        loadProducts(context, items){
            context.commit('loadProducts', items)
        }
    },
    mutations: {
        addItem(state, [name, price]) {
            state.items.push({
                name: name,
                count: 0,
                price: price,
            })
        },
        loadProducts(state, payload){
            state.items = payload
        }
    }
})
