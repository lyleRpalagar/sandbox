import { Component as ReactComponent } from 'react';
import { connect } from 'react-redux';

import Map from '../templates/Map/';

import Error from '../templates/Error/';
import safeGet from 'lodash.get';

// Step 1: Pull in the function for the action.
import  {getTempleMapDetailsData, getSingleTempleMapDetailsData} from '../store/map/actions.js';
import { retrieveSingleTempleDetail, fetchMapDetailsData } from '../store/map/services.js';

// Step 2: This connects the action, to dispatch the action.
const mapActionsToDispatch = (dispatch) => ({
    loadTempleMapDetailsData: (reqContext) => dispatch( getTempleMapDetailsData(reqContext) ),
    onSubmit : (id,name) => dispatch( getSingleTempleMapDetailsData(id,name) )
});


// Step 3: This takes the connected action and merges it to a prop for React.
const mergeProps = (state, actions) => ({
    ...state,
    ...actions,
    loadTempleMapDetailsData: (reqContext) => actions.loadTempleMapDetailsData(reqContext)
});


// Step 4: Merging it to a prop makes it available in the component,
// in this case on the componentDidMount life cycle event.
// This could just as easily be a click, submit, type, or other type of event.

class TempleMapContainer extends ReactComponent {
    componentWillMount() {
        const {loadTempleMapDetailsData, reqContext} = this.props;
        loadTempleMapDetailsData(reqContext);
    }

    render() {
        if (this.props.errorStatus >= 400) {
            return <Error {...this.props} />
        }
        else {
            return <Map { ...this.props } />
        }
    }

    // used by _server.js
    fetchData(reqContext) {
        return fetchMapDetailsData(reqContext);
    }

    // used by _server.js
    reducerName() {
        return 'mapDetails';
    }
}

 import {
     selectTempleList,
     selectTempleDetails,
     selectTempleDetailsAddress,
     selectTempleDetailsTelephone,
     selectTempleNameId,
     selectTempleTitle,
     selectTempleUnitNumber,
     selectTempleMapStringDirection,
     selectTempleMapStringMoreInfo,
     selectTempleMapStringPhotos,
     selectNoResults

 } from '../store/map/selectors.js';

const mapStateToProps = (state) =>
{
    return {
        templeList: selectTempleList(state),
        templeDirections:selectTempleMapStringDirection(state),
        templeInfoLink: selectTempleMapStringMoreInfo(state),
        templePhotoLink: selectTempleMapStringPhotos(state),
        templeDetails: selectTempleDetails(state),
        templeAddress: selectTempleDetailsAddress(state),
        templePhone: selectTempleDetailsTelephone(state),
        templeNameId:selectTempleNameId(state),
        templeTitle:selectTempleTitle(state),
        templeUnitNumber:selectTempleUnitNumber(state),
        noResults:selectNoResults(state),
        // properties for error page
        errorPage: {
            errorPageNotFoundTitle: safeGet(state,'error.pageNotFoundTitle'),
            errorPageNotFoundDesc: safeGet(state,'error.pageNotFoundDesc'),
            errorOtherTitle: safeGet(state,'error.otherTitle'),
            errorOtherDesc: safeGet(state,'error.otherDesc')
        }
    };
};

export default connect(mapStateToProps, mapActionsToDispatch, mergeProps)(TempleMapContainer);
