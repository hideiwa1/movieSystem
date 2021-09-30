const initState = {
    selectedData: [],
}

export default (state = initState, action)=> {
    console.log(action.data);
	switch (action.type) {
		case 'FETCH_SELECTMOVIE':
            
			//object.assign stateのコピーをとる
			return Object.assign({}, state, {
                selectedData: action.data,
            });
		default:
			return state;
	}
}