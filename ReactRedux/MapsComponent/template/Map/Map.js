import React from 'react';
import Frame from '../../components/Frame';
import Helmet from 'react-helmet';
import safeGet from 'lodash.get';

import {Component as ReactComponent} from 'react';
import Map from '../../components/Map/Map.js';

class MapTemplate extends ReactComponent {
    constructor(props) {
        super(props)
    }


    render() {
        const {pageMeta, pageSocial} = this.props;
        return (
            <div>
                <Helmet
                    title={safeGet(pageMeta,'title')}
                    meta={[
                        {"name": "author", "content": safeGet(pageMeta,'author')},
                        {"name": "keywords", "content": safeGet(pageMeta,'keywords')},
                        {"name": "description", "content": safeGet(pageMeta,'description')},
                        {"property": "og:title", "content": safeGet(pageSocial,'title')},
                        {"property": "og:url", "content": safeGet(pageSocial,'url')},
                        {"property": "og:description", "content": safeGet(pageSocial,'description')},
                        {"property": "og:image", "content": safeGet(pageSocial,'image')},
                        {"property": "fb:admins", "content": safeGet(pageSocial,'admins')},
                        {"property": "og:type", "content": safeGet(pageSocial,'socialType','non-profit')}
                    ]}
                />
            <Frame type="bleedTop">
                    <Map {...this.props}/>
                </Frame>
            </div>
        )
    }
}


export default MapTemplate;
