<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Ajax Load More Pagination</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
        <div id="header">
          <h1>PHP & Ajax Load More Pagination</h1>
        </div>

        <div id="table-data">
            
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        function loadTable(page){
          
            $.ajax({
                url:"ajax-pagination.php",
                type:"POST",
                data:{page_no:page},
                success:function(data){
                    $("#table-data").html(data);

                }
            })
        }
        loadTable();

        //pagination code
        $(document).on("click","#pagination a",function(e){
            e.preventDefault();
            var page_id=$(this).attr("id");
            loadTable(page_id);
        })
    })
</script>
</body>
</html>