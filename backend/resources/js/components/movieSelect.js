import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import {SerchMovie} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';
import {BrowserRouter,Switch,Route,Link} from 'react-router-dom';
import MovieSerch from "./movieSerch";


const movieSelect = () => {
    const {movieData, selectedData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

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
        const list =  [...values.list];
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
        setValues({...values, ['list']: newList});
    };

    const handleAllList = (e) => {
        if(!values.all){
            setValues({...values, ['list']: studentAll, ['all']: !values.all});
        }else{
            setValues({...values, ['list']: [], ['all']: !values.all});
        }
    }

    const MovieItems = movieData ? movieData.map((val, index) => (
        <div class="mb-3 border-bottom" key={index}>
            <div class="row g-0 align-items-stretch p-2">
                <div class="col-lg-1 d-flex align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value={val.id} data-index={index}　onChange={(e)=>{handleSelectList(e)}} checked={Boolean(values.list.indexOf(String(val.id)) >= 0)}/>
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
        
        const SelectedItems = values.list ? values.list.map((val, index) => (
            <div class="mb-3 border-bottom">
                <div class="row g-0 align-items-stretch p-2">
                    <div class="col-lg-1 d-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value={val.id} />
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

                {SelectedItems}

                <p class="border-bottom border-3 p-2 mb-3">選択済み動画</p>

                <div class="mb-3 border-bottom">
                    <div class="row g-0 align-items-stretch p-2">
                        <div class="col-lg-1 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" />

                            </div>
                        </div>
                        <div class="col-lg-3 border">
                            <img src="" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h5 class="card-title">動画タイトル</h5>
                                <p class="card-text">
                                    <small class="text-muted">詳細</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 border-bottom">
                    <div class="row g-0 align-items-stretch p-2">
                        <div class="col-lg-1 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" />
                            </div>
                        </div>
                        <div class="col-lg-3 border">
                            <img src="" alt="" />
                        </div>
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h5 class="card-title">動画タイトル</h5>
                                <p class="card-text">
                                    <small class="text-muted">詳細</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-0 justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary col-lg-6">コースメニューに追加</button>
                </div>
            </form>
        )
};

const selector = state => {
    return {
        movieData: state.movieSerch.movieData,
        selectedData: state.movieSerch.selectedData,
        activePage: state.movieSerch.activePage,
        itemsPerPage: state.movieSerch.itemsPerPage,
        totalItemCount: state.movieSerch.totalItemCount,
        search: state.movieSerch.search,
    };
};

export default movieSelect;