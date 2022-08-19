<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="bg">
        <div id="logo"></div>
        <div id="gameBox">
            <div id="inform"></div>
            <div id="whiteBg"></div>
            <canvas></canvas>
            <div id="arrow">
                <div><img style="display: none" src="../img/arrow/left_a.png" alt=""></div>
                <div><img  style="display: none" src="../img/arrow/up_a.png" alt=""></div>
                <div><img  style="display: none" src="../img/arrow/right_a.png" alt=""></div>
                <div><img  style="display: none" src="../img/arrow/down_a.png" alt=""></div>
                <div><img  style="display: none" src="../img/arrow/space_a.png" alt=""></div>
            </div>
            <div id="empty_arrow">
                <div id = "leftbtn_e"><img src="../img/arrow/left.png" alt=""></div>
                <div id = "upbtn_e"><img src="../img/arrow/up.png" alt=""></div>
                <div id = "rightbtn_e"><img src="../img/arrow/right.png" alt=""></div>
                <div id = "downbtn_e"><img src="../img/arrow/down.png" alt=""></div>
                <div id = "spacee_e"><img src="../img/arrow/space.png" alt=""></div>
            </div>
            <div id="clicked_arrow">
                <div id = "leftbtn"><img src="../img/arrow/left_c.png" alt=""></div>
                <div id = "upbtn"><img src="../img/arrow/up_c.png" alt=""></div>
                <div id = "rightbtn"><img src="../img/arrow/right_c.png" alt=""></div>
                <div id = "downbtn"><img src="../img/arrow/down_c.png" alt=""></div>
                <div id = "spacee"><img src="../img/arrow/space_c.png" alt=""></div>
            </div>
        </div>
        <div >
            <h2 id = "life">Lifebox</h2>
            <div id = "lifebox"></div>
        </div>
        <div id= "score"></div>
        <!-- <div>
            <h2 id = "combo">combo</h2>
            <div id="combobox"></div>
        </div> -->
        <div id = "mariogif">
            <img src="../img/mario.gif" alt="">
        </div>
        <div id="home"><a href="../index.php"><img src="../img/home.png" alt=""></a></div>
        <div id="gaveoverbg"></div>
        <div id="gameover"><img src="../img/gameOver.png" alt=""></div>
        <div id="replay">Replay?</div>
    </div>
</body>
</html>