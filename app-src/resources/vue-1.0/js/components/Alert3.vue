<template>
    <div class="Alert">
        <span class="Alert__close">X</span>
    </div>
</template>
<script>
    export default {
        data() {
            return {show: true};
        },
        mounted() {
            console.log(this.show);
        }
    }
</script>
<style lang="stylus">
    .Alert
        position: relative
        background: #ddd
        border: 1px solid darken(#ddd, 10%)
        padding: 1em

    .Alert--Success
        background: lighten(green, 70%)
        border: 1px solid lighten(green, 30%)

    .Alert--Error
        background: lighten(red, 70%)
        border: 1px solid lighten(red, 30%)

    .Alert__close
        position: absolute
        top: 1em
        right: 1em
        font-weight: bold
        cursor: pointer
</style>
