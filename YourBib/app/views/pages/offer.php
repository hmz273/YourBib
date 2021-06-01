<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT . '/views/inc/navbar.php' ?>
<?php require APP_ROOT . '/views/inc/cards.php' ?>


<div id="Books" class="container mt-3 mb-5">
      <div class="post-heading text-center">
          <h3 class="display-4 font-italic text-secondary" data-aos="fade-up" data-aos-duration="3000">Books</h3>
          <hr class="w-50 mx-auto pb-5" data-aos="fade-left" data-aos-duration="3000">
      </div>
        <div class="row">
        <?php foreach($data['books'] as $books) :   ?>
        <div class="col-lg-4 col-md-6 col-12 pb-5" data-aos="fade-up" data-aos-duration="1500">
          <div class="card">
            <img src="<?= '../public/images/'.$books->image; ?>" class="card-img-top">
            <div class="card-body">
              <h5  class="card-title"><?php echo $books->name?></h5>
              <p class="card-text"><?php echo $books->description?></p>
              <a href="<?php echo URL_ROOT; ?>/pages/newRsv/<?php echo $books->id ?>" class="btn btn-primary">Reserve</a>
            </div>
          </div>
        </div>
        <?php endforeach;  ?>
    </div>
