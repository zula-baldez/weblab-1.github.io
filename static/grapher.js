const canvas = document.getElementById('graph')
const ctx = canvas.getContext('2d')



const width = canvas.width
const height = canvas.height
const markWidth = 5
const arrowSize = 5
const rSize = 60
const fontSize = 40
const figureColor = '#39f'
function drawGraph() {  
    
    drawFigure()

    drawPane()
}
function drawPane() {

    ctx.font = '20px monospace'
    ctx.fillStyle = '#000'
    ctx.beginPath()
    //draw coordinate plate
    ctx.moveTo(width/2, height/2)
    ctx.lineTo(width, height/2)

    ctx.moveTo(width/2, height/2)
    ctx.lineTo(0, height/2)

    ctx.moveTo(width/2, height/2)
    ctx.lineTo(width/2, height)

    ctx.moveTo(width/2, height/2)
    ctx.lineTo(width/2, 0)
    //draw marks
    ctx.moveTo(width/2 + rSize, height/2 + markWidth)
    ctx.lineTo(width/2 + rSize, height/2 - markWidth)

    ctx.moveTo(width/2 + rSize*2, height/2 + markWidth)
    ctx.lineTo(width/2 + rSize*2, height/2 - markWidth)

    ctx.moveTo(width/2 - rSize, height/2 + markWidth)
    ctx.lineTo(width/2 - rSize, height/2 - markWidth)

    ctx.moveTo(width/2 - rSize*2, height/2 + markWidth)
    ctx.lineTo(width/2 - rSize*2, height/2 - markWidth)
    
    ctx.moveTo(width/2 + markWidth, height/2 + rSize)
    ctx.lineTo(width/2 - markWidth, height/2 + rSize)

    ctx.moveTo(width/2 + markWidth, height/2 + rSize*2)
    ctx.lineTo(width/2 - markWidth, height/2 + rSize*2)

    ctx.moveTo(width/2 + markWidth, height/2 - rSize)
    ctx.lineTo(width/2 - markWidth, height/2 - rSize)

    ctx.moveTo(width/2 + markWidth, height/2 - rSize*2)
    ctx.lineTo(width/2 - markWidth, height/2 - rSize*2)
    //draw arrows
    ctx.moveTo(width/2, 0)
    ctx.lineTo(width/2 + arrowSize, arrowSize)
    ctx.moveTo(width/2, 0)
    ctx.lineTo(width/2 - arrowSize, arrowSize)
    
    ctx.moveTo(width, height/2)
    ctx.lineTo(width - arrowSize, height/2 + arrowSize)
    ctx.moveTo(width, height/2)
    ctx.lineTo(width - arrowSize, height/2 - arrowSize)
    //draw text
    ctx.moveTo(width/2, height/2)
    ctx.textAlign  = 'center';

    ctx.fillText('-R/2', width/2 - rSize, height*8/17)
    ctx.fillText('-R', width/2 - rSize*2, height*8/17)
    ctx.fillText('R/2', width/2 + rSize, height*8/17)
    ctx.fillText('R', width/2 + rSize*2, height*8/17)
    ctx.textAlign = 'left'
    ctx.textBaseline = 'middle'
    ctx.fillText('-R/2', width * 9 / 17, width/2 + rSize)
    ctx.fillText('-R', width * 9 / 17, width/2 + rSize*2)
    ctx.fillText('R/2', width * 9 / 17, width/2 - rSize)
    ctx.fillText('R', width * 9 / 17, width/2 - rSize*2)
    
    ctx.font = '15px monospace'
    
    ctx.fillText('y', width * 9 / 17, arrowSize * 2)
    ctx.textAlign = 'center'
    ctx.textBaseline = 'bottom'

    ctx.fillText('x', width - arrowSize, height*8/17)
    
    ctx.stroke()
}
function drawFigure() {
    
    ctx.beginPath()
    ctx.fillStyle = figureColor
    ctx.arc(width / 2, height / 2, rSize, 0, Math.PI/2)
    ctx.lineTo(width/2, height/2 + 2 * rSize)
    ctx.lineTo(width / 2 - rSize, height / 2)
    ctx.lineTo(width / 2, height / 2)
    ctx.lineTo(width / 2, height / 2 - 2 * rSize)
    ctx.lineTo(width / 2 + rSize, height / 2 - 2 * rSize)
    ctx.lineTo(width / 2 + rSize, height / 2)




    ctx.fill()

}

canvas.onmousedown = (e) => {
    const form = document.getElementById('form')
    const formData = new FormData(form)
     
    if(!formData.has('r') || formData.get('r') == 0) {
        alert('Сначала введите R')
    } else {
    $r = formData.get('r')
    }
    $x = (e.offsetX / width) * (5 * $r / 2) - (5 / 4) * $r ;
    $y =  Math.round((5 * $r / 4 - (e.offsetY / height * (5 * $r / 2))) * 10) / 10; 
    $dr = $y - Math.floor($y);
    if($y>=0) {
        if($dr >= 0.75) $y = Math.floor($y)+1;
        else if($dr < 0.75 && $dr >= 0.25) $y = Math.floor($y) + 0.5;
        else $y = Math.floor($y);
    } else {
        if($dr <= -0.75) $y = Math.floor($y)-1;
        else if($dr > -0.75 && $dr <= -0.25) $y = Math.floor($y) - 0.5;
        else $y = Math.floor($y);
    }


    form['x'].value = $x;

    form['y'].value = $y;

    if($y > 2  || $y <-2) {
        alert("Y must be from -2 to 2")
    }
    form.submit()
}




drawGraph()