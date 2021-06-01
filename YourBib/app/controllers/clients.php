<?php 
class clients extends Controller{
    public function __construct(){
        $this->clientModel = $this->model('client');
     }
     public function rsv()
   {  $books = $this->clientModel->selectall();
      $data = [
         'books' => $books
      ];
      $this->view('clients/rsv',$data);
   }
   public function delete($id){
      if($this->clientModel->delete($id)===true){
          redirect('clients/rsv');
      }
    }
}