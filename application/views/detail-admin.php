<?php
   if (isset($_SESSION['message'])) {
        if ($_SESSION['message'] == "Buku berhasil ditambahkan") {
            echo "<div class='alert alert-success text-center alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_SESSION['message']."</div>";
        }
        unset($_SESSION['message']);
    }

?>
<br><br>
 <div class="header-detail">
    <div class="container detail-content">
      <div class="row">
        <div class="col-sm-7 col-md-7">
          <div class="row">
            <?php
              foreach ($buku as $value) {
                echo "<div class='col-sm-4 col-md-4'>
                <img src='".$value->img_path."' alt='book1'>
                   <br><br><p class='text-center'> <a href='#'' class='btn btn-success' role='button'><span class='glyphicon glyphicon-edit'></span>  Edit</a>    <a href='".base_url()."library/deletebook/".$value->book_id."' class='btn btn-danger' role='button'><span class='glyphicon glyphicon-book'></span>  Hapus</a></p>  
            </div>
            <div class='col-sm-8 col-md-8'>
              <h3 clas='justify'>".$value->title."</h3><br>
                <p class='justify'>
                  <span class='glyphicon glyphicon-user'></span><strong> Penulis : </strong>".$value->author. "<br>
                  <span class='glyphicon glyphicon-home'></span><strong> Penerbit : </strong>"  .$value->publisher. "<br>
                  <span class='glyphicon glyphicon-book'></span>  Tersedia ".$value->quantity." buah <br><br>
                  <span class='glyphicon glyphicon-book '></span>  <strong>Deskripsi : </strong>" .$value->description."<br>

                       
            </div>

            ";

              }
            ?>
            
          </div>
        </div>
      </div>
    </div>  
  </div>
 
  

