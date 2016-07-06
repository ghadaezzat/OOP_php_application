
<?php
class UserModel extends Model{
       public function register(){
           //sanitize to remove html tags
            $post=  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $password = md5($post['password']);
           if($post['submit']){
               if (($post['name']=='')||($post['email'] == '')||($post['password'] == ''))
               {
                   Messages::setMsg('please fill all fields', 'error');
                   
               }			
// Insert into MySQL
               else{
			$this->query('INSERT INTO users (name, email, password) VALUES(:name, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'/shares');
			}
           }
           
                        }

           return;    
       
       
       }
           
       public function login(){
           
            $post=  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $password = md5($post['password']);
           if($post['submit']){
			// Insert into MySQL
			$this->query('select * from users where email= :email and password= :password');
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$row=$this->single();
                        if ($row){
                            
                            $_SESSION['is_logged_in']=true;
                            $_SESSION['user_data']=array(
                                "id" => $row['id'],
                                "name" => $row['name'],
                                "email" => $row['email']
                            );
                            header('Location: '.ROOT_URL.'/users/login');

                        }else{
                            Messages::setMsg("Incorrect email or password", 'error');                        }
		}

           return;           }
       }