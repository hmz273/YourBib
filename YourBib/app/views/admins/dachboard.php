<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
  </head>
  <body>

  <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;; -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Cars</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL_ROOT ?> /pages/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT ?>">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT ?>">contact</a>
      </li>
           <?php if(isset($_SESSION['admin']) && $_SESSION['admin']===true) : ?> 
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/admins/dachboard">Dashboard</a>
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
<!-- ///////////////////////////////////////////////://///////////////////////////::::::::::::::::::::::::::::: -->
  <div class="container">
  <button class="btn btn-sm btn-primary mt-4"><a class="text-decoration-none text-light" href="<?php echo URL_ROOT ?> /admins/add" >add book</a></button>
  <div class="row my-4">
		<div class="col-md-10 mx-auto">
<table class="table table-hover bg-light">
  <thead class="thead-light">
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">image</th>
      <th scope="col">autheur</th>
      <th scope="col">type</th>
      <th scope="col">parution</th>
      <th scope="col">description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['books'] as $books) :?>
    <tr>
      <th scope="row"><?php echo $books->id ?></th>
      <td><?php echo $books->name ?></td>
      <td><img src="<?= '../public/images/'.$books->image ?>" style="width:23px;height:34px;"></td>
      <td><?php echo $books->autheur ?></td>
      <td><?php echo $books->type ?></td>
      <td><?php echo $books->parution ?></td>
      <td><?php echo $books->description ?></td>
      <td class="d-flex flex-row " >
      <div>
      <button class="btn btn-sm btn-success"><a class="text-white" href="<?php echo URL_ROOT; ?>/admins/update?id=<?php echo $books->id ?>">update</a></button>
      <button class="btn btn-sm btn-danger"><a class="text-white" href="<?php echo URL_ROOT; ?>/admins/delete/<?php echo $books->id ?>">delete</a></button>
      </div>
      </td>
      
    </tr>
    <?php endforeach;  ?>
     
  </tbody>
</table>


        </div>
        </div>
  </div>
      
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>