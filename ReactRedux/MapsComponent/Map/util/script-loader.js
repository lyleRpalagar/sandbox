export const loadScript = (scriptLocation) => {
    // checks to see if window is loaded
    if (typeof window !== 'undefined') {

        //  create scripts;
        const script = document.createElement('script');
        // find first script of the DOM
        const firstScript = document.querySelector('script');

        // append location
        script.src = scriptLocation;

        // optional attributes
        script.async = true;
        script.defer = true;

        // optional, checks for state of the script
        script.onload = script.onreadystatechange = function(){
            var rs = this.readyState;
            if(rs && rs !== 'complete' && rs !== 'loaded') { return; }
        };

        // appends before the first script of the page
        firstScript.parentNode.insertBefore(script, firstScript);
    }
};


export default loadScript;
