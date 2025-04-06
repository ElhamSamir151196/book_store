<?php

class ConnectionDB{
    private $con;
    public function __construct() {
        $host="localhost";
        $user="root";
        $password="";
        $db_name="book_store";
        $port="3308";

        $this->con=mysqli_connect($host,$user,$password,$db_name,$port);
        if(!$this->con ){
           // echo  "connection error".mysqli_connect_error()."<br>";
        }else{
           // echo "Connected successfully"."<br>";
        }

    }

    
    public function insert_item($table_name,$data ){
        $data_keys="`".implode("`,`",array_keys($data))."`";
        $data_values="'".implode("','",array_values($data))."'";

        $query="INSERT INTO `$table_name`($data_keys) VALUES ($data_values)";
        $result=mysqli_query($this->con, $query);
        if(mysqli_affected_rows($this->con)==1){
          //  echo "data inserted successfully"."<br>";
            return true;
            
        }else{
          //  echo "insert error".mysqli_error($this->con)."<br>";
            return false;
            

        }
    }

    public function update_item($table_name,$data, $where ){

        $data_keys_value="";//`id`='[value-1]',`first_name`='[value-2]'
        foreach($data as $key=>$value){
            $data_keys_value.="`$key`".'='."'$value' ,";
        }
        $data_keys_value=substr($data_keys_value, 0, -1);//remove last or we can use trimr
        
        $query="UPDATE `$table_name` SET $data_keys_value WHERE $where";  
        //echo "<br><br><br><br><br><br>$query";      
        $result=mysqli_query($this->con, $query);
        if(mysqli_affected_rows($this->con)==1){
           // echo "data updated successfully<br>";
            return true;
            
        }else{
          //  echo "update error".mysqli_error($this->con)."<br>";
            return false;
            
    
        }
    }
    

    public function delete_item($table_name,$where){
        
        $query="DELETE FROM `$table_name` WHERE $where";
        //echo "<br><br><br><br><br>$query";
        $result=mysqli_query($this->con, $query);
        if(mysqli_affected_rows($this->con)==1){
           // echo "data deleted successfully"."<br>";
            return true;
    
        }else{
           // echo "deleted error"."<br>";
            return false;
    
        }
        
    }

    
    function select($table_name,$columns_name="*",$where=null,$limit=null){
        $query="SELECT $columns_name FROM `$table_name`";
        if(isset($where)){
            $query.="where ".$where;
        }
        if(isset($limit)){
            $query.=$limit;
        }

        //echo "<br><br><br><br><br><br>".$query;
        $result=mysqli_query($this->con, $query);
        
        if($result){
            if(mysqli_num_rows($result)>0){
                $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $data;

            }else{
              //  echo  "No Data Exist in $table_name"."<br>";
                return [];
            }
        }else{
           // echo  "select data error".mysqli_connect_error()."<br>";
            return [];
        }
    }

    
    function get_last_id($table_name){
        $query="SELECT MAX(id) FROM `$table_name`";
        
        $result=mysqli_query($this->con, $query);
        
        if($result){
            if(mysqli_num_rows($result)==1){
                $data=mysqli_fetch_assoc($result);
                return $data;
            }else{
              //  echo  "No Data Exist in $table_name"."<br>";
                return 0;
            }
        }else{
           // echo  "select data error".mysqli_connect_error()."<br>";
            return 0;
        }
    }

    public function join_tables($table_name_1,$table_1_key,$table_name_2,$table_2_key,$table_name_3=null,$table_3_key=null){

        $query="SELECT * from $table_name_1
                join $table_name_2 on $table_name_1.$table_1_key =$table_name_2.$table_2_key";

        
        if(isset($table_name_3)&&isset($table_3_key)){
            $query.="join $table_name_3 on $table_name_1.$table_1_key =$table_name_3.$table_3_key";
        }

        //echo "<br><br><br><br><br><br><br><br><br>$query";
        $result=mysqli_query($this->con, $query);
        //echo $query;
        if($result){
            if(mysqli_num_rows($result)>0){// if select many rows
                $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
                return $data;

            }else{
               // echo  "No Data Exist in join"."<br>";
                return [];
            }
        }else{
           // echo  "select data error".mysqli_connect_error()."<br>";
            return [];
        }

    }

    public function __destractor(){
        mysqli_close($this->con);
    }

}


/*
$host="localhost";
$user="root";
$password="";
$db_name="blog2";
$port="3308";
$con1= new ConnectionDB($host,$user,$password,$db_name,$port);

$table_name="users";*/

/*$Col_name= "id, first_name ,last_name" ;
$where="`id`=3";
echo "<pre>";
var_dump($con1->select($table_name,$Col_name,$where));
echo "</pre>";*/

/*
$data=[
    "first_name"=>"elham",
    "last_name" =>"samir",
    "age"       => 20,
    "email"=>"email151@email.com",
    "password"=>"123456"
];
$statues_insert=$con1->insert_item($table_name,$data);
echo $statues_insert;
*/

/*
$data=[
    "first_name"=>"elham11",
    "last_name" =>"samir11",
    "age"       => 25
    
];
$where="id=41";
$statues_update=$con1->update_item($table_name,$data,$where);
echo $statues_update;
*/

/*
$where="id=41";
$statues_deleted=$con1->delete_item($table_name,$where);
echo $statues_deleted;*/


/*** (join) select all posts and thier users owner*/

/*
$table1='posts';
$table2='users';
$table2_key='id';
$table1_key='user_id';
echo "<pre>";
print_r($con1->join_tables($table1,$table1_key,$table2,$table2_key));
echo "</pre>";
*/

?>