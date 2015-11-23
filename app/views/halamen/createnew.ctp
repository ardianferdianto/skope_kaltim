<div class="masthead clearfix">
  <div class="inner">
  
  </div>
</div>

<div class="inner cover animsition" style="position:relative;">
  <img class="logosmallleft" style="top: -60px;left: 110px;" src="<?php echo $this->webroot?>art/smicro_new/logo-skope-small1.png">
   <div style="position:absolute;top:-70px;right:0;">
    
    <ul class="navbarleftskope" style="width:450px;">
    <li>
      <a href="<?php echo $this->webroot;?>"><img src="<?php echo $this->webroot;?>art/smicro/home_btn.png"></a>
      <a href="<?php echo $this->webroot;?>halamen/createnew"><img src="<?php echo $this->webroot;?>art/smicro/create_btn.png"></a>
      <a href="<?php echo $this->webroot;?>halamen/cari"><img src="<?php echo $this->webroot;?>art/smicro/browse_btn.png"></a>
      <a href="<?php echo $this->webroot;?>halamen/showcam"><img src="<?php echo $this->webroot;?>art/smicro/search_btn.png"></a>
    </li>
    </ul>
  </div>

  <div class="row" id="createnew_panel">
    <div class="col-md-3 leftpanel">
      <img class="" style="margin-top:100px;" src="<?php echo $this->webroot?>art/smicro/identity_guide.png">
    </div>
    <div class="col-md-9 rightpanel">
      <div class="title_container_createnew">
        <h1 class="title_createnew"> Pembuatan Penelitian </h1>
        <p>Selamat datang di modul pembuatan penilitian, untuk memulai silahkan isi judul dan identitas penelitian yang di perlukan </p>
      </div>

      <div id="step1_createnew" class="wizard_createnew">
        <?php echo $form->create('Halaman',array('action'=>'createnew'));?>
          
          <div class="form-group">
            <label for="exampleInputEmail1">Judul Penelitian</label>
            <input type="text" class="form-control" name="data[Lesson][title]" id="LessonTitle" maxlength="255" value="">
          </div>

          <div class="form-inline">
            <div class="form-group">
              <label for="exampleInputEmail1">Mata Pelajaran</label>
              <select type="text" class="form-control" name="data[Lesson][pelajaran_id]" id="LessonTitle">
                <?php foreach ($listPelajaran as $pelajaran ):?>
                  <option value="<?php echo $pelajaran['Pelajaran']['id'] ?>">
                    <?php echo $pelajaran['Pelajaran']['nama'] ?>
                  </option>
                <?php endforeach; ?>
              </select>          
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">Kelas</label>
              <?php echo $form->input('Lesson.grade_id',array('label'=>false,'class'=>'form-control','options'=>$opsi));?>
            </div>

            <div class="form-group clearfix">
              <label for="exampleInputEmail1">Warna Cover</label>
                <select type="text" class="form-control" name="data[Lesson][color]" id="colorselector">
                  <option value="yellow" data-color="#FF924A">Kuning</option>
                  <option value="blue" data-color="#1BBDBF">Biru</option>
                  <option value="green" data-color="#82C671">Hijau</option>
                  <option value="grey" data-color="#A499B7">Ungu</option>
                </select>
                </div>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Nama Group</label>
            <input type="text" class="form-control"  name="data[Lesson][author]" id="exampleInputEmail155555" placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Deskripsi Singkat penelitian</label>
            <input id="awe" type="text" class="form-control"  name="data[Lesson][description]" id="exampleInputEmail2342341" placeholder="">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Anggota group</label>
            <textarea class="form-control" name="data[Lesson][kelompok]" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>

        <?php $form->end();?>
      </div>
    </div>
  </div>

</div>

<script>
  $('#colorselector').colorselector({
    callback: function (value, color, title) {
      $("#colorValue").val(title);
      $("#colorColor").val(color);
    }
  });
</script>