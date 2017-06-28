import {Component} from 'react';
import styles from './MapResult.css';
import SmartLink from '../../SmartLink/SmartLink.js';

import Icon from './../../Icon';

export default class extends Component {
    constructor(props){
        super(props);
    }


    render() {
        const { templeTitle, templeAddress, templePhone, templeDirections, templeInfoLink, templePhotoLink, toggleDetails, templeDetails} = this.props;
        const reqContext = (window.location.href.indexOf("lang") > -1) ? window.location.search.split('&')[0] : '?lang=eng';
        const templeName = templeTitle ? templeTitle.split(' ').join('-').toLowerCase() : '';
        const url = window.location.protocol + '//' + window.location.host + '/temples/';
        //const addLine1 = templeDetails[0].addLine1;
        let addLine1, addLine2, addLine3;
        if (templeDetails[0]){
            addLine1 = templeDetails[0].addLine1;
            addLine2 = templeDetails[0].addLine2;
            addLine3 = templeDetails[0].addLline3;
        };
        return (
            <div className={styles.detailsBox}>
                <div className={styles.closeSmall} onClick={toggleDetails}><Icon icon="close-small"/></div>
                <div className={styles.resultInfo}>
                    <div className={styles.title}>{templeTitle}</div>

                    <div className={styles.addressSection}>
                        <div>
                            <span className={styles.address}>{addLine1}<br/>{addLine2}<br/>{addLine3}</span>
                            <a href={'tel:' + templePhone} className={styles.phone}>{templePhone}</a>
                        </div>
                        <div className={styles.directionsLink}>
                            <SmartLink href={'https://www.google.com/maps?q=' + templeTitle + ' ' + templeAddress} target='_blank'>
                                <span className={styles.directionIcon}><Icon icon="location"/></span>
                                {templeDirections}
                            </SmartLink>
                        </div>
                    </div>


                    <div className={styles.extras}>
                        <div className={styles.moreInfo}>

                            <SmartLink href={url + 'details/' + templeName + reqContext}>
                                <span className={styles.infoIcon}><Icon icon="info"/></span>
                                {templeInfoLink}
                            </SmartLink>
                        </div>
                        <div className={styles.photos}>
                            <SmartLink href={url + 'photo-gallery' + '/' + templeName + reqContext}>
                                <span className={styles.photoIcon}><Icon icon="image"/></span>
                                {templePhotoLink}
                            </SmartLink>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
