<template>
    <div class="mt-3">
        <div class="card direct-chat direct-chat-primary">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">Messages de groupes</h3>
                <div class="card-tools">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">{{messages.length}}</span>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- Conversations are loaded here -->
                <conversation-group :messages="messages" @new="sendNewMessage"/>
                <!--/.direct-chat-messages-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Messages",

        data() {
            return {
                messages: [],
            }
        },

        mounted() {
            Echo.channel(`messages`)
                .listen('NewMessageGroup', (e) => {
                    console.log(e);
                    this.handleIncoming(e.message);
                });

            axios.get("/api/conversation/0")
                .then((response) => {
                    console.log(response.data);
                    this.messages = response.data;
                });
        },

        methods : {
            sendNewMessage(message) {
                this.messages.push(message);
            },

            handleIncoming(message) {
                console.log(message);
                if(message.from === user.id)
                    return;
                this.sendNewMessage(message);
            },
        }
    }
</script>

<style scoped>
    .card-body {
        min-height: 700px;
    }

    .direct-chat-messages {
        height: inherit;
    }
</style>
