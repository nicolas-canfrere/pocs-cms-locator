<template>
	<div class="loc-container loc-grid">
		<button class="filter-opener" @click.prevent="openFilterMenu = true">
			<i class="fas fa-filter fa-flip-horizontal"></i>
		</button>
		<div class="col-2">
			<partner-filter :openMenu="openFilterMenu"/>
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
    components: { PartnerFilter, PartnerList },
	data () {
      return {
        openFilterMenu: false
	  }
	}
  }
</script>
