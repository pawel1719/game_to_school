<?php
require_once 'classes/config.php';

    if (Session::exist('nick')) {
        header('Location: selectGame.php');
    }
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
    
    <?php require_once PATH_TO_HEAD; ?>
    <style>
        .form-input {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .form-style {
            width: 30%;
            height: 80%;
            margin-left: auto;
            margin-right: auto;
            padding: 10px;
            border: 2px solid;
            border-radius: 10px;
        }
    </style>

    <title>Projekt - GRA</title>

</HEAD>

<BODY>
    </main>
    <div class="head">
        <h2><b>GRA - zdadnij państwo lub stolicę</b></h2>
    </div>
    <div class="content text-center">
        <section>

            <hr/><br/><br/>

            <div class="form-style">

                <h4>Podaj swój nick</h4>


                <?php

                    if (Input::exists()) {
                        if (Token::check(Input::get('token'))) {
                            $validate = new Validate();
                            $validation = $validate->check($_POST, array(
                                'nick' => array(
                                    'min' => 6,
                                    'max' => 25,
                                    'letter_or_number' => true
                                )
                            ));

                            if ($validation->passed()) {
                                //success for validation
                                Session::put('nick', Input::get('nick'));
                                header('Location: selectGame.php');
                            } else {
                                echo '<div class="alert alert-danger" role="alert">';
                                //error for validation
                                foreach ($validation->errors() as $error) {
                                    echo $error . '<br/>';
                                }
                                echo '</div>';
                            }
                        }
                    }

                ?>

                
                <form method="POST">
                    <input placeholder="Nick" class="form-control form-input" value="<?php echo Input::get('nick'); ?>" type="text" name="nick" required />
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                    <input type="submit" value="Ustaw" class="btn btn-info" />
                </form>
            </div>

        </section>
    </div>
    </main>

        <?php require_once PATH_TO_FOOTER; ?>

    <script src="discriptions/js/bootstrap.min.js"></script>
</BODY>

</HTML>