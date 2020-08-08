<template>
	<div class="partner__filter" :class="{open: openMenu}">
		<div class="filter__section">
			<div class="section__title">Catégories</div>
			<div class="section__content">
				<ul class="unstyled p-0 mb-2">
					<li v-for="(category, index) in categories" :key="category.id" class="mb-2">
						<div class="checkbox">
							<label>
								<input type="checkbox" v-model="category.selected" @change="toggleFilterCategory(category)">
								<span class="checkbox__square">
									<span class="checkbox__check"></span>
								</span>
								<span class="checkbox__label">{{category.name}}</span>
							</label>
						</div>
					</li>
				</ul>
				<a href="#" @click.prevent="toggleAllCategories" class="select-all">
					<span v-if="allCategoriesSelected === false">Tout séléctionner</span>
					<span v-else>Tout déséléctionner</span>
				</a>
			</div>
		</div>
		<div class="filter__section">
			<div class="section__title">Localisation</div>
			<div class="section__content">
				<multiselect
					v-model="selectedCountries"
					:options="countries"
					:multiple="true"
					:close-on-select="false"
					:clear-on-select="false"
					:preserve-search="false"
					placeholder="Rechercher..."
					label="name"
					track-by="id"
					:preselect-first="false"
					:taggable="false"
				>
				</multiselect>
			</div>
		</div>
		<div class="filter__section">
			<div class="section__title">Rechercher quelque chose</div>
			<div class="section__content">
				<div class="search">
					<input type="text">
					<div class="icon"><i class="fas fa-search"></i></div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
  import Multiselect from 'vue-multiselect'
  import { mapGetters } from 'vuex'
  export default {
    name: 'PartnerFilter',
	components: { Multiselect },
	props: ['openMenu'],
	data() {
      return {
        allCategoriesSelected: false,
		selectedCountries: [],
	  }
	},
	computed: {
      ...mapGetters({
        categories: 'allCategories',
		countries: 'allCountries'
	  })
	},
	methods: {
      toggleFilterCategory (category) {
		this.$store.dispatch('toggleCategoryToFilters', category)
	  },
      toggleAllCategories () {
        if (this.allCategoriesSelected) {
          this.allCategoriesSelected = false
          this.categories.forEach(el => {
            el.selected = false
          })
		  this.$store.dispatch('unselectAllCategoriesToFilters')
		} else {
          this.allCategoriesSelected = true
          this.categories.forEach(el => {
            el.selected = true
          })
          this.$store.dispatch('selectAllCategoriesToFilters')
		}

	  }
	}
  }
</script>
