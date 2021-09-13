import {combineReducers} from "redux";
import trainerSerch from "./trainerSerch";
import studentSerch from "./studentSerch";

const reducer = combineReducers({
    trainerSerch,
    studentSerch,
});

export default reducer;