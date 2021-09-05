import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import TrainerItem from "./trainerItem";
import {SerchTrainer} from '../actions';

const TrainerList = () => {
    const {trainerData} = useSelector(selector);

    console.log(trainerData);
    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchTrainer(''));
        
    }, []);

    const TrainerItems = trainerData ? trainerData.map((val) => (
        <TrainerItem value={val} />
        )) : '';

    return (
    
        <div>
            {TrainerItems}
        </div>
        
    )
};

const selector = state => {
    return {
        trainerData: state.trainerSerch.trainerData,
    };
};

export default TrainerList;