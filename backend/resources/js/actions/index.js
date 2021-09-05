import axios from "axios";
export const FETCH_TRAINER_REQUEST = "FETCH_TRAINER_REQUEST";
export const FETCH_TRAINER_SUCCESS = "FETCH_TRAINER_SUCCESS";

export const SerchTrainer = (value) => {
    return dispatch => {
        dispatch(requestTrainerData(value));

        return axios
            .get('/api/trainer-list', {params: value})
            .then((res) => {
                dispatch(receiveTrainerData(res.data));
            })
            .catch((error)=>{});
    };
};

export const handleChange = (value) => {
    return {
        type: "COUNT_DOWN",
        value
    };
}

function requestTrainerData(data) {
    return {
        type: "FETCH_TRAINER_REQUEST",
        data: data
    }
}

function receiveTrainerData(data) {
    return {
        type: "FETCH_TRAINER_SUCCESS",
        data: data
    }
}
