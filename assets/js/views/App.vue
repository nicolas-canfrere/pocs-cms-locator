<template>
	<div>
		<div>filtre</div>
		<div>
			<partner-list></partner-list>
		</div>
	</div>
</template>

<script>
	import PartnerList from '../components/PartnerList'
  export default {
    name: 'App',
	components: { PartnerList }
  }
</script>
