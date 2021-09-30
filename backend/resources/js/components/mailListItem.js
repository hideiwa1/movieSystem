import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import { isEmpty } from 'lodash';

const MailListItem = (props) => {

    let now_month_total = 0;

    let last_month_total = 0;

    console.log(props.name);
    console.log(props.trainer_id);


    if(props.value){
    function DateFormat(date, format){
        format = format.replace(/YYYY/, date.getFullYear());
        format = format.replace(/MM/, date.getMonth() +1);
        return format;
    }
    const date = new Date();
    const now_month = DateFormat(date, 'YYYY-MM');

    const last_date = new Date(date.getFullYear(), date.getMonth()-1, date.getDate());
    const last_month = DateFormat(last_date, 'YYYY-MM');


    now_month_total = props.value.find((val) => val.send_month == now_month) ?? 0;

    console.log(now_month_total);

    last_month_total = props.value.find((val) => val.send_month == last_month) ?? 0;
    console.log(last_month_total);
    }

    return (
        <div className="mb-3 border-bottom">
            <div className="row g-0 align-items-stretch p-2">
                <div class="col-lg-3 d-flex align-items-center">
                    <span>{props.name}</span>
                </div>
                <div class="col-lg-2 d-flex align-items-center">
                    <span>{now_month_total ? now_month_total.total : 0}</span>
                </div>
                <div class="col-lg-2 d-flex align-items-center">
                    <span>{last_month_total ? last_month_total.total : 0}</span>
                </div>
                <div class="col-lg-2 d-flex align-items-center">
                    <span>{props.total}</span>
                </div>
                <a href={"/admin/mail-list-detail/" + props.trainer_id} class="btn btn-secondary text-center col-lg-2 align-items-center" type="button">
                    詳細
                </a>

                
            </div>
        </div>
    )
};

export default MailListItem;