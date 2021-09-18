const initState = {
    keyword: '',
    category: '',
    status_on: false,
    status_off: false,
    movieData: '',
    search: '',
    activePage: '',
	itemsPerPage: '',
	totalItemCount: '',
    loading: false,
}

export default (state = initState, action)=> {
	switch (action.type) {
		case 'FETCH_MOVIE_REQUEST':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {
                keyword: action.data.keyword,
                category: action.data.category,
                status_on: action.data.status_on,
                status_off: action.data.status_off,
                search: action.data,
                loading: true,
            });
        case 'FETCH_MOVIE_SUCCESS':
        //object.assign stateのコピーをとる
        return Object.assign({}, state, {
            movieData: action.data.data,
            activePage: action.data.current_page,
			itemsPerPage: action.data.per_page,
			totalItemCount: action.data.total,
            loading: false,
        });
		default:
			return state;
	}
}