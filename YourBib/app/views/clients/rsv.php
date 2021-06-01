
<!doctype html>
<html lang="en">
  <head>
    <title>RSV</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <a class="navbar-brand" href="#">YourBib</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL_ROOT ?> /pages/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT ?>/pages/offer">offers</a>
      </li>
           <?php if(isset($_SESSION['admin']) && $_SESSION['admin']===true) : ?> 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/clients/rsv">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/logout">logout</a>
            </li>
            <?php elseif(isset($_SESSION['client']) && $_SESSION['client']===true) : ?> 
              <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/clients/reservation">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/logout">logout</a>
            </li>
            <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/users/login">Login</a>
            </li>
            <?php endif; ?>
    
    </ul>       
  </div>
</nav>
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-hover">
            <thead >
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php foreach($data['books'] as $books): ?>
            <tbody>
              <tr>
                <td><?php echo $books->id?></td>
                <td><?php echo $books->fullName?></td>
                <td><img src="<?= '../public/images/'.$books->image ?>" style="width:23px;height:34px;"></td>
                <td><?php echo $books->description?></td>
                <td>
                  <a href="<?php echo URL_ROOT; ?>/clients/delete/<?php echo $books->id?>" class="badge badge-danger">Delete</a>
                </td>
              </tr>
            </tbody>
            <?php endforeach; ?>
          </table>
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