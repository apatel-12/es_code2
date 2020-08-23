class FormFiller {

    static apply(data) {

        let key;

        for ( key in data ) {
            console.log(key);
            console.log(data[key]);
            if ( document.getElementById(key) ) {
                
                document.getElementById(key).setAttribute('value', data[key]);
            }
        }

    }

}