import axios from "axios";
export const FETCH_TRAINER_REQUEST = "FETCH_TRAINER_REQUEST";
export const FETCH_TRAINER_SUCCESS = "FETCH_TRAINER_SUCCESS";

export const FETCH_STUDENT_REQUEST = "FETCH_STUDENT_REQUEST";
export const FETCH_STUDENT_SUCCESS = "FETCH_STUDENT_SUCCESS";

export const FETCH_MOVIE_REQUEST = "FETCH_MOVIE_REQUEST";
export const FETCH_MOVIE_SUCCESS = "FETCH_MOVIE_SUCCESS";

export const FETCH_COURSE_REQUEST = "FETCH_COURSE_REQUEST";
export const FETCH_COURSE_SUCCESS = "FETCH_COURSE_SUCCESS";

export const FETCH_COURSELIST_REQUEST = "FETCH_COURSELIST_REQUEST";
export const FETCH_COURSELIST_SUCCESS = "FETCH_COURSELIST_SUCCESS";

export const FETCH_MAILLIST_REQUEST = "FETCH_MAILLIST_REQUEST";
export const FETCH_MAILLIST_SUCCESS = "FETCH_MAILLIST_SUCCESS";

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
                console.log(res);
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

export const SelectMovie = (data) => {
    return {
        type: "FETCH_SELECTMOVIE",
        data: data
    };
};

export const CourseData = (value) => {
    return dispatch => {
        dispatch(requestCourseData(value));

        return axios
            .get('/course-data', {withCredentials: true, params: {
                 id:value,
                }
            })
            .then((res) => {
                console.log('courseData');
                console.log(res.data);
                dispatch(receiveCourseData(res.data));
            })
            .catch((error)=>{});
    };
};

function requestCourseData(data) {
    return {
        type: "FETCH_COURSE_REQUEST",
        data: data
    }
}

function receiveCourseData(data) {
    return {
        type: "FETCH_COURSE_SUCCESS",
        data: data
    }
}

export const changeCourseData = (data) => {
    return {
        type: "CHANGE_COURSE_DATA",
        data: data
    };
};

export const SerchCourse = (value, page = 1) => {
    return dispatch => {
        dispatch(requestCourseListData(value));

        return axios
            .get('/api/course-list?page=' + page, {params: value})
            .then((res) => {
                console.log(res);
                dispatch(receiveCourseListData(res.data));
            })
            .catch((error)=>{});
    };
};

function requestCourseListData(data) {
    return {
        type: "FETCH_COURSELIST_REQUEST",
        data: data
    }
}

function receiveCourseListData(data) {
    return {
        type: "FETCH_COURSELIST_SUCCESS",
        data: data
    }
}

export const SerchMailList = (value, page = 1) => {
    return dispatch => {
        dispatch(requestMailListData(value));

        return axios
            .get('/api/mail-list?page=' + page, {params: value})
            .then((res) => {
                //console.log(res);
                dispatch(receiveMailListData(res.data));
            })
            .catch((error)=>{});
    };
};

function requestMailListData(data) {
    return {
        type: "FETCH_MAILLIST_REQUEST",
        data: data
    }
}

function receiveMailListData(data) {
    return {
        type: "FETCH_MAILLIST_SUCCESS",
        data: data
    }
}