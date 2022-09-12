function submit_save(btn){
    var pegawai = $('#input_employess').val();
    var email = $('#input_email').val();
    var password = $('#input_password').val();
    var role = $('#input_role').val();
    if (pegawai.length > 0) {
        $(btn)
            .attr('disabled', true)

        axios.post(window.location.origin + '/master/users/store', {
            pegawai : pegawai,
            email : email,
            password : password,
            role : role
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
                    document.location.href = '/master/users'
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
