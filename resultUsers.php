<?php
require_once 'classes/config.php';

    if (!Session::exist('nick')) {
        header('Location: selectGame.php');
    }
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>
    
    <?php require_once PATH_TO_HEAD; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <title>Projekt - wyniki gier</title>

    <style>
        .table {
            width: 70%;
            margin-left: 15%;
            margin-right: 15%;
        }
        .table-hover > tbody > tr:hover {
            background-color: #DBF4FF;
        }
    </style>

</HEAD>

<BODY>

    <div class="head" style="width:800px; margin-top:35px; margin-left:auto; margin-right:auto;">
        <div class="float-left">
            <h2><b>GRA - Wisielec</b></h2>
        </div>
        <div class="" style="text-align:right">
            <a href="selectGame.php"><button class="btn btn-info">Powrót</button></a>
            <div>
                <br><hr>    
            </div>
        </div>
    </div>

    <div class="content text-center">
        <?php

            $db = DBB::getInstance();

        ?>
        <nav>
            <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Wisielec</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Zgadywanka stolic - łatwy</a>
                <a class="nav-item nav-link" id="nav-profile2-tab" data-toggle="tab" href="#nav-profile2" role="tab" aria-controls="nav-profile2" aria-selected="true">Zgadywanka stolic - trudny</a>
                <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Tor przeszkód</a> -->
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-striped table-hover table-light">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NR.</th>
                    <th scope="col">NICK</th>
                    <th scope="col">PUNKTY</th>
                    <th scope="col">DATA</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                //data form db
                $results_for_city = $db->query('SELECT `ID`, `nick`, `score`, `date` FROM user_ranking WHERE hidden = 0 AND id_type = 3 GROUP BY score DESC;')->results();
                $counter = 1;
    
                //show result
                foreach($results_for_city as $row) {
                    echo '  <tr>
                                <th scope="row">'. $counter .'</th>
                                <td>'. $row->nick .'</td>
                                <td>'. ($row->score) .'</td>
                                <td>'. $row->date .'</dt>
                            </tr>';
                    $counter++;
                }

            ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <table class="table table-striped table-hover table-light">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NR.</th>
                    <th scope="col">NICK</th>
                    <th scope="col">PUNKTY</th>
                    <th scope="col">DATA</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                //data form db
                $results_for_city = $db->query('SELECT `ID`, `nick`, `score`, `date` FROM user_ranking WHERE hidden = 0 AND id_type = 4 GROUP BY score DESC;')->results();
                $counter = 1;
                    
                //show result
                foreach($results_for_city as $row) {
                    echo '  <tr>
                                <th scope="row">'. $counter .'</th>
                                <td>'. $row->nick .'</td>
                                <td>'. ($row->score) .'</td>
                                <td>'. $row->date .'</dt>
                            </tr>';
                    $counter++;
                }

            ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile2" role="tabpanel" aria-labelledby="nav-profile2-tab">
            <table class="table table-striped table-hover table-light">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NR.</th>
                    <th scope="col">NICK</th>
                    <th scope="col">PUNKTY</th>
                    <th scope="col">DATA</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                //data form db
                $results_for_city = $db->query('SELECT `ID`, `nick`, `score`, `date` FROM user_ranking WHERE hidden = 0 AND id_type = 1 GROUP BY score DESC;')->results();
                $counter = 1;
                    
                //show result
                foreach($results_for_city as $row) {
                    echo '  <tr>
                                <th scope="row">'. $counter .'</th>
                                <td>'. $row->nick .'</td>
                                <td>'. ($row->score) .'</td>
                                <td>'. $row->date .'</dt>
                            </tr>';
                    $counter++;
                }

            ?>
                </tbody>
            </table>
        </div>
        <!--
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <table class="table table-striped table-hover table-light">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">NR.</th>
                    <th scope="col">NICK</th>
                    <th scope="col">PUNKTY</th>
                    <th scope="col">DATA</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            /*
                //data form db
                $results_for_city = $db->query('SELECT `ID`, `nick`, `score`, `date` FROM user_ranking WHERE hidden = 0 AND id_type = 2 GROUP BY score DESC;')->results();
                $counter = 1;
                
                //show result
                foreach($results_for_city as $row) {
                    echo '<tr>
                            <th scope="row">'. $counter .'</th>
                            <td>'. $row->nick .'</td>
                            <td>'. ($row->score) .'</td>
                            <td>'. $row->date .'</dt>
                        </tr>';
                    $counter++;
                }
            */
            ?>
                </tbody>
            </table>
        </div> 
        -->
        </div>
    </div>
        
    <footer>
        <?php require_once PATH_TO_FOOTER; ?>
    </footer>
    <script src="discriptions/js/bootstrap.min.js"></script>
</BODY>

</HTML>