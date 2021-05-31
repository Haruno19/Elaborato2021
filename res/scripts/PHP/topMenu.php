<?php
                    session_start();
                    if(array_key_exists('logon',$_SESSION))
                    {
                        $str='
                        <div class="right">
                            <h3>Ciao, '.$_SESSION['username'].'!</h3>&nbsp;
                            <form action="/Projects/Elaborato/res/pages/profile.php">
                                <input type="submit" value="Profilo">
                            </form>
                            <form action="/Projects/Elaborato/res/scripts/PHP/logout.php">
                                <input type="submit" value="Logout">
                            </form>
                            &nbsp;
                        </div>';
                    }else{
                        $str='
                        <div class="right">
                            <form action="/Projects/Elaborato/res/pages/signUpForm.php">
                                <input type="submit" value="Registrati">
                            </form>
                            <form action="/Projects/Elaborato/res/pages/loginForm.php">
                                <input type="submit" value="Accedi">
                            </form>
                            &nbsp;
                        </div>';
                    }
                    echo $str;
                ?>