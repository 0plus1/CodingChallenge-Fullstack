@extends('layouts.app')

@section('style')
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
@endsection

@section('script-bottom')
<script>
$(async () => {
    const shelf = 'aqua';

    $('h1').append(`<strong>${shelf}</strong>`);
    // Books api
    const bookRequest = axios.create({
        baseURL: `/api/shelf/${shelf}/read`,
    });

    const bookRecordMetadataRequest = axios.create({
        baseURL: '/api/metadata/read',
    });    

    function checkStatus(response) {
        if (response.status >= 200 && response.status < 300) {
            return response;
        }
        const error = new Error(response.statusText);
        error.response = response;
        throw error;
    }

    function parseJSON(response) {
        return response.data;
    }

    const { books } = await bookRequest.get('/')
                        .then(checkStatus).then(parseJSON);

    books.map(book => {
        $('.book-container').append(`
            <li class="book-item" data-book-id=${book.book_id}>
                <div class="book-name">
                    Author: <span>${book.name}</span>
                </div>
                <div class="book-isbn">
                    ISBN: <span>${book.isbn}</span>
                </div>
                <div class="book-published-time">
                    Published: <span>${book.created_at}</span>
                </div>
            </li>
        `);
    });

    $('.book-item').click(async function() {
        const bookID = $(this).attr('data-book-id');
        const result = await bookRecordMetadataRequest.get(`/${bookID}`, )
                        .then(checkStatus).then(parseJSON);
        
        console.log(result);
        alert(JSON.stringify((result)));
    });    

});
</script>
@endsection

@section('content')
    <div class="book-section">
        <h1>Books on shelf: </h1>
        <ul class="book-container"></ul>
    </div>
@endsection