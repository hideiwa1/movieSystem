import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import MailListItem from "./mailListItem";
import {SerchMailList, SerchTrainer} from '../actions';
import Pagenate from "./pagenate";

const MailList = () => {
    const {mailListData, mailListDataTotal, trainerData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        pageRange: 5,
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchMailList(''));
        
    }, []);

    const handlePageChange = (num) => {
        e.preventDefault();
        dispatch(SerchMailList(search, num));
    };
    console.log(mailListData);
    const MailListItems = mailListData ? Object.keys(mailListData).map((key) => (
        <MailListItem value={mailListData[key]} total={mailListDataTotal[key]} name={key} trainer_id={trainerData.find((val) => val.name == key).id} key={key}/>
    )) : '';

    return (
    
        <div>
            <div className="mb-3 border-bottom">
                <div className="row g-0 align-items-stretch p-2">
                    <div class="col-lg-3 d-flex align-items-center">
                        <span>トレーナー名</span>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center">
                        <span>今月配信数</span>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center">
                        <span>先月配信数</span>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center">
                        <span>総配信数</span>
                    </div>
                </div>
            </div>
            {MailListItems}
            <Pagenate activePage={activePage}
				itemsPerPage={itemsPerPage}
				totalItemCount={totalItemCount}
				pageRange={values.pageRange}
                onChange={handlePageChange} />
        </div>
        
    )
};

const selector = state => {
    return {
        mailListData: state.mailList.mailListData,
        mailListDataTotal: state.mailList.mailListDataTotal,
        trainerData: state.mailList.trainerData,
        activePage: state.mailList.activePage,
        itemsPerPage: state.mailList.itemsPerPage,
        totalItemCount: state.mailList.totalItemCount,
        search: state.mailList.search,
    };
};

export default MailList;