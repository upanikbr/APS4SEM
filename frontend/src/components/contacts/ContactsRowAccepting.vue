<template>
    <div class="contactsRowAccepting">
        <div class="form_field">
            <label for="">{{contact.nickName}}</label>
            <button class="button_2" @click="Accept(true)">Aceitar</button>
            <button class="button_2" @click="Accept(false)">Fechar</button>
        </div> 
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name:'contactsRowAccepting',
    props:{
        contact:{}
    },
    methods:{
        async Accept(option){
            const user =  this.$store.getters.GetAuthUser
            const tokenAxios= this.$store.getters.GetAuthTokenAxios

            await axios
                .post(`contact/Accepting/:${this.contact.nickName}/:${user.nickName}/:${option}`,tokenAxios)

            this.remove()
        },
        remove(){
            if( this.$parent.removeFromList){
                this.$parent.removeFromList(this.contact)
            }
        }
    }
}
</script>

<style>
    .contactsRowAccepting > .form_field{
        flex-direction: row;
        align-items: center;
        padding-bottom: 5px;
        border-bottom: solid var(--colorfourth)
    }

    .contactsRowAccepting > .form_field > label{
        margin-right: 10px;
        width: 180px;
        overflow: hidden;
    }
    .contactsRowAccepting > .form_field > button{
        margin: 0px;
        margin-right: 10px;
        background-color: var(--colorfourth);
    }


</style>