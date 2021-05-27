<template>
    <div class="createMeetings ScreenEx">
        <h3>Criar Reunião</h3> 
        <div class="form">
            <div class="form_field">
                <label for="ireason">Motivo</label>
                <input type="text" placeholder="Digite o motivo da reunião">
            </div>
            <div class="form_field">
                <label for="idate">Data</label>
                <input id="idate" type="date" placeholder="__/__/__">
            </div>
            <div class="form_field">
                <label>Lista de Convidados</label>
                <ContactsList type='CheckBox' height='300px'/>
            </div>
            <div class="form_field_button">
                <button class="button_1" @click="Submit">CRIAR</button>
                <button class="button_1" @click="close">CANCELAR</button>
            </div>
        </div>
    </div>
</template>

<script>
import ContactsList from '../contacts/ContactsList'

export default {
    name: 'createMeetings',
    components: { ContactsList },
    data(){
        return{
            error: ''
        }
    },
    methods:{
        Open(){
            this.resetAll()
            this.blockMain('block')
            this.$el.style.display = 'initial'
        },
        /*async*/Submit(){
            /*error = await axios.post(url)*/
            if(this.error == '' || this.error == undefined){
                if(this.$parent.tyUpadate){
                    this.$parent.tyUpadate('updateMeetings')
                }
                this.close()
            }  
        },
        close(){
            this.resetAll()
            this.blockMain('unblock')
            this.$el.style.display = 'none'
        },
        resetAll(){
            this.error = ''
        },
        blockMain(value){
            if(this.$parent.blockMain){
                this.$parent.blockMain(value)
            }
        }
    },
    mounted(){
       this.$el.style.display = 'none'
    }
}
</script>

<style>
    .createMeetings{
        position: absolute;
        margin-left: 10px;
        margin-top: 20px;
        width:300px;
        z-index: 3;
    }
    
    .createMeetings > h3{
        margin:-15px 0px 15px -10px;
        padding: 20px 0px 10px 20px;
        background: var(--colorfourth);
        width: 110%;
    }

    .createMeetings > .form_field{
        width: 50%;
    }
</style>