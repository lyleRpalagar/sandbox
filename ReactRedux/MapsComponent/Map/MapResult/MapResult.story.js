import {storiesOf, action} from "@kadira/storybook";
import MapResult from "./MapResult";

storiesOf('MapResult', module)

    .add('default', () => (
        <MapResult/>)
    )
    .add('openResults', () => (
        <MapResult
            templeTitle = "Bountiful Utah Temple"
            templeAddress = "640 South Bountiful Boulevard Bountiful, Utah 84010-1394 United State"
            templePhone = "(1)801-296-2100"
            templeDirections="Directions"
            templeInfoLink="More Info"
            templePhotoLink="Photos"
            templeOrgId = "32"
        />)
    )
    .add('closeResults', () => (
        <MapResult
            templeTitle = "Bountiful Utah Temple"
            templeAddress = "640 South Bountiful Boulevard Bountiful, Utah 84010-1394 United State"
            templePhone = "(1)801-296-2100"
            templeDirections="Directions"
            templeInfoLink="More Info"
            templePhotoLink="Photos"
            templeOrgId = "32"
        />)
    )