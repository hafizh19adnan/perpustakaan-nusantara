  <br><br>
  <div class="header-detail">
    <div class="container detail-content">
      <div class="row">

            <?php
                foreach ($buku as $value) {
                  echo "<div class='col-sm-6 col-md-3'>
                  <img src='".$value->img_path."' alt='book1'>
                   </p> <br> <p class='text-center'><a href='".base_url()."library/pinjam/".$value->book_id."' class='btn btn-success' role='button'><span class='glyphicon glyphicon-book'></span>  Pinjam</a> </p>
              </div>
              <div class='col-sm-6 col-md-6'>
                <h3 clas='justify'>".$value->title."</h3><br>
                  <div class='alert-success'>
            <h4><span class='glyphicon glyphicon-book'></span> Tersedia ".$value->quantity." buah</h4>
          </div>
                  <p class='justify'>
                    <span class='glyphicon glyphicon-user'></span><strong> Penulis : </strong>".$value->author. "<br>
                    <span class='glyphicon glyphicon-home'></span><strong> Penerbit : </strong>"  .$value->publisher. "<br><br>
                  " .$value->description."<br>

                            
              </div>

              ";
            }
              
            ?>
            
          </div>
        </div>
      </div>
    </div>  
  </div>
  <?php
   if (isset($_SESSION['message'])) {
        if ($_SESSION['message'] == "Review berhasil ditambahkan") {
            echo "<div class='alert alert-success text-center alert-dismissible fade in' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>".$_SESSION['message']."</div>";
        }
        unset($_SESSION['message']);
    }

?>
  	  <div class="modal fade" id="loginModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="insertModalLabel">Login</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('library/login');?>" method="post">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="insert-username" name="username" placeholder="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="insert-password" name="password" placeholder="********">
            </div>
            <input type="hidden" id="insert-command" name="command" value="login">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="container review-book">
    <h3 class="text-center">Review</h3>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <?php
            $id="";
           foreach ($buku as $value) {
              $id=$value->book_id;
           }
           echo "<form action='".base_url()."library/insertReview/".$id."' method='post' role='form' enctype='multipart/form-data' class='facebook-share-box'>";
        ?>
        
          <div class="share">
            <div class="panel panel-default">
              <div class="panel-body">
                  <textarea name="message" cols="40" rows="10" id="status_message" class="form-control message" style="height: 62px; overflow: hidden;" placeholder="Silahkan tuliskan review Anda"></textarea> 
              </div>
              <div class="panel-footer">
                <div class="form-group button-submit-review">                                 
                  <input type="submit" name="submit" value="Post" class="btn btn-primary">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container review-book">
    <div class="row">
     

          <?php
              foreach ($review as $key) {
                echo" <div class='col-md-6 col-md-offset-3'>
        <div class='panel panel-default'><div class='panel-heading'>";         
                foreach ($user as $val) {
                  if($val['user_id']===$key->user_id){
                    echo "<h4><span class='glyphicon glyphicon-user'></span><span id='namaUserReview'></span> ".$val['username']."</h4>"; 
                  }   
                }
                echo "  <p class='text-primary'> Posted on ".$key->date."</p>
          </div>
          <div class='panel-body'>
            <p><span id='review'></span>".$key->content."
            </p>
          </div>   </div>
      </div>";

               
          }?>
          <!-- 
            
           -->
        </div>
      </div>


