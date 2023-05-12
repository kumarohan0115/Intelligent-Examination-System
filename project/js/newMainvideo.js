const socket = io.connect("/", {
    forceNew: true,
    transports: ["polling"],
});
const peers = {}

const myPeer = new Peer(undefined, {


    path: "/peerjs",
    host: "/",
    port: "3001",
    // port: "443",
    // secure: true,
    config: {
        'iceServers': [
            {
                urls: "stun:openrelay.metered.ca:80"
            },
            {
                urls: "turn:numb.viagenie.ca",
                username: "vp29122002@gmail.com",
                credential: "webrtc"
            },
            {
                urls: "turn:numb.viagenie.ca:443",
                username: "fewaji8087@wodeda.com",
                credential: "Qwerty@123"
            },
            {
                urls: "turn:numb.viagenie.ca:443?transport=tcp",
                username: "fewaji8087@wodeda.com",
                credential: "Qwerty@123"
            },
            {
                urls: "turn:openrelay.metered.ca:80",
                username: "openrelayproject",
                credential: "openrelayproject"
            },
            {
                urls: "turn:openrelay.metered.ca:443",
                username: "openrelayproject",
                credential: "openrelayproject"
            },
            {
                urls: "turn:openrelay.metered.ca:443?transport=tcp",
                username: "openrelayproject",
                credential: "openrelayproject"
            }
        ]
    }
})




let peerIDMain

myPeer.on("open", (id) => {
    peerIDMain = id;
    socket.emit("join-room", roomId, id, myName, screenShareOn = false)
})


let myStream
getUserMedia({ audio: true, video: true },
    function (stream) {
        // console.log(black())
        // const newTrack = stream.getTracks()[0].clone()
        // console.log(newTrack)
        // newTrack.kind = "video"
        // console.log(newTrack)

        myStream = stream
        // myStream.getTracks()[2].enabled = false
        checkPeerId(myVideo, myStream, myName, micStatus)


        myPeer.on("call", (call) => {

            call.answer(stream)


            const video = document.createElement("video")
            let id;
            call.on("stream", (userVideoStream) => {
                if (id != userVideoStream) {
                    id = userVideoStream
                    addUserStream(video, userVideoStream)

                }

                // addUserStream(video, userVideoStream)
            })
        })



        socket.on("user-connected", (remotePeerId, remotePeerName) => {

            setTimeout(connectToNewUser, 1000, remotePeerId, stream)
        })


    }, function (err) {
        console.log(err)
    })


function connectToNewUser(userId, stream) {
    // console.log("Name: ", userName)
    call = myPeer.call(userId, stream)



    const video = document.createElement("video")
    let id;
    call.on("stream", (userVideoStream) => {


        if (id != userVideoStream) {
            id = userVideoStream;

            addUserStream(video, userVideoStream, userId, userName, micStatus = true, screenShareOnS)
        }


    })

    call.on("close", () => {
        try {
            if (document.getElementById(userId)) {
                document.getElementById(userId).remove()
            }

            video.remove()
        } catch (e) {

        }

    })
    peers[userId] = call

}


function addUserStream(video, stream, id, userName) {

    // console.log(stream.getTracks())
    // console.log(screenShareOn)
    const div = document.createElement("div")
    div.id = id
    div.className = "video-thumbnail"
    // video.className = "video-thumbnail"
    video.srcObject = stream
    video.onloadedmetadata = function (e) {
        video.play()
    }
    div.appendChild(video)
    const p = document.createElement("p")
    p.innerHTML = userName
    div.appendChild(p)
    allUsers.appendChild(div)
}
