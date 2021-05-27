<template>
    <div class="contactsRowCheck">
        <label for="">{{contact.name}}</label>
        <input type="checkbox"> 
    </div>
</template>

<script>


export default {
    props:{
        contact:{}
    },
    name: 'contactsRowCheck',


}
</script>

<style>
    .contactsRowCheck {
        height:30px;
        border-bottom:solid var(--colorfourth);
    }
    .contactsRowCheck {
        display: flex;
        flex-direction:row;
        justify-content: space-between;
    }
    .contactsRowCheck > label{
        width: 190%;
        overflow: hidden;
    }
</style>