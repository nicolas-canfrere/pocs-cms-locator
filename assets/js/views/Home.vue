<template>
	<div class="loc-container loc-grid">
		<div class="mobile-menu-overlay" :class="{open: openFilterMenu}" @click.prevent="openFilterMenu = false"></div>
		<button class="filter-opener" @click.prevent="openFilterMenu = true">
			<i class="fas fa-filter fa-flip-horizontal"></i>
		</button>
		<div class="col-2">
			<partner-filter :openMenu="openFilterMenu"/>
		</div>
		<div class="col-4">
			<div class="results-management">
				<div>
					<label>Trier par&nbsp;:&nbsp;</label>
					<select @change="orderBy">
						<option value="alphaAsc">A - Z</option>
						<option value="alphaDesc">Z - A</option>
						<option value="lastAdded">Derniers ajouts</option>
					</select>
				</div>
				<div class="spacer"></div>
				<div class="hide-mobile-only">
					<label>Résultats par page&nbsp;:&nbsp;</label>
					<select>
						<option value="6">6</option>
						<option value="12">12</option>
						<option value="24">24</option>
						<option value="36">36</option>
					</select>
				</div>
			</div>
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
    },
    methods: {
      orderBy (event) {
        this.$store.dispatch('reorderPartnersBy', event.target.value)
      }
    },
    created () {
      window.addEventListener('resize', e => {
        this.openFilterMenu = false
      }, false)
    }
  }
</script>
