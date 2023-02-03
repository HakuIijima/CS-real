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
    $feedback = '';
    $done = true;
    $recaptchaData = recaptcha();

    function recaptcha(): array{
      $n1 = mt_rand(1, 20);
      $n2 = mt_rand(1, 20); 
      $arr = array (
          'n1' => $n1,
          'n2' => $n2,
          'sum' => $n1 + $n2,
          'hashedSum' => hash('sha256', $n1+$n2));
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


    $bFormSubmitted = isset($_POST['email']);
      if ($bFormSubmitted === true) {
      echo 'test';
        $bValidEm1 = validEmail($_POST['email']);
        $bValidPass = validPass($_POST['pass']);

      if($bValidEm1 === false){
        $feedback .= "<li>" . $_POST['email'] . " is not a valid email </li>";
        // echo 456;
        $done = false;
      }

      if($bValidPass === false){
        $feedback .= "<li>" . $_POST['pass'] . " is not a valid password </li>";
        $done = false;
     } 
     if(hash('sha256', $_POST['antibotanswer']) != $_POST['antibotans']){
        $feedback .= "<li> recaptcha is not correct </li>";
        $done = false;
     }
     if($done === true){
            
      header('Location: dashboard.php');
     }




    }


    ?>
    <div class="row d-flex justify-content-center">
        <h1 class="d-flex justify-content-center col-sm-6 col-12">Login to Access Mr M.'s Premium Content</h1>
    </div>
    <div class="form-row d-flex justify-content-center">
      
        <!-- <select class="form-control col-3" id="pwordselect">
          <option value="">Pass test</option>
          <option value="pworddollarsign">$ sign in pword</option>
          <option value="pwordasterisk">* in pword</option>
          <option value="pwordtooshort">Too Short</option>
          <option value="pwordallgood">Pword is good</option>
        </select>
        <select class="form-control col-3" id="emailselect">
          <option value="">Email test</option>
          <option value="emailtooshort">Email is too short</option>
          <option value="emailno@">Email has no @</option>
          <option value="emailno.">Email has no .</option>
          <option value="email.before@">. doesnt come before @</option>
          <option value="emailallgood">Email is good</option>
        </select> -->
      
    </div>
    <div class="form-row d-flex justify-content-center">
        <div class="col-sm-6 col-12 ">
            <label class="my-1 mr-2 border p-4 rounded" for="inlineFormCustomSelectPref">Upgrade your <u>life</u> by accessing these premium educational content including a calculator that will tell you how many years you have been alive!!</label>
            <form method="post">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <div class="input-group-text">Email</div>
                </div>
                <input type="text" name="email" class="form-control" id="frmemail" placeholder="Please enter email">
              </div>
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <div class="input-group-text">Password</div>
                </div>
                <input type="password" name="pass" class="form-control" id="frmpsd" placeholder="Please enter password">
              </div>
              <!-- <div class="input-group mb-3">
                  <div class="input-group-prepend">
                  <div id="botQ" class="input-group-text">

                  </div>
                </div>
                <input type="number" name="capt" class="form-control" id="frmcheck" placeholder="">
                <input style="display:none" type="text" name="antibotans" value="<?php echo $recaptchaData['sum']; ?>" />
                <input style="display:none" type="text" name="antibotans" value="<?php echo $recaptchaData['hashedSum']; ?>" />
              </div> -->
              <div class="input-group mb-3  ">
                <div class="input-group-prepend ">
                  <span class="input-group-text" ><span id="botq"> What is <?php echo $recaptchaData['n1']?>  + <?php echo $recaptchaData['n2']?> ?</span> </span>
                </div>
                <input class="form-control loginform" type="number" name="antibotanswer" id="antibotanswer" value='' placeholder="enter solution"  />
                <input  type="hidden" name="antibotans" value="<?php echo $recaptchaData['hashedSum']; ?>" />
              </div> 
              <div class="input-group mb-3">
                  <button id="login" class="btn">Login</button>
              </div>
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

      let botAnswer = -1;

      let generateBotQ = () => {
          let rand1 = Math.floor(Math.random() * 23);
          let rand2 = Math.floor(Math.random() * 23);

          botAnswer = rand1 + rand2;

          console.log(rand1);
          console.log(rand2);

          $("#botQ").text("What's " + rand1 + "+" + rand2);
          // document.getElementById("botQ").value = "What's" + rand1 + rand2;
          console.log(botAnswer);
      }

      let isValidEmail = (str) => {
        console.log(str);
        console.log(str.lastIndexOf("@"));
        console.log(str.lastIndexOf(".") );
          if (str.indexOf("@") == -1 || str.indexOf(".") == -1 || str.lastIndexOf("@") > str.lastIndexOf(".") || str.length < 5) {
              return false;
          }
          return true;
      }

      let isValidPass = (str) => {
          if (str.indexOf("$") != -1 || str.indexOf("*") != -1 || str.length < 5) {
              return false;
          }
          return true;
      }

      let isValidBot = (str) => {
          if (str != botAnswer) {
              return false;
          }
          return true;
      }
      
      let loginClicked = () => {

          let email = document.getElementById("frmemail").value;
          let pass = document.getElementById("frmpsd").value;
          let num = document.getElementById("frmcheck").value;

          let emailV = isValidEmail(email);
          let passV = isValidPass(pass);
          let numV = isValidBot(num);

          $("#err").fadeOut();

          if (emailV == false) {
              let emailerr = "Email requires:<br><br>";
              emailerr += "<li>Longer than 5 characters</li>";
              emailerr += "<li>Contians '@'</li>";
              emailerr += "<li>Contians '.'</li>";
              emailerr += "<li>'@' comes before '.'</li>";
              $("#err").html(emailerr);
              $("#err").fadeIn("slow");
              document.getElementById("frmemail").select();
          } else if (passV == false) {
              let passerr = "Password requires:<br><br>";
              passerr += "<li>Longer than 5 characters</li>";
              passerr += "<li>Does not contians '$'</li>";
              passerr += "<li>Does not contians '*'</li>";
              $("#err").html(passerr);
              $("#err").fadeIn("slow");
              document.getElementById("frmpsd").select();
          } else if (numV == false) {
              let numerr = "Capcha does not match";

              $("#err").html(numerr);
              $("#err").fadeIn("slow");

              document.getElementById("frmcheck").select();
              generateBotQ();
          } else {
              $("#err").fadeOut();
          }

      }

      let pWordSelect = document.getElementById("pwordselect");

      pWordSelect.addEventListener("change", function(evt){
        let selected = document.getElementById("pwordselect").value;
        console.log(selected);

        let pWordElem = document.getElementById("frmpsd");

        document.getElementById("frmemail").value = "haku.iijima@gmail.com";
        document.getElementById("frmcheck").value = botAnswer;

        if(selected == "pwordtooshort"){
          pWordElem.value = "123";
        }
        if(selected == "pworddollarsign"){
          pWordElem.value = "123$12";
        }
        if(selected == "pwordasterisk"){
          pWordElem.value = "123*as";
        }
        if(selected == "pwordallgood"){
          pWordElem.value = 123123;
        }

        loginClicked();

        
      })

      let EmailSelect = document.getElementById("emailselect");

      EmailSelect.addEventListener("change", function(evt){
        let selected = document.getElementById("emailselect").value;
        console.log(selected);

        let EmailElem = document.getElementById("frmemail");

        document.getElementById("frmpsd").value = "123123";
        document.getElementById("frmcheck").value = botAnswer;

        if(selected == "emailtooshort"){
          EmailElem.value = "@i.c";
        }
        if(selected == "emailno@"){
          EmailElem.value = "iijimahharrisoncsd.org";
        }
        if(selected == "emailno."){
          EmailElem.value = "iijimah@harrisoncsdorg";
        }
        if(selected == "email.before@"){
          EmailElem.value = "iiji.mah@harrisoncsdorg";
        }
        if(selected == "emailallgood"){
          EmailElem.value = "haku.iijima@gmail.com";
        }

        loginClicked();

        
      })




      // <option value="emailtooshort">Email is too short</option>
      //     <option value="emailno@">Email has no @</option>
      //     <option value="emailno.">Email has no .</option>
      //     <option value="email.before@">. doesnt come before @</option>

      window.addEventListener("load", generateBotQ);
      document.getElementById("login").addEventListener("click", loginClicked);

    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>