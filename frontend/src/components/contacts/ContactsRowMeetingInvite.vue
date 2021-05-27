<template>
    <div class="contactsRowMeetingInvite">
        <h3>{{contact.name}} - </h3>
        <h3>{{contact.online? 'ONLINE':'OFFLINE'}}</h3>
        <button class="button_2" v-if="useradm? useradm:0">Convidar</button>
    </div>
</template>

<script>
export default {
    name:'contactsRowMeetingInvite',
    props:{
        contact:{},
        useradm:{}
    }
}
</script>

<style>
    .contactsRowMeetingInvite{
        display: flex;
        margin: 0px;
        padding: 10px;
        border-bottom: solid var(--colorfourth)
    }
    .contactsRowMeetingInvite > h3{
        width:50%;
        margin:0px 5px;
    }
</style>