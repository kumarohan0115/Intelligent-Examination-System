from browser import document, html
import Math
canvas = document["canvas"]
ctx = canvas.getContext("2d")

def track_eye(evt):
    x = evt.x
    y = evt.y

    ctx.clearRect(0, 0, canvas.width, canvas.height)
    ctx.beginPath()
    ctx.arc(x, y, 10, 0, 2 * Math.PI)
    ctx.fillStyle = "red"
    ctx.fill()

document.bind("mousemove", track_eye)
