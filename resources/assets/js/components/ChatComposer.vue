<template lang="html">
    <div class="chat-composer">
        <input type="text" placeholder="Type your message..." v-model="messageText" @keyup.enter="sendMessage">
        <button class="btn btn-primary" @click="sendMessage">Send</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messageText: ''
            }
        },
        methods: {
            sendMessage() {
                this.$emit('sent', {
                    message: this.messageText,
                    user: {
                        name: "Gustasss"
                    }
                });

                this.messageText = '';
            }
        }
    }
</script>