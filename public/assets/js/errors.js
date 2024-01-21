const error = document.querySelector('#errors');
if (error) {

    const errorExist = error.value;
    console.log(errorExist);

    let toastElement = document.getElementById('customToast');
    let toast = new bootstrap.Toast(toastElement);
    toast.show();
}

