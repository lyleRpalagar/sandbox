import {fetchMapDetailsData, retrieveSingleTempleDetail}  from './services.js';


export const GET_TEMPLE_MAP_DETAILS_DATA = `GET_TEMPLE_MAP_DETAILS_DATA`;
export const GET_SINGLE_TEMPLE_MAP_DETAILS_DATA = `GET_SINGLE_TEMPLE_MAP_DETAILS_DATA`;

/* Sync Action Creators */
export const addTempleMapDetailsData = (templeMapDetailsData = []) =>({
    type: GET_TEMPLE_MAP_DETAILS_DATA,
    payload: templeMapDetailsData
});

/* Sync Action Creators */
export const addSingleTempleMapDetailsData = (singleTempleMapDetailsData = []) =>({
    type: GET_SINGLE_TEMPLE_MAP_DETAILS_DATA,
    payload: singleTempleMapDetailsData
});


/* Async Action Creators */
export const getTempleMapDetailsData = (reqContext) => (dispatch) => {
    fetchMapDetailsData(reqContext)
        .then( (templeMapDetailsData) => {
            dispatch(addTempleMapDetailsData(templeMapDetailsData));
        })
};

/* Async Action Creators */
export const getSingleTempleMapDetailsData = (id,name) => (dispatch) => {
    retrieveSingleTempleDetail(id,name)
        .then( (singleTempleMapDetailsData) => {
            dispatch(addSingleTempleMapDetailsData(singleTempleMapDetailsData));
        })
};
