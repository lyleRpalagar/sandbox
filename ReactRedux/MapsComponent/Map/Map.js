import {Component} from 'react';
import styles from './Map.css';
import isBrowser from '../../../util/is-browser.js';
import join from 'join-classnames';

import loadScript from './util/script-loader.js';
import {geolocation} from './util/custom-controls.js';
import {loadLocation, initCluster, goToLocation} from './util/custom.js';
import Icon from './../Icon';
import MapResults from './MapResult/MapResult.js';

const ReactDOM = require('react-dom');

export default class extends Component {
    constructor(props) {
        super(props);
        this.state = {
            center: {
                lat: 0,
                lng: 0
            },
            value: '',
            isBoxVisible: false,
            templeOrgId: '',
            count: 0,
            selected: '',
            location: {},
            selectedTemple: {},
            templeName: '',
            locale: '',
            markers: []
        };

        this.handleOnBlur = this.handleOnBlur.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleChange = this.handleChange.bind(this);
        this.toggleDetails = this.toggleDetails.bind(this);
        this.keyPressed = this.keyPressed.bind(this);
        this.componentDidUpdate = this.componentDidUpdate.bind(this);
    }

    scope = {
        layer: "temple"
    };

    handleOnBlur(e) {
        if (e.type == "click") {
            this.setState({isBoxVisible: false, value: "---"});
            let inputs = document.getElementById('app').getElementsByTagName('INPUT');
            if (inputs != null) {
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].value = "";
                }
            }
            return;
        }
    }

    handleChange(event) {
        (event.target.value === '')
            ? (this.setState({value: '---', selected: '', isBoxVisible: false, templeOrgId: '', count: 0}))
            : (this.setState({
                value: (event.target.value || event.target.innerHTML || ''),
                isBoxVisible: true,
                count: 0
            }));

    }

    //once submitted it will clear state
    handleSubmit(event) {
        // if the event comming in is a click or enter from the drop-down
        if (event.type === 'click') {
            if (!event.target.dataset && this.state.locale){
                this.setState({
                    locale: ''
                })
            }
            //if a location
            if (event.target.dataset.location) {
                this.setState({
                    locale: event.target.dataset.location
                });
                return;
            }
            // if anything but the search submit button
            if (event.target.value !== 'submit') {
                this.setState({
                    value: (event.target.value || event.target.innerHTML || ''),
                    templeOrgId: (event.target.id || ''),
                    isBoxVisible: false,
                    count: 0,
                    templeName: '',
                    locale: ''
                });
                if (event.target.id && event.target.id != 'pac-input') {
                    this.props.onSubmit(event.target.id, null);
                }
            // if search submit button and state.selected != null
            } else if (this.state.selected !== '') {
                this.setState({
                    value: (this.state.selected || ''),
                    templeOrgId: (this.state.templeOrgId || ''),
                    isBoxVisible: false,
                    count: 0,
                    templeName: '',
                    locale: ''
                });
            // if search submit button
            } else {
                this.setState({
                    locale: this.state.value
                });
                return;
            }
        }
        // if triggered by hitting enter in the search bar
        if (event.type === 'keydown'){
            this.setState({
                locale: this.state.value
            });
            return;
        }

        const dict = {"á":"a", "ã":"a", "ç":"c", "é":"e", "í":"i", "ó":"o"};
        console.log(this.state.templeName.replace(/\s+/g, '-').replace(/[^\w ]/g, function(char) {
            return dict[char] || char;
        }).toLowerCase());

        if (this.state.templeName != '') {
            this.props.onSubmit(null, this.state.templeName.replace(/\s+/g, '-').replace(/[^\w ]/g, function(char) {
                return dict[char] || char;
            }).toLowerCase());
        } else if(this.state.location === ''){
            // submit the user input to the redux action.
            var templeOrgId = (this.state.templeOrgId != 'pac-input')
                ? this.state.templeOrgId
                : event.target.id != 'pac-input'
                    ? event.target.id
                    : '';
            this.props.onSubmit(templeOrgId);
        }

        //clear input value
        this.setState({
            value: ''
        });
        let inputs = document.getElementById('app').getElementsByTagName('INPUT');
        if (inputs != null) {
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].value = "";
            }
        }
    }

    init = () => {
        var mapDiv = document.getElementById('map');
        var mapOptions = {
            center: this.props.center
                ? this.props.center
                : this.state.center,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT
            },
            streetViewControl: false,
            mapTypeId: 'roadmap',
            zoom: 2,
            minZoom: 2,
            zoomControl: true,
            disableDefaultUI: false,
            scaleControl: true,
            tilt: 45
        };

        // add map state to scope
        this.scope.map = new google.maps.Map(mapDiv, mapOptions);

        // pass map state to geolocation
        if (this.state.location[0]){
            goToLocation(this.state.location, this.scope);
        }else{
            geolocation(this.scope);
            initCluster(this.scope);
        }

        // had to save the reference to the context where addListener is made
        // http://stackoverflow.com/questions/2130241/pass-correct-this-context-to-settimeout-callback
        // saving this to that saves the reference of the global object in which i can use in my callbacks.
        var that = this;
        this.scope.cluster.addListener("click", function(cluster) {
            var latlng = new google.maps.LatLng(cluster.coordinates[1], cluster.coordinates[0]);
            that.scope.map.setCenter(latlng);
            that.scope.map.setZoom(15);
            that.setState({templeName: cluster.items[0].name});
            that.handleSubmit(that);
        });
        // if the url contains a temple name , skip the rest of the user process and go straight to the temple then act the same
        if (window.location.href.indexOf('templeName') != -1) {
            this.setState({
                templeName: window.location.href.split('templeName=')[1]
            });
            this.props.onSubmit(null, window.location.href.split('templeName=')[1]);
        }

        if (this.state.location){
            goToLocation(this.state.location, this.scope);
        }
    };

    // generate dom before render
    componentWillMount() {
        if (isBrowser) {
            window.initMap = () => {
                this.init();
            };
        }
    }

    // load the script after render and with the scriptLocation do the callback
    componentDidMount() {
        if (isBrowser) {
            var scriptLocation = "//int.lds.org/ws/maps/v1.0/services/rest/js?client=templesLdsOrg&libraries=ClusterLayer&callback=initMap";
            loadScript(scriptLocation);
        }
    }


    componentDidUpdate() {
        // once the submit comes back with the new props run this function to find the coord and draw it on the map.
        let {templeUnitNumber} = this.props

        if (templeUnitNumber && (this.state.templeOrgId || this.state.templeName) && this.state.locale === '' && this.state.value === '') {
            var service = new google.maps.LayerService();
            var scope = this.scope;
            service.getDetails(templeUnitNumber, function(location) {
                loadLocation(location.coordinates[1], location.coordinates[0], scope);
            });
        }else if (this.state.locale !== ''){
            var service = new google.maps.LayerService();
            var scope = this.scope;
            var geocoder = new google.maps.Geocoder();
            let center = {lat: '', lng: ''};

            geocoder.geocode( { 'address': this.state.locale}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    //get location of nearest temple with distance from center, or results[0].geometry.location
                    var boundary = results[0].geometry.viewport;
                    center.lat = results[0].geometry.location.lat();
                    center.lng = results[0].geometry.location.lng();
                    service.identify(center, {layers: scope.layer, nearest: 1}, function(locations){
                        var closest = locations[0];
                        var bleft = boundary.b.b;
                        var bright = boundary.b.f;
                        var btop = boundary.f.b;
                        var bbottom = boundary.f.f;
                        if (closest.position.lat() > bbottom){
                            if (closest.position.lat() > btop){
                                //move top boundary
                                boundary.f.b = closest.position.lat();
                            }
                        } else {
                            //move bottom boundary
                            boundary.f.f = closest.position.lat();
                        }

                        if (closest.position.lng() > bleft){
                            if (closest.position.lng() > bright){
                                //move right boundary
                                boundary.b.f = closest.position.lng();
                            }
                        } else {
                            //move left boundary
                            boundary.b.b = closest.position.lng();
                        }
                        //set scope.map.fitbounds to the new boundary
                        scope.map.fitBounds(boundary);
                    });
                }
            })

            this.setState({
                locale: '',
                isBoxVisible: false,
                value: '',
                templeName: '',
                templeOrgId: ''
            })
            let inputs = document.getElementById('app').getElementsByTagName('INPUT')
            if (inputs != null) {
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].value = "";
                }
            }
        }
    }

    toggleDetails() {
        this.setState({templeOrgId: '', value: '', templeName: '', locale: ''});
        ReactDOM.findDOMNode(this.refs.searchInput).value = ''
    }

    keyPressed(e) {
        const tabs = document.querySelectorAll('[tabIndex]');
        if (e.key == "ArrowUp" || e.keycode == 38) {
            e.preventDefault();
            for (var i = 0; i < tabs.length; i++) {
                if (tabs[i] == e.target && (tabs[i - 1].tagName == "A" || tabs[i - 1].tagName == "INPUT")) {
                    tabs[i - 1].focus();
                    break;
                }
            }
        }

        if (e.key == "ArrowDown" || e.keycode == 40) {
            e.preventDefault();
            for (var j = 0; j < tabs.length; j++) {
                if (tabs[j] == e.target && (tabs[j + 1].tagName == "A" || tabs[j + 1].tagName == "INPUT")) {
                    tabs[j + 1].focus();
                    break;
                }
            }
        }

        if (e.key == "Enter" || e.keycode == 13) {
            if (e.target.type == 'search'){
                this.handleSubmit(e);
            } else {
                document.activeElement.click();
            }
        }
    }

    locationSearch(value) {
        const reg = new RegExp(value, 'i');
        const locations = this.props.templeList.reduce((accumulation, {
            country,
            stateRegion,
            city,
            status,
            ...props
        }) => {
            if (country.search(reg) != -1 && country != '' && status == "OPERATING") {
                if (accumulation.find(x => x[country]) != undefined) {
                    const i = accumulation.findIndex(x => x[country]);
                    accumulation[i][country].push({
                        country,
                        stateRegion,
                        city,
                        ...props
                    });
                    return accumulation
                } else {
                    let obj = {};
                    obj[country] = [
                        {
                            country,
                            stateRegion,
                            city,
                            ...props
                        }
                    ];
                    accumulation.push(obj);
                    return accumulation
                }
            } else if (stateRegion.search(reg) != -1 && stateRegion != '' && status == "OPERATING") {
                if (accumulation.find(x => x[stateRegion]) !== undefined) {
                    const i = accumulation.findIndex(x => x[stateRegion]);
                    accumulation[i][stateRegion].push({
                        country,
                        stateRegion,
                        city,
                        ...props
                    });
                    return accumulation
                } else {
                    let obj = {};
                    obj[stateRegion] = [
                        {
                            country,
                            stateRegion,
                            city,
                            ...props
                        }
                    ];
                    accumulation.push(obj);
                    return accumulation
                }
            } else if (city.search(reg) != -1 && city != '' && status == "OPERATING") {
                if (accumulation.find(x => x[city]) !== undefined) {
                    const i = accumulation.findIndex(x => x[city]);
                    accumulation[i][city].push({
                        country,
                        stateRegion,
                        city,
                        ...props
                    });
                    return accumulation
                } else {
                    let obj = {};
                    obj[city] = [
                        {
                            country,
                            stateRegion,
                            city,
                            ...props
                        }
                    ];
                    accumulation.push(obj);
                    return accumulation
                }
            } else {
                return accumulation;
            }
        }, []);
        return locations;
    }

    render() {
        const {templeList, templeDetails, placeholder, noResults} = this.props;
        const value = this.state.value.toLowerCase();
        let templeOrgId = this.state.templeOrgId;
        let templeName = this.state.templeName;
        let selectedTemple = {};
        if (templeOrgId && templeOrgId !== undefined) {
            selectedTemple = templeDetails && templeDetails.filter(temple => temple.templeOrgId === templeOrgId)
        }

        return (
            <div id="mapContainer">
                <div className={styles.searchContainer}>
                    <span className={styles.searchIcon}><Icon icon="search"/></span>
                    <input className={styles.search} onChange={this.handleChange} onKeyDown={this.keyPressed} id="pac-input" type="search" placeholder={placeholder && placeholder} autoFocus tabIndex="0" ref="searchInput"/>
                    <button type="button" value="submit" className={styles.submit} onClick={this.handleSubmit}>&#9656;</button>
                    <div id="map_resultsContainer" className={join(styles.resultsContainer, (this.state.isBoxVisible === true) && styles.show)} onBlur={this.handleOnBlur}>
                        <ul id="mapresults" className={styles.results}>
                            {templeList && templeList.filter(item => {
                                return item.name.toLowerCase().search(value) != -1 && item.status == 'OPERATING';
                            }).map((item, i) => (
                                <a key={i} tabIndex={i + 1} onClick={this.handleSubmit} onKeyDown={this.keyPressed} data-temple={item.name} data-id={item.templeOrgId} id={item.templeOrgId}>{item.name}</a>
                            ))}
                            {templeList && (templeList.filter(item => {return item.name.toLowerCase().search(value) != -1 && item.status == 'OPERATING';})[0] == null) &&
                                <span className={styles.noresults}>{noResults}</span>
                            }
                            {value.length > 1 && this.locationSearch(value)[0] &&
                                <hr />
                            }
                            {value.length > 1 && value !== '---' &&
                                this.locationSearch(value).map((item, i) => (
                                    <a key={i} tabIndex={i + 1} onClick={this.handleSubmit} onKeyDown={this.keyPressed} data-location={Object.keys(item)[0]}>{`${Object.keys(item)[0]} (${item[Object.keys(item)[0]].length})`}</a>
                                ))
                            }
                        </ul>
                    </div>
                    {(templeOrgId && templeOrgId !== '' && !this.state.isBoxVisible || templeName && templeName !== '' && !this.state.isBoxVisible) && <MapResults {...selectedTemple[0]} toggleDetails={this.toggleDetails} templeOrgId={templeOrgId} {...this.props}/>
}
                </div>

                <div id="map" className={styles.map}></div>
                <span id="geoLocation"><Icon icon="current-location" label="current-location"/></span>
            </div>
        );
    }
}
