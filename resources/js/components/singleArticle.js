import React from 'react';
import '../../sass/Article.scss'
import moment from "moment";

// created_at: "2020-06-30T15:47:17.000000Z"
// heading: "Test 4"
// hidden: 1
// id: 5
// text: "Some text 4"
// updated_at: "2020-06-30T15:47:17.000000Z"

export const SingleArticle = ({article}) => {
    const date = moment(article.created_at).format('Do MMMM YYYY, h:mm');
    return <div className="articleWrapper">
        <div className="articleHeader">
            <div className="articleTitle">
                <h2>{article.heading}</h2>
            </div>
            <div className="articleDate">
                <span>{date}</span>
            </div>
        </div>
        <div className="articleText">
            <p>{article.text}</p>
        </div>
    </div>
}
