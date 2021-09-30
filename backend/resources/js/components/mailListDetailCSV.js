import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

import axios from 'axios';

const MailListDetailCSV = () => {

    const trainer_id = window.location.pathname.replace('/admin/mail-list-detail/', '');

    console.log('trainer_id: ' + trainer_id);
    const handleMailListToCSV = (e) => {
        e.preventDefault();

        axios.get('/api/mailListDetail-csv', {params: {'trainer_id': trainer_id}})
        .then((res) => {
            function DateFormat(date, format){
                format = format.replace(/YYYY/, date.getFullYear());
                format = format.replace(/MM/, date.getMonth() +1);
                return format;
            }
            const date = new Date();
            const now_month = DateFormat(date, 'YYYY-MM');

            const last_date = new Date(date.getFullYear(), date.getMonth()-1, date.getDate());
            const last_month = DateFormat(last_date, 'YYYY-MM');

            const CSVdata = res.data;
            console.log(CSVdata);
            const bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
            var data_csv = '';
            data_csv += "配信月,配信数\n";
            
            for(let i=0; i < 12; i++){
                const target_date = new Date(date.getFullYear(), date.getMonth()-i, date.getDate());
                const target_month = DateFormat(target_date, 'YYYY-MM');
                let target_total = CSVdata.find((val) => val.send_month == target_month) ?? 0;
                target_total = target_total ? target_total.total : 0;
                data_csv += target_month + "," + target_total + "\n";
            }

            const blob = new Blob([bom, data_csv], {
                "type": "text/csv"
            }); //data_csvのデータをcsvとしてダウンロードする関数
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "mailListData.csv"; //フォーマットによってファイル拡張子を変えている
            a.click();
            a.remove();

            data_csv = '';
        }).catch((error)=>{});
    };


    return (
        <a href="#"  className="w-100 text-white" onClick={(e)=>{handleMailListToCSV(e)}} id="download" download="test.csv">CSV出力</a>
    )
};


export default MailListDetailCSV;