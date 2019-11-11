@extends('layouts.app')

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
    $(document).on("click", "a.book-link", function(){
        var bookID = $(this).attr('data-id');

        $.ajax({
            type:'GET',
            url:'/api/metadata/read/all',
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
                if(data[bookID] !== undefined){
                    console.log(data[bookID]);
                    
                    $('dl#metadata dd#published_at').text( data[bookID].published_at );
                    $('dl#metadata dd#author').text( data[bookID].author );
                    $('dl#metadata dd#cover').html( '<img src='+data[bookID].cover+' height="100">' );
                }
            }
        });
    });
</script>

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>{{ $shelf->name }}</h1>
            <dl id="metadata">
                <dt>Published</dt>
                <dd id="published_at"></dd>
                <dt>Author</dt>
                <dd id="author"></dd>
                <dt>Cover</dt>
                <dd id="cover"></dd>
            </dl>

            <ul class="content-navigation content-navigation-icon">
                @foreach($shelf->books as $book)
                <li><a href="#" data-id="{{ $book->book_id }}" class="book-link">{{ $book->name }} ({{ $book->isbn }})</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
