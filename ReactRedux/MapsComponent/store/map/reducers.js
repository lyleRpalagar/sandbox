import {GET_TEMPLE_MAP_DETAILS_DATA, GET_SINGLE_TEMPLE_MAP_DETAILS_DATA} from './actions.js';

export const mapDetails = (state = [], { type, payload = [] }) => {
    switch(type) {
        case GET_TEMPLE_MAP_DETAILS_DATA:
            return payload;

        case GET_SINGLE_TEMPLE_MAP_DETAILS_DATA:
            return {...state, ...payload};
        default:
            return state;
    }
};
