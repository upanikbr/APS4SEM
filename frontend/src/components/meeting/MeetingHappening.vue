<template>
    <div class="meetingHappening ScreenEx">
        <div class="infoText">
            <h2>Reunião em Andamento</h2>
            <h3>Tema: {{meeting.theme}}</h3>
            <h3>Inicio: {{meeting.date.brdt}} - {{meeting.date.brhr}}</h3>
            <h3>Administrado: {{useradm? 'Você':meeting.admName}}</h3>
        </div>
        <ConstactsList type="StatusMeeting" height='200px' :useradm="useradm"/>
        <div class="invitedList" v-if="useradm==true">
            <h2>Convidar</h2>
            <ConstactsList type="MeetingInvite" height='200px' :useradm="useradm"/>
        </div>
        <button class="button_1" @click="close"> FECHAR </button> 
    </div>
</template>

<script>
import ConstactsList from '../contacts/ContactsList'
import exMethods from '../common/methods' 

let alldate = new Date('1995-12-17T03:24:00')

export default {
    name:'meetingHappening',
    components: { ConstactsList },
    data(){
        return{
            useradm:true,
            meeting:{ id: 1, theme:'Problemas com devs', date: exMethods.easyDate(alldate), isOccurring: true,admName:"Rogario"}, 
        }
    },
    methods:{
        /*OPENS AND CLOSES*/
        open(){
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
        this.close()
    }
}
</script>

<style>
    .meetingHappening{
        position: absolute;
        top: 30px;
        padding:10px;
        display:flex;
        align-items: center;
        z-index: 3;
    }

    .meetingHappening > .infoText{
        width: 100%;
    }
    .meetingHappening > .infoText> h2{
        margin: 0px;
        margin-bottom: 10px;
    }

    .meetingHappening > .infoText h3{
        margin:0px;
        margin-bottom: 8px;
    }

    .meetingHappening > .invitedList{
       width:100%;
       margin: 0px;
       padding: 0px;      
    }

    .invitedList > h2{
        margin-bottom: 5px;
    }

    .meetingHappening > .button_1{
        width:90%
    }
</style>