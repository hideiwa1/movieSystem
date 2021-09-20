import axios from "axios";
export const FETCH_TRAINER_REQUEST = "FETCH_TRAINER_REQUEST";
export const FETCH_TRAINER_SUCCESS = "FETCH_TRAINER_SUCCESS";

export const FETCH_STUDENT_REQUEST = "FETCH_STUDENT_REQUEST";
export const FETCH_STUDENT_SUCCESS = "FETCH_STUDENT_SUCCESS";

export const FETCH_MOVIE_REQUEST = "FETCH_MOVIE_REQUEST";
export const FETCH_MOVIE_SUCCESS = "FETCH_MOVIE_SUCCESS";

export const SerchTrainer = (value, page = 1) => {
    return dispatch => {
        dispatch(requestTrainerData(value));

        return axios
            .get('/api/trainer-list?page=' + page, {params: value})
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

export const SerchMovie = (value, page = 1) => {
    return dispatch => {
        dispatch(requestMovieData(value));

        return axios
            .get('/api/movie-list?page=' + page, {params: value})
            .then((res) => {
                dispatch(receiveMovieData(res.data));
            })
            .catch((error)=>{});
    };
};

function requestMovieData(data) {
    return {
        type: "FETCH_MOVIE_REQUEST",
        data: data
    }
}

function receiveMovieData(data) {
    return {
        type: "FETCH_MOVIE_SUCCESS",
        data: data
    }
}

export const SelectMovie = (value, page = 1) => {
    return dispatch => {
        dispatch(requestSelectMovie(value));

        return axios
            .get('/api/movie-list?page=' + page, {params: value})
            .then((res) => {
                dispatch(receiveSelectMovie(res.data));
            })
            .catch((error)=>{});
    };
};

function requestSelectMovie(data) {
    return {
        type: "FETCH_SELECTMOVIE_REQUEST",
        data: data
    }
}

function receiveSelectMovie(data) {
    return {
        type: "FETCH_SELECTMOVIE_SUCCESS",
        data: data
    }
}