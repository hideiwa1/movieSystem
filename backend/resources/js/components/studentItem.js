import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

const StudentItem = (props) => {

    const handleCheck = (e) => {
		props.onChange(e.target.value);
	};
    

    return (
        <div className="mb-3 border-bottom">
            <div className="row g-0 align-items-stretch p-2">
                <div className="col-lg-1 d-flex align-items-center">
                    <div class="form-check">
                        <input className="form-check-input checks" name="student_id[]" type="checkbox" value={props.value.id} onChange={(e)=>{handleCheck(e)}} checked={Boolean(props.list.indexOf(String(props.value.id)) >= 0)}/>
                    </div>
                </div>
                <div className="col-lg-3 d-flex align-items-center">
                    <span>{props.value.name}</span>
                </div>
                <div className="col-lg-3 d-flex align-items-center">
                    <span>{props.value.trainer_name}</span>
                </div>
                <div className="col-lg-3 d-flex align-items-center">
                    <span>{props.value.class_name.join(' , ')}</span>
                </div>
                <a href={"student-detail/" + props.value.id} className="col-sm-2 btn btn-secondary">詳細</a>
            </div>
        </div>
    )
};

export default StudentItem;