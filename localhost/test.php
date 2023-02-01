<html>
    <head>
        <title>PHP and server settings</title>
    </head>

    <body>
        <h1>Froms</h1>

        <?php

        function formOk(): bool{
            $bFormSubmitted = isset($_POST["num1"]);
            if($bFormSubmitted && strlen($_POST['num1'])>0){
                return true;
            }

            return ($bFormSubmitted && strlen($_POST['num1']) > 0);
        }

        

        if(formOk()){
            $num = $_POST['num1'];
            echo 'You entered <b>' . $num . '</b> ';
        }
        ?>

        <form method="post">
            <label>Num 1:</label> <input type="text" name="num1" id="num1" placeholder="Enter a number"/>
            
            <br />
            <input type="submit" value="Submit" />


        </form>

    </body>

</html>