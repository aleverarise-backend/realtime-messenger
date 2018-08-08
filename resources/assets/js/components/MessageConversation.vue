<template>
	<b-media :right-align="me" vertical-align="center" class="mb-3">
        <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="48" alt="placeholder" />
        <b-card><slot></slot></b-card>
    </b-media>
</template>

<script>
export default {

  	name: 'MessageConversation',
  	props: {
  		me: Boolean,
  	},
  	mounted(){},
  	data () {
	    return {
	    	content: 'hello'
	    }
  	}
}
</script>

<style lang="css" scoped>
</style>