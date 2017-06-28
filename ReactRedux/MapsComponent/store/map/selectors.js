import safeGet from 'lodash.get';
import safeSet from 'lodash.set';


export const selectTempleList = (state) => (
     safeGet(state,'mapDetails.templeList',[])
);

export const selectTempleDetails = (state) => (
    safeGet(state,'mapDetails.templeInformation.details', [])
);

export const selectTempleDetailsAddress = (state) => (
    safeGet(state,'mapDetails.templeInformation.details[0].addLine1', '') + safeGet(state,'mapDetails.templeInformation.details[0].addLine2', '') + safeGet(state,'mapDetails.templeInformation.details[0].addLine3', '')
);

export const selectTempleDetailsTelephone = (state) => (
    safeGet(state,'mapDetails.templeInformation.details[2].telephone', '')
);

export const selectTempleNameId = (state) => (
    safeGet(state,'mapDetails.templeInformation.templeNameId', '')
);

export const selectTempleTitle = (state) => (
    safeGet(state,'mapDetails.templeInformation.title', '')
);

export const selectTempleUnitNumber = (state) => (
    safeGet(state,'mapDetails.templeInformation.unitNumber', '')
);

export const selectTempleMapStringDirection = (state) => (
    safeGet(state,'mapDetails.mapStrings.direction','')
);

export const selectTempleMapStringMoreInfo = (state) => (
    safeGet(state,'mapDetails.mapStrings.moreInfo','')
);

export const selectTempleMapStringPhotos = (state) => (
    safeGet(state,'mapDetails.mapStrings.photos','')
);

export const selectNoResults = (state) => (
    safeGet(state, 'mapDetails.noResults','')
);
