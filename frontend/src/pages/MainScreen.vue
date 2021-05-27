<template>
  <div class="MainScreen">
    <!-- components type pop up -->
    <AcceptingInvitation ref="reAcceptingInvitation"/>
    <UserRegisterUpdate ref="reUserRegisterUpdate"/> <!-- is activate in MenuUser.vue -->
    <MeetingHappening ref='reMeetingHappening'/>
    <!-- finish components type pop up -->
    <div class="blockMain" ref="reblockMain">eita</div>
    <div class="MainScreenSub">
      <Header/>
      <MainMenu/>
      <Container/>
      <Footer/>
    </div>
  </div>
</template>





<script>
//import axios from 'axios'
import MainMenu from '../components/layout/MenuMain'
import Footer from '../components/layout/Footer'
import Header from '../components/layout/Header'
import Container from '../components/layout/Container'
import AcceptingInvitation from '../components/user/AcceptingInvitation'
import UserRegisterUpdate from '../components/user/UserRegisterUpdate'
import MeetingHappening from '../components/meeting/MeetingHappening'

export default {
  name: 'MainScreen',
  components: { MainMenu, Footer, Header, Container, AcceptingInvitation, UserRegisterUpdate, MeetingHappening },
  data(){
    return{
      user: 'sfasdf'
    }
  },
  methods:{
    blockMain(value){
      console.log(value)
      if(value == 'unblock'){
        this.$refs.reblockMain.style.display = 'none'
      } else if (value == 'block'){
        this.$refs.reblockMain.style.display = 'initial'
      }
    },
    MainScreenConnection(local,message){
      //create a connection for req 
      if(local == 'MenuUser'){
        if(message == 'OpenUserRegisterUpdate'){
          this.$refs.reUserRegisterUpdate.open()
        }
      } else if (local == 'ChatText'){
        if(message == 'OpenMeetingHappenig'){
          this.$refs.reMeetingHappening.open()
        }
      }
    }
  },
  /*created(){
    console.log(this.$store.getters.GetAuthUser)
    if(this.$store.getters.GetAuthUser == {} || this.$store.getters.GetAuthUser == undefined){
      this.$router.push({name: 'LoginScreen'})
    }
    if(this.$store.getters.GetAuthToken == '' || this.$store.getters.GetAuthToken == undefined){
      this.$router.push({name: 'LoginScreen'})
    }
  },*/
  mounted(){
    this.blockMain('block')
    this.$refs.reAcceptingInvitation.Open()
  }
}
</script>


<style>
  .MainScreen{
    display:flex;
    justify-content: center;
    align-items: center;
    width: 100%;
  }
  .MainScreenSub{
    width: 99%;
    display: grid;
    grid-template-areas: 
      "header header"
      "menuPrincipal container"
      "footer footer"
    ;
    grid-template-rows: 100px 1fr 70px;
    grid-template-columns: 300px 1fr;

    font-family: UniSan, sans-serif;
    background-color: var(--mainColor);
  }

  .blockMain{
    position: absolute;
    width: 100%;
    height: 100%;
    background: var(--colorfourth);
    opacity: 90%;
    z-index: 2;
  }

  @media screen and (max-width:600px){
    .MainScreenSub{
        display: flex;
        flex-direction:column;
    }
  }
</style>