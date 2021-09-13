import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import TrainerItem from "./trainerItem";
import {SerchTrainer} from '../actions';
import Pagenate from "./pagenate";

const TrainerList = () => {
    const {trainerData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        pageRange: 5,
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchTrainer(''));
        
    }, []);

    const handlePageChange = (num) => {
        e.preventDefault();
        dispatch(SerchTrainer(search, num));
    };

    const TrainerItems = trainerData ? trainerData.map((val, index) => (
        <TrainerItem value={val} key={index}/>
        )) : '';

    return (
    
        <div>
            {TrainerItems}
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
        trainerData: state.trainerSerch.trainerData,
        activePage: state.trainerSerch.activePage,
        itemsPerPage: state.trainerSerch.itemsPerPage,
        totalItemCount: state.trainerSerch.totalItemCount,
        search: state.trainerSerch.search,
    };
};

export default TrainerList;