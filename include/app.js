const canvas = document.querySelector("canvas");
const ctx = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

class Particule {
    constructor(x,y,directionX,directionY,size,color){
        this.x = x;
        this.y = y;
        this.directionY = directionY;
        this.directionX = directionX;
        this.size = size;
        this.color = color;
    }
    draw(){
        ctx.beginPath()
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fillStyle = this.color;
        ctx.fill();
    }
    update(){
        if(this.x > canvas.width || this.x < 0){
            this.directionX = -this.directionX;
        }
        else if(this.y > canvas.height || this.y < 0){
            this.directionY = -this.directionY;
        }
        this.x += this.directionX;
        this.y += this.directionY;
        this.draw()
    }
}
const particule1 = new Particule(10,10,50,55,10,"f1f1f1")
console.log(particule1);

let particulesArray;

function init(){

    particulesArray = [];

    const numberOfParticules = (canvas.height * canvas.width) / 4000;

    for(let i = 0; i < numberOfParticules; i++){

        const size = (Math.random() * 2) + 1

        const x = Math.random() * ((innerWidth - 10) - 10 + 1) + 10;
        const y = Math.random() * ((innerHeight - 10) - 10 + 1) + 10;

        const directionX = cleanDirection();
        const directionY = cleanDirection();

        particulesArray.push(new Particule(x,y,directionX,directionY,size,"#fd0327"))
    }
}
init()

function cleanDirection(){
    const random = Math.trunc(Math.random() * 2)
    if(random){
        return (Math.random() * 1) + 0.5;
    }
    else {
        return (Math.random() * -1) - 0.5;
    }
}

function animate(){
    ctx.clearRect(0,0, innerWidth, innerHeight)

    for(let i = 0; i < particulesArray.length; i++){
        particulesArray[i].update()
    }
    connect()

    requestAnimationFrame(animate)
}
animate()

function connect(){

    for(let i = 0; i < particulesArray.length; i++){

        for(let j = i + 1; j < particulesArray.length; j++){

            const squaredDistanceX = (particulesArray[i].x - particulesArray[j].x) *
            (particulesArray[i].x - particulesArray[j].x)
            const squaredDistanceY = (particulesArray[i].y - particulesArray[j].y) *
            (particulesArray[i].y - particulesArray[j].y)

            const hypothenuse = squaredDistanceX + squaredDistanceY;

            if(hypothenuse < (135 * 135)) {
                ctx.strokeStyle = `rgba(240,240,240,${1 - hypothenuse/ (135*135)})`
                ctx.lineWidth = 0.4;
                ctx.beginPath()
                ctx.moveTo(particulesArray[i].x, particulesArray[i].y)
                ctx.lineTo(particulesArray[j].x, particulesArray[j].y)
                ctx.stroke()
            }
        }
    }

}

window.addEventListener("resize", handleResize)

function handleResize(){
    canvas.width = innerWidth;
    canvas.height = innerHeight;
    init();
}