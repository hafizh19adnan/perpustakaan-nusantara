 

  <div class="jumbotron wow fadeIn">
    <div class="container">
      <br><br>
      <h1 class="wow slideInLeft">Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1>
      <p class="wow fadeInUp">Silahkan melakukan Penambahan atau penghapusan koleksi secara online.</p>
      <div class="row wow fadeInUp">
        <div class="col-lg-6">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Buku...">
            <span class="input-group-btn">
              <button class="btn  btn-success green" type="button"><span class="glyphicon glyphicon-search"></span>  Cari!</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </div>
  </div>

  <?php
    if (isset($_SESSION['message'])) {
        if ($_SESSION['message'] == "Buku berhasil dihapus") {
            echo "<div class='alert alert-success text-center alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_SESSION['message']."</div>";
        }
        unset($_SESSION['message']);
    }
  ?>
  <div class="adding wow fadeIn">
    <div class="container">
      <h1 class="text-center">Tambah Koleksi</h1>
      <div class="row">
        <div class="col-md-4 col-sm-6"></div>
        <div class="col-md-4 col-sm-6">
          <form method="post" action="<?php echo site_url('library/insertBook');?>" >
            <div class="form-group">
              <label for="judulBuku">Judul</label>
              <input required type="text" class="form-control" name="title" id="judulBuku" placeholder="Judul Buku">
            </div>
            <div class="form-group">
              <label for="namaPenulis">Penulis</label>
              <input required type="text" class="form-control" name="author" id="namaPenulis" placeholder="Nama Penulis">
            </div>
            <div class="form-group">
              <label for="namaPenerbit">Penerbit</label>
              <input required type="text" class="form-control" name="publisher" id="namaPenerbit" placeholder="Nama Penerbit">
            </div>
            <div class="form-group">
              <label for="jumlahBuku">Jumlah</label>
              <input required type="number" min="1" class="form-control" name="quantity" id="jumlahBuku" placeholder="Jumlah">
            </div>
             <div class="form-group">
              <label for="inputDeskripsi">URL Gambar</label>
              <input required type="text" class="form-control" name="img_src" id="imageSource" placeholder="URL Gambar">
            </div>
            <div class="form-group">
              <label for="inputDeskripsi">Deskripsi</label>
              <textarea required cols="40" rows="10" name="deskripsi" id="deskripsiBuku" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="Silahkan tuliskan Deskripsi Buku"></textarea> 
            </div>
           
          
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary green">Tambah</button>
            </div>
          </form>
        </div>
        <div class="col-md-3 col-sm-6"></div>
      </div>
    </div>
  </div>

  <div class="container text-center">
    <h1>Semua Koleksi</h1><br>
    <div class="row text-center">
      <div class="row text-center">
        <?php
        foreach ($book as $buku) {
          echo "<div class='col-sm-6 col-md-4'>
        <div class='thumbnail wow fadeInUp'>
          <img src='".$buku['img_path']. "'alt='book1'>
            <div class='title-section'>
                <h3>".$buku['title']."</h3>
            </div>
            <p><span class='glyphicon glyphicon-user'></span>  ".$buku['author']."<br>
            <span class='glyphicon glyphicon-home'></span>   ".$buku['publisher']."<br>
            <span class='glyphicon glyphicon-book'></span>  Tersedia ".$buku['quantity']." buah
            </p>            
            <p class=> <a href='".base_url()."library/deletebook/".$buku['book_id']."' class='btn btn-danger' role='button'><span class='glyphicon glyphicon-book'></span>  Hapus</a> <a href='".base_url()."library/detail/".$buku['book_id']."' class='btn btn-default' role='button'><span class='glyphicon glyphicon-list-alt'></span>  Detail</a></p>
        </div>
      </div>";
        }
        ?>
    </div>
    </div>
    </div>