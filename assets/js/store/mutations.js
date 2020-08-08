import { unique } from 'underscore'

export default {
  INIT_PARTNERS: (state, partners) => {
    state.partners = partners
    state.filteredPartners = partners
    state.controls.initPartners = true
  },
  INIT_CATEGORIES: (state, categories) => {
    state.categories = categories
  },
  INIT_COUNTRIES: (state, countries) => {
    state.countries = countries
  },
  FILTER_PARTNERS: (state) => {
    const filters = state.filters
    state.filteredPartners = state.partners.map(p => p)
    if (filters.categories.length) {
      let tmp = [];
      filters.categories.forEach(category => {
        state.filteredPartners.forEach(p => {
          if (p.categories.includes(category.id)) {
            tmp.push(p)
          }
        })
      })
      state.filteredPartners = unique(tmp)
      console.log(tmp)
    }
    if (filters.countries.length) {

    }
  },
  TOGGLE_CATEGORY_TO_FILTERS: (state, category) => {
    const isPresent = state.filters.categories.findIndex(c => {
      return c.id === category.id
    })
    if (isPresent > -1) {
      state.filters.categories.splice(isPresent, 1)
    } else {
      state.filters.categories.push(category)
    }
  },
  UNSELECT_ALL_CATEGORIES_TO_FILTERS: (state) => {
    state.filters.categories = []
  },
  SELECT_ALL_CATEGORIES_TO_FILTERS: (state) => {
    state.filters.categories = state.categories.map(c => c)
  },
  ADD_CATEGORY_TO_FILTERS: (state, category) => {
    const isPresent = state.filters.categories.find(c => {
      return c.id === category.id
    })
    if (!isPresent) {
      state.filters.categories.push(category)
    }
  },
  REMOVE_CATEGORY_TO_FILTERS: (state, category) => {
    const isPresent = state.filters.categories.findIndex(c => {
      return c.id === category.id
    })
    if (isPresent > -1) {
      state.filters.categories.splice(isPresent, 1)
    }
  }
}
