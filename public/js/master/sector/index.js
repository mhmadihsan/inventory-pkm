$(document).ready( function () {
   console.log('love you');
});

function submit_update(btn){
    var nama = $('#input_name').val();
    var deskripsi = $('#input_descripsi').val();
    var id = $('#input_id').val();
    if (nama.length > 0) {
        $(btn)
            .attr('disabled', true)

        axios.post(window.location.origin + '/master/sector/store', {
            id : id,
            nama : nama,
            deskripsi : deskripsi
        })
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
                    //toastr.success("Berhasil",response.data.messages, toastr_options.success.title)
                    $(btn).attr('disabled', false);
                    $('.modal').on('hidden.bs.modal', function(){
                        $(this).find('form')[0].reset();
                    });
                    document.location.href = '/master/sector'
                }

            })
            .catch(function (error) {
                console.log(error);
            })
    }
    else {

        Swal.fire({
            position: 'top-end',
            title: 'Error',
            text: 'Tidak ada data yang Diinput',
            icon: 'error',
            showConfirmButton: false,
            timer: 1200
        })
    }
}

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
            axios.delete(window.location.origin + '/master/sector/delete/'+id)
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
                        document.location.href = '/master/sector'
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

function submit_save(btn){
    var nama = $('#input_name').val();
    var deskripsi = $('#input_descripsi').val();
    if (nama.length > 0) {
        $(btn)
            .attr('disabled', true)

        axios.post(window.location.origin + '/master/sector/store', {
            nama : nama,
            deskripsi : deskripsi
        })
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
                    //toastr.success("Berhasil",response.data.messages, toastr_options.success.title)
                    $(btn).attr('disabled', false);
                    $('.modal').on('hidden.bs.modal', function(){
                        $(this).find('form')[0].reset();
                    });
                    document.location.href = '/master/sector'
                }

            })
            .catch(function (error) {
                //toastr.error("Error", response.data.messages, toastr_options.error.title)
            })
    }
    else {
        //toastr.error("Error", "Tidak ada data yang Diinput");
        Swal.fire({
            position: 'top-end',
            title: 'Error',
            text: 'Tidak ada data yang Diinput',
            icon: 'error',
            showConfirmButton: false,
            timer: 1200
        })
    }
}
