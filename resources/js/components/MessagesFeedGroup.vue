<template>
    <div class="direct-chat-messages" ref="feed">
        <div v-if="!messages.length">
            <empty :message="'Aucun message'"></empty>
        </div>
        <div>
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg mt-3 mb-2" :class="message.from===$gate.user.id ? 'right' : 'left'" v-for="message in messages" :key="message.id">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name" :class="message.from===$gate.user.id ? 'float-right' : 'float-left'">
                        <a v-if="message.from !== $gate.user.id" href="" @click.stop.prevent="setItem(message.from_contact)">{{ message.from !== $gate.user.id ? message.from_contact.name : $gate.user.name }}</a>
                        <a v-else="message.from !== $gate.user.id">{{ message.from !== $gate.user.id ? message.from_contact.name : $gate.user.name }}</a>
                    </span>
                    <span class="direct-chat-timestamp" :class="message.from===$gate.user.id ? 'float-left' : 'float-right'">{{ message.date }}</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img" :src="message.from!==$gate.user.id ?  message.from_contact.profile.avatar : $gate.user.profile.avatar" alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text" v-html="message.text">

                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        </div>
    </div>
</template>

<script>
    import NotFound from "./NotFound";
    import Empty from "./Empty";
    export default {
        name: "MessagesFeedGroup",
        components: {Empty, NotFound},
        props: {
            messages: {
                type: Array,
                required: true
            }
        },

        data(){
            return {

            }
        },

        methods: {
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight;
                }, 50);
            },

            setItem(producer) {
                console.log(producer)
                const parsed = JSON.stringify(producer);
                localStorage.setItem('contact', parsed);
                this.$router.replace('/message')
            }
        },

        watch: {
            contact: function() {
                this.scrollToBottom();
            },
            messages: function() {
                this.scrollToBottom();
            }
        }
    }
</script>

<style scoped>
    .direct-chat-messages {
        height: inherit;
    }
</style>
