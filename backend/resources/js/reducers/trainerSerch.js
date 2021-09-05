const initState = {
    keyword: '',
    club: '',
    status_on: false,
    status_off: false,
    trainerData: '',
    loading: false,
}

export default (state = initState, action)=> {
	switch (action.type) {
		case 'FETCH_TRAINER_REQUEST':
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {
                keyword: action.data.keyword,
                club: action.data.club,
                status_on: action.data.status_on,
                status_off: action.data.status_off,
                loading: true,
            });
        case 'FETCH_TRAINER_SUCCESS':
        //object.assign stateのコピーをとる
        return Object.assign({}, state, {
            trainerData: action.data,
            loading: false,
        });
		default:
			return state;
	}
}