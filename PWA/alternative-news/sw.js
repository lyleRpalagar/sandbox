const cacheName = 'news-v1';


// array of assets
const staticAssets = [
  './',
  './app.js',
  './styles.css',
  './fallback.json',
  './images/fetch-dog.jpg'
];


/*
A SW is a script that runs on your browser which runs in the background separate from a webpage
Runs on a different thread then what your browser internal resources is using.
—SW are the foundation of your PWA—
- low level api  , doesnt do anything unless you instruct it to.
 */


/*
 SW runs on the background on a separate thread so not on your main UI thread like js script but on a separate thread.
 Since it runs on a separate thread it can work offline / when your session is closed so good for push notification.
- Not attached to a single page ( fires from all pages )
- Event driven
    - However there is no click event because you are not reacting from DOM event , you can’t access DOM in the SW
*/

/*
- Install Event if the SW is brand new or if its an updated version of SW
 */
self.addEventListener('install', async function () {
  const cache = await caches.open(cacheName);
  cache.addAll(staticAssets);
});

/*
- Activate Event in the activate knows that the SW is activated
 */
self.addEventListener('activate', event => {
  //
  event.waitUntil(self.clients.claim());
});

/*
    - DIFF: installation happens instantly if the SW is new however if its not new it will keep
    it waiting UNTIL either you ( user ) updates the SW ( through dev tools ) or if you close all tabs and sessions where you page is open
        - If you install a new SW and immediately activate a new one then maybe the user page will be
        corrupted or give bad data by pushing a new version of the SW. Existing process might get interrupted and get incorrect data.
 */


// how to respond to a given fetch event
// events sent from the application to the network (api call)
self.addEventListener('fetch', event => {
  const request = event.request;
  const url = new URL(request.url);
  if (url.origin === location.origin){
/*
*  SW can define what to do with req. using respondWith() cache assets first and if
*  we do not have anything from cache fetch it from the network
* */
    event.respondWith(cacheFirst(request));
  } else {
    event.respondWith(networkFirst(request));
  }
});


/* MINIMAL uses of SW is to handle internal caching. */


async function cacheFirst(request) {
  // cache request itself is the key
  const cachedResponse = await caches.match(request);
  // calls the cache  if it doesnt get it falls back on the network.
  return cachedResponse || fetch(request);
}

async function networkFirst(req) {
  const cache = await caches.open('news-dynamic');

  /* if we are offline and we are unable to return anything back cached service
    fallback to the default data.
  */
  try {
    const res = await fetch(req);
    cache.put(req, res.clone());
    return res;
  }
  catch ( error ) {
    const cachedResponse = await cache.match(req);
    return cachedResponse || await caches.match('./fallback.json');
  }
}