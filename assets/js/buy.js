const submit_conbuying = document.getElementById('submit-conbuying');

submit_conbuying.addEventListener('click', () => {
    let registration = document.getElementById('registration');
    let re = registration.value.split('-');

    let id = document.getElementById('brand');
    let id_db = id.value.split('-');
    if (re[0] == 'NULL') {
        Swal.fire({
            title: "Please select a car?",
            text: "ยังมีบ้างช่องที่ยังไม่ได้เลือก",
            icon: "error"
        });
    }else if (id_db[2] == "Member") {
        Swal.fire({
            title: "Confirm?",
            text: "คุณต้องการที่จะบันทึกข้อมูลใช่หรือไม่?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                Swal.fire(
                    'Saved!',
                    'Your file has been saved.',
                    'success'
                )
                setTimeout(() => {
                    window.location.assign("http://localhost/assets/php/buycar.php?re=" + re[0]+"&id=" + id_db[1]+"&access=" + id_db[2]);
                }, 1000);
            }
            
        })
    }
    console.log(id_db);
});
