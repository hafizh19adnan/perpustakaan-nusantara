  <div class="jumbotron ">
    <div class="container">
      <br><br>
      <h1>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h1><h3><span id="nama-user"></span></h3>
      <p>Silahkan melakukan peminjaman atau pengembalian secara online.</p>
      <div class="row">
        <div class="col-lg-6">
          <div class="input-group">
            
            <input type="text" class="form-control" placeholder="Cari Buku...">
            
            <span class="input-group-btn">
              <button class="btn btn-success green" type="button"><span class="glyphicon glyphicon-search"></span>  Cari!</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->
      </div><!-- /.row -->
    </div>
  </div>
  <?php
   if (isset($_SESSION['message'])) {
        if ($_SESSION['message'] == "Buku berhasil dikembalikan"||$_SESSION['message'] == "Buku berhasil dipinjam") {
            echo "<div class='alert alert-success text-center alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_SESSION['message']."</div>";
        }else if($_SESSION['message'] == "Maaf. Buku telah dipinjam sebelumnya"){
            echo "<div class='alert alert-danger text-center alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_SESSION['message']."</div>";
        }
        unset($_SESSION['message']);
    }

?>
  <div class="koleksi">
  <div class="container text-center">
    <h1>Koleksi Anda</h1><br>
      <div class="row text-center">
      <?php
      $counter=0;
          foreach ($book as $buku) {
            foreach ($loan as $pinjam) {
              if($buku['book_id']===$pinjam->book_id){
                echo "
                <div class='col-sm-6 col-md-4'>
                  <div class='thumbnail wow fadeInUp'>
                    <img src='" .$buku['img_path']."'' alt='book1'>
                      <div class='title-section'>
                        <h3>".$buku['title']."</h3>
                      </div>
                      <p><span class='glyphicon glyphicon-user'></span>".$buku['author']."<br>
                      <span class='glyphicon glyphicon-home'></span>".$buku['publisher'] ." <br>
                      
                      </p>            
                      <p class='text-center'><a href='".base_url()."library/returnbook/".$buku['book_id']."' class='btn btn-danger' role='button'><span class='glyphicon glyphicon-book'></span>  Kembalikan</a></p>
                  </div>
                </div>";
              $counter++;
              }  
            }
          }
          if($counter===0){
            echo "<h4>Tidak Ada Koleksi ditemukan</h4><br>";
          }
      ?>
     </div>
  </div>
  </div>
 <div class="modal fade" id="outstock" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="insertModalLabel">Maaf..</h4>
        </div>
        <div class="modal-body">
          <p class="text-center">Mohon Maaf. Stok Buku yang anda inginkan sedang kosong :(</p>
        </div>
      </div>
    </div>
  </div>
      

<div class="container text-center">
    <h1>Koleksi Terbaru</h1><br>
    <div class="row text-center">
        <?php
        foreach ($book as $buku) {
          echo "<div class='col-sm-6 col-md-4'>
        <div class='thumbnail wow fadeInUp'>
          <img src='".$buku['img_path']. "' alt='book1'>
          <div class='caption'>
            <div class='title-section'>
              <h3>".$buku['title']."</h3>
            </div>
            <p><span class='glyphicon glyphicon-user'></span>  ".$buku['author']."<br>
            <span class='glyphicon glyphicon-home'></span>   ".$buku['publisher']."<br>
            <span class='glyphicon glyphicon-book'></span>  Tersedia ".$buku['quantity']." buah
            </p>";
            if($buku['quantity']<1){
              echo "<a data-toggle='modal' data-target='#outstock' class='btn btn-success grey' role='button'><span class='glyphicon glyphicon-book'></span>  Pinjam</a> <a href='".base_url()."library/detail/".$buku['book_id']."' class='btn btn-default' role='button'><span class='glyphicon glyphicon-list-alt'></span>  Detail</a>";
            }else{
              echo "<a href='".base_url()."library/pinjam/".$buku['book_id']."' class='btn btn-success' role='button'><span class='glyphicon glyphicon-book'></span>  Pinjam</a> <a href='".base_url()."library/detail/".$buku['book_id']."' class='btn btn-default' role='button'><span class='glyphicon glyphicon-list-alt'></span>  Detail</a>";
            }    
          
          echo "</div></div></div>";
        }
        ?>
    </div>
  </div>