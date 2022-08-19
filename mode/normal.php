<?php include_once '../include/game.php'?>

<script>
// 변수 설정
let canvas = document.querySelector('canvas');
let ctx = canvas.getContext('2d');
let animation;
let timer = 0;

// 기준 화살표 불러오기
let leftarrow = new Image(); leftarrow.src = "../img/arrow/left.png";
let uparrow = new Image(); uparrow.src = "../img/arrow/up.png";
let rightarrow = new Image(); rightarrow.src = "../img/arrow/right.png";
let downarrow = new Image(); downarrow.src = "../img/arrow/down.png";
let spacebtn = new Image(); spacebtn.src = "../img/arrow/space.png";
let leftA = {
    x: 60, y: 26, width: 35, height: 18,
    draw() {
        ctx.drawImage(leftarrow, this.x, this.y, this.width, this.height);
    }
}
let upA = {
    x: 98, y: 26, width: 35, height: 18,
    draw() {
        ctx.drawImage(uparrow, this.x, this.y, this.width, this.height);
    }
}
let rightA = {
    x: 136, y: 26, width: 35, height: 18,
    draw() {
        ctx.drawImage(rightarrow, this.x, this.y, this.width, this.height);
    }
}
let downA = {
    x: 174, y: 26, width: 35, height: 18,
    draw() {
        ctx.drawImage(downarrow, this.x, this.y, this.width, this.height);
    }
}
let SpaceI = {
    x: 211, y: 27, width: 35, height: 16.5,
    draw() {
        ctx.drawImage(spacebtn, this.x, this.y, this.width, this.height);
    }
}

// 화살표 눌렀을 경우
let lefttemp = false; let uptemp = false; let righttemp = false; let downtemp = false; let spacetemp = false;
document.addEventListener('keydown', function(e){
    if(e.key === 'ArrowLeft')
    { leftbtn.style.display = 'block'; lefttemp = true; }
})
document.addEventListener('keyup', function(e){
    if(e.key === 'ArrowLeft')
     {leftbtn.style.display = 'none'; lefttemp = false;}
})
document.addEventListener('keydown', function(e){
    if(e.key === 'ArrowUp') 
    {upbtn.style.display = 'block'; uptemp = true;}
})
document.addEventListener('keyup', function(e){
    if(e.key === 'ArrowUp') 
    { upbtn.style.display = 'none'; uptemp = false;}
})
document.addEventListener('keydown', function(e){
    if(e.key === 'ArrowRight') 
    { rightbtn.style.display = 'block'; righttemp = true;}
})
document.addEventListener('keyup', function(e){
    if(e.key === 'ArrowRight') 
    {rightbtn.style.display = 'none'; righttemp = false;}
})
document.addEventListener('keydown', function(e){
    if(e.key === 'ArrowDown') 
    {downbtn.style.display = 'block'; downtemp = true;}
})
document.addEventListener('keyup', function(e){
    if(e.key === 'ArrowDown') 
    { downbtn.style.display = 'none'; downtemp = false;}
})
document.addEventListener('keydown', function(e){
    if(e.key === ' ') 
    { spacee.style.display = 'block'; spacetemp = true;}
})
document.addEventListener('keyup', function(e){
    if(e.key === ' ')
     { spacee.style.display = 'none'; spacetemp = false; };
})

// 게임 구현 (inform 문구 / 점수 변경)
let leftobs = true; let upobs = true; let rightobs = true; let downobs =true; let spaceobs =true;
let inform = document.querySelector('#inform');
let score = document.querySelector('#score');
let userScore = 0;

inform.innerHTML = 'GoGo!'
score.innerHTML = userScore;

// 올라오는 화살표들 만들기
let obstacleArr = [];
let posi = [60, 98, 136, 174, 211];
let obsImgs = document.querySelectorAll('img');
class Obstacle {
    constructor() {
        this.x = Math.floor(Math.random()*5);
        this.y = 100;
        if(this.x == 4) {
            this.width= 32,
            this.height= 15
        } else {
            this.width= 35,
            this.height = 18
        }
        this.num = this.x;
    }
    draw() {
        ctx.drawImage(obsImgs[this.num], posi[this.x], this.y, this.width, this.height);
    }
}

// 게임 중
let lifebox = document.querySelector('#lifebox');
let lifeboxwidth = 600;
let replay = document.querySelector('#replay');
lifebox.style.maxWidth = '600px';
let isSuccess;
// let combobox = document.querySelector('#combobox');
// let userCombo = 0;
// combobox.innerHTML = userCombo;

function startFrame() {
    animation = requestAnimationFrame(startFrame);
    timer ++;
    ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
    // extreme은 15, hard는 35, normal은 40
    if(timer % 50 === 0 ) {
        let obs = new Obstacle;
        obstacleArr.push(obs);
        // console.log(obs);
        if(obs.x == 0)  leftobs = true;
        else if(obs.x ==1) upobs = true;
        else if(obs.x == 2) rightobs = true;
        else if (obs.x == 3) downobs = true;
        else spaceobs = true;
    }
   obstacleArr.forEach((item, index, arr) => {    
        if(item.y < 18) {
            arr.splice(index, 1);
        }   
        if((leftobs && lefttemp == false && item.y == 17) ||
        (rightobs && righttemp == false && item.y == 17) ||  
        (upobs && uptemp == false && item.y == 17) || 
        (downobs && downtemp == false && item.y == 17) || 
        (spaceobs && spacetemp == false && item.y == 17)){
            setTimeout(()=>{
                inform.style.color = 'red'; inform.innerHTML = 'miss!';
                lifeboxwidth -=10;
                overCheck(lifeboxwidth);
                lifebox.style.width = lifeboxwidth+'px';
            },10)
            // console.log(`isSuccess${isSuccess}`);
        }
         else if((leftobs && lefttemp && item.y >= 19 && item.y <=21) ||
        (upobs && uptemp && item.y >= 19 && item.y <=21) ||
        (rightobs && righttemp && item.y >= 19 && item.y <=21) || 
        (downobs && downtemp && item.y >= 19 && item.y <=21) ||
        (spaceobs && spacetemp && item.y >= 19 && item.y <=21)) {
            isSuccess = true;
            // lifeboxwidth += 10;
            // lifebox.style.width = lifeboxwidth+'px';
            userScore += 100;
            score.innerHTML = userScore;
            for( let i=0; i<300; i++){
                setTimeout(()=>{
                    inform.style.color = 'orange'; inform.innerHTML = 'Perfect!';
            //         userCombo +=1;
            // combobox.innerHTML = userCombo;
                },i)
            }
            // console.log(`isSuccess${isSuccess}`);
        } else if((leftobs && lefttemp && item.y > 24 && item.y <=26) ||
        (upobs && uptemp && item.y > 24 && item.y <=26) ||
        (rightobs && righttemp && item.y > 24 && item.y <=26) || 
        (downobs && downtemp && item.y > 24 && item.y <=26) ||
        (spaceobs && spacetemp && item.y > 24 && item.y <=26)) {
            isSuccess = true;
            userScore += 50;
            score.innerHTML = userScore;

            for( let i=100; i<200; i++){
                setTimeout(()=>{
                    inform.style.color = 'green'; inform.innerHTML = 'Great!';
            //         userCombo +=1;
            // combobox.innerHTML = userCombo;
                },i)
            }
            // console.log(`isSuccess${isSuccess}`);
        } 
        item.y --;
        item.draw();
    })

    // 라이프 확인
    function overCheck(lifeboxwidth) {
        if(lifeboxwidth == 0) {
            lifebox.style.width = 0+'px';
            cancelAnimationFrame(animation);
            console.log("게임 끝");
            gaveoverbg.style.display ='block';
            gameover.style.display ='block';
            replay.style.display ='block';
        }
    }

    leftA.draw();
    upA.draw();
    rightA.draw();
    downA.draw();
    SpaceI.draw();    
}

replay.addEventListener('click',function(){
    document.location.reload();
})

startFrame();
</script>