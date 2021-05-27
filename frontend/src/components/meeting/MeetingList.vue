<template>
     <div class="meetingList" 
        :style=" 
        (height!=undefined? 'height:' + height +';': '100%;') + 
        (border!=undefined? 'border:' + border + ';': 0)"
        > 

        <!-- LIST OF ACCEPTING -->
        <ul v-if="type=='Accepting'">
            <li v-for="meeting in meetings" :key="meeting.id">
                <MeetingRowAccepting :meeting="meeting"/>
            </li>
        </ul>

        <!-- LIST OF BASIC STATUS --> 
        <ul v-else-if="type=='BasicStatus'">
            <li v-for="meeting in meetings" :key="meeting.id">
                <MeetingRowBasicStatus :meeting="meeting" :selectedNow="selectedNow"/>
            </li>
        </ul>
    </div>
</template>

<script>
import axios from 'axios'
import MeetingRowAccepting from './MeetingRowAccepting'
import MeetingRowBasicStatus from './MeetingRowBasicStatus'
import exMethods from '../common/methods' 

export default {
    name: 'meetingList',
    components: { MeetingRowAccepting, MeetingRowBasicStatus },
    props:{
        type: {},
        height: String,
        selectedNow:{},
        border:String
    },
    data(){
        return{
            meetings:[]
        }
    },
    methods:{
        blockMain(){
            this.parent
        },
        selectNow(type, id){
            this.$parent.selectNow(type,id)
        },
    },
    async created(){
        const user = this.$store.getters.GetAuthUser
        const tokenAxios = this.$store.getters.GetAuthTokenAxios
        let url = ''

        console.log(this.type)

        if(this.type == 'BasicStatus'){url = `meeting/${user.nickName}`}
        if(this.type == 'Accepting'){url = `meeting/Accepting/${user.nickName}`}


        if(this.type != '' && url != ''){
            const res = await axios.get(url,tokenAxios)
            this.meetings = res.data
            this.meetings.forEach(meeting => {
                meeting.date = exMethods.easyDate(new Date(meeting.date))
            })
        }
    }

}
</script>

<style>
    .meetingList{
        width:100%;
        border: solid var(--colorfourth);
        border-radius: 10px;
        overflow: scroll;
    }
    .meetingList > ul{
        list-style: none;
        margin: 0px;
        padding: 0px;
    }
</style>