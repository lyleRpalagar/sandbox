import { storiesOf } from '@kadira/storybook';
import Map from './Map.js';

const data = [
	{
		name: "Aba Nigeria Temple",
		location: "Aba, Abia, Nigeria",
		status: "OPERATING",
		date: "August 7, 2005",
		templeNameId: "aba-nigeria-temple",
		city: "Aba",
		stateRegion: "Abia",
		country: "Nigeria",
		sortDate: "August 7, 2005",
		templeOrgId: "365904"
	},
	{
		name: "Accra Ghana Temple",
		location: "Accra, Ghana",
		status: "OPERATING",
		date: "January 11, 2004",
		templeNameId: "accra-ghana-temple",
		city: "Accra",
		stateRegion: "Ashanti",
		country: "Ghana",
		sortDate: "January 11, 2004",
		templeOrgId: "706418"
	},
	{
		name: "Adelaide Australia Temple",
		location: "Adelaide, South Australia, Australia",
		status: "OPERATING",
		date: "June 15, 2000",
		templeNameId: "adelaide-australia-temple",
		city: "Marden",
		stateRegion: "South Australia",
		country: "Australia",
		sortDate: "June 15, 2000",
		templeOrgId: "273090"
	}
];

const templeDetails = [
	{
		templeTitle: "Aba Nigeria Temple", // is redundant with name
		templeAddress: "72-80 Okpu-Umuobo Rd, Aba",
		templePhone: "(234) 80-3903-4804",
		templeDirections: "Directions",
		templeInfoLink: "More Info",
		templePhotoLink: "Photos",
		templeOrgId: "365904"
	},{
		templeTitle: "Accra Ghana Temple", // is redundant with name
		templeAddress: "Accra Ghana Temple Complex, 57 Independence Ave, North Ridge",
		templePhone: "(233) 302-650-123",
		templeDirections: "Directions",
		templeInfoLink: "More Info",
		templePhotoLink: "Photos",
		templeOrgId: "706418"
	},{
		templeTitle:"Adelaide Australia Temple", // is redundant with name
		templeAddress: "53-59 Lower Portrush Rd, Marden SA 5070",
		templePhone: "(61) 8-8363-8000",
		templeDirections: "Directions",
		templeInfoLink: "More Info",
		templePhotoLink: "Photos",
		templeOrgId: "273090"
	}
]



storiesOf('Maps Template', module)

    .add('Default', () => (
        <Map
            templeList={data}
            templeDetails={templeDetails}
            placeholder="Enter temple name or location"
        />)
    )
