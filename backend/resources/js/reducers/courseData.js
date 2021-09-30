const initState = {
    userData: [],
    courseEditData: '',
    itemData: [],
}

export default (state = initState, action)=> {
	switch (action.type) {
		case 'FETCH_COURSE_REQUEST':
			//object.assign stateのコピーをとる
			return true;
            
        case 'FETCH_COURSE_SUCCESS':
        //object.assign stateのコピーをとる
            console.log(action.data);
            return Object.assign({}, state, {
                userData: action.data.user_id,
                courseEditData: action.data.course_data,
                itemData: action.data.item_data,
            });
        
        case 'CHANGE_COURSE_DATA':
            //object.assign stateのコピーをとる
                console.log(action.data);
                return Object.assign({}, state, {
                    courseEditData: action.data,
                });
        case 'FETCH_SELECTMOVIE':
    
            //object.assign stateのコピーをとる
            return Object.assign({}, state, {
                itemData: action.data,
            });
		default:
			return state;
	}
}