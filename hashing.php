<html>
    <head>
        <title>PHP and server settings</title>
    </head>

    <body>
        <?php

        var_dump($_POST);
        $n = 5;

        $nHash = hash('sha256', $n);
        $nHash1 = hash('sha256', $_POST['num1']);

        if (isset($_POST['num1']) === true){
            if (hash('sha256', $_POST['num1']) == $nHash){
            echo "true";
            }
        }
        


        ?>
    <form method="post">
        <div class="row">
            <div id='div1' class="input-group mb-3  ">
                <div class="input-group-prepend ">
                    <span class="input-group-text" >Enter the number </span>
                </div>
                <input name="num1" class="form-control loginform highlightable" type="number"   />
            </div> <!-- end of  #div1 -->

            <div id='div2' class="input-group mb-3  ">
                <div class="input-group-prepend ">
                    <span class="input-group-text" >Enter the number </span>
                </div>
                <input name="num1_hash" value="<?php echo $nHash; ?>" class="form-control loginform highlightable" type="text"  readonly  />
            </div> <!-- end of  #div2 -->



            <div class='ml-5 mt-3'>
                <input type="submit" value="submit"  class="btn btn-lg btn-primary">
            </div>
        </div> <!-- end of row -->
      </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    
</html>