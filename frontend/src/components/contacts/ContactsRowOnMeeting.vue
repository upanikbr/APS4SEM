<template>
    <div class="contactsRowOnMeeting">
        <h3>{{contact.name}} - </h3>
        <h3>{{contact.onMeeting? 'Na Reunião':'Ausente'}}</h3>
        <button class="button_2" v-if="useradm? useradm:0">Remover</button>
    </div>
</template>

<script>
export default {
    name:'contactsRowOnMeeting',
    props:{
        contact:{},
        useradm:Boolean
    }
}
</script>

<style>
    .contactsRowOnMeeting{
        display: flex;
        margin: 0px;
        padding: 10px;
        border-bottom: solid var(--colorfourth)
    }
    .contactsRowOnMeeting > h3{
        width:50%;
        margin:0px 5px;
    }
</style>