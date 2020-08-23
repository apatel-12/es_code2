

document.addEventListener('DOMContentLoaded', 
    function() {

        const form = document.getElementById('employee_record');

        loadData(1).then(
            function(employee_data) {
                console.log(employee_data);
                FormFiller.apply(employee_data);
            }
        )

        form.addEventListener('submit',
            function( e ) {

                e.preventDefault();

                let api = new EmployeeApi();


                alert('here');
                return false;
            }
        );

    }
);

const loadData = function( id ) {

    let api = new EmployeeApi();
    return api.getData(id);
    
}

