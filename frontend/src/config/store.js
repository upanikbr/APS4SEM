import Vue from 'vue'
import Vuex from 'vuex'
import indexAuth from '../store/auth/index'

Vue.use(Vuex)

export default  new Vuex.Store(indexAuth)