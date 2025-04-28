<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP AJAX Serialize Form</title>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>

  <h1>PHP AJAX Serialize Form</h1>

  <form id="submit_form">
    <table>
      <!-- <tr>
        <td><label >ID</label></td>
        <td><input type="text" id="id" name="id" required></td>
      </tr> -->
      <tr>
        <td><label >Name</label></td>
        <td><input type="text" id="name" name="name" required></td>
      </tr>
      <tr>
        <td><label >Age</label></td>
        <td><input type="number" id="age" name="age" required></td>
      </tr>
      <tr>
        <td><label>Gender</label></td>
        <td >
          <label><input type="radio" name="gender" value="Male" required> Male</label>
          <label><input type="radio" name="gender" value="Female"> Female</label>
         </td>
      </tr>
      <tr>
        <td><label>Country</label></td>
        <td>
          <select id="country" name="country" required>
            <option value="USA">USA</option>
            <option value="Canada">Canada</option>
            <option value="UK">UK</option>
            <option value="Australia">Australia</option>
            <option value="India">India</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
            <input type="button" name="submit" id="submit" value="submit">
        </td>
      </tr>
    </table>
  </form>
<div id="response"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        $("#submit").click(function(){

           var name= $("#name").val();
           var age= $("#age").val();
          
           if(name == "" || age =="" || !$('input:radio[name=gender]').is(':checked'))   {
            $("#response").fadeIn();
            $("#response").removeClass('success-msg').addClass('error-msg').html('all fields are required.');
           }
           else{

            $.ajax({
                url:"save-form.php",
                type:"POST",
                data:$('#submit_form').serialize(),
                success:function(data){
                    $('#submit_form').trigger("reset");
                    $("#response").fadeIn();
            $("#response").removeClass('error-msg').addClass('success-msg').html(data);
            
            setTimeout(function(){
                $('#response').fadeOut("slow");
            },4000);
                }
            })
         }
        })
    })
</script>
  
</body>
</html>
