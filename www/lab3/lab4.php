<?php
            $a = ["Ильясов", "Ренат", "ПИ", "admin","ПИ-318"];

            $passed = false;
            $user_name = $_POST["userName"];

                for ($c = 0; $c < count($a); $c++){
                    if ($user_name == $a[$c]){
                        echo "Приветствую вас, $a[$c]!";
                        $passed = true;
                        break;
                    }
                }

                if (!$passed){
                    echo "К сожалению, я вас не знаю";
                }

        ?>
