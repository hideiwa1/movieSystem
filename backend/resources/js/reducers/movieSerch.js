const initState = {
    keyword: '',
    category_id: '',
    status_on: false,
    status_off: false,
    movieData: '',
    movieAll: '',
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
                category_id: action.data.category_id,
                status_on: action.data.status_on,
                status_off: action.data.status_off,
                search: action.data,
                loading: true,
            });
        case 'FETCH_MOVIE_SUCCESS':
        //object.assign stateのコピーをとる
            //console.log(action.data.movie_data);
            return Object.assign({}, state, {
                movieData: action.data.movie_data.data,
                movieAll: action.data.movie_all,
                activePage: action.data.movie_data.current_page,
                itemsPerPage: action.data.movie_data.per_page,
                totalItemCount: action.data.movie_data.total,
                loading: false,
            });
		default:
			return state;
	}
}