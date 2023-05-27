import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createStore } from 'vuex'
import '../css/normalize.css'
import '../css/global.scss'
import axios from 'axios'

const store = createStore({
    state() {
        return {
            cartQuantity: 0
        }
    },
    mutations: {
        setQuantity(state, quantity) {
            state.cartQuantity = quantity
        },
        increment(state) {
            state.cartQuantity++
        },
        decrement(state) {
            if (state.cartQuantity - 1 >= 0) {
                state.cartQuantity--
            }
        }
    },
    actions: {
        async getQuantity(context) {
            axios.get('/cart/quantity')
                .then(response => {
                    context.commit('setQuantity', response.data)
                }).catch(error => {
                    console.log(error)
                })
        }
    }
})

createInertiaApp({
    progress: {
        color: '#23f8b0'
    },
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .mount(el)
    },
})