import React from 'react';
import ReactDOM from 'react-dom';

function News() {
    const news = axios.get('/news/get-articles').then(response => response.data);
    console.log(news);
    return (
        <div className="container-fluid">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card">
                        <div className="card-header">News</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default News;

if (document.getElementById('news')) {
    ReactDOM.render(<News/>, document.getElementById('news'));
}
