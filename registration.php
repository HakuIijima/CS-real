<?php 
// declare(strict_types=1);
?>
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

    echo $_POST['gender'];

    if($_POST['gender'] == ""){
        echo "testgood";
    }

    ?>

    <?php

    $debug = true;
    $recaptchaData = recaptcha();
    $feedback = '';
    $done = true;

    function recaptcha(): array{
        $n1 = mt_rand(1, 20);
        $n2 = mt_rand(1, 20); 
        $arr = array (
            'n1' => $n1,
            'n2' => $n2,
            'sum' => $n1 + $n2);
        return $arr;
    }

    function validEmail(string $email):bool{
        $email = trim($email);
        if(strlen($email)<5){
            return false;
        }
        $locAt = strrpos($email, '@');
        $locDot = strrpos($email, '.');
        if($locAt === false){
            return false;
        }
        if($locDot === false){
            return false;
        }
        if($locAt>$locDot){
            return false;
        }
        return true;
    }

    function validUser(string $user):bool{
        $user = trim($user);
        if(strlen($user)<5){
            return false;
        }
        return true;
    }

    function validPass(string $pass):bool{
        $pass = trim($pass);
        if(strlen($pass)<5){
            echo "len";
            return false;
            
        }
        if(strrpos($pass, '$') || strrpos($pass, '*')){
            echo "doller";
            return false;
            
        }
        return true;
    }

    function validAge(int $age):bool{
        if($age<18){
            return false;
        }
        return true;
    }

    echo $recaptchaData['sum'];
    // function validCapcha(int $capt):bool{
    //     if($capt == $recaptchaData['sum']){
    //         return false;
    //     }
    //     return true;
    // }

    $bFormSubmitted = isset($_POST['email']);
    // var_dump($_POST['email']);
    if($bFormSubmitted === true){
        $bValidEm1 = validEmail($_POST['email']);
        $bValidEm2 = validEmail($_POST['email2']); 
        $bValidUser = validUser($_POST['username']);
        $bValidPass = validPass($_POST['pword']);
        $bValidAge = validAge($_POST['age']);

        if($bValidUser === false){
            $feedback .= "<li>" . $_POST['username'] . " is not a valid username </li>";
            $done = false;
        }  
        if($bValidEm1 === false){
            $feedback .= "<li>" . $_POST['email'] . " is not a valid email </li>";
            // echo 456;
            $done = false;
        }
        if($bValidPass === false){
            $feedback .= "<li>" . $_POST['pword'] . " is not a valid password </li>";
            $done = false;
        }
        if($bValidAge === false){
            $feedback .= "<li> must be over 18 </li>";
            $done = false;
        }

        if ($_POST['email']!= $_POST['email2']) {
            $feedback .= "<li> Emails do not match </li>";
            $done = false;
            // echo 123;
        }
        if($_POST['antibotanswer'] != $_POST['antibotans']){
            $feedback .= "<li> recaptcha is not correct </li>";
            $done = false;
        }
        if($_POST['gender'] == ""){
            $feedback .= "<li> Please select gender </li>";
            $done = false;
        }
        if($done === true){
            
            header('Location: dashboard.php');
        }
        // echo $feedback;
    }

    $temp = $recaptchaData['sum'];

    echo "hi" .$_POST['antibotanswer'] . "hi";
    echo $temp;

    // echo $_POST['email'];
    
    // echo $_POST['email2'];

    


    ?>  


    <div class="row d-flex justify-content-center">
        <h1 class="d-flex justify-content-center col-sm-8 col-12">Login to Access Mr M.'s Premium Content</h1>
    </div>
    <div class="form-row d-flex justify-content-center">
        <div class="col-sm-8 col-12">
            <label class="my-1 mr-2 border p-4 rounded" for="inlineFormCustomSelectPref">Upgrade your <u>life</u> by accessing these premium educational content including a calculator that will tell you how many years you have been alive!!</label>
            <form method="post">
                <div class="row">
                    <div class="col-8 border pt-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">username</div>
                            </div>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Please enter username">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">age</div>
                            </div>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Please enter age">
                        </div>
                    </div>
                    <div class="col-4 pt-3 border">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="male" id="m">male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="female" id="f">female
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="other" id="o">other
                            </label>
                        </div>
                    </div>
                    <div class="col-12 border pt-3">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">password</div>
                            </div>
                        <input type="password" class="form-control" name="pword" id="pword" placeholder="Please enter password">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">email</div>
                            </div>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Please enter email">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">confirm email</div>
                            </div>
                        <input type="text" class="form-control" name="email2" id="email2" placeholder="Please confirm email">
                        </div>
                        <div class="input-group mb-3  ">
                            <div class="input-group-prepend ">
                            <span class="input-group-text" ><span id="botq"> What is <?php echo $recaptchaData['n1']?>  + <?php echo $recaptchaData['n2']?> ?</span> </span>
                            </div>
                            <input class="form-control loginform" type="number" name="antibotanswer" id="antibotanswer" value='' placeholder="enter solution"  />
                        </div>

                        <input style="display:none" type="text" name="antibotans" value="<?php echo $recaptchaData['sum']; ?>" />
                    <div class="input-group mb-3 pt-1">
                        <!-- <button id="registerbttn" class="btn bg-primary text-white">submit</button> -->
                    </div>
                </div>
            
                <button type="submit" value="Submit" id="registerbttn" class="btn bg-primary text-white">submit</button>

             
            </form>

            
            <?php
            
            
                // die(var_dump($feedback));
                if($bFormSubmitted && strlen($feedback)>0){
                    echo '<div class="col-12 bg-danger text-white mt-4 p-3">';
                    echo $feedback;
                    echo '</div>';
                }
            ?>
        </div>

    </div>

   

    
   
    <script>
        let htm = "";
        let bHasError = false;

        let checkfrm = () =>{
            
            htm = "";
            // $('input:radio[name="gender"]').val();


            initHtml();
            checkUser();
            checkAge();
            checkPwd();
            checkEmail();
            checkGender();
            console.log(htm);
            $("#err").html(htm);

            if(bHasError){
                $("#err").fadeIn();
            }
            else{
                $("#err").fadeOut();
            }

            bHasError = false;

        }

        let initHtml = () =>{
            htm += "Please Fix: </n>";
            console.log(1);
        }

        let checkUser = () =>{
            let temp = document.getElementById("username").value;
            if(temp.length < 5){
                bHasError = true;
                htm += "<li>Username must be over 5 characters</li>"
                return;
            }
        }
        let checkAge = () =>{
            let temp = document.getElementById("age").value;
            if(temp < 18){
                bHasError = true;
                htm += "<li>Must be over 18</li>"
            }
        }
        let checkPwd = () =>{
            let temp = document.getElementById("pword").value;
            if(temp.length<5){
                bHasError = true;
                htm += "<li>Password must be over 5 characters</li>"
                return;
            }
            if(temp.indexOf("$") != -1){
                bHasError = true;
                htm += "<li>Password can not include $ sign</li>"
            }
            if(temp.indexOf("*") != -1){
                bHasError = true;
                console.log(2);
                htm += "<li>Password can not include * sign</li>"
            }
        }
        let checkEmail = () =>{
            let em1 = document.getElementById("email").value;
            let em2 = document.getElementById("email2").value;
            if(em1.length < 5){
                bHasError = true;
                htm += "<li>Email must be over 5 characters</li>"
                return;
            }
            if(em1.indexOf("@") == -1 ){
                bHasError = true;
                htm += "<li>Email invalid : requires @</li>"
            }
            if(em1.indexOf(".") == -1 ){
                bHasError = true;
                htm += "<li>Email invalid : requires .</li>"
            }
            else if(em1.lastIndexOf("@") > em1.lastIndexOf(".")){
                bHasError = true;
                htm += "<li>Email invalid</li>"
            }
            if(em1 != em2){
                bHasError = true;
                htm += "<li>Emails do not match</li>"
            }
        }
        let checkGender = () =>{
            let temp = $("input[type=radio][name=gender]:checked").val();
            if(temp == undefined){
                bHasError = true;
                htm += "<li>Please select gender</li>"
            }
        }

        let autoFill = () =>{
            document.getElementById("username").value = 123456;
            document.getElementById("age").value = 18;
            document.getElementById("pword").value = 1234567;
            document.getElementById("email").value = "haku.iijima@gmail.com";
            document.getElementById("email2").value = "haku.iijima@gmail.com";
            document.getElementById("antibotanswer").value = <?php echo $recaptchaData['sum'] ?>;
        }



        

        document.getElementById("registerbttn").addEventListener("click",checkfrm);
        // document.getElementById("auto").addEventListener("click",autoFill);
        document.getElementById("registerbttn").addEventListener("click",function(e){
        if(e.code === "Enter"){
          e.preventDefault;
          checkfrm();
        }
      })
         window.addEventListener('load',autoFill);


    </script>
    <?php
        
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>