import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import {SingleArticle} from "./singleArticle";

function News(props) {
    let newsArray = props.news? JSON.parse(props.news):[];
    const [news, setNews] = useState(newsArray);
    if (newsArray.length === 0) {
        useEffect(() => {
            const fetchData = async () => {
                const result = await axios(
                    '/news/get-articles',
                );

                setNews(result.data);
            };
            fetchData();
        }, []);
    }
    return (
        <div className="container-fluid">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card">
                        <div className="card-header">News</div>

                        <div className="card-body">{news.map((article, iter) => <SingleArticle article={article}
                                                                                               key={iter + article.heading}/>)}</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default News;

if (document.getElementById('news')) {
    if (document.getElementById("props")) {
        const propsContainer = document.getElementById("props");
        const props = Object.assign({}, propsContainer.dataset);
        ReactDOM.render(<News {...props}/>, document.getElementById('news'));
    }

    else {
        ReactDOM.render(<News/>, document.getElementById('news'));
    }
}
