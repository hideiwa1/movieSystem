import React from 'react';
import ReactDOM from 'react-dom';
import {createStore, applyMiddleware} from 'redux';
import {Provider} from 'react-redux';
import { useDispatch, useSelector } from 'react-redux';
import { useState, useEffect } from "react";

import {SerchTrainer} from '../actions';

const Pagenate = (props) => {

    const handleLinkClick = (e) => {
		e.preventDefault();
		props.onChange(e.target.name);
	};

    const buildPages = () => {
        let Pages = [],
            first_page = "",
            last_page = "",
            totalPage = Math.ceil(props.totalItemCount / props.itemsPerPage);
        
        if(props.pageRange >= totalPage){
            /*総ページ数による分岐*/
            first_page = 1;
            last_page = totalPage;
        }else{
            /*現在ページ数による分岐*/
            if(props.activePage < (props.pageRange / 2) ){
                first_page = 1;
                last_page = props.pageRange;
            }else if(props.activePage + (props.pageRange /2) > props.totalPage){
                first_page = totalPage - props.pageRange + 1;
                last_page = totalPage;
            }else{
                first_page = props.activePage - Math.floor(props.pageRange /2);
                last_page = props.activePage + Math.floor(props.pageRange /2);
            }
        }
        
        /*ページ数の挿入*/
        for(let i = first_page; i <= last_page; i++){
            Pages.push(
                <li className="page-item" key={i}><a className="page-link" name={i} onClick={(e)=>handleLinkClick(e)}>{i}</a></li>
            );
        }
        if(props.totalItemCount){
        /*配列の手前に挿入*/
        props.activePage !== 1 && Pages.unshift(
            <li className="page-item" key='prev'><a className="page-link" name={props.activePage - 1} onClick={(e)=>handleLinkClick(e)}>前へ</a></li>
        );
        
        props.activePage !== 1 && Pages.unshift(
            <li className="page-item" key='top'><a className="page-link" name='1' onClick={(e)=>handleLinkClick(e)}>先頭へ</a></li>
        );
        
        /*配列の後方に挿入*/
        props.activePage !== totalPage && Pages.push(
            <li className="page-item" key='next'><a className="page-link" name={props.activePage + 1} onClick={(e)=>handleLinkClick(e)}>次へ</a></li>
        );
        
        props.activePage !== totalPage && Pages.push(
            <li className="page-item" key='end'><a className="page-link" name={props.activePage + 1} onClick={(e)=>handleLinkClick(e)}>最後へ</a></li>
        );
        }
        
        return Pages;
    }

    const Pages = buildPages();

    return (

        <nav aria-label="Page navigation example">
            <ul className="pagination justify-content-center">
                {Pages}
            </ul>
        </nav>
    );
};

export default Pagenate;