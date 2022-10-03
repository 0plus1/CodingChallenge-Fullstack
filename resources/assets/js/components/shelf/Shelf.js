import React, {useState} from 'react';
import axios from "axios";
import Books from "../book/Books";

const shelf = (props) => {
    const [books, setBooks] = useState([])
    const shelfClickHandler = (event) => {
        event.preventDefault();
        // todo move all apis to api.js
        axios.get(`/api/shelf/${event.target.getAttribute('slug')}/read`).then((response)=>(
           setBooks(response.data)
        ))
    }
    return (
        <li >
            <label onClick={shelfClickHandler} slug={props.slug}>{props.name}</label>
            {books.length > 0 && (<Books items={books} />)}
        </li>
    );
};

export default shelf;
