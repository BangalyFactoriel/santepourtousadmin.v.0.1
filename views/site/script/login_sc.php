<script>function connexion() {
        var button = document.querySelector("#kt_sign"); var index = 1; var requiredField = ['username', 'password']; $('#kt_sign').prop('disabled', !0); var search = window.location.search; var formValidation = !1; button.setAttribute("data-kt-indicator", "on"); formValidation = formValidator(index, requiredField); if (formValidation !== !0) { button.removeAttribute("data-kt-indicator"); $('#kt_sign').prop('disabled', !1); return !1 }
        $('#kt_sign_in_form').submit()
    }
    
   
   

// Initialize Fullcalendar -- for more info please visit the official site: https://fullcalendar.io/demos

</script>