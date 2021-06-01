<?php


    class Users extends Controller
    {
        public function __construct()
        {
          $this->userModel = $this->model('User');
       
        
        }
        
        public function index()
        {
            if(!isLoggedIn() ){
                redirect('admin/dachboard');
            }
            $users = $this->userModel->getUsers();
            $data = [
                'users' => $users
            ];
            return $this->view('users/index', $data);
        }

        public function register()
        {
            //Check for POST
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                'userName' => trim($_POST['userName']),
                'fullName' => trim($_POST['fullName']),
                'password' => trim($_POST['password']),
                ];
                     // Hash Password
                     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                     if ( $this->userModel->register($data) ) {
                         flash('register_success','You are now registered! You !');
                         $this->login();
                         redirect('users/login');
                     } else {
                         die ('Something wrong');
                     }
                 
            } else {
                // Init data
                $data = [
                    'name' => '',
                    'userName' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'userName_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }
        

        public function login()
        {
            // Check for POST
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Process form
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                    'userName' => trim($_POST['userName']),
                    'password' => trim($_POST['password']),
                    'userName_err' => '',
                    'password_err' => '',
                ];

                // Validate userName

                    $userAuthenticated = $this->userModel->login1($data['userName'], $data['password']);
                    $user = $this->userModel->login($data['userName'], $data['password']);
                    if ( $userAuthenticated) {
                        $this->createUserSession1($userAuthenticated);
                        redirect('admins/dachboard');
                    }elseif($user){
                        $this->createUserSession($user);
                        redirect('clients/rsv');
                    } else {
                        $data = [
                            'userName' => trim($_POST['userName']),
                            'password' => '',
                            'userNamel_err' => 'userNamel or Password are incorrect',
                            'password_err' => 'userNamel or Password are incorrect',
                        ];
                        $this->view('users/login', $data);
                    }
                
            } else {
                // Init data
                $data = [
                    'userName' => '',
                    'password' => '',
                    'userName_err' => '',
                    'password_err' => '',
                ];
                // Load view
                $this->view('users/login', $data);
            }
            
        }

        public function logout()
        {
            $_SESSION['admin']=false;
            $_SESSION['client']=false;
            unset($_SESSION['user_id']);
            unset($_SESSION['user_mail']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('users/login');
        }

        public function createUserSession($user)
        {
            $_SESSION['client']=true;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_userName'] = $user->userName;
            $_SESSION['user_name'] = $user->name;
            redirect('clients/rsv');
        }
        public function createUserSession1($user)
        {
            $_SESSION['admin']=true;
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_userName'] = $user->userName;
            $_SESSION['user_name'] = $user->name;
            redirect('admins/dachboard');
        }


        public function isLoggedIn()
        {
            if ( isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_userName'])) {
                return true;
            } else {
                return false;
            }
        }
    
        public function changePassword()
        {
            if(!isLoggedIn() ){
                redirect('users/login');
            }
            
            //Check for POST
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                // Process form
                $data = [
                    'userName' => $_SESSION['user_userName'],
                    'password_old' => trim($_POST['password_old']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'password_old_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
    
                // Validate Password Old
                if ( empty($data['password_old']) ) {
                    $data['password_old_err'] = 'Please inform your old password';
                } elseif ( strlen($data['password_old']) < 6 ) {
                    $data['password_old_err'] = 'Password old must be at least 6 characters';
                } else if (! $this->userModel->checkPassword($data['userName'], $data['password_old']) ) {
                    $data['password_old_err'] = 'Your old password is wrong!';
                }
                
                    // Validate Password
                if ( empty($data['password']) ) {
                    $data['password_err'] = 'Please inform your password';
                } elseif ( strlen($data['password']) < 6 ) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }
            
                // Validate Confirm Password
                if ( empty($data['confirm_password']) ) {
                    $data['confirm_password_err'] = 'Please confirm your password';
                } else if ( $data['password'] != $data['confirm_password'] ) {
                    $data['confirm_password_err'] = 'Password does not match!';
                }
            
                //Make sure errors are empty
                if ( empty($data['password_old_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ) {
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    
                    if ( $this->userModel->updatePassword($data) ) {
                        flash('register_success','Password updated!');
                        redirect('posts');
                    } else {
                        die ('Something wrong');
                    }
                } else{
                    // Load view with errors
                    $this->view('users/changepassword',$data);
                }
            } else {
                // Init data
                $data = [
                    'userName' => $_SESSION['user_userName'],
                    'password_old' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'password_old_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
            
                // Load view
                $this->view('users/changepassword', $data);
            }
        }
    
        public function add()
        {
            //Check for POST
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
                // Process form
                $data = [
                    'name' => trim($_POST['name']),
                    'userName' => trim($_POST['userName']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'userName_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
            
                // Validate userName
                if ( empty($data['userName']) ) {
                    $data['userName_err'] = 'Please inform the userName user';
                } else {
                    // Check userName
                    if ( $this->userModel->getUserByuserName($data['userName']) ) {
                        $data['userName_err'] = 'This userName already exists in the database.';
                    }
                }
            
                // Validate Name
                if ( empty($data['name']) ) {
                    $data['name_err'] = 'Please inform the name of user';
                }
            
                // Validate Password
                if ( empty($data['password']) ) {
                    $data['password_err'] = 'Please inform the password';
                } elseif ( strlen($data['password']) < 6 ) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }
            
                // Validate Confirm Password
                if ( empty($data['confirm_password']) ) {
                    $data['confirm_password_err'] = 'Please inform the password';
                } else if ( $data['password'] != $data['confirm_password'] ) {
                    $data['confirm_password_err'] = 'Password does not match!';
                }
            
                //Make sure errors are empty
                if ( empty($data['name_err']) && empty($data['userName_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) ) {
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                
                    if ( $this->userModel->addUser($data) ) {
                        flash('user_message','User created with success!');
                        redirect('users/index');
                    } else {
                        die ('Something wrong');
                    }
                } else{
                    // Load view with errors
                    $this->view('users/add',$data);
                }
            } else {
                // Init data
                $data = [
                    'name' => '',
                    'userName' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'userName_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
            
                // Load view
                $this->view('users/add', $data);
            }
        }
    
        public function delete($id)
        {
            if($_SERVER['REQUEST_METHOD']=='POST') {
                // Get existing post from model
                $user = $this->userModel->getUserById($id);
    
                //Check if the user is logged
                if( $user->id == $_SESSION['user_id'] ){
                    flash('user_message', 'You cannot delete your own user!');
                    redirect('users');
                }
                
                //Check if the user has posts
                $row = $this->postModel->getPostByUserId($id);
                if ($row->total > 0 ) {
                    flash('user_message', 'You cannot delete a user with published posts!');
                    redirect('users');
                }
                
                if( $this->userModel->deleteUser($id) ){
                    flash('user_message', 'The user was removed with success!');
                    redirect('users');
                } else {
                    flash('user_message', 'An erro ocurred when delete user');
                    redirect('users');
                }
            
            } else {
                redirect('users');
            }
        } //end function

    }