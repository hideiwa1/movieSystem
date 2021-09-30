import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import {SerchMovie, SelectMovie} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';
import {BrowserRouter,Switch,Route,Link} from 'react-router-dom';
import MovieSerch from "./movieSerch";


const movieSelect = (props) => {
    const {movieData, movieAll, itemData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

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

    const handleSelectList = (e) => {
        const list =  [...itemData];
        const id = e.target.dataset.index;
        let newList = [];
        console.log(movieData[id]);
        let result = list.findIndex((array) => array.id == e.target.value);
        console.log('result: ' + result);
        if(result >= 0){
            newList = list.filter((val, index) => index !== result);
        }else{
            list.push(movieData[id]);
            newList = [...list];
        }
        console.log(newList);
        dispatch(SelectMovie(newList));
    };

    const handleAllList = (e) => {
        const newList =  [...movieAll];
        if(!values.all){
            dispatch(SelectMovie(newList));
            setValues({...values, ['all']: !values.all});
        }else{
            dispatch(SelectMovie([]));
            setValues({...values, ['all']: !values.all});
        }
    }

    const MovieItems = movieData ? movieData.map((val, index) => (
        <div class="mb-3 border-bottom" key={index}>
            <div class="row g-0 align-items-stretch p-2">
                <div class="col-lg-1 d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value={val.id} data-index={index}　onChange={(e)=>{handleSelectList(e)}} checked={Boolean(itemData.findIndex((array) => array.id == val.id) >= 0)}/>
                    </div>
                </div>
                <div class="col-lg-3 border">
                    <img src="" alt="" />
                </div>
                <div class="col-lg-8">
                    <a href={"movie-detail/" + val.id}>
                        <div class="card-body">
                            <h5 class="card-title">{val.name}</h5>
                            <p class="card-text">
                                <small class="text-muted">詳細</small>
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        )) : '';
        
        const SelectedItems = itemData ? itemData.map((val, index) => (
            <div class="mb-3 border-bottom" key={index}>
                <div class="row g-0 align-items-stretch p-2">
                    <div class="col-lg-1 d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value={val.id} onChange={(e)=>{handleSelectList(e)}} checked={Boolean(itemData.findIndex((array) => array.id == val.id) >= 0)} />
                        </div>
                    </div>
                    <div class="col-lg-3 border">
                        <img src="" alt="" />
                    </div>
                    <div class="col-lg-8">
                        
                        <div class="card-body">
                            <h5 class="card-title">{val.name}</h5>
                            <p class="card-text">
                                <a href={"movie-detail/" + val.id}>詳細</a>
                            </p>
                        </div>
                        
                    </div>
                </div>
            </div>
            )) : '';
            
        return (
            <form>
                <div class="nav d-flex justify-content-between mb-3">
                    <MovieSerch />
                    <a href="/movie-edit" type="button" class="btn btn-primary col-lg-3">動画アップロード</a>
                </div>

                <div class="row g-0 border-bottom border-3 mb-3 p-2">
                    <div class="col-lg-1 d-flex align-items-center">
                        <div class="form-check">
                            <input id="checkAll" class="form-check-input" type="checkbox" checked={Boolean(values.all)} name="all" onChange={(e)=>{handleAllList(e)}}/>
                            <input id="" class="" type="hidden" value={values.list} name="list" />
                        </div>
                    </div>
                    <label class="form-check-label col-lg-4" for="flexCheckDefault">
                        全て／カテゴリ
                    </label>
                </div>
                
                {MovieItems}
                
                <Pagenate activePage={activePage}
				itemsPerPage={itemsPerPage}
				totalItemCount={totalItemCount}
				pageRange={values.pageRange}
                onChange={handlePageChange} />

                <p class="border-bottom border-3 p-2 mb-3">選択済み動画</p>

                {SelectedItems}

                <div class="row g-0 justify-content-center mb-3">
                    
                        <Link to={"/course-edit/" + props.id} class="btn btn-primary col-lg-6">コースメニューに追加</Link>
                    
                </div>
            </form>
        )
};

const selector = state => {
    return {
        movieData: state.movieSerch.movieData,
        movieAll: state.movieSerch.movieAll,
        itemData: state.courseData.itemData,
        activePage: state.movieSerch.activePage,
        itemsPerPage: state.movieSerch.itemsPerPage,
        totalItemCount: state.movieSerch.totalItemCount,
        search: state.movieSerch.search,
    };
};

export default movieSelect;