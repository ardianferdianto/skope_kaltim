<style>

#m{
  width: 70%;
  float: left;
}
</style>

<img class="logosmallleft" style="top:30px;left: 110px;" src="<?php echo $this->webroot?>art/smicro_new/logo-skope-small1.png">
<div style="position:absolute;top:30px;right:-30px;">
<ul class="navbarleftskope" style="width:500px;">
<li>
  <a href="<?php echo $this->webroot;?>"><img src="<?php echo $this->webroot;?>art/smicro/home_btn.png"></a>
  <a href="<?php echo $this->webroot;?>halamen/createnew"><img src="<?php echo $this->webroot;?>art/smicro/create_btn.png"></a>
  <a href="<?php echo $this->webroot;?>halamen/cari"><img src="<?php echo $this->webroot;?>art/smicro/browse_btn.png"></a>
  <a href="<?php echo $this->webroot;?>halamen/showcam"><img src="<?php echo $this->webroot;?>art/smicro/search_btn.png"></a>
</li>
</ul>
</div>

<h1 style="font-weight: bold;margin-top:-40px;">Skope Screencast & Conference</h1>
<h3 style="font-weight: bold;font-size:2em;margin-bottom:5px;margin-top:5px;">- Server -</h3>
<h5 style="font-family: -webkit-pictograph;">"<i>I have not failed. I've successfully discovered 10.000 things that won't work</i>" - Thomas A. Edison</h5>
<div class="buttonstartserver" id="open-room">
  <img src="<?php echo $this->webroot;?>art/smicro/fa.png"><br/>
  <span>START SERVER<br/><small style="margin-top:-5px;display:block;">SCREENCAST</small></span>
</div>
<div id="camera_container" class="row">
  <div id="videocontainer">
  </div>
  <div id="listviewmode" style="display:none;">
    <div class="viewmodebtn"> 
      <span>Pilih mode lihat :</span>&nbsp;&nbsp;
      <div class="btn-group" role="group" aria-label="...">
        <button type="button"  id="fiftyview" title="Client dan server sama besar" class="btn btn-default">
          <img src="<?php echo $this->webroot;?>art/smicro/s4.png">
        </button>
        <button id="servermore" type="button" title="Server Lebih besar dari client" class="btn btn-default">
          <img src="<?php echo $this->webroot;?>art/smicro/s3.png">
        </button>
        <button id="clientmore" type="button" title="Client Lebih besar dari server" class="btn btn-default">
          <img src="<?php echo $this->webroot;?>art/smicro/s2.png">
        </button>
        <button id="serveronly" type="button" title="Tampilkan hanya server" class="btn btn-default">
          <img src="<?php echo $this->webroot;?>art/smicro/s1.png">
        </button>
        <button id="clientonly" type="button" title="Tampilkan hanya client" class="btn btn-default">
          <img src="<?php echo $this->webroot;?>art/smicro/s5.png">
        </button>
      </div>
    </div>
  </div>
</div>

<div id="chat-container">
    <img id="SS" src="">
    <a id="downloadImg" style="display:none;" class="btn btn-info">Download</a>&nbsp;&nbsp;&nbsp;&nbsp;<button id="clearImg" style="display:none;" class="btn btn-default">Clear</button>
    <canvas id="canvasTake" style="display:none;"></canvas>
    
    <div class="chat-output"></div>
</div>

<div id="showtoolsserver">
  <span class="glyphicon glyphicon-comment"></span>
  <span>&nbsp;TAMPILKAN PESAN/FILE</span>
</div>


<div id="showtoolsserver2">
  <span class="bubblesnotif" style="display:none;">0</span>
  <span class="glyphicon glyphicon-list-alt"></span>
  <span>&nbsp;TAMPILKAN CLIENT</span>
</div>


<div id="nav_left_stick">
  <div class="heading_stick">
    <h3>Pesan/File Box</h3>
    <span class="removestickbar glyphicon glyphicon-remove"></span>
  </div>
  <div class="contentstick" id="file-container">
  
  </div>

  <div id="toolslist">
  <form id="form" action="" onsubmit="return submitfunction();" style="">
    <div style="margin-bottom:10px;display:block;">
    <input type="hidden" id="user" value="" />
    <input id="m" class="form-control" autocomplete="off" placeholder="Tulis pesan anda disini..." />
    <button type="submit" id="button" class="btn btn-info">Send</button>
    </div>
    <button id="share-file"  class="btn btn-primary" title="Share file ke client" disabled>Share File</button>
    <button id="iframe-btn" class="btn btn-danger" title="Kirim file referensi ke client"><span class="glyphicon glyphicon-folder-open"></span></button>
  </form>
  <?php echo $form->create('Halaman',array('action'=>'','id'=>'data_img'));?>
  <?php echo $form->input('imgSrc',array('label'=>false,'type'=>'hidden','class'=>'form-control'));?>
  <?php echo $form->end();?>
  </div>

</div>




<div id="nav_left_stick2">
  <div class="heading_stick">
    <h3>CLIENT TERHUBUNG</h3>
    <span class="countuseronline"></span>
    <span class="removestickbar2 glyphicon glyphicon-remove"></span>
  </div>
  <div class="contentstick2" id="rooms-list">
    
  </div>

</div>

<script src="<?php echo $this->webroot;?>skope_node/RTCMultiConnection.js"></script>
<script src="<?php echo $this->webroot;?>skope_node/dev/FileBufferReader.js"></script>

<script src="http://192.168.1.130:9001/socket.io/socket.io.js"></script>
<script>


var windowWidth = $( window ).width();
$('body').css('width',windowWidth);
$('body').css('overflow-x','hidden');

// ......................................................
// .......................UI Code........................
// ......................................................

$('#downloadImg').on('click',function(){
    //var img=document.querySelector('#SS');
    //img.attr('src');
    //var url = img.src.replace(/^data:image\/[^;]/, 'data:application/octet-stream');
    //window.open(url);

    
    
});
$('#clearImg').on('click',function(){
    $('#SS').attr('src','');
    $('#downloadImg').hide();
    $('#clearImg').hide();
    //window.open(url);
});

var connection = new RTCMultiConnection();
connection.socketURL = 'http://192.168.1.130:9001/';
connection.enableFileSharing = true; // by default, it is "false".

$('#join-room').on("click", function(e) {
    connection.join('room_server');
});
function submitfunction(){
  //var from = $('#user').val();
  var message = $('#m').val();
  if(message != '') {
    connection.send(message);
    appendtochatbox('message',message);
  }
  
  $('#m').val('').focus();
    return false;
}
function appendDIV(event) {
    $.notify("Message from server "+event.data || event);
}

function appendtochatbox(type,message){

  
  if(type == 'message'){
    var divtoinsert = '<div class="divinserted"><span class="iconstatus glyphicon glyphicon-envelope"></span><span class="status">Pesan server : </span>'+message+'</div>';
  }else if (type == 'filesharetoclient') {
    var divtoinsert = '<div class="divinserted"><span class="iconstatus glyphicon glyphicon-file"></span><span class="status">Server share file : </span>'+message+'</div>';
  };
  $('#nav_left_stick .contentstick').append(divtoinsert);
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

  document.getElementById('share-file').onclick = function(e) {
      e.preventDefault();
      var fileSelector = new FileSelector();
      fileSelector.selectSingleFile(function(file) {
          connection.send(file);
          appendtochatbox('filesharetoclient',file.name);
          
      });
  };

  //var socket = io.connect('http://192.168.1.130:9001/');
  /*socket.on('custom-event', function(data) {
        console.log('tes'+data);
  });*/
  //$('#share-reference').on("click",function(){

    $('#iframe-btn').on('click',function(e){
        e.preventDefault();
        $.fancybox({
          type: 'iframe',
          width:'95%',
          height:'95%',
          autoSize: false,
          href : '<?php echo $this->webroot; ?>js/filemanager/dialog.php?type=2&field_id=m'
          
        }); //fancybox
        //navbar_leftclosed2();
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
    $(this).fadeOut(function(){
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
       //this.disabled = true;
/*    connection.extra = {
        'session-name': document.getElementById('room-id').value,
        'fullName': 'something special'
    };*/

    //socket.emit('custom-event', { test: 'data' });
    //socket.emit('test', 'ada');
    
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
connection.socketURL = 'http://192.168.1.130:9001/';*/
connection.enableFileSharing = true; // by default, it is "false".


connection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: true,
    OfferToReceiveVideo: true
};

window.servernode = '';
window.clientnode = '';
window.clientname = '';

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
    $("#videocontainer").on("click","#video_server .video-container .takeSnapshot",function(){
       // http://www.rtcmulticonnection.org/docs/takeSnapshot/
       //alert('Capturing gambar server');
        var streamdom= $(this).attr('id');
        var wrapper = document.querySelector('.video-container'),
        video=wrapper.querySelector('video#'+streamdom);
        //video = findVid.querySelector('video');
        //console.log(findVid);
        console.log(video);
        //var vidwidth = video.getAttribute('width');
        //var vidheight = video.getAttribute('height');
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

        $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
        document.getElementById('video_server').appendChild(div);
        $('#video_server').addClass('onlyone');
        window.servernode = div;

        //document.getElementById("myBtn").disabled = false;
    }
/*
    if (event.type==='local') {
        $('#video_server').append(event.mediaElement);
        console.log(event.streamid);
    }*/

    $("#rooms-list").on('click','.join',function(){

        $ids=$(this).data('userid');

        var trimcameraname=$ids.slice(4);
        
        //window.open("<?php echo $this->webroot;?>halamen/view_camera/"+ids);
        if (event.type==='remote') {
            /*$('#video_client').empty();*/
            if(event.userid==$ids){
                //$(this).attr('disabled',true);
                //$('#video_client').empty().append(event.mediaElement);
                window.clientnode = div;
                window.clientname = trimcameraname;
                buildfiftyfifty();
                //$('#video_server .video-container').css('text-align','right');

                $('#listviewmode').show();
                $("#videocontainer").on("click","#video_client .video-container .takeSnapshot",function(){
                   // http://www.rtcmulticonnection.org/docs/takeSnapshot/
                    var streamdom= $(this).attr('id');
                    //alert('Capturing gambar client');
                    //console.log(streamdom);
                    var wrapper = document.querySelector('#video_client .video-container'),
                    //var wrapper = document.querySelector('.video-container'),
                    video=wrapper.querySelector('video#'+streamdom);
                    //video = findVid.querySelector('video');
                    //console.log(findVid);
                    console.log('Video adalah '+video);
                    //var vidwidth = video.getAttribute('width');
                    //var vidheight = video.getAttribute('height');
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

$('.viewmodebtn').on('click','#servermore',function(){
  //layoutcam_composition('75%','23%');
  $('#videocontainer').empty();
   $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
   $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
  document.getElementById('video_server').appendChild(window.servernode);
  document.getElementById('video_client').appendChild(window.clientnode);
  $('#video_server').addClass('showtwo');
  
  
  $('#video_client').addClass('showtwo');

  $('#video_server').addClass('videopositionone');
  $('#video_client').addClass('videopositiontwo');
  layoutcam_composition('75%','23%');
  window.servernode.play();

});

$('.viewmodebtn').on('click','#clientmore',function(){
  //layoutcam_composition('75%','23%');
  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
   $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
   
  document.getElementById('video_server').appendChild(window.servernode);
  document.getElementById('video_client').appendChild(window.clientnode);
  $('#video_server').addClass('showtwo');
  $('#video_client').addClass('showtwo');

  $('#video_client').addClass('videopositionone');
  $('#video_server').addClass('videopositiontwo');

  layoutcam_composition('23%','75%');
});

$('.viewmodebtn').on('click','#fiftyview',function(){

  buildfiftyfifty();
});

function buildfiftyfifty(){
  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
   $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
   
  document.getElementById('video_server').appendChild(window.servernode);
  document.getElementById('video_client').appendChild(window.clientnode);
  $('#video_server').addClass('showtwo');
  $('#video_client').addClass('showtwo');

  $('#video_client').addClass('videopositionone');
  $('#video_server').addClass('videopositionone');

  $('#video_server').addClass('videopositiontwo');
  $('#video_client').addClass('videopositiontwo');

  $('#video_server').addClass('fiftyview');
  $('#video_client').addClass('fiftyview');

  layoutcam_composition('48%','48%');
}


$('.viewmodebtn').on('click','#serveronly',function(){

  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
   
  document.getElementById('video_server').appendChild(window.servernode);
  
  $('#video_server').addClass('onlyone');
  
});


$('.viewmodebtn').on('click','#clientonly',function(){

  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
  
   
  document.getElementById('video_client').appendChild(window.clientnode);
  
  $('#video_client').addClass('onlyone');
  
});

function layoutcam_composition(serverWidth,clientWidth){
  $('#video_server').css('width',serverWidth);
  $('#video_client').css('width',clientWidth);

  $('#video_server').css('float','left');
  $('#video_client').css('float','left');

}


function cameralayoutbuttonshow(){
//  $('#camera_container').append(
//  '');
}

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

    $("#rooms-list").html('');

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
            $("#rooms-list").append('<div class="frame-userconnceted">'+
'<div class="askjoined" style="display:none;">'+
'<button type="button" class="join btn btn-primary" data-userid="'+array[i]+'">TAMPILKAN</button>'+
'</div>'+
'<div class="userconnceted">'+
'<span class="username_connected">'+trim+'</span> <span>online</span>'+
'</div>'+
'</div>');
        };
        $('#nav_left_stick2 .heading_stick span.countuseronline').html(array.length+ ' user online');
        $('.bubblesnotif').show();
        $('.bubblesnotif').removeClass('null');
        $('.bubblesnotif').text(array.length);

    }else{
      $('.bubblesnotif').text('0');
      $('.bubblesnotif').addClass('null');
      $('#nav_left_stick2 .heading_stick span.countuseronline').html('0 user online');
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
    var now = new Date($.now());
    $('#downloadImg').show();
    $('#downloadImg').attr({
        'download': 'screenshot_skope_'+now+'.png',  /// set filename
        'href'    : imgsrc              /// set data-uri
    });
    $('#clearImg').show();
}



  var windowheight = $( window ).height();

  var tinggistick = windowheight-150;
  var sidebaropened = false;

  $( document ).on( "click", "#showtoolsserver", function(e) {
      //alert('you');
        e.preventDefault();

      $('#nav_left_stick').css('height',windowheight);
      $('.contentstick').css('height',tinggistick);
      $('#nav_left_stick').css('right','+=130px').transition({ x: '-130px' });
      //$('#nav_left_stick').transition({ x: '200px' });
              e.stopPropagation(); // <--------------stop here

        sidebaropened = true;
    
  });

  $( document ).on( "click", '.removestickbar', function(e) {
    //alert('sdf');
     //var targetyou = e.target;
     //console.log(targetyou);
     //var you  = $(e.target).parent().parent().parent().parent().parent();

     if(sidebaropened == false){
      $('#nav_left_stick').css('height',windowheight);
      $('#nav_left_stick').css('right','+=130px').transition({ x: '-130px' });
        //$('#nav_left_stick').transition({ x: '200px' });
        e.stopPropagation(); // <--------------stop here

        sidebaropened = true;
    }else{
        navbar_leftclosed();
    }
    
  });

  function navbar_leftclosed(){
    $('#nav_left_stick').css('right','-=130px').transition({ x: '+130px' });
    //$('#nav_left_stick').transition({ x: '0' });  
    sidebaropened = true;
  }





  var tinggistick2 = windowheight-50;
  var sidebaropened2 = false;

  $( document ).on( "click", "#showtoolsserver2", function(e) {
      //alert('you');
        e.preventDefault();

      $('#nav_left_stick2').css('height',windowheight);
      $('.contentstick2').css('height',tinggistick2);
      $('#nav_left_stick2').css('right','+=130px').transition({ x: '-130px' });
      //$('#nav_left_stick').transition({ x: '200px' });
              e.stopPropagation(); // <--------------stop here

        sidebaropened2 = true;
    
  });

  $( document ).on( "click", '.removestickbar2', function(e) {
     
     //var targetyou = e.target;
     //console.log(targetyou);
     //var you  = $(e.target).parent().parent().parent().parent().parent();

     if(sidebaropened2 == false){
      $('#nav_left_stick2').css('height',windowheight);
      $('#nav_left_stick2').css('right','+=130px').transition({ x: '-130px' });
        //$('#nav_left_stick').transition({ x: '200px' });
        e.stopPropagation(); // <--------------stop here

        sidebaropened2 = true;
    }else{
        navbar_leftclosed2();
    }
    
  });

  function navbar_leftclosed2(){
    $('#nav_left_stick2').css('right','-=130px').transition({ x: '+130px' });
    //$('#nav_left_stick').transition({ x: '0' });  
    sidebaropened2 = true;
  }

  $("#rooms-list").on("mouseenter", ".frame-userconnceted", function(event){
    $(this).find('.askjoined').show();
  }).on("mouseleave", ".frame-userconnceted", function(event){
    $(this).find('.askjoined').hide();
  });
  
  
  $.fx.speeds._default = 200;
  $.cssEase['bounce'] ='cubic-bezier(0,1,0.5,1.3)';
</script>
