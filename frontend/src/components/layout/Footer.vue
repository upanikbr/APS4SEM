<template>
    <div class="Footer">
        <p>Projetado E Construido pelo Grupo 13</p>
        <p>Nomes: Main,Koban,dfaswerq,defenestrando, eita</p>
    </div>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style>
    .Footer{
        grid-area: footer;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: var(--footerTextColor);
        background: var(--footerRectColor);
        margin-top: 10px;
        border-radius: 10px;
    }
    .Footer > p{
        margin: 0px;
        font-size: 14pt;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>