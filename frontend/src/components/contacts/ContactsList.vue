<template>
    <div class="contactsList" 
        :style=" 
        (height!=undefined? 'height:' + height +';': '100%;') + 
        (border!=undefined? 'border:' + border + ';': 0)"
        > 
        <!-- LIST OF CHECKBOX -->
        <ul v-if="type == 'CheckBox'">
            <li  v-for="contact in contacts" :key="contact.id">
                <ContactsRowCheck :contact="contact"/>
            </li>
        </ul>

        <!-- LIST OF ACCEPTING -->
        <ul v-else-if="type == 'Accepting'">
            <li v-if="contacts.length == 0">Não tem Convites</li>
            <li v-else v-for="contact in contacts" :key="contact.id">
                <ContactsRowAccepting :contact="contact"/>
            </li>
        </ul>

        <!-- LIST OF BASE STATUS --> 
        <ul v-else-if="type == 'BasicStatus'" >
            <li v-if="contacts.length == 0" class="cl_emptyContact">Ainda Não Tem Contatos</li>
            <li  v-for="contact in contacts" :key="contact.id">
                <ContactsRowBasicStaus :contacts="contact" :selectedNow="selectedNow"/>
            </li>
        </ul>

        <!-- LIST ON MEETING STATUS -->
        <ul v-else-if="type == 'StatusMeeting'">
            <li  v-for="contact in contacts" :key="contact.id">
                <ContactsRowOnMeeting :contact="contact" :useradm="useradm"/>
            </li>
        </ul>    

        <!-- LIST ON MEETING STATUS -->
        <ul v-else-if="type == 'MeetingInvite'">
            <li  v-for="contact in contacts" :key="contact.id">
                <ContactsRowMeetingInvite :contact="contact" :useradm="useradm"/>
            </li>
        </ul>    
    </div> 
</template>

<script>
import axios from 'axios'
import ContactsRowCheck from './ContactsRowCheck'
import ContactsRowAccepting from './ContactsRowAccepting'
import ContactsRowBasicStaus from './ContactsRowBasicStatus'
import ContactsRowOnMeeting from './ContactsRowOnMeeting'
import ContactsRowMeetingInvite from './ContactsRowMeetingInvite'



export default {
    name: 'contactsList',
    components: { ContactsRowCheck, ContactsRowAccepting, ContactsRowBasicStaus, 
        ContactsRowOnMeeting, ContactsRowMeetingInvite },
    props:{
        type:{},
        height: String,
        selectedNow:{},
        border: String,
        useradm: Boolean 
    },
    data(){
        return{
            contacts:[]
            ,onMeeting: false}
    }, 
    methods:{
        blockMain(){
            this.parent
        },
        selectNow(type, id){
            this.$parent.selectNow(type,id)
        },
        removeFromList(contact){
            console.log('working')
            let index = -1
            this.contacts.forEach((conta,count) => {
                if(conta.nickName == contact.nickName){
                    index = count
                }
            })

            if(index > -1){
                this.contacts.splice(index,1)
            }
        }
    },
    async created(){
        const user = this.$store.getters.GetAuthUser
        const tokenAxios = this.$store.getters.GetAuthTokenAxios
        
        let url = ''

        if(this.type == "Accepting"){url = `contacts/Accepting/${user.nickName}`}

        if(this.type == "BasicStatus"){url = `contacts/BasicStatus/${user.nickName}`}

        if(this.type == "CheckBox"){url = `contacts/${user.nickName}`}

        if(this.type != '' && url != ''){
            const res = await axios.get(url,tokenAxios)
            this.contacts = res.data
        }
    }
}
</script>

<style>
    .contactsList{
        overflow: scroll;
        width: 100%;
        padding: 0px;
        border: solid var(--colorfourth);
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .contactsList > ul{
        list-style: none;
        padding: 0px;
        margin:0px;
        border: solid var(--colorthird);
    }

    .cl_emptyContact{
        color: var(--colorsecond);
        font-size: 15pt;
        font-weight: 800;
    }
</style>