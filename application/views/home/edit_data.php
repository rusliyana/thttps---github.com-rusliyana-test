<div class=   "container-fluid">

    <h3>HALAMAN TAMBAH DATA</h3>
    <hr>
    <br>
    <form method="post" action="<?php echo base_url('home/proses_edit_data') ?>">

    <input type="hidden" name=id value="<?php echo $news['id']; ?>">

  <div class="form-group">
    <label for="title" class="col-sm-2 col-form-lable">TITLE</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="title" value="<?php echo $news['title']; ?>">
  </div>
</div>

</div>

<div class="form-group">
    <label for="text" class="col-sm-2 col-form-lable">TEXT</label>
    <div class="col-sm-5">
    <input type="text" class="form-control" name="text" value="<?php echo $news['text']; ?>">
  </div>
</div>

<div class="form-group">
    <label for="title" class="col-sm-2 col-form-lable"></label>
    <div class="col-sm-5">
        <button type="submit" class ="btn btn-primary">EDIT BUKU</button>
        <button type="reset" class ="btn btn-danger">RESET</button>
  </div>
</div>
</form>
</div>