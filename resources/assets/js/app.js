require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
Vue.component('chat-conversation', require('./components/ChatConversation.vue'));
Vue.component('conversation-log', require('./components/ConversationLog.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            conversations: {
                list: [],
                current: {
                    messages: []
                }
            }
        }
    },
    methods: {
        addMessage(message) {
            this.conversations.current.messages.push(message);
            axios.post('/messages', message).then(response => {});
        }
    },
    created() {

        Promise.all([
            axios.get('/conversations'),
            // axios.get('/messages/1')
        ]).then(values => {
            this.conversations.list = values[0].data;

            // this.conversations.list.forEach(function(conversation) {
            //    conversation.messages = []
            // });

            this.conversations.current = this.conversations.list[0];
            this.conversations.current.messages = values[1].data;
        });

        // axios.get('/conversations').then(response => {
        //     this.conversations.current = response.data[0];
        // }).then(
        //     axios.get('/messages').then(response => {
        //         this.conversations.current.messages = response.data;
        //         console.log(this.conversations.current);
        //     })
        // );



        Echo.join('chatroom')
            .listen('MessagePosted', (e) => {
                this.conversation.current.messages.push({
                    message: e.message.message,
                    user: e.user
                });

                console.log(e);
            });

        console.log('aa');
    }
});
