<template lang="html">
    <div class="chat-log">
        <chat-message class="list-group-item" v-for="message in messages" :message="message"></chat-message>
        <div v-show="messages.length === 0">
            Nothing here yet!
        </div>
    </div>
</template>

<script>
    export default {
        props: ['messages']
    }
</script>