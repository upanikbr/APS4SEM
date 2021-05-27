<template>
    <div class="createContacts ScreenEx">
        <h3>Criar Contato</h3>
        <div class='form'> 
            <div class="form_field">
                <label for="iNickName">Digite o Apelido</label>
                <input id="icrNickName" placeholder="Digite o apelido" v-model="invitedNickName"> 
            </div>
            <div class="erroArea SimpleArea">{{error}}</div>
            <div class="form_field_button">
                <button class="button_1" @click="Submit">CONVIDAR</button>
                <button class="button_1" @click="close">CANCELAR</button> 
            </div>          
        </div> 
    </div>
</template>

<script>
export default {
    data(){
        return{
            invitedNickName:'',
            error:''
        }
    },
    methods:{
        //ACTIONS IN THE PAGE
        resetAll(){
            this.invitedNickName=''
            this.error=''
        },
        //ACTIONS FOR OTHER PAGES

        //OPENS AND CLOSES
        Open(){
            this.resetAll()
            this.blockMain('block')
            this.$el.style.display = 'initial'
        },
        /*async*/Submit(){
            /*this.error = await axios.post(url,this.invitedNickName)*/
            if(this.error == '' || this.error == undefined){
                if(this.$parent.tyUpadate){
                    this.$parent.tyUpadate('updateContacts')
                }
                this.close();
            }
        },
        close(){
            this.resetAll()
            this.blockMain('unblock')
            this.$el.style.display = 'none'
        },
        blockMain(value){
            if(this.$parent.blockMain){
                this.$parent.blockMain(value)
            }
        } 
    },
    mounted(){
        this.$el.style.display = 'none'
    }
}
</script>

<style>
    .createContacts{
        position: absolute;
        margin: 30px 10px; 
        left: auto;
        z-index: 3;
    }

    .createContacts > h3{
        margin:-15px 0px 15px -15px;
        padding: 20px 0px 10px 20px;
        background: var(--colorfourth);
        width: 110%;
    }

    .form{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>