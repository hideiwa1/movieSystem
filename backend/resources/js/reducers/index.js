import {combineReducers} from "redux";
import trainerSerch from "./trainerSerch";
import studentSerch from "./studentSerch";
import movieSerch from "./movieSerch";

const reducer = combineReducers({
    trainerSerch,
    studentSerch,
    movieSerch,
});

export default reducer;