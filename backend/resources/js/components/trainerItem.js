import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

const TrainerItem = (props) => {

    return (
        <div className="mb-3 border-bottom">
            <div className="row g-0 align-items-stretch p-2">
                <div className="col-lg-3 d-flex align-items-center">
                    <span>{props.value.name}</span>
                </div>
                <div className="col-lg-2 d-flex align-items-center">
                    <span>{props.value.club_name}</span>
                </div>
                <div className="col-lg-7 d-flex align-items-center">
                    <div className="row g-0 flex-grow-1 text-center justify-content-around">
                        <a href={"trainer-detail/" + props.value.id} className="col-sm-3 btn btn-secondary m-2">詳細</a>

                        <a href="studentList.html" className="col-sm-3 btn btn-secondary m-2">担当生徒一覧</a>

                        
                    </div>
                </div>
            </div>
        </div>
    )
};

export default TrainerItem;