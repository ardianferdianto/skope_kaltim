<div class="feaature bk-book book-1 bk-bookdefault viewlesson">
	<div class="bk-front">
        <div class="bk-cover <?php echo $lesson['Lesson']['color'];?>">
            <h2>
                <span><?php echo $lesson['Lesson']['author']?></span>
                <span style="text-transform:uppercase;"><?php echo $lesson['Lesson']['title']?></span><br/>
                <span style="font-size:0.5em;font-family:arial,helvetica;"><?php echo $lesson['Lesson']['description']?></span>
            </h2>
        </div>
        <div class="bk-cover-back"></div>
    </div>
</div>
	<div class='feature'>
		<div class="contenttextbook nano">
			<div class="nano-content">
				<div class="contentareablock titlearea">
				
                <!--<span><?php echo $lesson['Lesson']['author']?></span>-->	
                <h1 style="text-transform:uppercase;font-size:43px;"><?php echo $lesson['Lesson']['title']?></h1>
                <span style="font-size:1em;font-family:arial,helvetica;margin-top:10px;display:block;"><?php echo $lesson['Lesson']['description']?></span>
            	<p style="margin-top:150px;display:block;font-weight:bold;font-size:1.1em;"><?php echo $lesson['Pelajaran']['nama']?> - <?php echo $lesson['Grade']['details']?></p>
            	<br/>
            	<p style="font-weight:normal;margin-top:20px;display:block;">dibuat oleh:
            	</p>
				<p style="margin-top:7px;display:block;">
            	<?php echo $lesson['Lesson']['author']?>
            	
            	<br/><?php echo nl2br($lesson['Lesson']['kelompok']);?></p>
            	
			</div>
			</div>
		</div>
		
	</div>


	<div class='feature'>
		<div class="contenttextbook nano">
			<div class="nano-content">
				<div class="contentareablock titlearea">
				<img src="<?php echo $this->webroot;?>art/smicro/poweredby.png">
                
			</div>
			</div>
		</div>
		
	</div>
<?php 
foreach ($pagesbook as $item): ?>
	<div class='feature'>
		<div class="contenttextbook nano">
			<div class="nano-content">
				<div class="contentareablock">
				<h2 style="font-size:33px;background-color:#66CAE8;color:#fff;padding:10px;margin-left:-10px;"><?php echo $item['Halaman']['deskripsi_halaman'];?></h2>
				<?php echo $item['Halaman']['content'];?>
			</div>
			</div>
		</div>
		
	</div>

<?php endforeach;
$countpages = count($pagesbook);
if ($countpages % 2 == 0) :?>
  
<div class='feature'>
	<div class="bk-front">
        <div class="bk-cover <?php echo $lesson['Lesson']['color'];?>">
            <img style="margin-top:120px;" src="<?php echo $this->webroot;?>art/smicro/backcover.png">
        </div>
        <div class="bk-cover-back"></div>
    </div>
	
</div>
<?php elseif ($countpages == 0) :?>


<div class='feature'>
	<div class="contenttextbook nano">
		<div class="nano-content">
			<div class="contentareablock titlearea">
			
            
		</div>
		</div>
	</div>
	
</div>

<div class='feature'>

	<div class="bk-front">
        <div class="bk-cover <?php echo $lesson['Lesson']['color'];?>">
            <img style="margin-top:120px;" src="<?php echo $this->webroot;?>art/smicro/backcover.png">
        </div>
        <div class="bk-cover-back"></div>
    </div>
	
	
</div>

<?php else: ?>


<div class='feature'>
	<div class="contenttextbook nano">
		<div class="nano-content">
			<div class="contentareablock titlearea">
			
            
		</div>
		</div>
	</div>
	
</div>

<div class='feature'>

	<div class="bk-front">
        <div class="bk-cover <?php echo $lesson['Lesson']['color'];?>">
            <img style="margin-top:120px;" src="<?php echo $this->webroot;?>art/smicro/backcover.png">
        </div>
        <div class="bk-cover-back"></div>
    </div>
	
	
</div>
<?php endif; ?>

<script type="text/javascript">

$('#preview_left_ico').on('click',function(e){
e.preventDefault();
$.fancybox({
  type: 'ajax',
  width:'95%',
  height:'95%',
  autoSize: false,
  content: '<div id="prevpage"><div style="display:block;"><img src="<?php echo $this->webroot;?>art/smicro/prev_mikro.png">&nbsp;<h3 style="display:inline-block;">PREVIEW MIKROSKOP</h3></div></div>',
  beforeShow : function(){
      $(".fancybox-skin").css("backgroundColor","#384047");
      $.ajax({
        type: "GET",
        dataType: "html",
        cache: false,
        url: "<?php echo $this->webroot;?>halamen/preview_mikro", // preview.php
        //data: $("#postp").serializeArray(), // all form fields
        success: function (data) {
          $('#prevpage').append(data);
          
        } // success
      }); // ajax
  }
  
  //href : '<?php echo $this->webroot; ?>halamen/preview_mikro'
  
}); //fancybox
});
      
</script>



