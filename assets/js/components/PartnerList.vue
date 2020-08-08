<template>
	<div>
		<div>Partner list</div>
		<div>
			<partner v-for="partner in partners" key="partner.id">{{partner.name}}</partner>
		</div>
	</div>
</template>

<script>
	import Partner from './Partner'
  export default {
    name: 'PartnerList',
	components: { Partner },
	data () {
      return {
        partners: [
		  {id: 1, name: "name 1"},
		  {id: 2, name: "name 2"},
		  {id: 3, name: "name 3"},
		  {id: 4, name: "name 4"},
		]
	  }
	}
  }
</script>
