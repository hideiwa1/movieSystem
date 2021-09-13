const initState = {
    keyword: '',
    class_id: '',
    status_on: false,
    status_off: false,
    search: '',
    studentData: '',
    studentAll: '',
    activePage: '',
	itemsPerPage: '',
	totalItemCount: '',
    loading: false,
}

export default (state = initState, action)=> {
	switch (action.type) {
		case 'FETCH_STUDENT_REQUEST':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {
                keyword: action.data.keyword,
                class_id: action.data.class_id,
                status_on: action.data.status_on,
                status_off: action.data.status_off,
                search: action.data,
                loading: true,
            });
        case 'FETCH_STUDENT_SUCCESS':
        //object.assign stateのコピーをとる

        return Object.assign({}, state, {
            studentData: action.data.student_data.data,
            studentAll: action.data.student_all,
            activePage: action.data.student_data.current_page,
			itemsPerPage: action.data.student_data.per_page,
			totalItemCount: action.data.student_data.total,
            loading: false,
        });
		default:
			return state;
	}
}