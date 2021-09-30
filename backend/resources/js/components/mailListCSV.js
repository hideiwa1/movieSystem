import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

import axios from 'axios';

const MailListCSV = () => {

    const handleMailListToCSV = (e) => {
        e.preventDefault();
        axios.get('/api/mailList-csv', {params: []})
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
            console.log(CSVdata.mailList_data);
            const bom = new Uint8Array([0xEF, 0xBB, 0xBF]);
            var data_csv = '';
            data_csv += "トレーナー名,今月配信数,先月配信数,総配信数\n";
            
            Object.keys(CSVdata.mailList_data).map(function(key){
                console.log('now_month_total');
                let now_month_total = CSVdata.mailList_data[key].find((val) => val.send_month == now_month) ?? 0;
                now_month_total = now_month_total ? now_month_total.total : 0;
                let last_month_total = CSVdata.mailList_data[key].find((val) => val.send_month == last_month) ?? 0;
                last_month_total = last_month_total ? last_month_total.total : 0;
                const total_count = CSVdata.mailList_total[key];
                console.log(now_month_total);

                data_csv += key + "," + now_month_total + ',' + last_month_total + ',' + total_count + "\n";
            });

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


export default MailListCSV;