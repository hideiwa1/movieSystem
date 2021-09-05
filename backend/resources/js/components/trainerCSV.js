import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

import {SerchTrainer} from '../actions';
import axios from 'axios';

const TrainerCSV = () => {
    const {keyword, club, status_on, status_off} = useSelector(selector);

    const dispatch = useDispatch();

    const handleTrainerToCSV = (e) => {
        e.preventDefault();
        axios.get('/api/trainer-list', {params: [keyword, club, status_on, status_off]})
        .then((res) => {
            const CSVdata = res.data;
            const bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
            var data_csv = '';
            data_csv += "トレーナー名,所属\n";
            CSVdata.forEach(function (item) {
                data_csv += item.name + "," + item.club_name + "\n";
            });

            const blob = new Blob([bom, data_csv], {
                "type": "text/csv"
            }); //data_csvのデータをcsvとしてダウンロードする関数
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "sampleData.csv"; //フォーマットによってファイル拡張子を変えている
            a.click();
            a.remove();

            data_csv = '';
        }).catch((error)=>{});
    };


    return (
        <a href="#"  className="w-100 text-white" onClick={(e)=>{handleTrainerToCSV(e)}} id="download" download="test.csv">CSV出力</a>
    )
};

const selector = state => {
    return {
        keyword: state.trainerSerch.keyword,
        club: state.trainerSerch.club,
        status_on: state.trainerSerch.status_on,
        status_off: state.trainerSerch.status_off,
    };
};

export default TrainerCSV;