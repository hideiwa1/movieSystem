import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

import {SerchMovie} from '../actions';
import axios from 'axios';

const MovieSerch = () => {
    const [values, setValues] = useState({
        keyword: "",
        class_id: "",
        status_on: false,
        status_off: false,
        category_list: "",
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
        axios.get('/api/movie-category-list/')
        .then((res) => {
            setValues({...values, ['category_list']: res.data});
        })
        .catch((error)=>{});
    
    }, []);

    const handleStudentSerch = (e) => {
        e.preventDefault();
        dispatch(SerchMovie(values));
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


    const CategoryLists = values.category_list ? values.category_list.map((val, index) => (
        <option value={val.id} key={index}>{val.name}</option>
        )) : '';

    return (
        <div>
            <button className="btn btn-primary w-100" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                生徒検索
            </button>
            <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">

                        <div className="modal-header">
                            <h5 className="modal-title" id="exampleModalLabel">生徒検索</h5>
                            <button type="button" className="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div className="modal-body">
                            <form id="mainform" onSubmit={(e)=>{handleStudentSerch(e)}}>
                                <label htmlFor="" className="form-label">キーワード</label>
                                <input type="text" name="keyword" className="form-control w-100 mb-3" onChange={(e)=>{handleChange(e);}} value={values.keyword}/>

                                <label htmlFor="" className="form-label">所属</label>
                                <select className="form-select mb-3" aria-label="Default select example" name='class_id' onChange={(e)=>{handleChange(e);}} value={values.class_id}>
                                    <option value=''>全て</option>
                                    
                                    {CategoryLists}
                                    
                                </select>

                                <p className="form-label">参加状況</p>
                                <div className="form-check form-check-inline mb-3">
                                    <input className="form-check-input" type="checkbox" name="status_flg[]"
                                        value="status_on" onChange={(e)=>{handleCheck(e);}} checked={values.status_on}/>
                                    <label className="form-check-label" htmlFor="">参加中</label>
                                </div>
                                <div className="form-check form-check-inline">
                                    <input className="form-check-input" type="checkbox" name="status_flg[]"
                                        value="status_off" onChange={(e)=>{handleCheck(e);}} checked={values.status_off}/>
                                    <label className="form-check-label" htmlFor="">退会</label>
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

export default MovieSerch;