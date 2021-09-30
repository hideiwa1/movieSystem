import {combineReducers} from "redux";
import trainerSerch from "./trainerSerch";
import studentSerch from "./studentSerch";
import movieSerch from "./movieSerch";
import movieSelect from "./movieSelect";
import courseData from "./courseData";
import courseSerch from "./courseSerch";
import mailList from "./mailList";

const reducer = combineReducers({
    trainerSerch,
    studentSerch,
    movieSerch,
    courseData,
    courseSerch,
    mailList,
});

export default reducer;