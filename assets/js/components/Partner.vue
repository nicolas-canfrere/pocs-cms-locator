<template>
	<div class="partner__wrapper" :class="{expanded: isfirst}">
		<div class="partner" :class="{expanded: isfirst}">
			<div class="partner__logo">
				<img :src="partnerLogo" alt="">
			</div>
			<div class="partner__body">
				<div class="partner__title">
					{{partner.title}} - {{partner.certification_level.label}}

				</div>
				<div class="partner__content">
					<div class="partner__excerpt">
						{{partner.summary_descrip}}
					</div>
					<div class="partner__infos">
						Disponibilité: <span class="text-bold">{{partner.country_partner.label}}</span>
					</div>
				</div>
				<div class="partner__footer">
					<router-link :to="{name: 'single', params: {id: partner.id}}" exact class="partner__footer__action">
						En savoir plus
					</router-link>
				</div>
			</div>
		</div>
	</div>

</template>

<script>


  export default {
    name: 'Partner',
    props: ['partner', 'isfirst'],
	data () {
      return {
        partnerLogo: ''
	  }
	},
	created () {
      this.partnerLogo = window.urlImg + this.partner.logo
	}
  }
</script>
