
<script type="text/javascript">
    $(document).ready(function(){
        $(".btnUtilisateurs").click(function(){
        var code = $(this).attr("data-id");
        var prenom = $(this).attr("data-prenom");
        var nom = $(this).attr("data-nom");
        var email = $(this).attr("data-email");
         $('#nomUpdate').val(nom);
         $('#prenomUpdate').val(prenom);
         $('#mailUpdate').val(email);
         $('#mailUpdate').val(email);

         $('#modifielUpdate').val(true);
    
          $("#action_on_this").val(code);
          $.post(
            '<?= $url ?>', 
            {code:code, _csrf: '<?= $csrf ?>' },
            function(response)
                {
                    console.log(response);
                    var listrole = response;

                    $("#listrole").empty();
                 $("#listrole").append(listrole);
                    
                    // });
                }
         );

            // console.log(codeIndiv);
        });
        $(".btndesactifUsers").click(function(){
        var code = $(this).attr("data-id");
        var action = $(this).attr("data-actiion");
        
        $.post(
            '<?= $url2 ?>', 
            {code:code,action:action, _csrf: '<?= $csrf ?>' },
            function(response)
                {
           
                    
                }
         );
         window.location.reload();
        });
    });
    
							$("#kt_datatable_zero_configuration").DataTable();

    
</script>   