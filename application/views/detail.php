  <br><br>
  <div class="header-detail">
    <div class="detail-content">
      <div class="row">
  
          	<?php
          		foreach ($buku as $value) {
          			echo "<div class='col-sm-6 col-md-3'>
                <img src='".$value->img_path."' alt='book1'>
            </div>
            <div class='col-sm-6 col-md-6'>
              <h3 clas='justify'>".$value->title."</h3><br>
                <p class='justify'>
                  <span class='glyphicon glyphicon-user'></span><strong> Penulis : </strong>".$value->author. "<br>
                  <span class='glyphicon glyphicon-home'></span><strong> Penerbit : </strong>"  .$value->publisher. "<br>
                  <span class='glyphicon glyphicon-book'></span>  Tersedia ".$value->quantity." buah <br><br>".$value->description."<br>

                </p>            
            </div>

            ";

          		}
          	?>
            
          </div>
        </div>
      </div>
    </div>  
  </div>
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
  

   <div class="review-book">
    <h3 class="text-center">Review</h3>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form action="#" method="post" role="form" enctype="multipart/form-data" class="facebook-share-box">
          <div class="share">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="">
                  <h5 class="text-center">Silahkan <strong><a class="navbar-white" data-toggle="modal" data-target="#loginModal""> Login</a></strong> untuk memberi review buku</h5>
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

