import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import MovieItem from "./movieItem";
import {SerchMovie} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';

const MovieList = () => {
    const {movieData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        pageRange: 5,
        list: [],
        all: false,
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchMovie(''));
        
    }, []);

    const handlePageChange = (num) => {
        dispatch(SerchMovie(search, num));
    };

    const MovieItems = movieData ? movieData.map((val, index) => (
        <MovieItem value={val} key={index} list={values.list} />
        )) : '';
    

    return (
        <div>
            
            {MovieItems}
            <Pagenate activePage={activePage}
				itemsPerPage={itemsPerPage}
				totalItemCount={totalItemCount}
				pageRange={values.pageRange}
                onChange={handlePageChange} />
            <div className="row g-0 justify-content-center mb-3">
                <button type="submit" class="btn btn-primary col-lg-6 mt-3" onSubmit={(e) => handleSubmit(e)}>メールを送信する</button>
            </div>
        </div>
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

export default MovieList;