const initState = {
    keyword: '',
    status_on: false,
    status_off: false,
    courseData: '',
    search: '',
    activePage: '',
	itemsPerPage: '',
	totalItemCount: '',
    loading: false,
}

export default (state = initState, action)=> {
	switch (action.type) {
		case 'FETCH_COURSELIST_REQUEST':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {
                keyword: action.data.keyword,
                status_on: action.data.status_on,
                status_off: action.data.status_off,
                search: action.data,
                loading: true,
            });
        case 'FETCH_COURSELIST_SUCCESS':
        //object.assign stateのコピーをとる
            //console.log(action.data.movie_data);
            return Object.assign({}, state, {
                courseData: action.data.data,
                activePage: action.data.current_page,
                itemsPerPage: action.data.per_page,
                totalItemCount: action.data.total,
                loading: false,
            });
		default:
			return state;
	}
}