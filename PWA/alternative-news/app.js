const apiKey = '44051ff426fc4d518e106a26315035b3';
const defaultSource = 'the-washington-post';
const sourceSelector = document.querySelector('#sources');
const newsArticles = document.querySelector('main');


/* checks if service workers are supported from the browser */
if ('serviceWorker' in navigator) {
  window.addEventListener('load', () =>
    navigator.serviceWorker.register('sw.js')
      .then(registration => console.log('Service Worker registered'))
      .catch(err => 'SW registration failed'));
}

// TODO show what service workers are supported in browsers
// TODO show what SW can do with the phone
// TODO show example of navigator SW
// TODO show workflow see news-workflow.png


// Everytime a load event occurs it will update the news tiles.
window.addEventListener('load', e => {
  sourceSelector.addEventListener('change', evt => updateNews(evt.target.value));
  updateNewsSources().then(() => {
    sourceSelector.value = defaultSource;
    updateNews();
  });
});

/*The online event is fired when the browser has gained access to the network and the value of navigator.onLine switched to true.
* meaning that if the browser is online it will fetch NEW data from api.
* */
window.addEventListener('online', () => updateNews(sourceSelector.value));

// Fetches newsAPI to get the data
async function updateNewsSources() {
  // grabs a dropdown for the different sources
  const response = await fetch(`https://newsapi.org/v2/sources?apiKey=${apiKey}`);
  // payload
  const json = await response.json();

  // create article and make then add a newline
  sourceSelector.innerHTML =
    json.sources
      .map(source => `<option value="${source.id}">${source.name}</option>`)
      .join('\n');
}


// Takes the article json and spits out the markup
async function updateNews(source = defaultSource) {
  newsArticles.innerHTML = '';
  const response = await fetch(`https://newsapi.org/v2/top-headlines?sources=${source}&sortBy=top&apiKey=${apiKey}`);
  const json = await response.json();
  newsArticles.innerHTML =
    json.articles.map(createArticle).join('\n');
}

function createArticle(article) {
  return `
    <div class="article">
      <a href="${article.url}">
        <h2>${article.title}</h2>
        <img src="${article.urlToImage}" alt="${article.title}">
        <p>${article.description}</p>
      </a>
    </div>
  `;
}