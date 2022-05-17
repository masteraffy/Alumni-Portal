 <!-- Bootstrap core JavaScript-->
 <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/cf0f50b81d.js" crossorigin="anonymous"></script>

    <!--CleaveJs Link-->
    <script src="https://nosir.github.io/cleave.js/dist/cleave.min.js"></script>
    <script src="https://nosir.github.io/cleave.js/dist/cleave-phone.i18n.js"></script>

    <!--CleaveJS Implementation to Input Fields -->
    <script>
        var cleaveCustom = new Cleave('.format-studNo', {
            blocks: [2,5],
            delimiter: '-',
        });

        function edValueKeyPress()
    {
        var edValue = document.getElementById("edValue");
        var s = edValue.value;

        var lblValue = document.getElementById("lblValue");

      if  ( s >=48 && s <= 57)

         // to check whether pressed key is number or not 
               return true; 


         else return false;



    }
        
    </script>
    
   <script>
        $(document).ready(function () {
    $('.dataTableDESC').DataTable({
        order: [[3, 'desc']],
        paging: true
    });
    });
    $(document).ready(function () {
    $('.dataTableASC').DataTable({
        
        paging: true
    });
    });
     
   $(document).ready(function() {
    jQuery.noConflict();
    if (window.location.toString().includes("Changepass")) {
        $('#changepassword').modal('show');
    }
    if (window.location.toString().includes("Updated")) {
        alert("Password Updated Successfully")
    }
    $("#newpw,#confrimpw").keyup(function(){
            var pass=$("#newpw").val();
            var cpass=$("#confrimpw").val();
            if(pass.length < 5){
                    $("#errorChange").empty();
                    $("#changepassBtn").attr('disabled','disabled');
                    $("#errorChange").append(`
                    <div class="alert alert-danger" role="alert">
                        Password should be more than 6 characters
                    </div>
                    `);
            }
            else{
                if(pass!=cpass){
                    $("#errorChange").empty();
                    $("#changepassBtn").attr('disabled','disabled');
                    $("#errorChange").append(`
                    <div class="alert alert-danger" role="alert">
                        Password and Confirm password doesn't match!
                    </div>
                    `);
                
                }
                else{
                    $("#changepassBtn").removeAttr('disabled');
                    $("#errorChange").empty();
                }
            }
        });
  });


  //filtering
  $(document).ready(function(){
                    $("#fetchval").on('change', function(){
                        var value = $(this).val();
                        //alert(value);

                        $.ajax({
                            url:'fetch.php',
                            type:'POST',
                            data:'request='+value,
                            beforeSend:function(){
                                $(".card-body").html("<span>Working...</span>");
                            },
                            success:function(data){
                                $(".card-body").html(data);
                            }
                        })
                        
                    })
            });
   </script>



