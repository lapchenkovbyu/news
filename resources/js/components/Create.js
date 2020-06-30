import React, {useState} from 'react';
import ReactDOM from 'react-dom';


function Create() {
    const userToken = document.querySelector(`meta[name="csrf-token"]`).getAttribute('content');
    const [article, setArticle] = useState({title: '', text: ''})
    const setArticleContent = (e) => {
        if (e.target.name === 'title') {
            setArticle({...article, title: e.target.value})
        } else if (e.target.name === 'text') {
            setArticle({...article, text: e.target.value})
        }

    };
    const [check, setCheck] = useState(false);

    const checkBox = () => {
        setCheck(!check)
        console.log(userToken);
    }


    const createArticle = (e) => {
        e.preventDefault();
        axios
            .post('/news/create-article',
                {
                    'heading': article.title,
                    'text': article.text,
                    'hidden': check
                },
                {'X-CSRF-TOKEN': userToken}
            )
            .then(response => {
                //window.location.href = window.location.origin + '/news';
                alert('Article created')
            })
            .catch(error => {
                alert(error.response.data.message);
            });
    };
    return (
        <div className="container-fluid">
            <div className="row justify-content-center">
                <div className="col-md-10">
                    <div className="card">
                        <div className="card-header">Create new article</div>

                        <div className="card-body">
                            <form>
                                <div className="form-group">
                                    <label htmlFor="articleTitle">Article title</label>
                                    <input onChange={setArticleContent} name='title' value={article.title || ''}
                                           type="text" className="form-control"
                                           id="articleTitle"
                                           placeholder="Article title"/>
                                </div>
                                <div className="form-group">
                                    <label htmlFor="articleText">Article text</label>
                                    <textarea onChange={setArticleContent} name={'text'} value={article.text || ''}
                                              className="form-control"
                                              id="articleText"
                                              rows="10"/>
                                </div>
                                <div className="form-group">
                                    <div className="form-check">
                                        <input className="form-check-input" type="checkbox" name={'visible'} value=""
                                               id="articleVisibility" onChange={checkBox}/>
                                        <label className="form-check-label" htmlFor="articleVisibility">
                                            For admins only
                                        </label>
                                    </div>
                                </div>
                                <button onClick={createArticle} className="btn btn-primary">Create article</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Create;

if (document.getElementById('create')) {
    ReactDOM.render(<Create/>, document.getElementById('create'));
}
