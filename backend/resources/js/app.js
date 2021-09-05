require('./bootstrap');

require('alpinejs');


import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import rootReducer from './reducers';
import thunkMiddleware from 'redux-thunk';

import TrainerSerch from './components/trainerSerch'
import TrainerList from './components/trainerList'

import Example from './components/Example'

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;


const store = createStore(rootReducer, composeEnhancers(applyMiddleware(thunkMiddleware)));

if (document.getElementById('TrainerSerch')) {
    ReactDOM.render(
        <Provider store = {store} >
            <TrainerSerch />
        </Provider>,
    document.getElementById('TrainerSerch')
    );
}

if (document.getElementById('Example')) {
    ReactDOM.render(
        <Provider store = {store} >
            <Example />
        </Provider>,
    document.getElementById('Example')
    );
}

if (document.getElementById('TrainerList')) {
    ReactDOM.render(
        <Provider store = {store} >
            <TrainerList />
        </Provider>,
    document.getElementById('TrainerList')
    );
}