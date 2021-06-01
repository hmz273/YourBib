<?php


    class Pages extends Controller
    {

      public function __construct(){
         $this->pageModel = $this->model('page');
      }
       public function index()
       {
          if( isLoggedIn() ) {
             redirect('posts');
          }
          $data = [
              'title' => 'PHP MVC Framework',
              'description' => 'Simple social network built using PHP/MVC.'
          ];
          $this->view('pages/index', $data);
       }

       public function about()
       {
          $dat = [
              'title' => 'About Us',
              'description' => 'App to share posts with other users'
          ];
          $this->view('pages/about',$dat);
       }
       public function offer()
       {
         $books = $this->pageModel->selectall();
         $data = [
            'books' => $books
         ];
         
          
          $this->view('pages/offer',$data);
       }
       public function newRsv($id){
          $id_user=$_SESSION['user_id'];
          if($this->pageModel->newRes($id_user,$id)==true){
             redirect("clients/rsv");
          }

       }
       public function contact()
       {  
          $this->view('pages/contact');
       }
    
    }