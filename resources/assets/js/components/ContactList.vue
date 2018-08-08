<template>
	<div>
		<b-form class="my-3 mx-2">
	        <b-form-input
	            type="search"
	            class="text-center"
	            placeholder="Search">
	        </b-form-input>
	    </b-form>    
		<b-list-group>
	        <contact-component
				v-for="(conversation, key) in conversations"
				:key="key"
				:conversation="conversation"
				@click.native="selectConversation(conversation)"
	        >
	        </contact-component>

	        <!-- <contact-component variant="dark"></contact-component>
	        <contact-component variant=""></contact-component>
	        <contact-component variant="secondary"></contact-component>-->
	    </b-list-group>
	</div>
</template>

<script>
export default {

  	name: 'ContactList',
  	mounted(){
  		this.getConversations()
  	},
  	data () {
	    return {
	    	conversations: [],
	    }
  	},
  	methods: {
		getConversations(){
			axios.get('/api/conversations')
				.then(response => {
					this.conversations = response.data
				})
				.catch(error => console.log(error))
		},
		selectConversation(conversation){
			this.$emit('conversationSelected', conversation)
		}	
  	}
}
</script>

<style lang="css" scoped>
</style>