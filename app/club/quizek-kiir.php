<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" 
    src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Quizek</title>
</head>
<body>
    <form method="post" action="quizneve.php">
    <div class="row">
    <div class="col-sm-2 mb-3 mb-sm-0">
        <div class="card">
            <div class="card-body">
                <select name="quizek" id="quizek">
                    <option value="-1">Válaszható quizek</option>
                </select>
            </div>
        </div>
    </div>
    <input type="submit" value="Mutasd a Quizt!">
    </form>

    <script>
        $(document).ready(()=> {		
            $.ajax( 
            {
            url: "quizek_lekerdezes.php",
            type: 'POST',  // http method
            
        data: { clubid: new URLSearchParams(document.location.search).get("clubid") },  // data to submit
                dataType: 'json', // type of response data
                //timeout: 500,     // timeout milliseconds
                success: function (data,status,xhr) {   // success callback function
                    console.log(data)
          for(let i = 0; i< data.length;i++){
           // <option value="1">One</option>
                $('#quizek').append('<option value="'+data[i].id + '" >' + data[i].Nev + '</option>');

                //$('#dolgozok').append('<option value="' +data[i].id + '">' + data[i].Name + '</option>');
          }
                },
            });
    });


    </script>
    
</body>
</html>
