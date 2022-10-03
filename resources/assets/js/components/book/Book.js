import React from 'react';
import axios from "axios";

const Book = (props) => {
    const bookClickHandler = (event) => {
        event.preventDefault();
        props.bookClickHandler(props.bookId)
    }

    return (
        <li onClick={bookClickHandler}><strong>{props.name}</strong> ISBN: {props.isbn}</li>
    );
};

export default Book;
