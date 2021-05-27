<template>
    <div :class="`messageTemplateBallon ${messageData.type=='user'? 'messageTemplateBallonUser':''}`">
        <h3>{{messageData.type!='user'? messageData.nickname:'você'}}</h3>
        <p>{{messageData.message}}</p>
        <h4>{{messageData.date}}</h4>
    </div>
</template>

<script>
export default {
    name:'messageTemplateBallon',
    props:{
        messageData:{}
    }
}
</script>

<style>
    .messageTemplateBallon{
        width:45%;
        padding: 5px 10px;
        margin:15px;
        
        border-radius: 10px;
        border:solid var(--colorsecond);

        background:var(--colorfourth);
        color:var(--colorsecond);

        word-wrap: break-word;
    }

    .messageTemplateBallonUser{
        margin-left:auto;
        border:solid var(--colorfourth);
        background:var(--colorsecond);
        color: var(--colorfourth);
    }

    .messageTemplateBallon > h3{
        margin-top: 2px;
        margin-bottom: 6px;
        font-size: 15pt;
    }

    .messageTemplateBallon > p{
        font-family:Arial, Helvetica, sans-serif;
        font-size: 14pt;
        margin-top:0px;
        margin-bottom:10px;
    }

    .messageTemplateBallon > h4{
        margin: 0px;
    }
</style>