<template>
    <div class="registerScreen Screen">
        <UserRegisterUpdate config="Register"/>
    </div>
</template>

<script>
import UserRegisterUpdate from '../components/user/UserRegisterUpdate'
export default {
    name:'RegisterScreen',
    components: { UserRegisterUpdate },
    methods:{
        goLogin(){
            this.$router.push({name: 'LoginScreen'})
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
    
    .erroArea{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }
</style>