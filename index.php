<?php
require_once 'classes/config.php';

if (Session::exist('nick')) {
    header('Location: level.php');
}
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once PATH_TO_HEAD; ?>

    <title>Projekt - GRA</title>

    <!-- Bootstrap core CSS -->
    <link href="discriptions/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

</HEAD>

<BODY>

    <div class="head">
        <h2><b>GRA - zdadnij państwo lub stolicę</b></h2>
    </div>
    <div class="content">
        <section>

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
                        header('Location: level.php');
                    } else {
                        //error for validation
                        foreach ($validation->errors() as $error) {
                            echo $error . '<br/>';
                        }
                    }
                }
            }

            ?>
            <h4>Podaj swój nick</h4>
            <form method="POST">
                <input placeholder="Nick" class="form-control" type="text" name="nick" required />
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                <input type="submit" value="Ustaw" class="btn btn-info " />
            </form>

        </section>
    </div>
    <footer></footer>
    <script src="discriptions/js/bootstrap.min.js"></script>
</BODY>

</HTML>