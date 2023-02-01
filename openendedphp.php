<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
    

    <title>Hello, world!</title>
  </head>
  <body>
    
    <?php
    var_dump($_POST);
    echo($_POST['radius']);
    ?>

    <?php
    $feedback = '';
    $done = true;
    $value = 0;
    $shape = "";
     // var_dump($_POST['email']);
    if (isset($_POST['radius']) === true || isset($_POST['height']) === true || isset($_POST['width']) === true || isset($_POST['length']) === true) {
        if($_POST['shape'] == 1){
            if($_POST['radius'] == null){
                $feedback .= "<li>please enter radius</li>";
                $done = false;
            }
            if($_POST['height'] == null){
                $feedback .= "<li>please enter height</li>";
                $done = false;
            }
        }
        if($_POST['shape'] == 2){
            if($_POST['radius'] == null){
                $feedback .= "<li>please enter radius</li>";
                $done = false;
            }
        }
        if($_POST['shape'] == 3){
            if($_POST['radius'] == null){
                $feedback .= "<li>please enter radius</li>";
                $done = false;
            }
            if($_POST['height'] == null){
                $feedback .= "<li>please enter height</li>";
                $done = false;
            }
        }
        if($_POST['shape'] == 4){
            if($_POST['length'] == null){
                $feedback .= "<li>please enter length</li>";
                $done = false;
            }
            if($_POST['height'] == null){
                $feedback .= "<li>please enter height</li>";
                $done = false;
            }
            if($_POST['width'] == null){
                $feedback .= "<li>please enter width</li>";
                $done = false;
            }
        }
        if($_POST['shape'] == 5){
            if($_POST['length'] == null){
                $feedback .= "<li>please enter length</li>";
                $done = false;
            }
            if($_POST['height'] == null){
                $feedback .= "<li>please enter height</li>";
                $done = false;
            }
            if($_POST['width'] == null){
                $feedback .= "<li>please enter width</li>";
                $done = false;
            }
        }
        
        function calcCylinder($rad , $hei): float{
            return pi() * $rad * $rad * $hei;
        }
        function calcSphere($rad): float{
            return 4/3 * pi() * $rad * $rad * $rad;
        }
        function calcCone($rad, $hei): float{
            return 1/3 * pi() * $rad * $rad * $rad;
        }
        function calcPyramid($hei, $wid, $len): float{
            return 1/3 * $wid * $len * $hei;
        }
        function calcCuboid($hei, $wid, $len): float{
            return $wid * $len * $hei;
        }

        if($done == true){
            if($_POST['shape'] == 1){
                $shape = "Cylinder";
                $value = calcCylinder($_POST['radius'], $_POST['height']);
            }
            if($_POST['shape'] == 2){
                $shape = "Sphere";
                $value = calcSphere($_POST['radius']);
            }
            if($_POST['shape'] == 3){
                $shape = "Cone";
                $value = calcCone($_POST['radius'], $_POST['height']);
            }
            if($_POST['shape'] == 4){
                $shape = "Pyramid";
                $value = calcPyramid($_POST['height'], $_POST['width'], $_POST['length']);
            }
            if($_POST['shape'] == 5){
                $shape = "Cuboid";
                $value = calcCuboid($_POST['height'], $_POST['width'],$_POST['length']);
            }
        }
    }

    ?>






    <div class="row d-flex justify-content-center">
        <h1 class="d-flex justify-content-center col-sm-8 col-12">Volume Calculator</h1>
    </div>
    <div class="form-row d-flex justify-content-center">
        <div class="col-sm-8 col-12">
            
            <form method="post">
                <div class="row">
                    <div class="input-group mb-3">
                        <select class="form-control bg-info text-white"  id="shape" name="shape">
                            <option class="dropdown-item bg-info" href="#" value="1">Cylinder</option>
                            <option class="dropdown-item bg-info" href="#" value="2">Sphere</option>
                            <option class="dropdown-item bg-info" href="#" value="3">Cone</option>
                            <option class="dropdown-item bg-info" href="#" value="4">Pyramid</option>
                            <option class="dropdown-item bg-info" href="#" value="5">Cuboid</option>
                        </select>
                    </div>
                    <div name="rad" id="rad" class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">radius</div>
                        </div>
                        <input type="text" class="form-control" name="radius" id="radius" placeholder="Please enter radius">
                    </div>
                    <div name="hei" id="hei" class="input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">height</div>
                        </div>
                        <input type="text" class="form-control" name="height" id="height" placeholder="Please enter height"> 
                    </div>
                    <div name="len" id="len" class="d-none input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">length</div>
                        </div>
                        <input type="text" class="form-control" name="length" id="length" placeholder="Please enter length"> 
                    </div>
                    <div name="wid" id="wid" class="d-none input-group mb-3 col-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">width</div>
                        </div>
                        <input type="text" class="form-control" name="width" id="width" placeholder="Please enter width"> 
                    </div>
                </div>
                <button type="submit" value="Submit" id="registerbttn" class="btn bg-primary text-white">submit</button>
            </form>
            
            <?php
                // die(var_dump($feedback));
                if(isset($_POST['radius']) === true && strlen($feedback)>0){
                    echo '<div class="col-12 bg-danger text-white mt-4 p-3">';
                    echo $feedback;
                    echo '</div>';
                }
                if(isset($_POST['radius']) === true && $done == true){
                    echo '<div class="col-12 bg-success text-white mt-4 p-3">';
                    echo "The volume of the $shape is: $value";
                    echo '</div>';
                }
            ?>
        </div>

    </div>
    <style>
        html{
            background-color: rgb(255, 195, 195);
        }
        form{
            
        }
        .row{
            background-color: rgb(255, 195, 195);
        }
        .form-row{
            background-color: rgb(255, 195, 195);
        }
    </style>
   
    <script type="module">
        let changeLabel = () =>{
            let currShape = document.getElementById("shape").value;
            console.log(currShape);
            if(currShape == 1){
                document.getElementById("wid").classList.add("d-none");
                document.getElementById("len").classList.add("d-none");
                document.getElementById("rad").classList.remove("d-none");
                document.getElementById("hei").classList.remove("d-none");
            }
            if(currShape == 2){
                document.getElementById("wid").classList.add("d-none");
                document.getElementById("len").classList.add("d-none");
                document.getElementById("rad").classList.remove("d-none");
                document.getElementById("hei").classList.add("d-none");
            }
            if(currShape == 3){
                document.getElementById("wid").classList.add("d-none");
                document.getElementById("len").classList.add("d-none");
                document.getElementById("rad").classList.remove("d-none");
                document.getElementById("hei").classList.remove("d-none");
            }
            if(currShape == 4){
                document.getElementById("wid").classList.remove("d-none");
                document.getElementById("len").classList.remove("d-none");
                document.getElementById("rad").classList.add("d-none");
                document.getElementById("hei").classList.remove("d-none");
            }
            if(currShape == 5){
                document.getElementById("wid").classList.remove("d-none");
                document.getElementById("len").classList.remove("d-none");
                document.getElementById("rad").classList.add("d-none");
                document.getElementById("hei").classList.remove("d-none");
            }
        }






        document.getElementById("shape").addEventListener("change", changeLabel);

        
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>