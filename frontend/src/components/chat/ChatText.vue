<template>
    <div class="chatText">
        <textarea name="" id="iChatTextArea" rows="3" maxlength="300" ></textarea>
        <div class='btnGroup_ChatText'>
            <button class="button_1">☺</button>
            <button class="button_1">Enviar</button>
        </div>
        <div class='btnGroup_ChatText'>
            <button class="button_1" @click="opMeetingHappening">REUNIAO</button>
        </div>
    </div>
</template>

<script>

export default {
    name:'chatText',
    data(){
        return{
            code:'0x1F601'
        }
    },
    methods:{
        opMeetingHappening(){
            if(this.$parent.MainScreenConnection){
                this.$parent.MainScreenConnection('ChatText','OpenMeetingHappenig')
            }
        },
    }
}
</script>

<style>
    .chatText{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        height:18%;
        margin-top: 10px;

        border-radius: 10px;
        background: var(--colorthird);
    }

    #iChatTextArea{
        width: 100%;
        height: 70%;
        margin: 10px 10px 10px 10px;
        padding: 8px;
        border-radius: 20px;

        font-family: Arial, Helvetica, sans-serif;
        font-size: 15pt;

        background: var(--colorsecond);
        color: var(--colorfourth);
        box-shadow: none;
        border:none;
        resize: none;
    }

    #iChatTextArea:focus{
        outline: none;
    }

    .btnGroup_ChatText{
        display: flex;
        flex-direction: column;
    }

     .btnGroup_ChatText > .button_1{
         margin:5px;
     }

</style>