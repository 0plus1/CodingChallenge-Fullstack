**Optional task**

As an optional task you are asked to define the schema you would use to store the provided, hardcoded metadata in a database.

Other than defining the schema, it is important to explain the rationale behind your choice.

You are not required to implement your solution although it would be a big bonus.

Use this space to write your solution:

```
```
In my opinion, the optimal solution would be the following:

Step #1) Create a new table:
```
CREATE TABLE `books_meta_labels` (
  `book_meta_id` int NOT NULL,
  `label` varchar(255),
  PRIMARY KEY (`book_meta_id`)
)
```
The purpose of this table is just for a manual reference for the existing meta labeling. For example:
```
| book_meta_id 	| label         |
|-------------------------------|
| 1				| published_at  |	
| 2				| author        |
| 3				| cover         |
```

Step #2) add JSON field into existing `books` table. SQL command:
```
alter table `books` add `details` JSON default NULL after `isbn`;
```

For example, we can store JSON data in the format:
```
{"f1":"2016-03-06", "f2": "Dr. Jane Doe", "f3": "https://lorempixel.com/640/480/?48312"}
```

By having JSON field we can easy filter and access JSON data via JSON_EXTRACT MySQL-keyword. 
```
select JSON_EXTRACT(details, '$.f1') as 'published_at', data -> '$.f2' as 'author', data -> '$.f3' as 'cover'
from books b 
where JSON_EXTRACT(details, '$.f2')='Dr. Jane Doe'
```
We can remove qoutes by wrapping every run of JSON_EXTRACT by JSON_UNQUOTE function.

PS: MySQL version should be >= 5.7.8.

***

PPS: in regards API design, it's not eficient to read all data to process only one record: it should be created a new route `/metadata/read/{id}` for this purpose.

```