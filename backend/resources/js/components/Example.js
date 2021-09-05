import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';

import {SerchTrainer} from '../actions';

const Example = () => {
    
    return (
        <div className="dropdown col-lg-3 m-2 flex-grow-1">
            Example
        </div>
        
    )
};

export default Example;