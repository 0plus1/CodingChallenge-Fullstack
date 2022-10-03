import React from 'react';
import Book from "./Book";
import axios from "axios";

const Books = (props) => {
  const bookClickHandler = (book_id)=>{
    axios.get('/api/metadata/read/all', {
      params: {
        book_id: book_id
      }
    }).then(response => {
      console.log('Meta Data',response.data[book_id])
    })
  }
  return (
    <ul>
      {props.items.map((book) => (
        <Book name={book.name} isbn={book.isbn} key={book.id} bookId={book.id} bookClickHandler={bookClickHandler}/>
      ))}
    </ul>
  );
};

export default Books;
