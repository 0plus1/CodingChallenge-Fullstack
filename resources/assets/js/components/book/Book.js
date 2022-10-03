import React from 'react';
import axios from "axios";

const Book = (props) => {
    const bookClickHandler = (event) => {
        axios.get('/api/metadata/read/all', {
            params: {
                book_id: event.target.getAttribute('book_id')
            }
        }).then(response => {
            console.log(response.data)
        })
    }

    return (
        <li onClick={bookClickHandler} book_id={props.key}><strong>{props.name}</strong> ISBN: {props.isbn}</li>
    );
};

export default Book;
