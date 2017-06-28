import safeGet from 'lodash.get';
import safeSet from 'lodash.set';

import {getBltUrl, getCurrentUrl} from '../util.js';


export const retrieveSingleTempleDetail = (id,name) => {
    let reqContext = (window.location.hostname.indexOf('preview') !== -1) || (window.location.hostname.indexOf('localhost') !== -1) ? 'preview' : 'published';
    let url =  id ? getBltUrl('details',true,reqContext) + '&templeOrgId=' + id  : getBltUrl('details',true,reqContext)  + '&templeNameId=' + name;
    let fetch = require('node-fetch');
    return fetch(url, {method: 'GET', mode: 'cors', compress: false})
        .then(response => {
            return response.ok ? response.json() : Promise.reject(response)
        })
        .catch((err) => {
            console.log("error from: /api/v1/temples/details" + ' - ' + err.statusText);
            return {status: err.status, statusText: err.statusText};
        })
};


export const fetchMapDetailsData = (reqContext) =>{
    let url = getBltUrl('list',true,reqContext);
    let fetch = require('node-fetch');
    return fetch(url, {method: 'GET', mode: 'cors', compress: false})
        .then(response => {
            return response.ok ? response.json() : Promise.reject(response)
        })
        .then(json => {

            let pageSocial = safeGet(json, 'meta.pageSocial', {});
            safeSet(pageSocial,'url',safeGet(pageSocial,'url',null) || getCurrentUrl(reqContext));

            // and all other properties can be used as-is by the container, don't need to be mapped

            return json;
        })
        .catch((err) => {
            console.log("error from: /api/v1/temples/list" + ' - ' + err.statusText);
            return {status: err.status, statusText: err.statusText};
        })
};
