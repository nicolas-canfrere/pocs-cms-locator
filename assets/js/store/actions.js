import axios from 'axios'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const endPoints = window.apiEndPoints

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
  initPartners: ({ commit, dispatch }) => {
    return axios.get(endPoints.partnerList).then((response) => {
      commit('INIT_PARTNERS', response.data)
      dispatch('postMessageToTopWindowAboutContentHeight')
      return Promise.resolve()
    })
  },
  filterPartner: ({ commit, dispatch }) => {
    commit('FILTER_PARTNERS')
    dispatch('reIntiPagination')
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
  searchPartner ({ commit, dispatch }, query) {
    commit('CANCEL_FILTERS')
    commit('SEARCH_PARTNERS', query)
    dispatch('reIntiPagination')
  },
  changeResultsByPage: ({ commit, dispatch }, number) => {
    commit('CHANGE_RESULTS_BY_PAGE', number)
    dispatch('postMessageToTopWindowAboutContentHeight')
  },
  paginationPreviousPage: ({ commit, dispatch }, previous) => {
    commit('PAGINATION_PREVIOUS_PAGE', previous)
    dispatch('paginate', previous)
  },
  paginationNextPage: ({ commit, dispatch }, next) => {
    commit('PAGINATION_NEXT_PAGE', next)
    dispatch('paginate', next)
  },
  paginationGoToPage: ({ commit, dispatch }, page) => {
    commit('PAGINATION_GO_TO', page)
    dispatch('paginate', page)
  },
  reIntiPagination: ({commit, dispatch}) => {
    commit('REINIT_PAGINATION')
    dispatch('postMessageToTopWindowAboutContentHeight')
  },
  paginate: ({ commit, dispatch }, page) => {
    commit('PAGINATE', page)
    dispatch('postMessageToTopWindowAboutContentHeight')
  },
  postMessageToTopWindowAboutContentHeight: () => {
    const timer = setTimeout(() => {
      let height = document.body.clientHeight;
      let params = {
        "height" : height,
        "iframeId" : "OTC"
      };
      window.top.postMessage(params, "*")
      clearTimeout(timer)
    })
  }
}
