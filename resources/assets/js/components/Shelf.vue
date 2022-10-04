<template>
    <div>
        <h1 style="flex">Shelf: {{name}}</h1>
        <div v-if="books.length">
            <h4>List of Books</h4>
            <ul>
                <li v-for="book in books" :key="book.book_id">
                    <a @click="showDetails(book.book_id)">{{ book.name }}</a>
                </li>
            </ul>
        </div>
        <div v-if="detailsAreLoaded">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Book's details</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Author</th>
                            <th>Published at</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ data.cover }}</td>
                            <td>{{ data.author }}</td>
                            <td>{{ data.published_at }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="comments">Raw data: {{ data }}</div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        books: [],
        name: ''
    },
    data() {
        return {
            data: {cover: '', author: '', published_at: ''},
            detailsAreLoaded: false
        }
    },
    methods: {
        showDetails(bookId) {
            this.detailsLoaded = true
            axios.get('/api/metadata/read/all')
                .then(response => {         
                    const dat = Object.entries(response.data).filter(data => data[0] == bookId);
                    if (dat[0][1] !== undefined) {
                        this.data = dat[0][1];
                        console.log('selected book metadata:', JSON.stringify(this.data, null, " ")); 
                    } else {
                        console.log('failed to retrieve selected book metadata');
                    }
                })
                .catch((error) => {
                    console.log('error', error);
                })
                .finally(() => {
                    this.detailsAreLoaded = true;
                })
        }
    }
}
</script>

<style scoped>
h1 {
    font-size: 36px;
    margin: 12px auto;
}
ul li {
    margin: 4px auto;
}
ul li a {
    cursor: pointer;
    font-size: 12px;
    text-decoration: underline !important;
}
.comments {
    font-style: italic;
    color: gray;
}
</style>