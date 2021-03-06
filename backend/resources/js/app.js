require('./bootstrap');

require('alpinejs');


import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import rootReducer from './reducers';
import thunkMiddleware from 'redux-thunk';

import TrainerSerch from './components/trainerSerch';
import TrainerList from './components/trainerList';
import TrainerCSV from './components/trainerCSV';

import StudentSerch from './components/studentSerch';
import StudentList from './components/studentList';
import StudentCSV from './components/studentCSV';

import MovieSerch from './components/movieSerch';
import MovieList from './components/movieList';

import CourseEdit from './components/courseEdit';
import CourseSerch from './components/courseSerch';
import CourseList from './components/courseList';

import MailList from './components/mailList';
import MailListCSV from './components/mailListCSV';
import MailListDetailCSV from './components/mailListDetailCSV';

import Example from './components/Example';

const composeEnhancers = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;


const store = createStore(rootReducer, composeEnhancers(applyMiddleware(thunkMiddleware)));

if (document.getElementById('Example')) {
    ReactDOM.render(
        <Provider store = {store} >
            <Example />
        </Provider>,
    document.getElementById('Example')
    );
}

if (document.getElementById('TrainerSerch')) {
    ReactDOM.render(
        <Provider store = {store} >
            <TrainerSerch />
        </Provider>,
    document.getElementById('TrainerSerch')
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

if (document.getElementById('TrainerCSV')) {
    ReactDOM.render(
        <Provider store = {store} >
            <TrainerCSV />
        </Provider>,
    document.getElementById('TrainerCSV')
    );
}

if (document.getElementById('StudentSerch')) {
    ReactDOM.render(
        <Provider store = {store} >
            <StudentSerch />
        </Provider>,
    document.getElementById('StudentSerch')
    );
}

if (document.getElementById('StudentList')) {
    ReactDOM.render(
        <Provider store = {store} >
            <StudentList />
        </Provider>,
    document.getElementById('StudentList')
    );
}

if (document.getElementById('StudentCSV')) {
    ReactDOM.render(
        <Provider store = {store} >
            <StudentCSV />
        </Provider>,
    document.getElementById('StudentCSV')
    );
}

if (document.getElementById('MovieSerch')) {
    ReactDOM.render(
        <Provider store = {store} >
            <MovieSerch />
        </Provider>,
    document.getElementById('MovieSerch')
    );
}

if (document.getElementById('MovieList')) {
    ReactDOM.render(
        <Provider store = {store} >
            <MovieList />
        </Provider>,
    document.getElementById('MovieList')
    );
}

if (document.getElementById('CourseEdit')) {
    ReactDOM.render(
        <Provider store = {store} >
            <CourseEdit />
        </Provider>,
    document.getElementById('CourseEdit')
    );
}

if (document.getElementById('CourseSerch')) {
    ReactDOM.render(
        <Provider store = {store} >
            <CourseSerch />
        </Provider>,
    document.getElementById('CourseSerch')
    );
}

if (document.getElementById('CourseList')) {
    ReactDOM.render(
        <Provider store = {store} >
            <CourseList />
        </Provider>,
    document.getElementById('CourseList')
    );
}

if (document.getElementById('MailList')) {
    ReactDOM.render(
        <Provider store = {store} >
            <MailList />
        </Provider>,
    document.getElementById('MailList')
    );
}

if (document.getElementById('MailListCSV')) {
    ReactDOM.render(
        <Provider store = {store} >
            <MailListCSV />
        </Provider>,
    document.getElementById('MailListCSV')
    );
}

if (document.getElementById('MailListDetailCSV')) {
    ReactDOM.render(
        <Provider store = {store} >
            <MailListDetailCSV />
        </Provider>,
    document.getElementById('MailListDetailCSV')
    );
}