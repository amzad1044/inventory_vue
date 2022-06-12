import { createApp } from 'vue'
const app = createApp({});
import Vuex from 'vuex'

app.use(Vuex)

//modules
import categories from './modules/categories';
export default new Vuex.Store({
    modules:{
        categories
    }
})