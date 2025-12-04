src="https://webrtc.github.io/adapter/adapter-latest.js";
let pc;
let localstream;
// let sendto =callbtn.data('user');
// const remotevideo= document.querySelector("#remotevideo");
const localvideo=document.querySelector("#localvideo");

const mediaConst ={
    video:true
}

const options = {
    offerToReceiveVideo:1,
}
function getconn()
{
    if(!pc)
    {
        pc= new RTCPeerConnection();

    }
}

async function getcam()
{
    
    let mediastream;
    try{
        if(!pc)
        {
           await getconn();
        }
        mediastream= await navigator.mediaDevices.getUserMedia(mediaConst);
        //lcoalvido 
        localvideo.srcObject= mediastream;
        localstream=mediastream;
        localstream.getTracks().forEach(track => pc.addTrack(track,localstream));
        

    }
    catch(error){
        console.log(error);
    }
}


window.addEventListener("load",()=>{
    getcam();

    console.log("streaming");

    pc.ontrack = e =>{
    localvideo.srcObject=e.streams[0];
    }

});

conn.onopen=function(e)
{
console.log("connected to websocket");
}

conn.onmessage =function(e)
{

}

async function createOffer(sendTo)
{
    await sendIceCandidate(sendTo);
    await pc.createOffer(options);
    await pc.setLocalDescription(pc.localDescription);
    send(pc.localDescription,sendTo);
}


function sendIceCandidate(sendTo)
{
    pc.onicecandidate =e =>{
        if(e.candidate != null)
        {
            send(null,sendTo);
        }
    }
}


function send(data,sendto)
{
    conn.send(JSON.stringify({
        data:data,
        sendto:sendto
    }))
}