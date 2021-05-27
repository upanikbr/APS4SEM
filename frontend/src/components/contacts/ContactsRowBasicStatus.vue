<template>
    <div class="Contacts" :class="classSelected" @click="isClicked">
        <!--ONLINE-->
        <div id="onlineIndicate" 
            v-if="contacts.isOnline != undefined && contacts.isOnline === true" 
            style="background-color: greenyellow;">
        </div>
        <div id="onlineIndicate" v-else style="background-color: gray;"></div>

        <!--ICON-->
        <div id="circle" v-if="contacts.img == undefined">{{contacts.name[0]}}{{contacts.name[1]}}</div>

        <!--MESSAGE-->
        <div id="messageIndicate"
            v-if="contacts.isMessageRes != undefined && contacts.isMessageRes === true"
            style="background-color: #007eff"
        ></div>
        <div id="messageIndicate" v-else></div>
        
        <!--NAME-->
        <label>{{contacts.name}}</label>
    </div>
</template>

<script>
export default {
    name: 'Contacts',
    props:{
        contacts:{},   
        selectedNow:{},   
            /* "ELEMENTS INSIDE DE PROPS"
                img: ADDRESS STRING,
                name: 'STRING',
                id: NUMBER,
                isOpen = onlineIndicate: BOOL,
                messageIndicate: BOOL
                MainRectangleColor: "COLOR"
            */
    },
    computed:{
        classSelected(){
            if(this.selectedNow.type == 'chattings' && this.contacts.id == this.selectedNow.id){
                return 'selectedContacts'
            }
            return ''
        }
    },
    methods:{
        isClicked(){//send for their parent, he is selected now
            this.$parent.selectNow('chattings',this.contacts.id)
        }
    }
}
</script>

<style>
    .Contacts{
        display: flex;
        align-items: center;
        font-size: 18pt;
        flex-wrap: nowrap;
        overflow: hidden;
        margin-left: -15px;
        margin-right: 10px;
        border-radius: 10px;
        color: var(--colorsecond);
        font-weight: 600;
        font-family: UniSan;
    }

    .selectedContacts{
        color: var(--colorthird);
        background-color: var(--colorsecond);
    }

    @media screen and (max-width: 600px){
        .Contacts{
            font-size: 20pt;
        }
    }

    .Contacts > #circle{
        display: flex;
        justify-content: center;
        align-items: center;
        color: var(--colorthird);
        background-color: var(--colorfirst);
        min-width: 40px;
        max-width: 40px;
        min-height: 40px;
        max-height: 40px;
        border-radius: 100%;
        margin: 5px 10px;
        font-size: 12pt;
    }

    .Contacts > #messageIndicate{
        position: relative;
        margin-left: -15px;
        margin-top: 35px;
        margin-right: 10px;
        min-width: 10px;
        max-width: 10px;
        min-height: 10px;
        max-height: 10px;
        border-radius: 100%;
    }

    .Contacts > #onlineIndicate{
        background-color: greenyellow;
        border: #aaaaaa;
        border-style: solid;
        border-width: 2px;
        min-width:10px;
        max-width: 10px;
        min-height: 10px;
        max-height: 10px;
        border-radius: 100%;
        margin-left: 15px;
    }

    .Contacts > label{
        white-space: nowrap;
        overflow: hidden;
    }
</style>