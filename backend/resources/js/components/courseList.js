import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";
import CourseItem from "./courseItem";
import {SerchCourse} from '../actions';
import Pagenate from "./pagenate";
import axios from 'axios';

const CourseList = () => {
    const {courseData, search, activePage, itemsPerPage, totalItemCount} = useSelector(selector);

    const [values, setValues] = useState({
        pageRange: 5,
        list: [],
        all: false,
      });

    const dispatch = useDispatch();

    useEffect(() => {
        
            dispatch(SerchCourse(''));
        
    }, []);

    const handlePageChange = (num) => {
        dispatch(SerchCourse(search, num));
    };

    const CourseItems = courseData ? courseData.map((val, index) => (
        <div className="mb-3 border-bottom" key={index}>
            <CourseItem value={val} list={values.list} />
        </div>
        )) : '';
    

    return (
        <div>
            
            {CourseItems}
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
        courseData: state.courseSerch.courseData,
        activePage: state.courseSerch.activePage,
        itemsPerPage: state.courseSerch.itemsPerPage,
        totalItemCount: state.courseSerch.totalItemCount,
        search: state.courseSerch.search,
    };
};

export default CourseList;