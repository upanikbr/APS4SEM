<template>
    <div class="acceptingInvitation ScreenEx">
        <h2>CONVITES</h2>
        <h3>Contatos</h3> 
        <ContactsList type="Accepting" height="200px"/>
        <h3>Reuniões</h3>
        <MeetingList type="Accepting" height="200px"/>
        <div class="form_field_button">
            <button class="button_1" @click="close">Fechar</button>
        </div>
    </div>
</template>

<script>
import ContactsList from '../contacts/ContactsList'
import MeetingList from '../meeting/MeetingList'

export default {
    name: 'acceptingInvitation',
    components: { ContactsList, MeetingList },
    methods:{
        Open(){
            this.$el.style.display = 'initial'
            this.blockMain('block')
        },
        close(){
            this.$el.style.display = 'none'
            this.blockMain('unblock')
        },
        blockMain(value){
             if(this.$parent.blockMain){
                this.$parent.blockMain(value)
            }
        }
    },
    mounted(){
        this.$el.style.display='none'
    }
}
</script>

<style>
    .acceptingInvitation{
        position:absolute;
        z-index: 3;
    }
    .acceptingInvitation > h2{
        background-color: var(--colorfourth);
        width: 110%;
        margin: -15px 100% 10px -15px;
        padding: 8px 15px;

    }
    .acceptingInvitation > h3{
        margin: 0px;
        padding:0px;
    }

    .acceptingInvitation > .form_field_button{
        flex-direction: column;
        width: 100%;
        margin-top: 20px;
    }
</style>