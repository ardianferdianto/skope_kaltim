<?php 
$varrecorder = uniqid();
?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/draw/style.css">

<style type="text/css">
#container_convert h1{
  color: #fff;
  font-size: 1.7em;
  margin-bottom: 15px;
  padding-bottom: 7px;
  border-bottom: 1px dotted #fff;
}
#container_convert{
  width: 100%;
  padding: 0 30px;
  display: block;
  color: #fff;
}
#container_convert button{
  float: none;
  
}
#container_convert #proses_container{
  margin-top: 40px;
}
.fancybox-skin{
  background: #384047;
}
.draggable { 
  width: 20px; height: 20px; padding: 0.5em; 
  position: absolute;
  font-size: 11px;
}
.draggable textarea{
  background: rgba(255,255,255,0.2);
  border: 1px solid rgba(0,0,0,0.5);
  position: absolute;
}
.draggable .moveicon{
border: none;
cursor: -webkit-grab; cursor: -moz-grab;

}
.draggable{
  border: none;
}
.trashicon{
  position: absolute;
  left: 130px;
  top: 5px;
  cursor: pointer;
}
.colortext_selector{
  width: 10px;
  height: 10px;
  position: absolute;
  left: 110px;
  top: 6px;
  display: block;
  background: #000;
  

}
.colortextareacontainer{
    background-color: #fff;
    float: left;
    padding: 10px;
    position: absolute;
    top: -28px;
    left: 67px;
    width: 100px;
}
.colortextavailable{
  width: 10px;
  height: 10px;
  display: inline-block;
  float: left;
  margin-right: 10px;
  border: 1px solid #000;
}
.colortextavailable.selected{
  border: 2px solid red;
}

.colortextavailable#black{
  background: #000;
}

.colortextavailable#white{
  background: #fff;
}

.colortextavailable#red{
  background: red;
}

.colortextavailable#blue{
  background: blue;
}
#statwait{
  margin-top: 7px;
}
</style>


<div id="container_convert">
  <h1>SKOPE CONVERTER VIDEO</h1>  
  <p style="font-size:0.85em;"> Anda memilih file tipe <span style="text-transform:uppercase;"><?php echo $ext;?></span> , untuk dapat kompatible dengan skope silahkan convert terlebih dahulu file anda dengan menekan tombol convert dibawah ini</p>
  <p style="font-size:1.1em;"> <small>File yang akan di convert :</small><br/><?php echo basename($videourl);?></p>
  <div id="proses_container">
    <button type="button" id="convertvideo" class="btn btn-warning btn-lg">Convert</button>
    <img id="loadinggear" src="<?php echo $this->webroot;?>images/gears.gif" width="80px" style="display:none;">
    <p id="statwait" style="display:none;">memproses video, silahkan tunggu.....</p>
  </div>
</div>



<script type="text/javascript">


function generateId()
{
  var now = new Date();
  return 'video' + now.getFullYear() + now.getMonth() + now.getDate() + now.getHours() + now.getMinutes() + now.getSeconds();
}

$("#convertvideo").click(function(){
    
    var filename = '<?php echo $videourl?>';
    var extension = '<?php echo $ext?>';
    var videoid = generateId()
    
    $('#convertvideo').hide();
    $('#loadinggear').fadeIn();
    $('#statwait').fadeIn();
    

    $.ajax({
        type: "POST",
        url: '<?php echo $this->webroot;?>halamen/convertvideo',
        data: {filename:filename,extension:extension,videoid,startconvert:'start'},
        success: function(data){ 
            alert('Berhasil mengconvert video file akan dimasukkan langsung kedalam halaman editor anda');
            inserttoCKEditor(data,videoid);
        },error: function(){
          alert('Tidak dapat memproses permintaan, silahkan coba kembali');
          $.fancybox.close();
        }
    });
  
  
});


function inserttoCKEditor(videofile,videoID){
    videopath = '<?php echo $this->webroot;?>source/FILE_REFERENSI/LIBRARY/DLL/convert/'+videofile;
    
    //$.fancybox.close();
    

    var toencode ='<cke:video controls="controls" width="400" height="300" id="'+videoID+'"><cke:source src="'+videopath+'" type="video/mp4"></cke:source></cke:video>';


    var encoded = encodeURIComponent(toencode);
    

    var toinserted = '<img class="cke_video" data-cke-realelement="'+encoded+'" data-cke-real-node-type="1" alt="Video" title="Video" align="" src="data:image/gif;base64,R0lGODlhAQABAPABAP///wAAACH5BAEKAAAALAAAAAABAAEAAAICRAEAOw==" data-cke-real-element-type="video" style="width:400px;height:300px;">';
    
    CKEDITOR.instances.rich_ed.insertHtml(toinserted);
    
    $.fancybox.close();

    return false;
};





</script>
