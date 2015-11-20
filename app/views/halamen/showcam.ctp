<img class="logosmallleft" style="top:30px;left: 110px;" src="<?php echo $this->webroot?>art/smicro_new/logo-skope-small1.png">
<div style="position:absolute;top:30px;right:30px;">
<ul class="navbarleftskope" style="width:500px;">
<li>
  <a href="<?php echo $this->webroot;?>"><img src="<?php echo $this->webroot;?>art/smicro/home_btn.png"></a>
  <a href="<?php echo $this->webroot;?>halamen/createnew"><img src="<?php echo $this->webroot;?>art/smicro/create_btn.png"></a>
  <a href="<?php echo $this->webroot;?>halamen/cari"><img src="<?php echo $this->webroot;?>art/smicro/browse_btn.png"></a>
  <a href="<?php echo $this->webroot;?>halamen/showcam"><img src="<?php echo $this->webroot;?>art/smicro/search_btn.png"></a>
</li>
</ul>
</div>

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
<form id="form" action="" onsubmit="return submitfunction();" style="padding-left: 64em;color: black;margin-top: 4em;">
  <input type="hidden" id="user" value="" /><input id="m" autocomplete="off" placeholder="Type yor message here.." /><input type="submit" id="button" value="Send"/>
  <button id="share-file" disabled>Share File</button><a href="<?php echo $this->webroot;?>js/filemanager/dialog.php?type=2&field_id=m" class="btn iframe-btn" type="button">Open File Manager</a>
</form>
<?php echo $form->create('Halaman',array('action'=>'','id'=>'data_img'));?>
<?php echo $form->input('imgSrc',array('label'=>false,'type'=>'hidden','class'=>'form-control'));?>
<?php echo $form->end();?>
<hr>

<script src="<?php echo $this->webroot;?>skope_node/RTCMultiConnection.js"></script>
<script src="<?php echo $this->webroot;?>skope_node/dev/FileBufferReader.js"></script>

<script src="http://192.168.1.144:9001/socket.io/socket.io.js"></script>
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

        var connection = new RTCMultiConnection();
        connection.socketURL = 'http://192.168.1.144:9001/';
        connection.enableFileSharing = true; // by default, it is "false".
        $('#join-room').on("click", function(e) {
            connection.join('room_server');
        });
        function submitfunction(){
          //var from = $('#user').val();
          var message = $('#m').val();
          if(message != '') {
            connection.send(message);
          }
          $('#m').val('').focus();
            return false;
        }
        function appendDIV(event) {
            $.notify("Message from server "+event.data || event);
        }
        $(document).ready(function() {
          
          //connection.connect('server_room');
          /*$('#file').on('click',function(){
            var socket = connection.getSocket();
            socket.emit('custom-event', 'his there');
          });*/
          
          connection.session = {
              data : true
          };
          connection.sdpConstraints.mandatory = {
              OfferToReceiveAudio: false,
              OfferToReceiveVideo: false
          };
          connection.onmessage = appendDIV;
          connection.connectSocket(function(socket) {
              socket.on('custom-message', function(message) {
                  console.log(message);
              });
              connection.sdpConstraints.mandatory = {
                  OfferToReceiveAudio: false,
                  OfferToReceiveVideo: false
              };

              connection.connect('server_room');
              socket.emit('custom-message', 'server_room');
              connection.openOrJoin('server_room');
          });

          document.getElementById('share-file').onclick = function() {
              var fileSelector = new FileSelector();
              fileSelector.selectSingleFile(function(file) {
                  connection.send(file);
              });
          };

          //var socket = io.connect('http://localhost:9001/');
          /*socket.on('custom-event', function(data) {
                console.log('tes'+data);
          });*/
          //$('#share-reference').on("click",function(){
            $('.iframe-btn').fancybox({
                'width' : 880,
                'height'  : 570,
                'type'  : 'iframe',
                'autoScale'   : false
              });
              
         
              //
              // Handles message from ResponsiveFilemanager
              //
              function OnMessage(e){
                var event = e.originalEvent;
                 // Make sure the sender of the event is trusted
                 if(event.data.sender === 'responsivefilemanager'){
                    if(event.data.field_id){
                      var fieldID=event.data.field_id;
                      var url=event.data.url;
                      $('#m').val(url).trigger('change');
                      $.fancybox.close();

                      // Delete handler of the message from ResponsiveFilemanager
                      $(window).off('message', OnMessage);
                    }
                 }
              }

              // Handler for a message from ResponsiveFilemanager
              $('.iframe-btn').on('click',function(){
                $(window).on('message', OnMessage);
              });
          });
        //});
        connection.onopen = function() {
            document.getElementById('share-file').disabled      = false;
            //socket.emit('custom-event', 'his there');
        };

        $('#open-room').on('click',function(){
               this.disabled = true;
        /*    connection.extra = {
                'session-name': document.getElementById('room-id').value,
                'fullName': 'something special'
            };*/

            //socket.emit('custom-event', { test: 'data' });
            //socket.emit('test', 'ada');
            connection.connectSocket(function(socket) {
                connection.session = {
                    audio: true,
                    video: true,
                    data : true,
                    oneway: true
                };

                connection.open('server_room2');
                //connection.open(document.getElementById('room-id').value);
            });
        });
        // ......................................................
        // ................FileSharing/TextChat Code.............
        // ......................................................

        var chatContainer = document.querySelector('.chat-output');

        function appendDIV(event) {
            var div = document.createElement('div');
            div.innerHTML = event.data || event;
            chatContainer.insertBefore(div, chatContainer.firstChild);
            div.tabIndex = 0; div.focus();
            
            document.getElementById('input-text-chat').focus();
        }

        // ......................................................
        // ..................RTCMultiConnection Code.............
        // ......................................................

        //var connection = new RTCMultiConnection();

        /*var connection = new RTCMultiConnection();
        connection.socketURL = 'http://localhost:9001/';*/
        connection.enableFileSharing = true; // by default, it is "false".


        connection.sdpConstraints.mandatory = {
            OfferToReceiveAudio: true,
            OfferToReceiveVideo: true
        };

        connection.onstream = function(event) {
            //document.body.appendChild(event.mediaElement);
            //$('#video_server').append(event.mediaElement);
            //alert('ciaaa');
            var div = document.createElement('div');
            div.className = 'video-container';
            div.id = event.streamid || 'self';
            var takeSnapshot = document.createElement('button');
            takeSnapshot.className = 'takeSnapshot';
            takeSnapshot.id = event.streamid;
            takeSnapshot.title = 'Take snapshot of this video';
            $("#chat-container").on("click",".takeSnapshot",function(){
               // http://www.rtcmulticonnection.org/docs/takeSnapshot/
                var streamdom= $(this).attr('id');
                var wrapper = document.querySelector('.video-container'),
                video=wrapper.querySelector('video#'+streamdom);
                //video = findVid.querySelector('video');
                //console.log(findVid);
                console.log(video);
                var vidwidth = video.getAttribute('width');
                var vidheight = video.getAttribute('height');
                console.log(wrapper);
                console.log(event.streamid);
                var canvas = document.querySelector('#canvasTake');
                //canvas.width=vidwidth;
                //canvas.height=vidheight;
                var ctx = canvas.getContext('2d');
                var localMediaStream = event.mediaElement;

                function snapshot() {

                  setTimeout(function() {
                    if (localMediaStream) {
                      ctx.drawImage(video, 0, 0,canvas.width, canvas.height);
                      // "image/webp" works in Chrome.
                      // Other browsers will fall back to image/png.
                     //document.querySelector('#SS').src=canvas.toDataURL('image/png');
                       popup_editor(canvas.toDataURL('image/png'));
                    }
                  },2000);
                }
                snapshot();
            });
            div.appendChild(takeSnapshot);
            div.appendChild(event.mediaElement);
            if (event.type === 'local') {
                document.getElementById('video_server').appendChild(div);
                //document.getElementById("myBtn").disabled = false;
            }
/*
            if (event.type==='local') {
                $('#video_server').append(event.mediaElement);
                console.log(event.streamid);
            }*/

            $("#rooms-list").on('click','.join',function(){

                $ids=$(this).data('userid');
                //window.open("<?php echo $this->webroot;?>halamen/view_camera/"+ids);
                if (event.type==='remote') {
                    /*$('#video_client').empty();*/
                    if(event.userid==$ids){
                        $(this).attr('disabled',true);
                        //$('#video_client').empty().append(event.mediaElement);
                        $('#video_client').empty();
                        document.getElementById('video_client').appendChild(div);
                        $("#video_client").on("click",".takeSnapshot",function(){
                           // http://www.rtcmulticonnection.org/docs/takeSnapshot/
                            var streamdom= $(this).attr('id');
                            alert('Capturing gambar client');
                            console.log(streamdom);
                            //var wrapper = document.querySelector('.video-container'),
                            var video=document.querySelector('video#'+streamdom);
                            //video = findVid.querySelector('video');
                            //console.log(findVid);
                            console.log(video);
                            var vidwidth = video.getAttribute('width');
                            var vidheight = video.getAttribute('height');
                            //console.log(wrapper);
                            console.log(event.streamid);
                            var canvas = document.querySelector('#canvasTake');
                            //canvas.width=vidwidth;
                            //canvas.height=vidheight;
                            var ctx = canvas.getContext('2d');
                            var localMediaStream = event.mediaElement;

                            function snapshot() {
                              setTimeout(function() {
                                if (localMediaStream) {
                                  ctx.drawImage(video, 0, 0,canvas.width, canvas.height);
                                  // "image/webp" works in Chrome.
                                  // Other browsers will fall back to image/png.
                                 //document.querySelector('#SS').src=canvas.toDataURL('image/png');
                                 popup_editor(canvas.toDataURL('image/png'));
                                }
                              },2000);
                            }
                            snapshot();
                        });
                    }
                    else{
                        $('.join').attr('disabled',false);
                    }
                }
            });

        };
        

        connection.onmessage = appendDIV;
        connection.filesContainer = document.getElementById('file-container');
        //removing array
        function removeArray(arr) {
            var what, a = arguments, L = a.length, ax;
            while (L > 1 && arr.length) {
                what = a[--L];
                while ((ax= arr.indexOf(what)) !== -1) {
                    arr.splice(ax, 1);
                }
            }
            return arr;
        }

        var array=[];
        //connection.connect();
        connection.onUserStatusChanged = function(event) {
            //var userdata="<?php echo $this->webroot;?>halamen/view_camera/"+event.userid;

            $("#rooms-list").empty();
            console.log(event.userid+' status '+event.status+' type '+event.type);
            if (event.status=='online'){
                if(event.userid!='server_room'){
                    var temp=event.userid;
                    var trim=temp.substr(0,4);
                    if(trim==='xtz-'){
                        array.push(event.userid);
                    }
                }
            }else{
                removeArray(array,event.userid);
                //$("#rooms-list").empty();
            }
            console.log(array);
            if(array.length>=1){
                for (var i = 0; i < array.length; i++) {
                    var temp=array[i];
                    var trim=temp.slice(4);
                    $("#rooms-list").append('<tr><td><strong>' +trim + '</strong> is an active session.</td>' +
                        '<td><button class="join" data-userid="'+array[i]+'">Join</button></td></tr>');
                };
            }
        };
        function popup_editor(dataImg){
          $("#HalamanImgSrc").val(dataImg);
          $.fancybox({
              type: 'ajax',
              width:650,
              height:450,
              autoSize: false,
              padding:0,
              title   : 'Edit Image',
              content: '<div id="anotationcontainer"></div>',
              beforeShow : function(){
                //$('#anotationcontainer').append('<img id="gbr" src="'+dataImg+'">');
                $.ajax({
                  type: "POST",
                  data: $("#data_img").serialize(),
                  cache: false,
                  url: "<?php echo $this->webroot;?>halamen/anot_image", // preview.php
                  //data: $("#postp").serializeArray(), // all form fields
                  success: function (data) {
                    $('#anotationcontainer').html('');
                    $('#anotationcontainer').append(data);

                    
                    
                  } // success
                }); // ajax
              },
              beforeClose : function(){
                  $('#anotationcontainer').remove();
                  //var oldPlayer = document.getElementById('myImage');
                  //videojs(oldPlayer).dispose(); 
                  //$('#mikroskoppage').html('');
              }
          });
        }
        function setImagesrc(imgsrc) {
            $('#SS').attr("src",imgsrc);
            $('#downloadImg').show();
            $('#clearImg').show();
        }
</script>
