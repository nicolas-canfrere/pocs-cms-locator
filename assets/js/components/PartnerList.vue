<template>
	<div>
		<div v-show="controlPartnersInitialized === false" class="overlay">
			<div class="loader"><i class="fas fa-spinner fa-spin"></i></div>
		</div>
		<div class="partner__grid">
			<partner
					v-for="(partner,index) in partners"
					:key="partner.id"
					:partner="partner"
					:isfirst="index===0"
			/>
		</div>
	</div>
</template>

<script>
  import Partner from './Partner'
  import { mapGetters } from 'vuex'

  export default {
    name: 'PartnerList',
    components: { Partner },
    data () {
      return {}
    },
    computed: {
      ...mapGetters({
        controlPartnersInitialized: 'controlPartnersInitialized',
        partners: 'filteredPartners'
      })
    }
  }
</script>
