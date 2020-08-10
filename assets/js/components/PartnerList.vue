<template>
	<div>
		<div v-show="controlPartnersInitialized === false" class="overlay">
			<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>
		</div>
		<div v-if="partners.length === 0">Aucun résultat pour votre recherche</div>
		<div class="partner__grid">
			<partner
					v-for="(partner,index) in partners"
					:key="partner.id"
					:partner="partner"
					:isfirst="index===0 && currentPage === 1"
			/>
		</div>
		<pagination></pagination>
	</div>
</template>

<script>
  import Partner from './Partner'
  import Pagination from './Pagination'
  import { mapGetters } from 'vuex'

  export default {
    name: 'PartnerList',
    components: { Partner, Pagination },
    data () {
      return {}
    },
    computed: {
      ...mapGetters({
        controlPartnersInitialized: 'controlPartnersInitialized',
        partners: 'filteredPartners',
        currentPage: 'getCurrentPage'
      })
    }
  }
</script>
