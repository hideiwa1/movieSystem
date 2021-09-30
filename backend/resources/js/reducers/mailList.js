const initState = {
    mailListData: '',
    mailListDataTotal: '',
    trainerData: '',
    activePage: '',
	itemsPerPage: '',
	totalItemCount: '',
    loading: false,
}

export default (state = initState, action)=> {
	switch (action.type) {
		case 'FETCH_MAILLIST_REQUEST':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {
                loading: true,
            });
        case 'FETCH_MAILLIST_SUCCESS':
        //object.assign stateのコピーをとる
            console.log(action.data);
            return Object.assign({}, state, {
                mailListData: action.data.mailList_data,
                mailListDataTotal: action.data.mailList_total,
                trainerData: action.data.trainer_data.data,
                activePage: action.data.trainer_data.current_page,
                itemsPerPage: action.data.trainer_data.per_page,
                totalItemCount: action.data.trainer_data.total,
                loading: false,
            });
		default:
			return state;
	}
}