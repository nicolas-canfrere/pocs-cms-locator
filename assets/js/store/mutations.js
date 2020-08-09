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
    if (0 === filters.categories.length && 0 === filters.countries.length) {
      return
    }
    let tmp = []
    if (filters.categories.length) {
      filters.categories.forEach(category => {
        state.filteredPartners.forEach(partner => {
          if (
            partner.hasOwnProperty('partnerTags') &&
            partner.partnerTags.length > 0
          ) {
            partner.partnerTags.forEach(tag => {
              if (tag.id === category.id) {
                tmp.push(partner)
              }
            })
          }
        })
      })
    }
    if (filters.countries.length) {
      filters.countries.forEach(country => {
        state.filteredPartners.forEach(partner => {
          if (
            partner.hasOwnProperty('country_partner') &&
            null !== partner.country_partner &&
            partner.country_partner.hasOwnProperty('id') &&
            partner.country_partner.id === country.id
          ) {
            tmp.push(partner)
          }
        })
      })
    }
    state.filteredPartners = unique(tmp)
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
  },
  ADD_COUNTRY_TO_FILTERS: (state, country) => {
    const isPresent = state.filters.countries.find(c => {
      return c.id === country.id
    })
    if (!isPresent) {
      state.filters.countries.push(country)
    }
  },
  REMOVE_COUNTRY_TO_FILTERS: (state, country) => {
    const isPresent = state.filters.countries.findIndex(c => {
      return c.id === country.id
    })
    if (isPresent > -1) {
      state.filters.countries.splice(isPresent, 1)
    }
  },
}