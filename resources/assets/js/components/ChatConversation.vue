<template lang="html">
    <a class="list-group-item" @click="getMessages(conversation.id)">
        <p>{{ conversation.name }}</p>
    </a>
</template>

<script>
    export default {
        props: ['conversations', 'conversation'],
        methods: {
            getMessages(conversation_id) {
                this.conversations.current = this.conversation;
                axios.get('/messages/' + conversation_id, conversation_id).then(response => {
                    this.conversation.messages = response.data;
                });
            }
        }
    }
</script>