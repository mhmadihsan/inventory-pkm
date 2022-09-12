function show_delete(btn){
    const id = $(btn).data("id");
    Swal.fire({
        title: 'Apakah anda yakin menghapus data?',
        text: "data akan permanen di hapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Sekarang!'
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(window.location.origin + '/master/users/delete/'+id)
                .then(function (response) {
                    if (response.data.status == "failed") {
                        $(btn).attr('disabled', false);
                        Swal.fire({
                            position: 'top-end',
                            title: 'Error',
                            text: response.data.messages,
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 1200
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            title: 'Sukses',
                            text: response.data.messages,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $(btn).attr('disabled', false);
                        document.location.href = '/master/users'
                    }

                })
                .catch(function (error) {
                    //toastr.error("Error", response.data.messages, toastr_options.error.title)
                });
        }
        else{
            Swal.fire(
                'Peringatan!',
                'Batal menghapus Data',
                'warning'
            );
        }
    })
}
