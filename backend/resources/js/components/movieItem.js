import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

const MovieItem = (props) => {

    let csrf_token = document.head.querySelector('meta[name="csrf-token"]').content;

    const [values, setValues] = useState({
        csrf_token: csrf_token,
      });
    
    const status = props.value.open_flg == '1' ? '公開中' : '非公開';


    return (
            <div className="row g-0 align-items-stretch p-2">
                <div className="col-lg-2 d-flex align-items-center">
                    <img src="" alt="" />
                </div>
                <div class="col-lg-3 d-flex align-items-center">
                    <a href={"movie-detail/" + props.value.id}>
                        <div class="card-body">
                            <h5 class="card-title">{props.value.name}</h5>
                            <p class="card-text">
                                <small class="text-muted">詳細</small>
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="row g-0 flex-grow-1 text-center justify-content-around">
                        <a href={"movie-edit/" + props.value.id} class="col-lg-3 btn btn-secondary m-2">編集</a>
                        <div class="col-lg-3 btn btn-secondary m-2">{status}</div>
                        <button class="btn btn-secondary col-lg-3 m-2" type="button" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            削除
                        </button>
                        <div class="modal fade" id="deleteModal" tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="deleteform" action={"movie-delete/" + props.value.id} method="POST">
                                        <input type="hidden" name="_token" value={ values.csrf_token } />
                                            <p>このコンテンツを削除します。<br />
                                            よろしいですか？</p>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                            data-bs-target="#deleteModal">閉じる</button>
                                        <button type="submit" form="deleteform"
                                            class="btn btn-primary col-lg-4">削除する</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    )
};

export default MovieItem;