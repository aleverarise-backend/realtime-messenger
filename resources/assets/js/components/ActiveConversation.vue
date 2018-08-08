<template>
	<b-row class="h-100">
        <b-col cols="8">
            <b-card 
                footer-bg-variant="ligth"
                footer-border-variant="dark"
                title="Conversacion Activa"
                class="h-100"
            >
                <message-conversation-component 
                    v-for="(message, key) in messages" 
                    :key="key"
                    :me="message.me">
                    {{message.content}}
                </message-conversation-component>

                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessages()" autocomplete="off">
                        <b-input-group>
                            <b-form-input
                                type="search"
                                class="text-center"
                                v-model="message"
                                placeholder="Write your messages...">
                            </b-form-input>
                            <b-input-group-append>
                                <b-button variant="primary" type="submit">Send</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>    
                </div>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-img rounded="circle" blank width="70" height="70" blank-color="#777" alt="img" class="m-1" />
            <p>{{contactName}}</p>
            <hr>
            <b-form-checkbox>
                Disabled Notification
            </b-form-checkbox>
        </b-col>
    </b-row>
</template>

<script>
export default {

  	name: 'ActiveConversation',
    props: {
        contactId: Number,
        contactName: String,
    },
  	data () {
	    return {
            messages: [],
            message: '',
	    }
  	},
    mounted(){
        this.getMessages()
    },
    methods: {
        getMessages(){
            axios.get(`/api/messages?contact_id=${this.contactId}`)
                .then(response => {
                    this.messages = response.data
                })
                .catch(error => console.log(error))
        },
        postMessages(){
            axios.post('/api/messages',{
               to_id: this.contactId,
               content: this.message
            })
            .then(response => {
                if (response.data) {
                    this.message = ''
                    this.getMessages()
                }else{

                }
            })
            .catch(error => console.log(error))
        }
    },
    watch: {
        contactId(value){
            this.getMessages()
        }
    }
}
</script>

<style lang="css" scoped>
</style>