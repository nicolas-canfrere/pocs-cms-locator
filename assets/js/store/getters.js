export default {
  controlPartnersInitialized: (state) => state.controls.initPartners,
  allPartners: (state) => state.partners,
  getTotalNumOfPartners: (state) => state.partners.length,
  filteredPartners: (state) => state.filteredPartners,
  allCategories: (state) => state.categories,
  allCountries: (state) => state.countries,
  partnerById: (state) => (id) => {
    return state.partners.find(partner => partner.id === id)
  },
  getResultsByPageConfig: (state) => state.pagination.resultsByPage,
  getCurrentResultsByPage: (state) => state.pagination.currentResultByPage,
  getCurrentPage: (state) => state.pagination.currentPage,
  getTotalPages: (state) => state.pagination.totalPages
}
