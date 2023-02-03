<?php
// declare(strict_types=1);
?>
<html>
    <head>
        <title>PHP and server settings</title>
    </head>

    <body>
        <div class="container">
            <?php
            $debug = true;

            function isEmail(string $email): bool{
                global $debug;

                if(strpos($email,".") === false){
                    if($debug){
                        echo "no dot, <br />";
                    }
                    return false;
                }
                else if(strpos($email,"@") === false){
                    if($debug){
                        echo "no dot, <br />";
                    }
                    return false;
                }
                return true;
            }

            $yourEmail = "foofoo.com";
            if(isEmail($yourEmail)){
                echo "<span class='info'> $yourEmail is a valid email adress </span>";
            }
            else{
                echo "<span class='warning'> $yourEmail is not a valid email adress </span>";
            }




            function dump(int $value) : void{
                var_dump($value);
            }

            // dump('13.37');
            // dump(19.42);

            $a = '1';
            $b = 2;

            function doMath(int $a,int $b): void{
                echo $a + $b;
            }

            // doMath($a, $b);

            function greetUser(string $name): string{
                return "Welcome to our site, $name";
            }

            // echo greetUser("Jim");

            function makeTags(string $tag,string $word): string{
                return "<$tag>$word<$tag>";
            }

            // echo makeTags("i", "Yay");
            
            $x = 0;
            $y = 'foo';
            function increaseby1(): void{
                global $x, $y;
                $x++;
                print $y;
            }

            // increaseby1();
            
            // $count = 0;
            // while($count < 10){
            //     echo $count;
            //     echo '<br>';
            //     $count++;
            // }

            function multiplesOf5(int $howMany): void{
                $temp = 5;
                for ($i = 0; $i < $howMany;$i++){
                    echo $temp;
                    echo ",";
                    $temp += 5;
                }
            }

            // $num = 5;
            // multiplesOf5($num);

            function printFactors(int $n): void{
                for($i=1;$i<$n;$i++){
                    if($n%$i == 0){
                        echo $i;
                        echo ",";
                    }
                }
            }

            // $num = 48;
            // printFactors($num);
            
            // $email = "foo@foo.com";
            // echo strpos($email, "@");
            // echo '<br>';
            // echo strpos($email, ".");
            // echo '<br>';
            // echo false === strpos($email, "t");
            // echo '<br>';

            
            ?>

        </div>
        



    </body>
</html>