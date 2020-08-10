import axios from 'axios'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const endPoints = {
  partnerList: '/partners',
  categoryList: '/categories',
  countryList: '/countries'
}

export default {
  initCategories: ({ commit }) => {
    return axios.get(endPoints.categoryList).then((response) => {
      commit('INIT_CATEGORIES', response.data)
      return Promise.resolve()
    })
  },
  initCountries: ({ commit }) => {
    return axios.get(endPoints.countryList).then((response) => {
      commit('INIT_COUNTRIES', response.data)
      return Promise.resolve()
    })
  },
  initPartners: ({ commit }) => {
    return axios.get(endPoints.partnerList).then((response) => {
      commit('INIT_PARTNERS', response.data)
      return Promise.resolve()
    })
  },
  filterPartner: ({ commit }) => {
    commit('FILTER_PARTNERS')
  },
  selectAllCategoriesToFilters: ({ commit, dispatch }) => {
    commit('SELECT_ALL_CATEGORIES_TO_FILTERS')
    dispatch('filterPartner')
  },
  unselectAllCategoriesToFilters: ({ commit, dispatch }) => {
    commit('UNSELECT_ALL_CATEGORIES_TO_FILTERS')
    dispatch('filterPartner')
  },
  toggleCategoryToFilters: ({ commit, dispatch }, category) => {
    commit('TOGGLE_CATEGORY_TO_FILTERS', category)
    dispatch('filterPartner')
  },
  addCategoryToFilters: ({ commit, dispatch }, category) => {
    commit('ADD_CATEGORY_TO_FILTERS', category)
    dispatch('filterPartner')
  },
  removeCategoryToFilters: ({ commit, dispatch }, category) => {
    commit('REMOVE_CATEGORY_TO_FILTERS', category)
    dispatch('filterPartner')
  },
  addCountryToFilters: ({ commit, dispatch }, country) => {
    commit('ADD_COUNTRY_TO_FILTERS', country)
    dispatch('filterPartner')
  },
  removeCountryToFilters: ({ commit, dispatch }, country) => {
    commit('REMOVE_COUNTRY_TO_FILTERS', country)
    dispatch('filterPartner')
  },
  reorderPartnersBy ({ commit, dispatch }, newOrder) {
    commit('REORDER_PARTNER_BY', newOrder)
  },
  searchPartner ({ commit }, query) {
    commit('CANCEL_FILTERS')
    commit('SEARCH_PARTNERS', query)
  }
}
