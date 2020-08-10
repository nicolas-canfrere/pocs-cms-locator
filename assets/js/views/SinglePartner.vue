<template>
	<div class="page-single">
		<div class="loc-container">
			<div class="mt-4 mb-4">
				<router-link :to="{name: 'home'}" exact class="outlined-btn"><i class="fas fa-long-arrow-alt-left"></i>
					Retour à la liste
				</router-link>
			</div>
			<div class="loc-grid single-partner">
				<div class="col-2">
					<div class="single-partner__logo">
						<img :src="partnerLogo" alt="">
					</div>
				</div>
				<div class="col-4">
					<div class="single-partner__header">
						<div class="single-partner__header__logo">
							<img :src="partnerLogo" alt="">
						</div>
						<div class="single-partner__header__content">
							<div class="partner__title">{{partner.title}} - {{partner.certification_level.label}}</div>
							<div class="show-mobile-only mb-4 mt-4">
								<span class="open-trusted-cloud-logo small"><i
										class="fas fa-cloud fa-flip-horizontal"></i> Open Trusted Cloud<sup>tm</sup></span>
							</div>
							<div class="partner__action">
								<a :href="partner.url" class="outlined-btn">Découvrir la solution</a>
							</div>
						</div>
					</div>
					<div class="single-partner__body">
						<div class="single-partner__section" v-html="partner.summary_descrip"></div>
						<div class="single-partner__section">
							Disponibilité: <span class="text-bold">{{partner.country_partner}}</span>
						</div>
						<div class="single-partner__section hide-mobile">
							<span class="open-trusted-cloud-logo"><i class="fas fa-cloud fa-flip-horizontal"></i> Open Trusted Cloud<sup>tm</sup></span>
						</div>
					</div>
				</div>
			</div>
			<div class="loc-grid mt-16">
				<div class="col-4">
					<h3>Why it's Open Trusted Cloud proof?</h3>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor doloremque eaque eos
						facilis harum impedit inventore iste molestias, optio placeat quam quos, reprehenderit,
						similique sit vitae voluptas? A adipisci asperiores aspernatur assumenda at consequatur deserunt
						eum ex expedita explicabo illo iure iusto maxime, minus necessitatibus obcaecati praesentium
						ratione recusandae?
					</p>
				</div>
			</div>
			<div class="loc-grid mt-16">
				<div class="col">
					<div class="single__partner__video">
						<div class="video-resp">
							<iframe src="https://www.youtube.com/embed/ajjCnRCX19w" frameborder="0"></iframe>
						</div>
					</div>
				</div>
			</div>
			<div class="loc-grid mt-16">
				<div class="single__partner__images">
					<div class="loc-grid">
						<div class="col-2 p-2">
							<img src="https://via.placeholder.com/400x300" alt="">
						</div>
						<div class="col-2 p-2">
							<img src="https://via.placeholder.com/400x300" alt="">
						</div>
						<div class="col-2 p-2">
							<img src="https://via.placeholder.com/400x300" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="loc-grid mt-16">
				<div class="col-1"></div>
				<div class="col-4">
					<div class="loc-grid">
						<div class="col-2 p-8">
							<img src="https://via.placeholder.com/400x300" class="img-resp">
						</div>
						<div class="col-4 p-8">
							<h3>Qui sommes nous ?</h3>
							<p v-html="partner.description"></p>
							<p>
								<a :href="partner.url" class="outlined-btn">Lien vers l'éditeur</a>
							</p>
						</div>
					</div>
				</div>
				<div class="col-1"></div>
			</div>
		</div>
	</div>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    name: 'SinglePartner',
    data () {
      return {
        partner: null,
        partnerLogo: ''
      }
    },
    computed: {
      ...mapGetters({
        partnerById: 'partnerById'
      })
    },
    created () {
      const id = parseInt(this.$route.params.id)
      this.partner = this.partnerById(id)
      if (!this.partner) {
        this.$router.push({ name: 'home' })
      }
      this.partnerLogo = window.urlImg + this.partner.logo
    }
  }
</script>
