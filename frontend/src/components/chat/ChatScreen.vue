<template>
    <div class="chatScreen">
        <MessageTemplateBallon :messageData="messages[0]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
        <MessageTemplateBallon :messageData="messages[1]"/>
    </div>
</template>

<script>
import MessageTemplateBallon from './MessageTemplateBallon'

/*
    MESSAGE TEMPLATE
    type: 'contact'||'user'
    nickname: how send a message
    date: 'dd/mm/year hr:mi'
    message: 'the text'
*/

export default {
    name:'chatScreen',
    components: {MessageTemplateBallon},
    data(){
        return{
            messages:[
                {type: 'contact', nickname:'Maicon',date:'14/12/2021: 21:22', message:'shitshit hasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssppens'},
                {type: 'user',nickname:'Claudio',date:'14/12/2021: 21:22',
                 message:'shit hasssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssppens'}
            ]
        }
    }
}
</script>

<style>
    .chatScreen{
        width: 100%;
        height: 500px;
        border-radius: 20px;
        overflow: scroll;
        background: var(--colorthird);
    }
</style>