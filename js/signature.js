const canvas=document.querySelector('canvas');
const form=document.querySelector('.signature-pad-form');
const clearButton=document.querySelector('.clear-button');
const ctx=canvas.getContext('2d');
let writingMode=false;

form.addEventListener('submit', (event) =>{
    const imageURL=canvas.toDataURL();
    document.getElementById("signature").value=imageURL;
})

const clearPad = () =>{
    ctx.clearRect(0,0,canvas.width,canvas.height)
}

clearButton.addEventListener('click', (event) => {
    event.preventDefault();
    clearPad();
})

const getTargetPosition = (event) => {
    positionX = event.clientX - event.target.getBoundingClientRect().x;
    positionY = event.clientY - event.target.getBoundingClientRect().y;

    return [positionX, positionY];
}
const handlePointerMove = (event) => {
    if(!writingMode) return

    const [positionX, positionY] = getTargetPosition(event);
    ctx.lineTo(positionX, positionY);
    ctx.stroke();
}

const handlePointerUp = (event) => {
    writingMode=false;
}

const handlePointerDown = (event) => {
    writingMode =true;
    ctx.beginPath();

    const [positionX, positionY] = getTargetPosition(event);
    ctx.moveTo(positionX, positionY);
}

ctx.lineWidth = 3;
ctx.lineJoin = ctx.lineCap ='round';

canvas.addEventListener('pointerdown', handlePointerDown, {passive: true});
canvas.addEventListener('pointerup', handlePointerUp, {passive: true});
canvas.addEventListener('pointermove', handlePointerMove, {passive: true});
