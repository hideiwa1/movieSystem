import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import MovieItem from "./movieItem";
import {SerchMovie, CourseData, SelectMovie} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';
import {BrowserRouter,Switch,Route,Link} from 'react-router-dom';
import CourseEditForm from './courseEditForm';
import MovieSelect from './movieSelect';


const CourseEdit = () => {
    const {movieData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        course_id: window.location.pathname.replace('/course-edit/', ''),
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchMovie(''));
            dispatch(CourseData(window.location.pathname.replace('/course-edit/', '')));
            
    }, []);


    const handlePageChange = (num) => {
        dispatch(SerchMovie(search, num));
    };

    const MovieItems = movieData ? movieData.map((val, index) => (
        <MovieItem value={val} key={index} list={values.list} />
        )) : '';

    return (
        <BrowserRouter>
        <div>
            
            <Switch>
                <Route path='/movie-select'>
                    <MovieSelect id={values.course_id}/>

                </Route>
                <Route path='/course-edit'>
                    <CourseEditForm  id={values.course_id}/>

                </Route>
            </Switch>
            </div>
        </BrowserRouter>
    )
};

const selector = state => {
    return {
        movieData: state.movieSerch.movieData,
        activePage: state.movieSerch.activePage,
        itemsPerPage: state.movieSerch.itemsPerPage,
        totalItemCount: state.movieSerch.totalItemCount,
        search: state.movieSerch.search,
    };
};

export default CourseEdit;