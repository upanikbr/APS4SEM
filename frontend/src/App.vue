<template>
  <div class="app">
    <div class="themes">
      <select name="selTheme" id="selTheme" v-model="selectTheme" @change="changeTheme">
        <option value="blue">Azul</option>
        <option value="BlackOrange">Preto-Laranja</option>
        <option value="thDiscord">Discord</option>
      </select>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'App',
  data(){
    return{
      selectTheme:'blue'
    }
  },
  methods:{
    changeTheme(){
      var cfTheme = document.getElementById('indexThemes')
      cfTheme.removeAttribute("href")
      cfTheme.setAttribute("href",`themes/${this.selectTheme}.css`)
    }
  },
  mounted(){
    var cfTheme = document.getElementById('indexThemes')
    cfTheme.setAttribute("href",`themes/${this.selectTheme}.css`)
  }
}
</script>

<style>
  @font-face{
    font-family: UniSan;
    src: url('./assets/fonts/Uni-Sans-Thin.otf');
  }

  html,body{
    height: 100%;
    padding: 0px;
    margin: 0px;
  }
  
  .app{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  
    font-family: UniSan, sans-serif;
    background-color: var(--colorfirst);
  }

  @media screen and (max-width:600px){
    .app{
        display: flex;
        flex-direction:column;
    }
  }

  .themes{
    position:absolute;
    left: 0;
    top:0;
  }
  
  ::-webkit-scrollbar{
    width: 5px;
    height: 100%;
  }
  ::-webkit-scrollbar-thumb{
    background: var(--colorsecond);
  }
  ::-webkit-scrollbar-corner{
    display: none;
  }

</style>