<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/main.js"></script>
</head>
<body>
    <div id="bg">
        <div id="logo"></div>
        <div id="mode">
            <div id="normal"><a href="mode/normal.php"><span id="normal_span">▶</span>normal</a></div>
            <div id="hard"><a href="mode/hard.php"><span id="hard_span">▶</span>hard</a></div>
            <div id="extreme"><a href="mode/extreme.php"><span id="extreme_span">▶</span >extreme</a></div>
        </div>
    </div>
</body>
</html>
<style>
    a { text-decoration: none; color: inherit; }
    #logo {
        top: 12%;
        left: 50%;
        transform: translateX(-50%);
        width: 1200px;
    }
    #mode {
        font-size: 60px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: 57%;
        border-radius: 25px;
        background-color: rgba(255, 255, 255, 0.5);
        padding: 20px 60px;
    }
    @keyframes bling_span {
    0% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
    #normal {
        color: green;
    }
    #normal_span {
        font-size:32px;
        margin-right: 80px;
        animation: bling_span 1s infinite;
    }
    #hard {
        color: deeppink;
        margin: 20px 0;
    }
    #hard_span {
        font-size:32px;
        margin-right: 80px;
        animation: bling_span 1s infinite;
    }
    #extreme {
        color: red;
    }
    #extreme_span {
        font-size:32px;
        margin-right: 80px;
        animation: bling_span 1s infinite;
    }
</style>