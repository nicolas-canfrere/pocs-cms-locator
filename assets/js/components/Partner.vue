<template>
	<div class="partner__wrapper" :class="{expanded: isfirst}">
		<div class="partner" :class="{expanded: isfirst}">
			<div class="partner__logo">
				<img :src="partnerLogo" alt="">
			</div>
			<div class="partner__body">
				<div class="partner__title">
					{{partner.title}} - {{partner.certification_level.label}} <span class="badge" v-if="isNew">New</span>
				</div>
				<div class="partner__content">
					<div class="partner__excerpt" v-html="partner.summary_descrip"></div>
					<div class="partner__infos">
						Disponibilité: <span class="text-bold">{{partner.country_partner}}</span>
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
	computed: {
      isNew: function () {
        const limit = new Date()
		limit.setMonth(limit.getMonth() - 1)
		const created = new Date(this.partner.created)
		return created > limit
      }
	},
	created () {
      this.partnerLogo = window.urlImg + this.partner.logo
	}
  }
</script>
