<template>
    <div class="menuPrincipal">
        <CreateContacts ref="createContacts"/>
        <CreateMeetings ref="createMeetings"/>

        <h2>Contatos</h2>
        <div class='buttonGroup'>
            <button class="buttonAdd buttonDesign button_2" @click="openCreateContact">Adicionar</button>
            <button class="buttonNew buttonDesign button_2">Deletar</button>
        </div>

        <ContactsList type='BasicStatus' height='30%' :selectedNow="selectedNow" border='none' :user="user"/>

        <h2>Reuniões</h2>
        <div class='buttonGroup'>
            <button class="buttonAdd button_2" @click="openCreateMeeting">Criar</button>
            <button class="buttonNew button_2">Deletar</button>
        </div>

        <MeetingList type='BasicStatus' height='280px' :selectedNow="selectedNow" border='none' :user="user"/>

    </div>
</template>

<script>
//import MenuMainContacts from '../contacts/MenuMainContacts'
import ContactsList from '../contacts/ContactsList'
import MeetingList from '../meeting/MeetingList'
import CreateContacts from '../contacts/CreateContacts'
import CreateMeetings from '../meeting/CreateMeetings'

export default {
    name:'menuPrincipal',
    components: { ContactsList, MeetingList, CreateContacts, CreateMeetings },
    props:{
        user:{}
    },
    data(){
        return{
            selectedNow:{
                type:'',
                id: -1 
            }
        }
    },
    methods:{
        selectNow(type, id){
            this.selectedNow.type = type
            this.selectedNow.id = id
        },
        openCreateContact(){
            this.$refs.createContacts.Open()
        },
        openCreateMeeting(){
            this.$refs.createMeetings.Open()
        },
        tyUpadate(typeUpdate){
            console.log(typeUpdate)
        },
        blockMain(value){
            if(this.$parent.blockMain){
                this.$parent.blockMain(value)
            }
        }
    }

}
</script>

<style>
    .menuPrincipal{
        grid-area: menuPrincipal;
        max-height: 650px;
        margin:0px 6px 0px 9px;
        border-radius: 10px;
        background: var(--colorthird);
        overflow: hidden;
    }
    
    .menuPrincipal > h2{
        margin: 0px -10px;
        padding: 4px 25px;
        font-size: 20pt;
        color: var(--colorsecond);
        font-weight: 800;
        background: var(--colorfourth);
    }

    .menuPrincipal > .menuTitle > #ulMenuSecond{
        list-style: none;
    }

    .menuPrincipal > .buttonGroup{
        background:  var(--colorfourth);
        height:40px;
        display: flex;
        align-items: center;
        padding-left:20px;
    }

    /*MOBILE*/ 
    @media screen and (max-width: 600px){
        .menuPrincipal{
            overflow: scroll;
            max-height: auto;
        }
        .menuPrincipal > .menuTitle{
            overflow: auto;
        }
    }
</style>