import React from 'react';

export const SingleArticle = ({article}) =>
    <div className="articleWrapper">
        <div className="articleTitle">
            <h2>{article.heading}</h2>
        </div>
        <div className="articleText">
            <p>{article.text}</p>
        </div>
        <div className="articleDate">
            <span>{article.date}</span>
        </div>
    </div>
