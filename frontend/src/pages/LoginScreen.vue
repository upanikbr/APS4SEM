<template>
    <div class="loginScreen Screen">
        <h1>Nome da Aplicação</h1>
        <form @submit.prevent="login">
            <div class="form_field">
                <label for="nickOrEmail">Apelido ou Email</label>
                <input type="text" maxlength="25" id="nickOrEmail" 
                    placeholder="Digite seu apelido ou email" v-model="user.email_nickname"/>
            </div>
            <div class="form_field">
                <label for="password"> senha </label>
                <input type="text" maxlength="20" 
                    placeholder="Digite a senha" v-model="user.password"/>
            </div>
            
            <div class="erroArea">{{error}}</div>

            <button class="button_1">ENTRAR</button>

            <div class="goRegister" @click="goRegister"> Não tenho cadastro </div>
            <div class="goRegister" @click="goRegister"> Recuperar Senha </div>
        </form>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:"LoginScreen",
    data(){
        return{
            user:{
                email_nickname:'Manga_Nick_1',
                password: 'thisManga01',
            },
            error:''
        }
    },
    methods:{
        async login(){
            const resultLogin = await axios.post('signin',this.user)
            const loginRes = resultLogin.data

            if(loginRes.message == 'success'){
                this.$store.commit('SetAuthUser',loginRes.user)
                this.$store.commit('SetAuthToken',loginRes.token) 
                this.resetAll()  
                this.$router.push({name: 'MainScreen'})
            } else {
                this.error = loginRes;
            }
        },
        goRegister(event){
            event.preventDefault()
            this.$router.push({name: 'RegisterScreen'})
        },
        resetAll(){
            this.user.name = ''
            this.user.password = ''
            this.error = ''
        }
    }
}
</script>

<style>
    @import url('../assets/css/configInterBox1.css');

    form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .erroArea, .goRegister{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

</style>