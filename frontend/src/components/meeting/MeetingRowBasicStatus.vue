<template>
    <div class="meetingRowBasicStatus" :class="classTypes" @click="isClicked">
        <div id="dateBox" >
            {{meeting.date.brdt}}
            {{meeting.date.brhr}}
        </div>
        <div class="dateBox" v-if="meeting.isOccurring ">
            REUNIÃO ABERTA
        </div>
        {{meeting.theme}}
    </div>
</template>

<script>
export default {
    name: 'meetingRowBasicStatus',
    props:{
        meeting:{},
        selectedNow:{}
    },
    computed:{
        classTypes(){
            if(this.selectedNow.type == 'meetings' && this.meeting.id == this.selectedNow.id){
                if(this.meeting.isOccurring === true){
                    return 'occurringMeeting occurringSelectedMeeting'
                } else {
                    return 'selectedMeeting'
                }
            } else if (this.meeting.isOccurring === true) {
                return 'occurringMeeting'    
            }
            return ''
        }
    },
    methods:{
        isClicked(){//send for their parent, he is selected now
            this.$parent.selectNow('meetings',this.meeting.id)
        }
    }
}
</script>

<style>
    .meetingRowBasicStatus{
        display: flex;
        flex-direction: column;
        margin: -4px 3px;
        margin-right: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 25px;

        border-style: solid;
        border-color: var(--colorfirst);
        border-left:transparent;
        border-right: transparent;

        font-weight: 1000;
        font-size: 15pt;
        font-family: Unisan, Helvetica, sans-serif;
        color: var(--colorfirst);
    }

    .meetingRowBasicStatus > #dateBox{
        display: flex;
        flex-direction: row;
        font-size: 22px;
        margin-left: -25px;
        color:var(--colorfirst);
    }

    /*IS SELECTED*/ 
    .selectedMeeting{
        border-radius: 10px;
        background:var(--colorfourth);
        color: var(--colorsecond);
    }

    .selectedMeeting > #dateBox{
        color:var(--colorsecond);
    }

    /*IS OCCURRING*/
    .occurringMeeting{
        border-radius: 10px;
        background:var(--colorsecond);
        color: var(--colorfourth);
        border-left:solid var(--colorthird);
        border-right:solid var(--colorthird);
    }

    .occurringMeeting > #dateBox{
        color:var(--colorfourth);
    }

    /*IS OCCURRING AND SELECTED MEETING*/
    .occurringSelectedMeeting{
        border-left:solid var(--colorsecond);
        border-right:solid var(--colorsecond);
        background: var(--colorfourth);
        color: var(--colorsecond);
    }

    .occurringSelectedMeeting > #dateBox{
        color:var(--colorsecond);
    }

</style>