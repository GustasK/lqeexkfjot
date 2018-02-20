<template lang="html">
    <div class="chat-log pre-scrollable">
        <chat-message class="list-group-item" v-for="message in conversations.current.messages" :message="message"></chat-message>

        <!--<div v-show="conversations.current.messages.length === 0">-->
            <!--Nothing here yet!-->
        <!--</div>-->
        <!--{{ conversations }}-->
    </div>
</template>

<script>
    export default {
        props: ['conversations']
    }
</script>