<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video-view</title>

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons%22rel=%22stylesheet%22%3E" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
   
    <div class="">
            <video id="localvideo" autoplay playinline></video>
    </div>

</body>
</html>


<style>
*{
        margin: 0%;
        padding: 0%;
        box-sizing: border-box;
    }
    
#localvideo{
    margin-top: -2rem;
    width: 300px;
    height: 300px;
    border-radius: 2rem;
}

</style>
<script type="text/javascript"  src="../js/main.js"> </script>
<script src="https://webrtc.github.io/adapter/adapter-latest.js"></script>


<script type = "text/javascript">
    const  conn = new WebSocket('ws://localhost:8897');
</script>