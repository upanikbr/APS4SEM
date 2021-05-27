<template>
    <div class="container">
        <ChatScreen/>
        <ChatText/>
    </div>
</template>

<script>
import ChatScreen from '../chat/ChatScreen'
import ChatText from '../chat/ChatText'

export default {
    name:'container',
    components: { ChatScreen, ChatText },
    methods:{
        MainScreenConnection(local,message){
            if(this.$parent.MainScreenConnection){
                this.$parent.MainScreenConnection(local,message)
            }
        }
    }
}
</script>

<style>
    .container{
        grid-area: container ;
        background-color: rgba(50,50,50,0.8);
        border-radius: 20px;

        padding: 20px;
        background: var(--colorfourth);
    }
</style>