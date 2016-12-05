  <div class="modal fade" id="loginModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="insertModalLabel">Login</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url();?>login" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="insert-username" name="username" placeholder="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="insert-password" name="password" placeholder="********">
            </div>
            <input type="hidden" id="insert-command" name="command" value="login">
            <button type="submit" class="btn btn-primary green">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  <div class="hidden-jumbotron">
      <div class="jumbotron wow fadeIn">
      <div class="container">
        <br><br>
        <h1 class="wow slideInLeft">Selamat Datang di Perpustakaan NUsantara</h1>
        <p class="wow fadeInUp">Silahkan melakukan Penambahan atau penghapusan koleksi secara online.</p>
      </div>
    </div>
  </div>
  <div class="carousel-header">
    <div class="head-carousel">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

          <div class="item active">
          
            <img src="<?php echo base_url();?>assets/src/img/lib1.png" alt="koleksi1" width="1714" height="520">
            <div class="carousel-caption">
              <img id="logo-header" src="<?php echo base_url();?>assets/src/img/logo1.png" alt="logo">
              <p>Dikelola oleh Keluarga Mahasiswa Nahdlatul Ulama Fasilkom UI 2015</p>
            </div>
          </div>

          <div class="item">
            <!--Sumber gambar :http://www.iimidr.ac.in/wp-content/uploads/lb_gallery/image00008_258.jpg-->
            <img src="<?php echo base_url();?>assets/src/img/lib2.png" alt="koleksi2" width="1714" height="520">
            <div class="carousel-caption">
              <h3>Layanan Peminjaman</h3>
              <p>Gunakan aplikasi pinjam.in untuk meminjam buku dengan cepat</p>
            </div>
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>    
  </div>
<?php
      if (isset($_SESSION['message'])) {
        if ($_SESSION['message'] == "Login gagal. Harap Coba Lagi"||$_SESSION['message'] == "Harap login terlebih dahulu") {
            echo "<div class='alert alert-danger text-center alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_SESSION['message']."</div>";
        }
        
        unset($_SESSION['message']);
    }
    ?>
  <div class="container text-center">
    <h1>Koleksi Terbaru</h1><br>
    <div class="row text-center">
        <?php
        foreach ($book as $buku) {
          echo "<div class='col-sm-6 col-md-4'> <div class='wow fadeInUp thumbnail'>
          <img src='".$buku['img_path']. "' alt='book".$buku['book_id']."'>
            <div class='title-section'>
                <h3>".$buku['title']."</h3>
            </div>
            <p><span class='glyphicon glyphicon-user'></span>  ".$buku['author']."<br>
            <span class='glyphicon glyphicon-home'></span>   ".$buku['publisher']."<br>
            <span class='glyphicon glyphicon-book'></span>  Tersedia ".$buku['quantity']." buah
            </p>            
            <p class=> <a href='".base_url()."library/detail/".$buku['book_id']."' class='btn btn-default' role='button'><span class='glyphicon glyphicon-list-alt'></span>  Detail</a></p>
     
        </div>
      </div>";
        }
        ?>
    </div>
  </div>