

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;
0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<style>

body{
        background-color:   rgb(136, 25, 169);
        font-family: "Poppins", sans-serif;
}

.img-div{
    display: flex;
    justify-content:space-between;
    align-items: center;
}

.city-div{
    display: flex;
    justify-content:center;
    align-items: center;
}

.city-d{
    display: flex;
    justify-content:center;
    align-items: center;
}

.city-div i{
   font-size:3rem;

}

.city-d i{
   font-size:3.5rem;

}

.city-d p{
   font-size:3rem;

}

.div-one{
    display: flex;
    justify-content:center;
    align-items: center;
}

.other{
    display: flex;
    justify-content:space-between;
    align-items: center;
}

</style>
<body>
<div class="container">
    <h1 class="text-center m-3 text text-light fw-bold">WEATHER FORECASTS</h1>
       
<form method="post" class="row g-3 needs-validation" novalidate>
<input class="col-md-8 p-3 rounded border-0 mx-auto" type="search" placeholder="Search Your City" name="city">
<button class="btn btn-outline-light col-4 p-3 rounded btn btn-warning border-0 mx-auto" type="submit" name="submit">Search</button>
<?php
if(isset($_POST['submit'])){
    if(empty($_POST["city"])){
        echo "Enter City Name";
    }else{
        $city = $_POST["city"];
        $api_key = "41dc7e3acf674f6ab3e51954242404";
        $api = "https://api.weatherapi.com/v1/forecast.json?key=$api_key&q=$city&days=1&aqi=no&alerts=no";
        $api_data = file_get_contents($api);
        // echo $api_data;
        $weather = json_decode($api_data , true);
        // echo $weather['current']['temp_c'];
        // echo $weather['current']['condition']['text']

?>
<div class="city-d text-center">
    <i class="uil uil-location-point text text-light "></i>
    <p class="city text text-light fw-bolder" name="city_name"><?php echo $city ?></p>
</div>

 <div class="img-div">


    <div class="div-one">
    <div class="city-div  my-3">
    <i class="uil uil-temperature-half text text-light "></i>
    <p class="temp text text-light fs-5 fw-bolder">Temprature -  <?php echo $weather['current']['temp_c']; ?>°C</p>
    </div>
    </div>
    
   
    
    <img src='<?php echo $weather['current']['condition']['icon'] ?>' alt="Weather Image"  style="width:250px;height:250px;">

    
     <div class="div-two">
    <div class="city-div  my-3">
    <i class="uil uil-tear text text-light"></i>
    <p class="text text-light fs-5 fw-bolder">Humidity - <?php echo $weather['current']['humidity']; ?>%</p>
    </div>
    
    <div class="city-div  my-3">
    <i class="uil uil-raindrops text text-light"></i>
    <p class="text text-light fs-5 fw-bolder">Percipitation minimum - <?php echo $weather['current']['precip_in']; ?>%</p>
    </div>

    <div class="city-div  my-3">
    <i class="uil uil-raindrops-alt text text-light"></i>
    <p class="text text-light fs-5 fw-bolder">Percipitation Maximum -  <?php echo $weather['current']['precip_mm']; ?>%</p>
    </div>

    <div class="city-div  my-3">
    <i class="uil uil-wind text text-light"></i>
    <p class="text text-light fs-5 fw-bolder">Wind Speed<?php echo $weather['current']['wind_kph']; ?>%</p>
    </div>
    </div>
 </div>

 

 <?php

    }
}
    ?>

    
</form>

</div>


</body>
</html>