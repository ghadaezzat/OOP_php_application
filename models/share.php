<?php
class ShareModel extends Model {
   public function Index(){
       $this->query('select * from shares order by date');
       $rows=$this->resultSet();
       return $rows;
    }
   public function add(){
       //FILTER_SANITIZE_STRING=>remove html tags
       //INPUT_POST=>take the post parameters
       $post=  filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
       if ($post['submit']){
            if (($post['title']=='')||($post['body'] == '')||($post['link'] == ''))
               {
                   Messages::setMsg('please fill all fields', 'error');
                   
               }
       else{
                        $this->query('INSERT INTO shares (title, text, link, user_id) VALUES(:title, :body, :link, :user_id)');
                        $this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', $_SESSION['user_data']['id']);
			$this->execute();
			// Verify
                      
           if ($this->lastInsertId()){
               header('location:'.ROOT_URL.'/shares');
       }
       
           }

           return;
           }
   }
}