export default {
  controlPartnersInitialized: (state) => state.controls.initPartners,
  allPartners: (state) => state.partners,
  filteredPartners: (state) => state.filteredPartners,
  allCategories: (state) => state.categories,
  allCountries: (state) => state.countries,
  partnerById: (state) => (id) => {
    return state.partners.find(partner => partner.id === id)
  }
}
