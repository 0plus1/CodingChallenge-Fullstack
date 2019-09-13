**Optional task**

As an optional task you are asked to define the schema you would use to store the provided, hardcoded metadata in a database.

Other than defining the schema, it is important to explain the rationale behind your choice.

You are not required to implement your solution although it would be a big bonus.

Use this space to write your solution:

I've broken these down into migration steps. First step is creating an authors table and a pivot table. 
The reason I link them this way is because a book might have multiple coauthors, and a future requirement 
for this application might be to look up all books that a certain author has worked on. 

```
    Schema::create('authors', function (Blueprint $table) {
        $table->increments('author_id');
        $table->string('title');
        $table->string('first_name');
        $table->string('last_name');
        $table->timestamps();
    });

    Schema::create('book_author', function(Blueprint $table) {
        $table->integer('book_id')->unsigned();
        $table->integer('author_id')->unsigned();
        $table->foreign('book_id')->references('book_id')->on('books');
        $table->foreign('author_id')->references('author_id')->on('authors');
        $table->timestamps();
    });
```
Second step is to create a table to store images. The image_id column on books is used to reference the book cover.
```
    Schema::create('images', function (Blueprint $table) {
        $table->increments('image_id');
        $table->string('filename');
        $table->string('path');
        $table->string('size');
        $table->timestamps();
    });

    Schema::table('books', function (Blueprint $table) {
        $table->integer('image_id')->unsigned()->nullable();
    });

    Schema::table('books', function (Blueprint $table) {
        $table->foreign('image_id')->references('image_id')->on('images');
    });
```
Finally, the publishing date is stored as a date column
```
    Schema::table('books', function (Blueprint $table) {
        $table->timestamp('published_at')->nullable();
    });

```