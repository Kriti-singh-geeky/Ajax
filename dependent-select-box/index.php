<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dynamic dependent select box</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>dynamic dependent select box in <br> PHP & jQuery Ajax</h1>
        </div>

        <div id="content">
            <form method="">
                <label >country :</label>
                <select  id="country">
                    <option value="">select country</option>
                </select>

                <br>
                <br>
                <label >state :</label>
                <select  id="state">
                    <option value=""></option>
                </select>
            </form>

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        function loadData(type,category_id){
         $.ajax({
            url:"load-cs.php",
            type:"POST",
            data:{type:type,id:category_id},
            success:function(data){
                if(type=="stateData"){
                    $("#state").html(data);
                }else{
                    $("#country").append(data);
                }
               
            }
         });
        }
        loadData();

        $("#country").on("change",function(){
            var country=$("#country").val();
            if(country !=""){
                loadData("stateData",country);
            }else{
                $("#state").html("");
            }
           
        })
    });
  </script>
</body>
</html>