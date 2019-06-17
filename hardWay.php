<?php
require_once 'classes/config.php';

if (!Session::exist('nick')) {
    header('Location: index.php');
}
?>
<!DOCTYPE HTML>
<HTML lang="pl">

<HEAD>

    <?php require_once PATH_TO_HEAD; ?>

    <title>Projekt - GRA</title>
    <!-- Bootstrap core CSS -->
    <link href="discriptions/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

</HEAD>

<BODY onLoad="startGame()">
    <div class="container">
        <div class="container-fluid">
            <div class="head">
                <div class="float-left">
                    <h2><b>GRA - Tor przeszkód</b></h2>
                </div>
                <div class="" style="text-align:right">
                    <a href="selectGame.php"><button class="btn btn-info">Powrót</button></a>
                    <div>
                        <br>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="hardway">
                <script>
                    var myGamePiece;
                    var myObstacles = [];
                    var myScore;

                    function startGame() {
                        myGamePiece = new component(30, 30, "yellow", 10, 120);
                        myGamePiece.gravity = 0.08;
                        myScore = new component("30px", "Consolas", "black", 280, 40, "text");
                        myGameArea.start();
                    }

                    var myGameArea = {
                        canvas: document.createElement("canvas"),
                        handle: document.getElementsByClassName('hardway')[0],
                        start: function() {
                            this.canvas.width = 900;
                            this.canvas.height = 540;
                            this.context = this.canvas.getContext("2d");
                            // document.body.insertBefore(this.canvas, document.body.childNodes[2]);
                            this.handle.append(this.canvas);
                            this.frameNo = 0;
                            this.interval = setInterval(updateGameArea, 15);
                        },
                        clear: function() {
                            this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
                        }
                    }

                    function component(width, height, color, x, y, type) {
                        this.type = type;
                        this.score = 0;
                        this.width = width;
                        this.height = height;
                        this.speedX = 0;
                        this.speedY = 0;
                        this.x = x;
                        this.y = y;
                        this.gravity = 0;
                        this.gravitySpeed = 0;
                        this.update = function() {
                            ctx = myGameArea.context;
                            if (this.type == "text") {
                                ctx.font = this.width + " " + this.height;
                                ctx.fillStyle = color;
                                ctx.fillText(this.text, this.x, this.y);
                            } else {
                                ctx.fillStyle = color;
                                ctx.fillRect(this.x, this.y, this.width, this.height);
                            }
                        }
                        this.newPos = function() {
                            this.gravitySpeed += this.gravity;
                            this.x += this.speedX;
                            this.y += this.speedY + this.gravitySpeed;
                            this.hitBottom();
                        }
                        this.hitBottom = function() {
                            var rockbottom = myGameArea.canvas.height - this.height;
                            if (this.y > rockbottom) {
                                this.y = rockbottom;
                                this.gravitySpeed = 0;
                            }
                        }
                        this.crashWith = function(otherobj) {
                            var myleft = this.x;
                            var myright = this.x + (this.width);
                            var mytop = this.y;
                            var mybottom = this.y + (this.height);
                            var otherleft = otherobj.x;
                            var otherright = otherobj.x + (otherobj.width);
                            var othertop = otherobj.y;
                            var otherbottom = otherobj.y + (otherobj.height);
                            var crash = true;
                            if ((mybottom < othertop) || (mytop > otherbottom) || (myright < otherleft) || (myleft > otherright)) {
                                crash = false;
                            }
                            return crash;
                        }
                    }

                    function updateGameArea() {
                        var x, height, gap, minHeight, maxHeight, minGap, maxGap;
                        for (i = 0; i < myObstacles.length; i += 1) {
                            if (myGamePiece.crashWith(myObstacles[i])) {
                                return;
                            }
                        }
                        myGameArea.clear();
                        myGameArea.frameNo += 1;
                        if (myGameArea.frameNo == 1 || everyinterval(150)) {
                            x = myGameArea.canvas.width;
                            minHeight = 20;
                            maxHeight = 200;
                            height = Math.floor(Math.random() * (maxHeight - minHeight + 1) + minHeight);
                            minGap = 50;
                            maxGap = 200;
                            gap = Math.floor(Math.random() * (maxGap - minGap + 1) + minGap);
                            myObstacles.push(new component(10, height, "green", x, 0));
                            myObstacles.push(new component(10, x - height - gap, "green", x, height + gap));
                        }
                        for (i = 0; i < myObstacles.length; i += 1) {
                            myObstacles[i].x += -1;
                            myObstacles[i].update();
                        }
                        myScore.text = "SCORE: " + myGameArea.frameNo;
                        myScore.update();
                        myGamePiece.newPos();
                        myGamePiece.update();
                    }

                    function everyinterval(n) {
                        if ((myGameArea.frameNo / n) % 1 == 0) {
                            return true;
                        }
                        return false;
                    }

                    function accelerate(n) {
                        myGamePiece.gravity = n;
                    }
                </script>
            </div>
        </div>
        <div>
            <div class="button" style="text-align: center">
                <button onClick="javascript:location.reload()" class="btn btn-secondary btn-lg">Zagraj</button>
                <button onmousedown="accelerate(-0.2)" onmouseup="accelerate(0.05)" class="btn btn-secondary btn-lg">W górę</button>
            </div>
        </div>
    </div>

    <footer></footer>
    <script src="discriptions/js/bootstrap.min.js"></script>
</BODY>

</HTML>