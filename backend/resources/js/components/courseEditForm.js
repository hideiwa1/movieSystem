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
import {BrowserRouter,Switch,Route,Link} from 'react-router-dom';


const CourseEditForm = () => {
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
            <form method="POST" action="" class="form">
           
            <input type="hidden" name="id" value="" />
   
            <div class="row g-0 mb-3 p-sm-3">
                <label for="name" class="col-lg-4 col-form-label">コースメニュー名</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" />
                </div>
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">作成者</label>
                <div class="col-lg-8">

                </div>
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <label for="comment" class="col-lg-4 col-form-label">説明</label>
                <div class="col-lg-8">
                    <textarea name="comment" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <label for="open_flg" class="col-lg-4 col-form-label">公開／非公開</label>
                <div class="col-lg-8">
                    <select class="form-select" name="open_flg" aria-label="Default select example">
                        <option value="1">公開</option>
                        <option value="2">非公開</option>
                    </select>
                </div>
            </div>

            <div class="row g-0 mb-3 p-sm-3 justify-content-between">
                <div class="col-lg-5 mb-3">
                    <label for="start_at" class="form-label">公開開始日</label>
                    <input type="date" name="start_at" class="form-control w-100" />
                </div>

                <div class="col-lg-5 mb-3">
                    <label for="end_at" class="form-label">公開終了日</label>
                    <input type="date" name="end_at" class="form-control w-100" />
                </div>
            </div>
            <div class="row g-0 mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">コースメニュー</label>
                <a href="movieSelect.html"  class="col-lg-4 btn btn-secondary d-block m-2">動画を選択</a>
            </div>

            <div class="mb-3 border-bottom drag-list" id="list-1"  draggable="true">
                <div class="row g-0 align-items-stretch p-2">
                    <div class="col-lg-2 d-flex align-items-center justify-content-between">
                        <span>1</span>
                        <img src="" alt="" class="border flex-grow-1 m-2 h-100" />
                    </div>
                    <div class="col-lg-2">
                        <div class="card-body">
                            <h5 class="card-title">動画タイトル</h5>
                            <p class="card-text">
                                <small class="text-muted">詳細</small>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="row g-0 flex-grow-1 text-center justify-content-between">
                            <a href="movieEdit.html" class="col-lg-3 btn btn-secondary m-2">編集</a>

                            <div class="col-lg-3 btn btn-secondary m-2">公開／非公開</div>

                            <div class="col-lg-4 btn btn-secondary fs-6 m-2">リストから削除</div>
                        </div>
                    </div>
                    <div class="col-lg-1  d-flex align-items-center justify-content-around d-none d-lg-flex">
                        <div class="btn-trigger" id="btn01">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 border-bottom drag-list" id="list-1"  draggable="true">
                <div class="row g-0 align-items-stretch p-2">
                    <div class="col-lg-2 d-flex align-items-center justify-content-between">
                        <span>1</span>
                        <img src="" alt="" class="border flex-grow-1 m-2 h-100" />
                    </div>
                    <div class="col-lg-2">
                        <div class="card-body">
                            <h5 class="card-title">動画タイトル</h5>
                            <p class="card-text">
                                <small class="text-muted">詳細</small>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="row g-0 flex-grow-1 text-center justify-content-between">
                            <a href="movieEdit.html" class="col-lg-3 btn btn-secondary m-2">編集</a>

                            <div class="col-lg-3 btn btn-secondary m-2">公開／非公開</div>

                            <div class="col-lg-4 btn btn-secondary fs-6 m-2">リストから削除</div>
                        </div>
                    </div>
                    <div class="col-lg-1  d-flex align-items-center justify-content-around d-none d-lg-flex">
                        <div class="btn-trigger" id="btn01">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3 border-bottom drag-list" id="list-1"  draggable="true">
                <div class="row g-0 align-items-stretch p-2">
                    <div class="col-lg-2 d-flex align-items-center justify-content-between">
                        <span>1</span>
                        <img src="" alt="" class="border flex-grow-1 m-2 h-100" />
                    </div>
                    <div class="col-lg-2">
                        <div class="card-body">
                            <h5 class="card-title">動画タイトル</h5>
                            <p class="card-text">
                                <small class="text-muted">詳細</small>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7 d-flex align-items-center">
                        <div class="row g-0 flex-grow-1 text-center justify-content-between">
                            <a href="movieEdit.html" class="col-lg-3 btn btn-secondary m-2">編集</a>

                            <div class="col-lg-3 btn btn-secondary m-2">公開／非公開</div>

                            <div class="col-lg-4 btn btn-secondary fs-6 m-2">リストから削除</div>
                        </div>
                    </div>
                    <div class="col-lg-1  d-flex align-items-center justify-content-around d-none d-lg-flex">
                        <div class="btn-trigger" id="btn01">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-0 justify-content-center justify-content-around">
                <button type="submit" class="btn btn-secondary col-lg-4 m-3">キャンセル</button>
                <button type="submit" class="btn btn-primary col-lg-4 m-3">作成する</button>
            </div>
        </form>
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

export default CourseEditForm;