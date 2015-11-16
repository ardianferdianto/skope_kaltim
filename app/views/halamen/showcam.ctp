<title>Skope Conference</title>

<h1 style="font-family: -webkit-body;font-weight: bold;">Skope Conference</h1>
<h5 style="font-family: -webkit-pictograph;">"<i>I have not failed. I've successfully discovered 10.000 things that won't work</i>" - Thomas A. Edison</h5>
<style>
video {
    object-fit: fill;
    width: 50%;
}

button, input, select {
    font-family: Myriad, Arial, Verdana;
    font-weight: normal;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 2px 4px;
    text-decoration: none;
    color: rgb(27, 26, 26);
    display: inline-block;
    box-shadow: rgb(255, 255, 255) 1px 1px 0px 0px inset;
    text-shadow: none;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(0.05, rgb(241, 241, 241)), to(rgb(230, 230, 230)));
    font-size: 16px;
    border: 1px solid red;
    outline:none;
}
button:active, input:active, select:active, button:focus, input:focus, select:focus, input[type=text] {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, color-stop(5%, rgb(221, 221, 221)), to(rgb(250, 250, 250)));
    border: 1px solid rgb(142, 142, 142);
}

button[disabled], input[disabled], select[disabled] {
    background: rgb(249, 249, 249);
    border: 1px solid rgb(218, 207, 207);
    color: rgb(197, 189, 189);
}
</style>
<hr>
<button id="open-room">Start Server</button>
<button id="view-client" onclick="window.open('<?php echo $this->webroot;?>halamen/view_camera')">View Client Camera</button>
<hr>
<table style="width: 100%;" id="rooms-list"></table>
<div id="chat-container">
    <br>
    <div id="video_server"></div>
    <div id="video_client"></div>
    <img id="SS" src="">
    <button id="downloadImg" style="display:none;">Download</button>&nbsp;&nbsp;&nbsp;&nbsp;<button id="clearImg" style="display:none;">Clear</button>
    <canvas id="canvasTake" style="display:none;"></canvas>
    <div id="file-container"></div>
    <div class="chat-output"></div>
</div>
<hr>

<script>


// ......................................................
// .......................UI Code........................
// ......................................................
document.getElementById('open-room').onclick = function() {
 
};
$('#downloadImg').on('click',function(){
    var img=document.querySelector('#SS');
    var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
    location.href = url;
});
$('#clearImg').on('click',function(){
    $('#SS').attr('src','');
    $('#downloadImg').hide();
    $('#clearImg').hide();
    //window.open(url);
});

$(document).ready(function() {

     
});
</script>
