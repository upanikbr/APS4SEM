<template>
    <div ref="menuUser" class="menuUser">
        <button class="menuUser_btn button_1" @click="openDropdownBox">V</button>
        <div ref="dropdownMenuUser" class="dropdownMenuUser">
            <div class="menuPrimary ScreenEx">
                <ul class="menuUserUl">
                    <li class="menuUserli">Nome do usuário</li>
                    <li class="menuUserli">Id do usuário</li>
                    <li ref='iMenuUserOptionUser' :class="'menuUserli selectable ' + selectPrimary "
                        @click="activeSecondList">
                        Opcões do usuário
                     </li>
                    <li ref='iMenuUserExit' class='menuUserli selectable' 
                        @click="close">
                        Sair
                    </li>
                </ul>
            </div>
            <div  ref="menuSecundary" class="menuSecundary ScreenEx">
                <ul class="menuUserUl menuUserSecond">
                    <li class="menuUserli selectable"  @click="updateInfo">Alterar Informações</li>
                    <li class="menuUserli selectable"  @click="close">Excluir Conta</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    name: 'menuUser',
    data(){
        return{
            selectPrimary:''
        }
    },
    methods:{
        //ACTIONS IN THE PAGE
        documentClick(e){
            let target = e.target
            let menuUser = this.$refs.menuUser
            let contains = this.$refs.menuUser.contains(target)

            if(menuUser != target && contains == false){
                this.openDropdownBox()
            }
        },

        openDropdownBox(){
            if(this.$refs.dropdownMenuUser.style.display == 'none'){
                this.$refs.dropdownMenuUser.style.display = 'block'
                document.addEventListener('click', this.documentClick)
            } else {
                this.$refs.dropdownMenuUser.style.display = 'none'
                document.removeEventListener('click', this.documentClick)
            }
        },

        activeSecondList(){
            const menuSecundary = this.$refs.menuSecundary
            if( menuSecundary.style.display == 'none'){
                menuSecundary.style.display = 'flex'
                this.selectPrimary = 'selected'
            } else {
                menuSecundary.style.display = 'none'
                this.selectPrimary = ''
            }
        },

        //ACTIONS FOR OTHER PAGES
        updateInfo(){
            if(this.$parent.MainScreenConnection){
                this.$parent.MainScreenConnection('MenuUser','OpenUserRegisterUpdate')
            }
            this.openDropdownBox()
        },
       

        //OPENS AND CLOSES
        close(){
            this.$refs.dropdownMenuUser.style.display = 'none'
        }
    },
    mounted(){
        this.$refs.dropdownMenuUser.style.display = 'none'
        this.$refs.menuSecundary.style.display = 'none'
    }

}
</script>

<style>
    .menuUser{
        right: 0;
        position:absolute;
    }

    .menuUserli , .menuUserUl {
        margin: 0;
        padding: 0;
        list-style: none;
        margin: 10px 0;
    }

    .menuUser .selectable:hover, .selected {
        color: var(--colorfourth);
    }

    .dropdown-content{
        position: absolute;
        display: none;
        right:0;
    }
    .menuUser_btn:hover .dropdownMenuUser{
        display: block;
    }

    .dropdown-content:hover .menuUser_btn{
        background: blue;
    }

</style>