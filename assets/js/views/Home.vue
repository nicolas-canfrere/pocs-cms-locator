<template>
	<div class="loc-container loc-grid">
		<div class="col-2">
			<partner-filter/>
		</div>
		<div class="col-4">
			<partner-list></partner-list>
		</div>
	</div>
</template>

<script>
  import PartnerList from '../components/PartnerList'
  import PartnerFilter from '../components/PartnerFilter'

  export default {
    name: 'Home',
    components: { PartnerFilter, PartnerList }
  }
</script>
