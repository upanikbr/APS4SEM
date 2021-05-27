<template>
    <div :class="`userRegisterUpdate ${screentype}`">
        <h1 v-if="config == 'Register'">Nome da Aplicação</h1>
        <h2 v-else> Alterar Informações </h2>
        <div class="form">
            <div class="form_field">
                <label for="iName">Nome</label>
                <input id="iName" type="text" placeholder="Digite o nome" v-model="user.name">
            </div>
            <div class="form_field">
                <label for="iNickName">Apelido</label>
                <input id="iNickName" type="text" placeholder="Digite um apelido" v-model="user.nickName">
            </div>
            <div class="form_field">
                <label for="iDate">Data</label>
                <input id="iDate" type="text" placeholder="__/__/__" v-model="user.date" maxlength="10">
            </div>
            <div class="form_field">
                <label for="iEmail">Email</label>
                <input id="iEmail" type="email" placeholder="Digite o email" v-model="user.email">
            </div>
            <div class="form_field">
                <label for="iPassword">Senha</label>
                <input id="iPassword" type="password" placeholder="Digite a senha" v-model="user.password">
            </div>
            <div class="form_field">
                <label for="iConfirmPassword">Digite Novamente a Senha</label>
                <input id="iConfirmPassword" type="password" 
                    placeholder="Digite a senha" v-model="user.password_confirm">
            </div>
            <div class="erroArea">{{errosField}}</div>
            <div class="button_field"  v-if="config == 'Register'">
                <button class="button_1" @click="registerBke">CADASTRAR</button>
            </div>
            <div class="buttonfield" v-else>
                <button class="button_1" @click="updateBke">ALTERAR</button>
                <button class="button_1" @click="close">CANCELAR</button>
            </div>
            <div class="goLogin" v-if="config =='Register'" @click="goLogin">Volte para a página de Login</div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:'RegisterScreen',
    props:{
        config:String
    },
    data(){
        return{
            screentype: 'ScreenEx',
            errosField: '',
            user:{}
        }
    },
    methods:{
        //BKE UPDATE//
        async registerBke(){
            const returnRegister = await axios.post('/register',this.user)
            const registerRes = returnRegister.data
            if(registerRes != 'success'){
                typeof registerRes=='string'? this.errosField = registerRes: this.errosField = 'erro não identificado'
            }   else {
                this.errosField = 'Você foi cadastrado'
                this.user = {}
            }
        },
        updateBke(){
            console.log('envia uma atualização para um registro - retorna sucesso ou o erro/erros')
        },
        //OPENS AND CLOSES//
        open(){
            console.log('opeenings')
            this.$el.style.display='flex'
        },
        close(){
            this.resetAll()
            this.$el.style.display='none'
        },
        goLogin(){
            this.$router.push({name: 'LoginScreen'})
        },
        resetAll(){
            this.screentype= 'ScreenEx'
            this.user.name='',
            this.user.nickName='',
            this.user.date= '',
            this.user.email= '',
            this.user.password= '',
            this.user.confpassword= ''
        }
    },
    mounted(){
        if(this.config != 'Register'){
            this.close()
        } else {
            this.resetAll()
            this.screentype='Screen'
        }
    }
}
</script>

<style>
    .userRegisterUpdate{
        position: absolute;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .erroArea{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }
</style>