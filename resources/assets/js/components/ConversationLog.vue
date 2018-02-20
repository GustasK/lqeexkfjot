<template lang="html">
    <div class="chat-log pre-scrollable">
        <chat-conversation v-for="conversation in conversations.list" :conversations="conversations" :conversation="conversation"></chat-conversation>
        <div v-show="conversations.list.length === 0">
            Nothing here yet!
        </div>
        <!--{{ conversations }}-->
    </div>
</template>

<script>
    export default {
        props: ['conversations', 'conversation']
    }
</script>