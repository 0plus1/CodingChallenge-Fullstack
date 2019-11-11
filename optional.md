**Optional task**

As an optional task you are asked to define the schema you would use to store the provided, hardcoded metadata in a database.

Other than defining the schema, it is important to explain the rationale behind your choice.

You are not required to implement your solution although it would be a big bonus.

Use this space to write your solution:

```

A new table called book_meta_data with the fields meta_id, book_id, name, value.
It would have a many to one relation with the books table with any amount of name => value records.
For now every book has there names published_at, author and cover. It leaves open the option to add
more meta data names in future as meta data suggests you can attach any amount of data to books.

```
