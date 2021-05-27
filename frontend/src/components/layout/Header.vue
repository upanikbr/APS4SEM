<template>
    <div class="Header">
        <h1>CHAT PROJECT</h1>
        <MenuUser/>
    </div>
</template>

<script>
import MenuUser from '../user/MenuUser'

export default {
    name:'Header',
    components: { MenuUser },
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
    .Header{
        grid-area: header;
        width: 100%;
        color: var(--colorsecond);
        background-color: var(--colorfourth);
        
        margin-bottom: 10px;
        border-radius: 20px;

        display: flex;
        flex-direction: row;
    }
    .Header > h1{
        margin-left: 20px;
    }
</style>