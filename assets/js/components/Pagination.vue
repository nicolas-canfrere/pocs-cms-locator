<template>
	<div>
		<ul class="pagination">
			<li class="pagination__previous" v-show="currentPage > 1 && totalPages > 1">
				<button @click.prevent="goPrev"><i class="fas fa-long-arrow-alt-left"></i> Page précédente</button>
			</li>
			<li v-for="page in totalPages">
				<button v-if="page !== currentPage" @click.prevent="goTo(page)">{{page}}</button>
				<span v-else>{{page}}</span>
			</li>
			<li class="pagination__next" v-show="currentPage !== totalPages && totalPages > 0">
				<button @click.prevent="goNext">Page suivante <i class="fas fa-long-arrow-alt-right"></i></button>
			</li>
		</ul>
	</div>
</template>

<script>
  import { mapGetters } from 'vuex'

  export default {
    name: 'Pagination',
	methods: {
      goPrev () {
        if (this.currentPage < 2) {
          return
		}
        this.$store.dispatch('paginationPreviousPage', this.currentPage - 1)
	  },
	  goNext () {
        if (this.currentPage === this.totalPages) {
          return
		}
        this.$store.dispatch('paginationNextPage',this.currentPage + 1)
	  },
	  goTo(page) {
        this.$store.dispatch('paginationGoToPage', page)
	  }
	},
	computed: {
      ...mapGetters({
        totalNumOfPartners: 'getTotalNumOfPartners',
        currentResultsByPage: 'getCurrentResultsByPage',
        currentPage: 'getCurrentPage',
		totalPages: 'getTotalPages'
	  })
	}
  }
</script>
