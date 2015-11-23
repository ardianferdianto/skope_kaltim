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
<h3 style="font-weight: bold;font-size:2em;margin-bottom:5px;margin-top:5px;">- Client -</h3>
<h5 style="font-family: -webkit-pictograph;">"<i>Simplicity is the ultimate sophistication</i>" - Leonardo Da Vinci</h5>

<input type="text" id="kelompok" placeholder="Masukan Nama kelompok">
<button id="join-room">Join Conference</button>
<!-- <button id="open-or-join-room">Auto Open Or Join Room</button> -->

<div id="camera_container" class="row">
  <div id="videocontainer" class="videocontainerclient">
  </div>
  <div id="listviewmode" style="display:none;">
    <div class="viewmodebtn" style="margin-bottom:20px;"> 
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
    <!-- <input type="text" id="input-text-chat" placeholder="Enter Text Chat" disabled> -->
    
    
    <div class="chat-output"></div>
</div>


<?php echo $form->create('Halaman',array('action'=>'','id'=>'apa'));?>
    <input name="data['Halaman']['tes']" type="hidden" class="form-control" value="" id="isi">
<?php echo $form->end();?>



<div id="showtoolsserver">
    <span class="bubblesnotif_user" style="display:none;">0</span>
  <span class="glyphicon glyphicon-comment"></span>
  <span>&nbsp;TAMPILKAN PESAN/FILE</span>
</div>



<div id="nav_left_stick">
  <div class="heading_stick">
    <h3>Pesan/File Box</h3>
    <span class="removestickbar glyphicon glyphicon-remove"></span>
  </div>
  <div class="contentstick" id="file-container">
  
  </div>

  <div id="toolslist">
    <button id="share-file"  class="btn btn-primary" title="Share file ke server" disabled>Share File</button>
  
  </div>

</div>

<script>

window.countunread = 0;

var windowWidth = $( window ).width();
$('body').css('width',windowWidth);
$('body').css('overflow-x','hidden');

connection.enableFileSharing = true; // by default, it is "false".


connection.sdpConstraints.mandatory = {
    OfferToReceiveAudio: true,
    OfferToReceiveVideo: true
};
// ......................................................
// .......................UI Code........................
// ......................................................
document.getElementById('join-room').onclick = function() {
    connection.disconnect();
    connection.leave();
    var nama=$('#kelompok').val();
    if(nama===''){
        alert('Mohon isi nama kelompok anda');
        return;
    }
    this.disabled = true;
    $('#kelompok').attr('disabled','disabled');
    //connection.openOrJoin(document.getElementById('room-id').value);
    //connection.connectSocket(function(socket) {

    connection.userid='xtz-'+nama;
    connection.session = {
        audio: true,
        video: true,
        data : true,
        oneway: false
    };

    connection.sdpConstraints.mandatory = {
        OfferToReceiveAudio: true,
        OfferToReceiveVideo: true
    };
    connection.connect('server_room2');
};

/*document.getElementById('open-or-join-room').onclick = function() {
    this.disabled = true;
    connection.openOrJoin(document.getElementById('room-id').value);
};*/

// ......................................................
// ................FileSharing/TextChat Code.............
// ......................................................

document.getElementById('share-file').onclick = function() {
    var fileSelector = new FileSelector();
    fileSelector.selectSingleFile(function(file) {
        connection.send(file);
        var divtoinsert = '<div class="divinserted"><span class="iconstatus glyphicon glyphicon-file"></span><span class="status">Anda share file : </span>'+file.name+'</div>';

        $('#nav_left_stick .contentstick').append(divtoinsert);
    });

    
};

/*document.getElementById('input-text-chat').onkeyup = function(e) {
    if(e.keyCode != 13) return;
    
    // removing trailing/leading whitespace
    this.value = this.value.replace(/^\s+|\s+$/g, '');
    if (!this.value.length) return;
    
    connection.send(this.value);
    appendDIV(this.value);
    this.value =  '';
};*/

var chatContainer = document.querySelector('.chat-output');


function appendDIV(event) {
/*    var div = document.createElement('div');
    div.innerHTML = event.data || event;
    chatContainer.insertBefore(div, chatContainer.firstChild);
    div.tabIndex = 0; div.focus();
    
    document.getElementById('input-text-chat').focus();*/
    var str=event.data;
    var n=str.substr(0,4);
    if(n=="http"){
        //$("#isi").empty().append(str);
        $("#isi").val(str);

        console.log($("#apa").serialize());
        $.ajax({
            type: "POST",
            url: "<?php echo $this->webroot; ?>halamen/process/",
            data: $("#apa").serialize(),
            success: function(data) {
                console.log(data);
                $.notify("Message from server data berhasil di push ","success");
            }

        });

         /*$.ajax({
            url: "<?php echo $this->webroot; ?>halamen/process/"+str,
            dataType: 'html',
            success: function(result){
                $.notify("Message from server data berhasil di push "+result,"success");
            }
          });*/
    }
    else{
        window.countunread ++;
        $('.bubblesnotif_user').fadeIn();
        $('.bubblesnotif_user').text(window.countunread);
        $.notify("Pesan dari server: "+event.data);
        var divtoinsert = '<div class="divinserted"><span class="iconstatus glyphicon glyphicon-envelope"></span><span class="status">Pesan server : </span>'+event.data+'</div>';
        $('#nav_left_stick .contentstick').append(divtoinsert);
    }
}

// ......................................................
// ..................RTCMultiConnection Code.............
// ......................................................

//var connection = new RTCMultiConnection();


window.servernode = '';
window.clientnode = '';
window.clientname = '';

connection.onstream = function(event) {

    $('#listviewmode').show();
    //document.body.appendChild(event.mediaElement);
    if(event.type==='local'){
        var trimcameraname=event.userid.slice(4);
        $('#video_client').append(event.mediaElement);  

        $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+event.userid+'</h2></div>');
        $('video_client').append(event.mediaElement);
        //$('#video_server').addClass('onlyone');
        window.clientnode = event.mediaElement;
        window.clientname = trimcameraname;

    }else if(event.userid==='server_room2'){

        $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
        $('video_server').append(event.mediaElement);
        //$('#video_server').addClass('onlyone');
        window.servernode = event.mediaElement;

        //$('#video_server').append(event.mediaElement);
    }
    console.log(event.type);
    console.log('user id = '+event.userid);
    buildfiftyfifty();

};


function buildfiftyfifty(){
  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
  $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
   
  $('#video_server').append(window.servernode);
  $('#video_client').append(window.clientnode);
  $('#video_server').addClass('showtwo');
  $('#video_client').addClass('showtwo');


  $('#video_server').addClass('fiftyview');
  $('#video_client').addClass('fiftyview');

  layoutcam_composition('48%','48%');
}

function layoutcam_composition(serverWidth,clientWidth){
  $('#video_server').css('width',serverWidth);
  $('#video_client').css('width',clientWidth);

  $('#video_server').css('float','left');
  $('#video_client').css('float','left');

}

connection.onmessage = appendDIV;
connection.filesContainer = document.getElementById('file-container');

connection.onopen = function() {
    document.getElementById('share-file').disabled      = false;
    //document.getElementById('input-text-chat').disabled = false;
    //socket.emit('custom-event', document.getElementById('room-id').value);
    //connection.connectSocket(function(socket) {
    //socket.emit('custom-event', 'his there');

    socket.on('custom-event',function(data){
          console.log('tes'+data);
    });
};
//connection.connect();
connection.onUserStatusChanged = function(event) {
	console.log(event.userid+' is '+event.status+" "+event.type);
    var allRemoteStreams = connection.getRemoteStreams(event.userid);
    console.log(allRemoteStreams);
};
/*var socket = connection.getSocket();
//socket.emit('custom-event', 'hi there');
socket.on('custom-event', function(message) {
    console.log(message);
});*/



 var windowheight = $( window ).height();

  var tinggistick = windowheight-40;
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
        $('.bubblesnotif_user').hide();
        window.countunread =0;
    
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
    $('.bubblesnotif_user').hide();
    window.countunread =0;
    
  });

  function navbar_leftclosed(){
    $('#nav_left_stick').css('right','-=130px').transition({ x: '+130px' });
    //$('#nav_left_stick').transition({ x: '0' });  
    sidebaropened = true;
  }


  $('.viewmodebtn').on('click','#servermore',function(){
    //layoutcam_composition('75%','23%');
    $('#videocontainer').empty();
    $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
    $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
    $('#video_server').append(window.servernode);
    $('#video_client').append(window.clientnode);
    $('#video_server').addClass('showtwo');
    $('#video_client').addClass('showtwo');
    $('#video_server').addClass('videopositionone');
    $('#video_client').addClass('videopositiontwo');
    layoutcam_composition('75%','23%');
});

$('.viewmodebtn').on('click','#clientmore',function(){
    //layoutcam_composition('75%','23%');
    $('#videocontainer').empty();
    $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
    $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
    $('#video_server').append(window.servernode);
    $('#video_client').append(window.clientnode);
    $('#video_server').addClass('showtwo');
    $('#video_client').addClass('showtwo');
    $('#video_client').addClass('videopositionone');
    $('#video_server').addClass('videopositiontwo');
    layoutcam_composition('23%','75%');
});


$('.viewmodebtn').on('click','#fiftyview',function(){

  buildfiftyfifty();
});

$('.viewmodebtn').on('click','#serveronly',function(){

  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_server"><h2 class="camera_title">SERVER</h2></div>');
  $('#video_server').append(window.servernode);

  
  $('#video_server').addClass('onlyone');
  
});


$('.viewmodebtn').on('click','#clientonly',function(){

  $('#videocontainer').empty();
  $('#videocontainer').append('<div id="video_client"><h2 class="camera_title">'+window.clientname+'</h2></div>');
  
    $('#video_client').append(window.clientnode);
  
  $('#video_client').addClass('onlyone');
  
});

</script>
