import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import MovieItem from "./movieItem";
import {SerchMovie, SelectMovie, courseData, changeCourseData} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';
import {BrowserRouter,Switch,Route,Link} from 'react-router-dom';


const CourseEditForm = (props) => {
    const {movieData, userData, courseEditData, itemData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        name: '',
        comment: '',
      });

    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(SelectMovie(itemData));
    }, []);

    const handleChange = (e) => {
        const val = e.target.value;
		const name = e.target.name;
		dispatch(changeCourseData({...courseEditData, [name]: val}));
    };

    const handleDeleteItem = (e) => {
        e.preventDefault();
        const val = Number(e.target.dataset.index);
        console.log(val);
		const newList = itemData.filter((value, index) => index !== val);
        console.log(newList);
		dispatch(SelectMovie(newList));
    };

    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');



    useEffect(() => {
    document.querySelectorAll('.drag-list').forEach(elm => {
        elm.ondragstart = function (event) {
            event.dataTransfer.setData('text/plain', event.target.id);
        };
        elm.ondragover = function (event) {
            event.preventDefault();
            this.style.borderTop = '2px solid blue';
        };
        elm.ondragleave = function (event) {
            this.style.borderTop = '';
        };
        elm.ondrop = function (event) {
            event.preventDefault();
            let id = event.dataTransfer.getData('text/plain');
            //let elm_drag = document.getElementById(id);
            //this.parentNode.insertBefore(elm_drag, this);
            this.style.borderTop = '';

            let newList = itemData.filter((val) => val);
            const oldIndex = Number(id.replace('list-', ''));
            const toIndex = Number(this.id.replace('list-', ''));
            const moveData = newList[(oldIndex)];

            if(oldIndex > toIndex){
                newList.splice(oldIndex, 1);
                newList.splice(toIndex, 0, moveData);
            }else{
                newList.splice(toIndex, 0, moveData);
                newList.splice(oldIndex, 1);
            }
            
            dispatch(SelectMovie(newList));
        };
    });
}, [itemData]);

    const SelectedItems = itemData ? itemData.map((val, index) => (
        <div class="mb-3 border-bottom drag-list" id={"list-" + index} key={index}  draggable="true" >
            <div class="row g-0 align-items-stretch p-2">
                <div class="col-lg-2 d-flex align-items-center justify-content-between">
                    <span>{index}</span>
                    <input type="hidden" name="movie_id[]" value={val.id} />
                    <video src={val.filepath} preload="metadata" alt="" class="border flex-grow-1 w-100" />
                </div>
                <div class="col-lg-2">
                    <div class="card-body">
                        <h5 class="card-title">{val.name}</h5>
                        <p class="card-text">
                            <a href={"/movie-detail/" + val.id} target="_blank">詳細</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center">
                    <div class="row g-0 flex-grow-1 text-center justify-content-between">
                        <a href={"/movie-edit/" + val.id} target="_blank" class="col-lg-3 btn btn-secondary m-2">編集</a>

                        <div class="col-lg-3 btn btn-secondary m-2">公開／非公開</div>

                        <div class="col-lg-4 btn btn-secondary fs-6 m-2" data-bs-toggle="modal"
                        data-bs-target={"#deleteModal" + index}>リストから削除</div>
                        <div class="modal fade" id={"deleteModal" + index} tabindex="-1"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="deleteform">
                                            <p>この動画をリストから削除します。<br />
                                            よろしいですか？</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal"
                                            data-bs-target={"#deleteModal" + index}>閉じる</button>
                                        <button type="button" class="btn btn-primary col-lg-4" data-bs-dismiss="modal"
                                            data-bs-target={"#deleteModal" + index} onClick={(e)=>{handleDeleteItem(e);}} data-index={index} >削除する</button>
                                    </div>

                                </div>

                            </div>
                        </div>
            
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
        )) : '';

        const UserName = courseEditData ? 
        <div class="col-lg-8">
                    {courseEditData.auter_name ? courseEditData.auter_name : '' }
                    <input type="hidden" name={courseEditData.admin_id ? 'admin_id' :'trainer_id' } value={courseEditData.admin_id ? courseEditData.admin_id :(courseEditData.trainer_id ? courseEditData.trainer_id : '') } />
                </div>
         : (userData ? 
            <div class="col-lg-8">
                    {userData.admin ? userData.admin.name :(userData.trainer ? userData.trainer.name : '')}
                    <input type="hidden" name={userData.admin ? 'admin_id' :'trainer_id' } value={userData.admin ? userData.admin.id :(userData.trainer ? userData.trainer.id : '') } />
                </div>
         : '');

         const DeleteButton = courseEditData ?
         <>
             <button type="button" form="deleteForm" class="btn btn-secondary col-lg-4 m-3" data-bs-toggle="modal"
                        data-bs-target="#courseDeleteModal">削除する</button>
            <div class="modal fade" id="courseDeleteModal" tabindex="-1"
                aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="deleteform">
                                <p>このコンテンツを削除します。<br />
                                よろしいですか？</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal"
                                data-bs-target="courseDeleteModal">閉じる</button>
                            <button type="submit" form="deleteForm" class="btn btn-primary col-lg-4" data-bs-dismiss="modal"
                                data-bs-target="courseDeleteModal">削除する</button>
                        </div>

                    </div>

                </div>
            </div>
        </>
        : '';

        return (
            <form method="POST" action="/course-edit" class="form">
            <input type="hidden" name="_token" value={csrf} />
            <input type="hidden" name="id" value={courseEditData ? courseEditData.id: ''} />

            <div class="row g-0 mb-3 p-sm-3">
                <label for="name" class="col-lg-4 col-form-label">コースメニュー名</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" onChange={(e)=>{handleChange(e);}} value={courseEditData ? courseEditData.name: ''}/>
                </div>
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">作成者</label>
                {UserName}
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <label for="comment" class="col-lg-4 col-form-label">説明</label>
                <div class="col-lg-8">
                    <textarea name="comment" id="" rows="5" class="form-control" onChange={(e)=>{handleChange(e);}} value={courseEditData ? courseEditData.comment: ''} />
                </div>
            </div>


            <div class="row g-0 mb-3 p-sm-3">
                <label for="open_flg" class="col-lg-4 col-form-label">公開／非公開</label>
                <div class="col-lg-8">
                    <select class="form-select" name="open_flg" aria-label="Default select example" onChange={(e)=>{handleChange(e);}} value={courseEditData ? courseEditData.open_flg: ''}>
                        <option value="1">公開</option>
                        <option value="2">非公開</option>
                    </select>
                </div>
            </div>

            <div class="row g-0 mb-3 p-sm-3 justify-content-between">
                <div class="col-lg-5 mb-3">
                    <label for="start_at" class="form-label">公開開始日</label>
                    <input type="date" name="start_at" class="form-control w-100" onChange={(e)=>{handleChange(e);}} value={courseEditData ? courseEditData.start_at.replace(' 00:00:00', ''): ''} />
                </div>

                <div class="col-lg-5 mb-3">
                    <label for="end_at" class="form-label">公開終了日</label>
                    <input type="date" name="end_at" class="form-control w-100" onChange={(e)=>{handleChange(e);}} value={courseEditData ? courseEditData.end_at.replace(' 00:00:00', ''): ''} />
                </div>
            </div>
            <div class="row g-0 mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">コースメニュー</label>
                <Link to={"/movie-select/" + props.id} class="col-lg-4 btn btn-secondary d-block m-2">動画を選択</Link>
            </div>
            <div>
                {SelectedItems}
            </div>
            <div class="row g-0 justify-content-center justify-content-around">
                {DeleteButton}
                <button type="submit" class="btn btn-primary col-lg-4 m-3">作成する</button>
            </div>
        </form>
        )
};

const selector = state => {
    return {
        movieData: state.movieSerch.movieData,
        itemData: state.courseData.itemData,
        userData: state.courseData.userData,
        courseEditData: state.courseData.courseEditData,
        itemData: state.courseData.itemData,
        activePage: state.movieSerch.activePage,
        itemsPerPage: state.movieSerch.itemsPerPage,
        totalItemCount: state.movieSerch.totalItemCount,
        search: state.movieSerch.search,
    };
};

export default CourseEditForm;