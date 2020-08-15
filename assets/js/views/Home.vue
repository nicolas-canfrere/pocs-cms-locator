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
					<label class="results-management__label">{{ $t('default.sortBy')}}&nbsp;:&nbsp;</label>
					<select @change="orderBy">
						<option value="alphaAsc">A - Z</option>
						<option value="alphaDesc">Z - A</option>
						<option value="lastAdded">{{ $t('default.lastAdded')}}</option>
					</select>
				</div>
				<div class="spacer"></div>
				<div class="hide-mobile-only">
					<label class="results-management__label">{{ $t('default.resultsByPage')}}&nbsp;:&nbsp;</label>
					<select @change="changeResultsByPage">
						<option v-for="result in resultsByPageConfig" :value="result">{{result}}</option>
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
  import { mapGetters } from 'vuex'

  export default {
    name: 'Home',
    components: { PartnerFilter, PartnerList },
    data () {
      return {
        openFilterMenu: false
      }
    },
	computed: {
      ...mapGetters({
		resultsByPageConfig: 'getResultsByPageConfig'
	  })
	},
    methods: {
      changeResultsByPage (event) {
        this.$store.dispatch('changeResultsByPage', event.target.value)
	  },
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
