    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    const payment = document.querySelector('.payment');

    payment.onkeyup = function() {
        var removeChar = this.value.replace(/[^0-9\.]/g, ''); // This is to remove alphabets and special characters.
        // console.log(removeChar);
        var removeDot = removeChar.replace(/\./g, ''); // This is to remove "DOT"
        this.value = removeDot

        var formatedNumber =  this.value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        console.log(formatedNumber);
        this.value = formatedNumber !== '' ?'$ ' +  formatedNumber :formatedNumber;
    }
