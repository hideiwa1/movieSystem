import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import StudentItem from "./studentItem";
import {SerchStudent} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';

const StudentList = () => {
    const {studentData, search, studentAll, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        pageRange: 5,
        list: [],
        all: false,
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchStudent(''));
        
    }, []);

    const handlePageChange = (num) => {
        dispatch(SerchStudent(search, num));
    };

    const handleMailList = (num) => {
        const list =  [...values.list];
        let newList = [];
        if(list.indexOf(num) >= 0){
            newList = list.filter(n => n !== num);
        }else{
            list.push(num);
            newList = [...list];
        }
        setValues({...values, ['list']: newList});
    };

    const handleAllList = (e) => {
        if(!values.all){
            setValues({...values, ['list']: studentAll, ['all']: !values.all});
        }else{
            setValues({...values, ['list']: [], ['all']: !values.all});
        }
    }

    const handleSubmit = (e) => {
        e.preventDefault();
        axios.post('/mail/',{
            student_id: values.list
        })
        .then((res) =>{

        })
        .catch((error)=>{});
    };

    const StudentItems = studentData ? studentData.map((val, index) => (
        <StudentItem value={val} key={index} onChange={handleMailList} list={values.list} />
        )) : '';
    

    return (
        <div>
            <div class="row g-0 mb-3 p-2">
            <div class="col-lg-1 d-flex align-items-center">
                <div class="form-check">
                    <input id="checkAll" class="form-check-input" type="checkbox" checked={Boolean(values.all)} name="all" onChange={(e)=>{handleAllList(e)}}/>
                    <input id="" class="" type="hidden" value={values.list} name="list" />
                </div>
            </div>
            <label class="form-check-label col-lg-4" for="flexCheckDefault">
                全て／カテゴリ
            </label>
        </div>
            {StudentItems}
            <Pagenate activePage={activePage}
				itemsPerPage={itemsPerPage}
				totalItemCount={totalItemCount}
				pageRange={values.pageRange}
                onChange={handlePageChange} />
            <div className="row g-0 justify-content-center mb-3">
                <button type="submit" class="btn btn-primary col-lg-6 mt-3" onSubmit={(e) => handleSubmit(e)}>メールを送信する</button>
            </div>
        </div>
    )
};

const selector = state => {
    return {
        studentData: state.studentSerch.studentData,
        studentAll: state.studentSerch.studentAll,
        activePage: state.studentSerch.activePage,
        itemsPerPage: state.studentSerch.itemsPerPage,
        totalItemCount: state.studentSerch.totalItemCount,
        search: state.studentSerch.search,
    };
};

export default StudentList;