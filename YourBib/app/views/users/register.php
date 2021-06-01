<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT . '/views/inc/navbar.php' ?>

<section class="container-fluid">

<div class="flex row justify-content-center mh-100">
<form id="register-form" method="POST" action="<?php echo URL_ROOT; ?>/users/register"
class="col-5 flex column text-center p-4 m-4 bg-light">
<div class="form-group m-3" >
<div>
<label class="float-left" for="exampleFormControlInput1">Full-Name:</label>
<input type="text" name="fullName" class="form-control" id="exampleFormControlInput1" >
<span class="invalidFeedback">
<?php echo $data['name_err']?> 
</span>
</div> 
<div>

<label class="float-left" for="exampleFormControlInput1">Username:</label>
<input type="text" name="userName" class="form-control" id="exampleFormControlInput1" >
<span class="invalidFeedback"></span>
</div>

<div >

 <div >
 <label class="float-left m-2" for="exampleFormControlInput1">password:</label>
   <input type="password" name="password" class="form-control" id="exampleFormControlInput1" >
   <span class="invalidFeedback">
   <?php echo $data['password_err']?> 
            </span>
 </div>
 
 <div class="m-4">
 <button id="submit" type="submit" value="submit" class="btn btn-outline-primary ">sign up</button>
 
 </div>
 <small>You have an account ?<a href="<?php echo URL_ROOT; ?>/users/login"> login</small>
 
 </div>
 </form>


 </div>
 </section>