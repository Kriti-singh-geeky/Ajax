<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete multiple data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
        <div id="header">
           <h1>delete multiple data with <br> PHP & Ajax CRUD</h1>
        </div>

        <div id="sub-header">
        <button id="delete-btn">delete</button>
        </div>

        <div id="table-data">
          
        </div>
    </div>

    <div id="error-message"></div>
    <div id="success-message"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            function loadData(){
                $.ajax({
                    url:"load-data.php",
                    type:"POST",
                    success:function(data){
                        $("#table-data").html(data);
                    }
                });
            }
            loadData();

            $("#delete-btn").on("click",function(){
                var id=[];

                $(":checkbox:checked").each(function(key){
                    id[key]=$(this).val();
                });

                if(id.length===0){
                    alert("plz select atleast one checkbox");
                }
                else{
                   if(confirm("do you really want to deleet these records ?")){
                    $.ajax({
                        url:"delete-data.php",
                        type:"POST",
                        data:{id:id},
                        success:function(data){
                            if(data==1){
                                $("#success-message").html("data deleted successfully.").slideDown();
                                $("#errro-message").slideUp();
                                loadData();
                            }
                            else{
                                $("#errro-message").html("can't delete data.").slideDown();
                                $("#success-message").slideUp();
                            }
                              
                        }
                    });
                   }
                }
            })
        });
    </script>
</body>
</html>