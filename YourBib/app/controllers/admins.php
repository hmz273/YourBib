<?php

class admins extends Controller
{
   public function __construct(){
      $this->adminModel = $this->model('admin');
   }

   public function dachboard()
   {  $books = $this->adminModel->selectall();
      $data = [
         'books' => $books
      ];
      $this->view('admins/dachboard',$data);
   }


  
   public function add(){

      $this->view('admins/add');
   }
   public function add1(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
         $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
         $image = $_FILES['image']['name'];
         $imageTemp=$_FILES['image']['tmp_name'];
			move_uploaded_file($imageTemp,"./images/".$image);

          $data = [
            
             'name' => trim($_POST['name']),
             'image' => $image,
             'autheur' => trim($_POST['autheur']),
             'type' => trim($_POST['type']),
             'parution' => trim($_POST['parution']),
             'description' => trim($_POST['description'])
          ];
          
         
            // Validated
            if( $this->adminModel->add1($data) ){
               flash('post_message', 'book added');
               // redirect('admins/dachboard');
            } else{
               die('Something went wrong');
            }
      
   }


}
public function update(){
   $id=$_GET['id'];
   $books=$this->adminModel->selectallById($id);
   $data = [
      'books' => $books
   ];
   $this->view('admins/update', $data);
}

public function edit($id)
{   
   if($_SERVER['REQUEST_METHOD']=='POST'){
      // Sanitize POST Array
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
      $image = $_FILES['image']['name'];
      $imageTemp=$_FILES['image']['tmp_name'];
		
      $data = [
         'id'=>$id,
         'name' => trim($_POST['name']),
         'image' => $image,
         'autheur' => trim($_POST['autheur']),
         'type' => trim($_POST['type']),
         'parution' => trim($_POST['parution']),
         'description' => trim($_POST['description'])
      ];

      

      // Make sure no errors
      
         
         if ($image) {
            move_uploaded_file($imageTemp,"./images/".$image);
            if( $this->adminModel->edit($data) === true){
                redirect('admins/dachboard');
            }else{
               die('Something went wrong');
            }  
         }else{
            if( $this->adminModel->edit1($data) === true){
               redirect('admins/dachboard');
           }
         }
         // else ( $this->adminModel->edit($data) === true){
         //    flash('cart_message', 'car Updated');
         //    redirect('admins/dachboard');
         // } else{
         //    die('Something went wrong');
         // }
      
         // Load the view
         
      

   } else{
      $id=$_GET['id'];
      $books=$this->adminModel->selectallById($id);
      $data = [
         'books' => $books
      ];
      $this->view('admins/update', $data);
   }

} 
public function delete($id)
   {
      
         
         if( $this->adminModel->deletebk($id) ){
            flash('post_message', 'Post removed');
            redirect('admins/dachboard');
         } else {
            die('Something went wrong');
         }

  //end function

 








}





}





  



   ?>