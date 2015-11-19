<?php
	echo $html->css('jplist.core.min.css');
	echo $html->css('jplist.pagination-bundle.min.css');
	echo $html->css('book1.css');
	echo $html->css('jquery.fancybox.css');

	echo $javascript->link('jplist.core.min.js'); 
	echo $javascript->link('jplist.pagination-bundle.min.js');
	echo $javascript->link('jquery.fancybox.pack.js');
?>
<style>
	.notifyjs-foo-base {
	  opacity: 0.85;
	  width: 200px;
	  background: #F5F5F5;
	  padding: 5px;
	  border-radius: 10px;
	}

	.notifyjs-foo-base .title {
	  width: 100px;
	  float: left;
	  margin: 10px 0 0 10px;
	  text-align: right;
	}

	.notifyjs-foo-base .buttons {
	  width: 70px;
	  float: right;
	  font-size: 9px;
	  padding: 5px;
	  margin: 2px;
	}

	.notifyjs-foo-base button {
	  font-size: 9px;
	  padding: 5px;
	  margin: 2px;
	  width: 60px;
	}
</style>
<?php if(empty($pelajaranId)):?>
<nav class="navbar navbar-fixed-top navbarcaripenelitian">
	<ul class="navbarleftskope">
	<li>
		<a href="<?php echo $this->webroot;?>"><img src="<?php echo $this->webroot;?>art/smicro/home_btn.png"></a>
		<a href="<?php echo $this->webroot;?>halamen/createnew"><img src="<?php echo $this->webroot;?>art/smicro/create_btn.png"></a>
		<a href="<?php echo $this->webroot;?>halamen/cari"><img src="<?php echo $this->webroot;?>art/smicro/browse_btn.png"></a>
		<a href="<?php echo $this->webroot;?>halamen/showcam"><img src="<?php echo $this->webroot;?>art/smicro/search_btn.png"></a>
	</li>
	</ul>
	<div href="#" class="mainmenuleft">
		<!--<span class="glyphicon glyphicon-align-justify icon"></span>-->
		<!--<div id="nav_left_stick">
			<ul>
				<li>
					<a href="<?php echo $this->webroot?>halamen/home">
						<span class="leftmenu_circle">
							<img style="margin-top: 16px;" class="" src="<?php echo $this->webroot?>art/smicro_new/logo-skope-small2.png">
						</span>
						<span class="leftmenu_text">Beranda</span>
					</a>
				</li>

				<li>
					<a href="<?php echo $this->webroot?>halamen/createnew" >
						<span class="leftmenu_circle" style="background:#bd2635;">
							<img style="margin-top: 16px;" class="" src="<?php echo $this->webroot?>art/smicro_new/create-small1.png">
						</span>
						<span class="leftmenu_text">Buat <br/>Penelitian</span>
					</a>
				</li>


				<li>
					<a href="<?php echo $this->webroot?>halamen/cari" >
						<span class="leftmenu_circle" style="background:#e7b014;">
							<img style="margin-top: 16px;" class="" src="<?php echo $this->webroot?>art/smicro_new/browse-small1.png">
						</span>
						<span class="leftmenu_text">Cari <br/>Penelitian</span>
					</a>
				</li>


				<li>
					<a href="<?php echo $this->webroot?>halamen/showcam" >
						<span class="leftmenu_circle" style="background:#08a6da;">
							<img style="margin-top: 25px;" class="" src="<?php echo $this->webroot?>art/smicro_new/preview-small1.png">
						</span>
						<span class="leftmenu_text">Preview <br/>Mikroskop</span>
					</a>
				</li>

			</ul>
		</div>-->
	</a>
	<!--<img class="logosmallleft" src="<?php echo $this->webroot?>art/smicro_new/logo-skope-small1.png">-->
	<div class="container row center-block" id="navfilter" style="width:1000px">

		<div class="form-group col-xs-3">
		<?php
			echo $form->select(
				'Pelajaran',
				$listPelajaran,
				null,
				array('action'=>'cari', 'class'=>'form-control filtering','id'=>'filtermapel'),
				array('all'=>'Mata pelajaran')
			)
		?>		
		</div>

		<div class="form-group col-xs-2">
		<?php
			echo $form->select(
				'Grade',
				$listGrade,
				null,
				array('action'=>'cari', 'class'=>'form-control filtering','id'=>'filterkelas'),
				array('all'=>'Kelas / Grade')
			)
		?>
		</div>

		<div class="col-xs-4 right-inner-addon ">
		<?php echo $form->create('Halaman',array('action'=>'search','id'=>'keyword','enctype'=>'multipart/form-data'));?>
			<i class="glyphicon glyphicon-search"></i>
			<input name="data[keyword]" data-keyboardname="cari" id="keywordinput" class="form-control filtering" type="text" placeholder="Pencarian...." />
		<?php echo $form->end()?>
		</div>
		
		<!--<div style="right: 0">
			<a class="btn btn-success glyphicon glyphicon-home filtering" title="Awal" href="<?php echo $this->webroot; ?>"></a>
			<a class="btn btn-primary glyphicon glyphicon-plus filtering" title="Buat" href="<?php echo $this->webroot; ?>halamen/createnew"></a>
			<a class="btn btn-warning glyphicon glyphicon-search filtering" title="Mikroskop" href="<?php echo $this->webroot; ?>halamen/showcam"></a>
		</div>-->

	</div>
</nav>

<?php endif;?>
<?php if(empty($pelajaranId)):?>
<div id="jplistpaging">
<?php endif;?>
	<?php if(!empty($listLesson)):?>
	<ul class="align list">
		<?php
		foreach ($listLesson as $item ): ?>
		<li class="list-item" id="bukutampilan_<?php echo $item['Lesson']['id'] ?>">
			<figure class='book'>
				<!-- Front -->
				<ul class='hardcover_front'>
					<li>
						<div class="coverDesign <?php echo $item['Lesson']['color'] ?>">
							<span class="ribbon">kls.<?php echo $item['Grade']['title'] ?></span>
							<h1><?php echo $item['Lesson']['title'] ?></h1>
							<p><?php echo $item['Lesson']['author'] ?></p>
						</div>
					</li>
					<li></li>
				</ul>
				<!-- Pages -->
				<ul class='page'>
					<li></li>
					<li>
						<p><?php echo $item['Lesson']['description'] ?></p>
						<div class="pageBtn">
							<a class="btn btn-primary glyphicon glyphicon-play" title="View" href="<?php echo $this->webroot; ?>lessons/view/<?php echo $item['Lesson']['id'] ?>"></a>
							<a class="btn btn-warning glyphicon glyphicon-edit" title="Edit" href="<?php echo $this->webroot; ?>halamen/write/<?php echo $item['Lesson']['id'] ?>"></a>
							<a class="btn btn-danger glyphicon glyphicon-remove-sign" title="Delete" href="#" data-deletes="<?php echo $item['Lesson']['id'] ?>"></a>
							<a class="btn btn-info glyphicon glyphicon-download-alt" title="Download" data-donlod="<?php echo $item['Lesson']['id'] ?>" href="#"></a>
						</div>
					</li>
					<li></li>
					<li></li>
					<li></li>
				</ul>
				<!-- Back -->
				<ul class='hardcover_back'>
					<li></li>
					<li></li>
				</ul>
				<!-- Spinning -->
				<ul class='book_spine'>
					<li></li>
					<li></li>
				</ul>
			</figure>
		</li>
		<?php endforeach;?>
	</ul>
	<?php else:?>
	<h5> Tidak ditemukan data </h5>
	<?php endif;?>

	<!-- <nav style="display: inline-block"> -->
	<!-- panel -->
	<div class="jplist-panel"  style="display: inline-block">
		<div 
		   class="jplist-pagination" 
		   data-control-type="pagination" 
		   data-control-name="paging" 
		   data-control-action="paging"
		   data-items-per-page="6"
		   data-control-animate-to-top="true">
		</div>
	</div>
	<!-- </nav> -->

<?php if(empty($pelajaranId)):?>
</div>
<?php endif;?>


<script type="text/javascript">
	$('#jplistpaging').jplist({				
		itemsBox: '.list' 
		,itemPath: '.list-item' 
		,panelPath: '.jplist-panel'	
	});
</script>
<?php if(empty($pelajaranId)):?>
<script type="text/javascript">
//styling notify
	$.notify.addStyle('foo', {
	  html: 
	    "<div style='border:1px solid #000;-webkit-box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.40);-moz-box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.40);box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.40);margin-top:100px;'>" +
	      "<div class='clearfix' style='color: black;text-shadow:none;'>" +
	        "<div class='title' data-notify-html='title'/>" +
	        "<div class='buttons'>" +
	          "<button class='no' style='background: #009bcf;border:none;color:#fff;'>Cancel</button>" +
	          "<button class='yes' data-notify-text='button' style='background: #ed0000;border:none;color:#fff;'></button>" +
	        "</div>" +
	      "</div>" +
	    "</div>"
	});

	//listen for click events from this style
	$(document).on('click', '.notifyjs-foo-base .no', function() {
	  //programmatically trigger propogating hide event
		//alert($del);
		$(this).trigger('notify-hide');
	});
	$(document).on('click', '.notifyjs-foo-base .yes', function() {
		//show button text
		$.ajax({
			url: "<?php echo $this->webroot;?>lessons/delete/"+$del,
			dataType: 'html',
			success: function(result){
				$('#bukutampilan_'+$del).remove();
				$.notify('Sukses menghapus data','success');
				//window.location.reload(true);
			}
		});
		//hide notification
		$(this).trigger('notify-hide');
	});


	$("#filtermapel").on("change",function(){
		
		var alamatmapel=$("#filtermapel").val();
		var alamatkelas=$("#filterkelas").val();
		//console.log(alamat);
		console.log(alamatkelas);
		console.log(alamatmapel);
		$('.align').html('<h5>Mencari....</h5>')
		$.ajax({
			url: "<?php echo $this->webroot; ?>halamen/cari/"+alamatmapel+"/"+alamatkelas,
			dataType: 'html',
			success: function(result){
				$('#jplistpaging').html(result);
				//$('.align li').hide();
				//$('.align li').fadeIn();
			}
		});
		$("#keywordinput").val('');
		
		//return false;
	});

	$("#filterkelas").on("change",function(){
		
		var alamatkelas=$("#filterkelas").val();
		var alamatmapel=$("#filtermapel").val();
		console.log(alamatkelas);
		
		$('.align').html('<h5>Mencari....</h5>')
		$.ajax({
			url: "<?php echo $this->webroot; ?>halamen/cari/"+alamatmapel+"/"+alamatkelas,
			dataType: 'html',
			success: function(result){
				$('#jplistpaging').html(result);
				//$('.align li').hide();
				//$('.align li').fadeIn();
			}
		});
		$("#keywordinput").val('');
		
		//return false;
	})

	$( "#keyword" ).submit(function( event ) {

		var keyword=$("#keywordinput").val();
		var keywordsent = {keyword_string:keyword};
		$('.align').html('<h5>Mencari....</h5>')
		$.ajax({
			url: "<?php echo $this->webroot; ?>halamen/search/",
			data: keywordsent,
			dataType: 'html',
			success: function(result){
				$('#jplistpaging').html(result);
				//$('.align li').hide();
				//$('.align li').fadeIn();
				$('#jplistpaging').jplist({				
					itemsBox: '.list' 
					,itemPath: '.list-item' 
					,panelPath: '.jplist-panel'	
				});
			}
		});
		$("#filtermapel").val('all');
		$("#filterkelas").val('all');
  		//alert( "Handler for .submit() called." );
  		event.preventDefault();
	});

	function loadings(texts){
		i = 0;
		text = "Preparing environment";
		setInterval(function() {
		    $("#loading").html(text+Array((++i % 4)+1).join("."));
		    if (i===10) text = texts;
		}, 250);	
	}
	$("#jplistpaging").on("click",'.btn.btn-info.glyphicon.glyphicon-download-alt',function(){
		var lesid=$(this).data("donlod");
		$('#jplistpaging').html('<img src="<?php echo $this->webroot;?>images/gears.gif" width="80px">');
		$('#jplistpaging').append('<h3 id="loading"></h3>');
		loadings('Generating link');
		$.ajax({
			url: "<?php echo $this->webroot; ?>halamen/download/"+lesid,
			dataType: 'html',
			success: function(result){
				$('#jplistpaging').html(result);
				$('#jplistpaging').hide();
				$('#jplistpaging').fadeIn();
			}
		});
	});
	$("#jplistpaging").on("click",'.btn.btn-danger.glyphicon.glyphicon-remove-sign',function(){
		//alert('aaa');
		$del=$(this).data("deletes");
		$.notify({
		  title: 'Yakin akan menghapus file ?',
		  button: 'Confirm'
		}, { 
		  style: 'foo',
		  autoHide: false,
		  clickToHide: false
		});
		
	});
	var windowheight = $( window ).height();
	$( ".mainmenuleft" ).hover(
		
	  function() {
	  	$('#nav_left_stick').css('height',windowheight);
	    $('#nav_left_stick').transition({ x: '200px' });
	    

	  }, function() {
	    $('#nav_left_stick').transition({ x: '0' });
	  }
	);
	$.fx.speeds._default = 200;
	$.cssEase['bounce'] ='cubic-bezier(0,1,0.5,1.3)';
	


	$( ".leftmenu_circle" ).hover(
		
	  function() {
	  	$(this).transition({ scale: 1.2 }, 200,'bounce');
	    

	  }, function() {
	  	$(this).transition({ scale: 1 }, 200,'bounce');
	    
	  }
	);



	$( ".navbarleftskope ul li a img" ).hover(
		
	  function() {
	  	$(this).transition({ scale: 1.2 }, 200,'bounce');
	    

	  }, function() {
	  	$(this).transition({ scale: 1 }, 200,'bounce');
	    
	  }
	);

	
		
	
</script>

<div id="filemanger_left_ico" style="width:250px;">
  <img src="<?php echo $this->webroot;?>art/smicro/file_mangerico.png">
  <span>&nbsp;FILE MANAGER / SERVER</span>
</div>

<?php endif;?>




