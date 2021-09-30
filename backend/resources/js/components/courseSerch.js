import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

import {SerchCourse} from '../actions';
import axios from 'axios';

const CourseSerch = () => {
    const [values, setValues] = useState({
        keyword: "",
        status_on: false,
        status_off: false,
        category_list: "",
      });

    const dispatch = useDispatch();

    const handleCourseSerch = (e) => {
        e.preventDefault();
        dispatch(SerchCourse(values));
    };

    const handleChange = (e) => {
        const val = e.target.value;
		const name = e.target.name;
		setValues({...values, [name]: val});
    };

    const handleCheck = (e) => {
        const name = e.target.value;
		setValues({...values, [name]: e.target.checked});
    };




    return (
        <div>
            <button className="btn btn-primary w-100" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                コースメニュー検索
            </button>
            <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">

                        <div className="modal-header">
                            <h5 className="modal-title" id="exampleModalLabel">コースメニュー検索</h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div className="modal-body">
                            <form id="mainform" onSubmit={(e)=>{handleCourseSerch(e)}}>
                                <label htmlFor="" className="form-label">キーワード</label>
                                <input type="text" name="keyword" className="form-control w-100 mb-3" onChange={(e)=>{handleChange(e);}} value={values.keyword}/>

                                <p className="form-label">公開状況</p>
                                <div className="form-check form-check-inline mb-3">
                                    <input className="form-check-input" type="checkbox" name="status_flg[]"
                                        value="status_on" onChange={(e)=>{handleCheck(e);}} checked={values.status_on}/>
                                    <label className="form-check-label" htmlFor="">公開中</label>
                                </div>
                                <div className="form-check form-check-inline">
                                    <input className="form-check-input" type="checkbox" name="status_flg[]"
                                        value="status_off" onChange={(e)=>{handleCheck(e);}} checked={values.status_off}/>
                                    <label className="form-check-label" htmlFor="">非公開</label>
                                </div>

                            </form>
                        </div>
                        <div className="modal-footer">
                            <button type="button" className="btn btn-secondary" data-bs-dismiss="modal"
                                data-bs-target="#exampleModal">閉じる</button>
                            <button type="submit" form="mainform"
                                className="btn btn-primary col-lg-4" data-bs-dismiss="modal" data-bs-target="#exampleModal">検索する</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        
    )
};

export default CourseSerch;