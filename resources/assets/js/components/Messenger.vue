<template>
	<b-container fluid style="height: calc(100vh - 56px)">
	    <b-row class="h-100" no-gutters>
	        <b-col cols="4">
	            <contact-list-component @conversationSelected="changeConversation($event)"></contact-list-component>
	        </b-col>
	        <b-col cols="8">
	           	<active-conversation-component 
	           		v-if="selectedConversation"
	           		:contact-id="selectedConversation.contact_id"
	           		:contact-name="selectedConversation.contact_name"></active-conversation-component>
	        </b-col>
	    </b-row>
	</b-container>
</template>

<script>
export default {

  	name: 'Messenger',
  	mounted(){
  		Echo.channel('example')
	    .listen('MessageSend', (e) => {
	        console.log(e);
	    });
  	},
  	data () {
	    return {
	    	selectedConversation: null
	    }
  	},
  	methods: {
  		changeConversation(conversation){
  			this.selectedConversation = conversation
  		}
  	}
}
</script>

<style lang="css" scoped>
</style>