import { unique } from 'underscore'

const totalPages = (items, itemsByPage) => {
  return Math.ceil(items / itemsByPage)
}

const filtersDefined = (state) => {
  return state.filters.categories.length > 0 || state.filters.countries.length > 0
}

const filterPartners = (state) => {
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
          partner.hasOwnProperty('partner_tags') &&
          partner.partner_tags.length > 0
        ) {
          partner.partner_tags.forEach(tag => {
            if (tag.id === category.id) {
              tmp.push(partner)
            }
          })
        }
      })
    })
  }
  if (filters.countries.length) {
    let list
    if (tmp.length > 0) {
      list = tmp
      tmp = []
    } else {
      list = state.filteredPartners.map(a => a)
    }
    filters.countries.forEach(country => {
      list.forEach(partner => {
        if (
          partner.hasOwnProperty('country_id') &&
          null !== partner.country_id &&
          parseInt(partner.country_id) === country.id
        ) {
          tmp.push(partner)
        }
      })
    })
  }
  state.filteredPartners = unique(tmp)
}

const reInitPagination = (state) => {
  state.pagination.totalPages = totalPages(state.filteredPartners.length, state.pagination.currentResultByPage)
  state.pagination.currentPage = 1
  state.filteredPartners = state.filteredPartners.slice(0, state.pagination.currentResultByPage)
}

const orderByAlphaAsc = (array) => {
  array.sort((a, b) => {
    const titleA = a.title.toLowerCase()
    const titleB = b.title.toLowerCase()
    if (titleA < titleB) {
      return -1
    }
    if (titleA > titleB) {
      return 1
    }
    return 0
  })
}

const orderByAlphaDesc = (array) => {
  array.sort((a, b) => {
    const titleA = a.title.toLowerCase()
    const titleB = b.title.toLowerCase()
    if (titleA < titleB) {
      return 1
    }
    if (titleA > titleB) {
      return -1
    }
    return 0
  })
}

const orderByCreatedAtDesc = (array) => {
  array.sort((a, b) => {
    const dateA = new Date(a.created)
    const dateB = new Date(b.created)
    if (dateA < dateB) {
      return 1
    }
    if (dateA > dateB) {
      return -1
    }
    return 0
  })
}

const reInitFilteredPartners = (state) => {
  if (filtersDefined(state)) {
    filterPartners(state)
  } else {
    state.filteredPartners = state.partners.map(a => a)
  }
}

export default {
  INIT_PARTNERS: (state, partners) => {
    state.partners = partners
    state.pagination.totalPages = totalPages(partners.length, state.pagination.currentResultByPage)
    orderByAlphaAsc(partners)
    state.filteredPartners = partners.map(a => a).slice(0, state.pagination.currentResultByPage)
    state.controls.initPartners = true
  },
  INIT_CATEGORIES: (state, categories) => {
    state.categories = categories.map(cat => {
      cat.selected = false
      return cat
    })
  },
  INIT_COUNTRIES: (state, countries) => {
    state.countries = countries
  },
  FILTER_PARTNERS: (state) => {
    filterPartners(state)
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
  REORDER_PARTNER_BY: (state, newOrder) => {
    switch (newOrder) {
      case 'alphaAsc':
        orderByAlphaAsc(state.partners)
        break
      case 'alphaDesc':
        orderByAlphaDesc(state.partners)
        break
      case 'lastAdded':
        orderByCreatedAtDesc(state.partners)
        break
      default:
        break
    }
    reInitFilteredPartners(state)
    reInitPagination(state)
  },
  CANCEL_FILTERS: (state) => {
    state.filters.categories = []
    state.filters.countries = []
    state.categories.forEach(cat => {
      cat.selected = false
    })
    reInitFilteredPartners(state)
    reInitPagination(state)
  },
  SEARCH_PARTNERS: (state, query) => {
    let searchResult
    searchResult = state.filteredPartners.filter(partner => {
      return partner.title.toLowerCase().includes(query.toLowerCase())
    })
    state.filteredPartners = searchResult.map(a => a)
  },
  CHANGE_RESULTS_BY_PAGE: (state, number) => {
    state.pagination.currentResultByPage = number
    reInitFilteredPartners(state)
    reInitPagination(state)
  },
  PAGINATION_PREVIOUS_PAGE: (state, previous) => {
    state.pagination.currentPage = previous
  },
  PAGINATION_NEXT_PAGE: (state, next) => {
    state.pagination.currentPage = next
  },
  PAGINATION_GO_TO: (state, page) => {
    state.pagination.currentPage = page
  },
  PAGINATE: (state, page) => {
    let start = (page - 1) * state.pagination.currentResultByPage
    reInitFilteredPartners(state)
    state.filteredPartners =
      state.filteredPartners
        .map(a => a)
        .slice(
          start,
          start + state.pagination.currentResultByPage
        )
  },
  REINIT_PAGINATION: (state) => {
    reInitPagination(state)
  }
}
