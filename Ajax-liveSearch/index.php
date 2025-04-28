<!DOCTYPE html>
<html>

<head>
    <title>PHP with Ajax</title>
   <link rel="stylesheet" href="style.css">
   
</head>

<body>

    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>Add Records with PHP & Ajax</h1>

                <div id="search-bar">
                  <label>Search :</label>
                  <input type="text" id="search" autocomplete="off">
                </div>
            </td>
        </tr>

        <tr>
            <td id="table-form">
                <form id="addForm">
                    First Name : <input type="text" id="fname">
                    Last Name :<input type="text" id="lname">
                    <input type="submit" value="save" id="save-button">
                </form>
            </td>
        </tr>

        <tr>
            <td id="table-data">
                <!-- Data will be loaded here -->
            </td>
        </tr>
    </table>

    <div id="error-message"></div>
    <div id="success-message"></div>

    <div id="modal">
        <div id="modal-form">
            <h2>Edit form</h2>
            <table cellpadding="10px" width="100%">
                

            </table>
            <div id="close-btn">X</div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    $(document).ready(function() {
        //load table records
        function loadTable() {
            $.ajax({
                url: 'ajax_load.php',
                type: 'POST',
                success: function(data) {
                    $('#table-data').html(data);
                }
            });
        }
        loadTable(); //load table record on page load
           
        //insert new records
        $("#save-button").on("click", function(e) {
            e.preventDefault();
            var fname = $("#fname").val();
            var lname = $("#lname").val();

            if (fname == "" || lname == "") {
                $("#error-message").html("all fields are required.").slideDown();
                $("#success-message").slideUp();
            } else {
                $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data: {
                        first_name: fname,
                        last_name: lname
                    },
                    success: function(data) {
                        if (data == 1) {
                            loadTable();
                            $("#addForm").trigger("reset");
                            $("#success-message").html("data inserted successfully.")
                                .slideDown();
                            $("#error-message").slideUp();
                        } else {
                            $("#error-message").html("can't save record.").slideDown();
                            $("#success-message").slideUp();
                        }
                    }
                });
            }
        })

        //delete records
        $(document).on("click",".delete-btn",function(){

            if(confirm("Do you really want to delete this record ?")){

            var studentId=$(this).data("id");
            var element=this;

            $.ajax({
                url:"ajax_delete.php",
                type:"POST",
                data:{id:studentId},
                success:function(data){
                    if(data==1){
                        $(element).closest("tr").fadeOut();
                    }else{
                        $("#error-message").html("can't delete record.").slideDown();
                        $("#success-message").slideUp();
                    }
                    
                }
            
            });
        }
        })

        //show modal box
        $(document).on("click",".edit-btn",function() {
            $("#modal").show();

            var studentId=$(this).data("eid");

            $.ajax({
                url:"load_update_form.php",
                method:"POST",
                data:{id:studentId},
                success:function(data){
                    $("#modal-form table").html(data);
                }
            })
        });

        //hide modal box
        $("#close-btn").on("click", function() {
            $("#modal").hide();
        });

        //save update form
        $(document).on("click","#edit-submit",function(){
           var stuId=$("#edit-id").val();
           var fname=$("#edit-fname").val();
           var lname=$("#edit-lname").val();

           $.ajax({

            url:"ajax_update_form.php",
            method:"POST",
            data:{id:stuId,first_name:fname,last_name:lname},
            success:function(data){
                if(data==1){
                    $("#modal").hide();
                    loadTable();
                }
            }
           })
        })

        //live search
        $("#search").on("keyup", function() {
            var search_term=$(this).val();

            $.ajax({
                url:"ajax_live_search.php",
                method:"POST",
                data:{search:search_term},
                success:function(data){
                    $("#table-data").html(data);
                }
            })
        })
    });
    </script>

</body>

</html>