import axios from "axios";
export const FETCH_TRAINER_REQUEST = "FETCH_TRAINER_REQUEST";
export const FETCH_TRAINER_SUCCESS = "FETCH_TRAINER_SUCCESS";

export const FETCH_STUDENT_REQUEST = "FETCH_STUDENT_REQUEST";
export const FETCH_STUDENT_SUCCESS = "FETCH_STUDENT_SUCCESS";

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

export const SerchStudent = (value, page = 1) => {
    return dispatch => {
        dispatch(requestStudentData(value));

        return axios
            .get('/api/student-list?page=' + page, {params: value})
            .then((res) => {
                
                dispatch(receiveStudentData(res.data));
            })
            .catch((error)=>{});
    };
};

function requestStudentData(data) {
    return {
        type: "FETCH_STUDENT_REQUEST",
        data: data
    }
}

function receiveStudentData(data) {
    return {
        type: "FETCH_STUDENT_SUCCESS",
        data: data
    }
}