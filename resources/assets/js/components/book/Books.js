import React from 'react';
import Book from "./Book";

const Books = (props) => {
  return (
    <ul>
      {props.items.map((book) => (
        <Book name={book.name} isbn={book.isbn} key={book.id} />
      ))}
    </ul>
  );
};

export default Books;
