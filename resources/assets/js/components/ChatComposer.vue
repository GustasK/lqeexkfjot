<template lang="html">
    <div class="chat-composer">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Type your message..." v-model="messageText" @keyup.enter="sendMessage" required>
            <span class="input-group-btn">
                <button class="btn btn-primary" @click="sendMessage">Send</button>
            </span>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['userName'],
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
                        name: this.userName
                    }
                });

                this.messageText = '';
            }
        }
    }
</script>