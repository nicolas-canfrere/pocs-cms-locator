<template>
	<div class="partner__filter" :class="{open: openMenu}">
		<div class="filter__section" v-show="categories.length > 1">
			<div class="section__title" @click="categorySectionOpen = !categorySectionOpen"
				 :class="{'section-open': categorySectionOpen}">
				{{$t('default.categories')}}
				<i class="section__title_arrow fas fa-chevron-down"></i>
			</div>
			<transition
					name="expand-filter-section"
					@enter="accordionEnter"
					@after-enter="accordionAfterEnter"
					@leave="accordionLeave"
			>
				<div class="section__content" v-show="categorySectionOpen">
					<ul class="unstyled p-0 mb-2">
						<li v-for="(category, index) in categories" :key="category.id" class="mb-2">
							<div class="checkbox">
								<label class="">
									<input type="checkbox" v-model="category.selected"
										   @change="toggleFilterCategory(category)">
									<span class="checkbox__square">
									<span class="checkbox__check"></span>
								</span>
									<span class="checkbox__label">{{category.name}}</span>
								</label>
							</div>
						</li>
					</ul>
					<a href="#" @click.prevent="toggleAllCategories" class="select-all">
						<span v-if="allCategoriesSelected === false">{{$t('default.selectAll')}}</span>
						<span v-else>{{$t('default.unselectAll')}}</span>
					</a>
				</div>
			</transition>
		</div>
		<div class="filter__section" v-show="countries.length > 1">
			<div class="section__title" @click="countrySectionOpen = !countrySectionOpen"
				 :class="{'section-open': countrySectionOpen}">
				{{$t('default.localization')}}
				<i class="section__title_arrow fas fa-chevron-down"></i>
			</div>
			<transition
					name="expand-filter-section"
					@enter="accordionEnter"
					@after-enter="accordionAfterEnter"
					@leave="accordionLeave"
			>
				<div class="section__content" v-show="countrySectionOpen">
					<multiselect
							:value="filters.countries"
							:options="countries"
							:multiple="true"
							:close-on-select="false"
							:clear-on-select="false"
							:preserve-search="false"
							:placeholder="`${$t('default.search')}...`"
							label="label"
							track-by="id"
							:preselect-first="false"
							:taggable="true"
							@select="addCountry"
							@remove="removeCountry"
					>
					</multiselect>
				</div>
			</transition>
		</div>
		<div class="filter__section">
			<div class="section__title" @click="searchSectionOpen = !searchSectionOpen"
				 :class="{'section-open': searchSectionOpen}">
				{{$t('default.findSolution')}}
				<i class="section__title_arrow fas fa-chevron-down"></i>
			</div>
			<transition
					name="expand-filter-section"
					@enter="accordionEnter"
					@after-enter="accordionAfterEnter"
					@leave="accordionLeave"
			>
				<div class="section__content" v-show="searchSectionOpen">
					<div class="search">
						<input type="text" @input="search">
						<div class="icon"><i class="fas fa-search"></i></div>
					</div>
				</div>
			</transition>
		</div>
	</div>
</template>

<script>
  import Multiselect from 'vue-multiselect'
  import { mapGetters, mapState } from 'vuex'

  export default {
    name: 'PartnerFilter',
    components: { Multiselect },
    props: ['openMenu'],
    data () {
      return {
        allCategoriesSelected: false,
        categorySectionOpen: true,
        countrySectionOpen: true,
        searchSectionOpen: true,
      }
    },
    computed: {
      ...mapGetters({
        categories: 'allCategories',
        countries: 'allCountries'
      }),
      ...mapState(['filters'])
    },
    methods: {
      search (event) {
        const query = event.target.value
        this.$store.dispatch('searchPartner', query)
	  },
      accordionEnter (element) {
        element.style.height = 'auto'
        const height = getComputedStyle(element).height
        element.style.height = 0
        getComputedStyle(element)
        setTimeout(() => {
          element.style.height = height
        })
      },
      accordionAfterEnter (element) {
        element.style.height = 'auto'
      },
      accordionLeave (element) {
        element.style.height = getComputedStyle(element).height
        getComputedStyle(element)
        setTimeout(() => {
          element.style.height = 0
        })
      },
      toggleFilterCategory (category) {
        this.$store.dispatch('toggleCategoryToFilters', category)
      },
      addCountry (country) {
        this.$store.dispatch('addCountryToFilters', country)
      },
      removeCountry (country) {
        this.$store.dispatch('removeCountryToFilters', country)
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
