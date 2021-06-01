// ! Note: Code in this file is used at several location throughout the application.
// ! Hence, be aware of this while making changes to this file

// delete row data function which is common for all html tables
document.querySelectorAll('.deleteDataRowBtn').forEach(item => {
    item.addEventListener('click', function () {
        let url = document.querySelector('#deleteUrl').value;
        let pk = this.id;

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger me-3',
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // perform fetch API call here
                fetch(
                    url,
                    {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRFToken': csrftoken,
                        },
                        body: JSON.stringify({
                            'pk': pk,
                        }),
                    },
                ).then(function (response) {
                    if(response.status === 200) {
                        return response.json();
                    } else {
                        return {
                            'process' : 'failed',
                        };
                    }
                    // window.location.reload();
                }).then(function (response) {
                    if(response.process === 'success') {
                        // request succeeded
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'The selected data has been deleted.',
                            'success'
                        ).then(function (result) {
                            window.location.reload();
                        })
                    } else {
                        // request failed
                        let message = 'Request was not unsuccessful! Please contact the system administrator.';
                        if(response.message !== undefined) {
                            message = response.message;
                        }
                        swalWithBootstrapButtons.fire(
                            'Failed!',
                            message,
                            'error'
                        );
                    }
                });
        
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'No action taken',
                    'The selected data is safe',
                    'info'
                );
            }
        });

    });
});
