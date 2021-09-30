import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

const CourseItem = (props) => {

    const status = props.value.open_flg == '1' ? '公開中' : '非公開';

    useEffect(() => {
        let copyToClipboard = document.querySelectorAll('.copyToClipboard');

        console.log(copyToClipboard);

        copyToClipboard.forEach(function (target) {
            target.addEventListener('click', function (event) {
                // コピー対象をJavaScript上で変数として定義する
                let copyTarget = event.target;

                // コピー対象のテキストを選択する
                copyTarget.select();

                // 選択しているテキストをクリップボードにコピーする
                document.execCommand("Copy");

                // コピーをお知らせする
                alert("コピーできました！ : " + copyTarget.value);
            });
        });
    }, [props]);

    return (
            <div className="row g-0 align-items-stretch p-2">
                <div className="col-lg-2 d-flex align-items-center">
                    <video src="" alt="" />
                </div>
                <div class="col-lg-3 d-flex align-items-center">
                    <a href={"course-detail/" + props.value.id}>
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
                        <a href={"/course-edit/" + props.value.id} class="col-lg-3 btn btn-secondary m-2">編集</a>
                        <div class="dropdown col-sm-3 m-2">
                            <button class="btn btn-secondary dropdown-toggle w-100" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                共有リンク
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><input type="text" class="dropdown-item copyToClipboard" readOnly
                                        value={window.location.href + "course-detail/" + props.value.id} /></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 btn btn-secondary m-2">{status}</div>
                    </div>
                </div>
            </div>
    )
};

export default CourseItem;