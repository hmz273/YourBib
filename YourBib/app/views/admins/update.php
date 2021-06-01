<?php foreach($data['books'] as $books) ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <div class="container">
  
      <div class="row">
        <div class="col-md-5 mx-auto">
          <form action="<?php echo URL_ROOT; ?>/admins/edit/<?php echo $_GET['id'] ?>"  method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="">Name</label>
              <input type="text" value="<?php echo $books->name ?>" name="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image">
            </div>
            <div class="form-group">
              <label for="">Autheur</label>
              <input type="text"  value="<?php echo $books->autheur ?>" name="autheur" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Type</label>
              <input type="text"  value="<?php echo $books->type ?>" name="type" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Parution</label>
              <input type="text"  value="<?php echo $books->parution ?>" name="parution" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Description</label>
              <input type="text"  value="<?php echo $books->description ?>" name="description" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
     
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
