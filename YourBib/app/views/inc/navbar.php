<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">YourBib</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URL_ROOT ?> /pages/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL_ROOT ?>/pages/offer">offers</a>
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
              <a class="nav-link" href="<?php echo URL_ROOT; ?>/clients/rsv">Dashboard</a>
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