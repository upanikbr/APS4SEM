<template>
    <div class="meetingRowAccepting">
        <div class="form_field label_field">
            <label>{{meeting.theme}}</label>
            <label>Dia: {{meeting.date.brdt}}</label>
            <label>Hora: {{meeting.date.brhr}}</label>
        </div>
        <div class="form_field">
            <button class="button_2 first">Aceitar</button>
            <button class="button_2">Cancelar</button>
        </div>
    </div>
</template>

<script>
export default {
    name:'meetingRowAccepting',
    props:{
        meeting:{}
    }
}
</script>

<style>
    .meetingRowAccepting{
        display: flex;
        flex-direction: row;
        align-items: center;
        border-bottom: solid var(--colorfourth);
    }
    .meetingRowAccepting > .label_field{
        width: 250%;
    }
    .meetingRowAccepting > .form_field > .first{
        margin-bottom: 10px;
    }
    .meetingRowAccepting > .form_field > .button_2{
        background: var(--colorfourth);
    }
</style>