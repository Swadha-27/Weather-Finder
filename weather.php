<?php 
$weather="";
$error="";
if (array_key_exists('city',$_GET)){
    $city=str_replace(' ','',$_GET['city']);
    $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
        
        if(!$file_headers||$file_headers[0] == 'HTTP/1.1 404 Not Found') {
    
            $error = "That city could not be found.";

        } 
    else {
    $forecast=file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
    $array=explode('(1&ndash;3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">',$forecast);
    $arr=explode('</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9"><span class="b-forecast__table-description-title"><h2>',$array[1]);
    $weather=$arr[0];  
}}
?>
<html lang="en">
  <head>
      <style>
          body{
              background: url("w.jpg") center fixed;
              background-size: cover;
              margin:0 auto;
          }
          .wrapper{
              text-align: center;
              position: absolute;
              top:27%;
              left:30%; 
              color:white;
              width:35%
          } 
          #weather{
              margin-top:40px;
          }
          
      </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Weather Finder </title>
  </head>
  <body>
    <div class=wrapper>  
        <h1>What's the Weather?</h1>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Enter the name of a city..!</label>
                <input type="text" class="form-control" name="city"  placeholder="For eg London,India">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>           
        </form>
        <div id=weather>
        <?php 
      
        if ($error){
            echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
        }
        else if ($weather){
            echo '<div class="alert alert-info" role="alert">'.$weather.'</div>';
        }
        ?>
        </div>        
    </div>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
        
</html>