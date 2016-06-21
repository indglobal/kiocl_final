<?php

class Admin_model extends CI_Model
{

    function Admin_model()
	{
	  parent::__construct();
	}

	/*********Login****************/

	/*function validate($email_address, $password)
	{
		$this->db->where('email_address', $email_address);
		$this->db->where('password', $password);
		$query = $this->db->get('regiter');
		if($query->num_rows == 1)
		{
		  return true;
		}
		 
    }*/

    function validate($email_address, $password)
	{
		$this->db->where('username', $email_address);
		$this->db->where('password', $password);
		$query = $this->db->get('user');
		if($query->num_rows == 1)
		{
		  return $query->result();
		}
		 
    }
    
    /*******units***/
    function getunit()
		{
			$query = $this->db->query("SELECT * from units  ");
			return $query->result();
   
		}
		
			function storeunit($data)
		{
			$insert = $this->db->insert('units', $data);
			return $insert;
			
		}
		
		function getunitdata($id) 
		{
			
			$result = $this->db->query("SELECT * from units WHERE units_id=  '$id' ");
			return $result->row_array();
		}
		
		function updateunitdata($id, $data)
		{
			$this->db->where('units_id', $id);
			$this->db->update('units', $data);
		}

    function getDirector($id){
     $this->db->select('*');
     $this->db->from('list_directors');
     $this->db->where('director_id',$id);
     $result = $this->db->get();
     return $result->result_array();

    }
		 function getManager($id){
     $this->db->select('*');
     $this->db->from('list_management');
     $this->db->where('manager_id',$id);
     $result = $this->db->get();
     return $result->result_array();

    }
    function getCommunity($id){
     $this->db->select('*');
     $this->db->from('list_community');
     $this->db->where('community_id',$id);
     $result = $this->db->get();
     return $result->result_array();

    }
    function getGrievance($id){
     $this->db->select('*');
     $this->db->from('list_grievance');
     $this->db->where('id',$id);
     $result = $this->db->get();
     return $result->result_array();

    }
		function deleteunit($id)
		{
			$this->db->select("*");
      $this->db->where('units_id',$id);
			$this->db->delete('units');
			$url = base_url()."admin/unit";
			header("Location:$url");
		} 

		function chksubcatexists($subcat_id){
			
	    $this->db->select('id');
	    $this->db->where('subcat_id',$subcat_id);
    	$this->db->from('subcat_contents');
    	$result = $this->db->get();
 		$row=$result->row();
 		if(empty($row)){
        return "empty";
 		}else{
 	       return $row->id;
 		}
	}
		
		
		 /*******Departments***/
    function getdepartments()
		{
			$query = $this->db->query("SELECT d.departments_id,d.departments_name,d.unit_id,u.units_name  from  departments d JOIN units u ON d.unit_id=u.units_id ");
			return $query->result();
   
		}
		
		
		 function get_unit()
		{
			$query = $this->db->query("SELECT * from units ");
			return $query->result();
   
		}
		function getAll_department()
	 {
	    $this->db->select('*');
    	$this->db->from('departments');
    	$result = $this->db->get();
 		return $result->result_array();
	 }

   function getAll_director()
   {
      $this->db->select('*');
      $this->db->from('list_directors');
      $result = $this->db->get();
    return $result->result_array();
   }
   function getAll_management()
   {
      $this->db->select('*');
      $this->db->from('list_management');
      $result = $this->db->get();
      return $result->result_array();
   }

   function getAll_community()
   {
      $this->db->select('*');
      $this->db->from('list_community');
      $result = $this->db->get();
      return $result->result_array();
   }

    function getAll_grievance()
   {
      $this->db->select('*');
      $this->db->from('list_grievance');
      $result = $this->db->get();
      return $result->result_array();
   }
   

   
	 function getcontent_type()
	 {
	    $this->db->select('*');
    	$this->db->from('content_type');
    	$result = $this->db->get();
 		  return $result->result_array();
	 }
	 
		function get_permission_list()
		{

			$query = $this->db->query("SELECT * from master_permission");
			$un = $query->result_array();
			return $query->result();
	
		}
		
			function storedepartments($data)
		{
			$insert = $this->db->insert('departments', $data);
			return $insert;
			
		}
		
		 function getdeptdata($id) 
		{
			$result = $this->db->query("SELECT d.departments_id,d.departments_name,d.unit_id,u.units_name  from  departments d JOIN units u ON d.unit_id=u.units_id  WHERE departments_id=  '$id' ");
			return $result->row_array();
		}
		
		function updateDeptdata($id, $data)
		{
			$this->db->where('departments_id', $id);
			$this->db->update('departments', $data);
		}
		
		function deletedepartments($id)
		{
			$this->db->select("*");
            $this->db->where('departments_id',$id);
			$this->db->delete('departments');
			$url = base_url()."admin/departments";
			header("Location:$url");
		}  
	function save_permissions($dept_id){  
    
    extract($_POST);
    $chk=$this->check_dept_id($dept_id);
      $ame=array();
      if(!empty($_POST['permissions_id']))
      {
        for($k=0; $k<count($_POST['permissions_id']);$k++)
        {
          $ame_info = array();
          $ame_info['permissions_id']=$_POST['permissions_id'][$k];
          array_push($ame, $ame_info);
          }
         
      }
if(empty($chk)){
$data = array(
            'dept_id'=>$dept_id,
            'permissions_id'=>serialize($ame),             
    );
     if($this->db->insert('set_permission', $data))
    {
      return true;
    } else {
      return false;
    }
}else{
  $data = array('permissions_id'=>serialize($ame),            
    );
  $this->db->where('dept_id', $dept_id);
  $this->db->update('set_permission', $data);
  return true;
}
    }

    function save_subcontent($id,$filepath){

    extract($_POST);
        $subcat_exists=$this->Admin_model->chksubcatexists($subcat_id);
        if($subcat_exists=="empty"){
        }else{
        $id=$subcat_exists;
        }
   ///insert
  if($id==""){
  $data = array(
            'cat_id'=>$cat_id,
            'subcat_id'=>$subcat_id,
            'content'=>$content, 
            'upload_url'=>$filepath,             
    );

 if($this->db->insert('subcat_contents', $data))
    {
      return true;
    } else {
    }

  }else{//update
  	$data = array(
            'cat_id'=>$cat_id,
            'subcat_id'=>$subcat_id,
            'content'=>$content,   
            'upload_url'=>$filepath,          
    );
  	$this->db->where('id', $id);
    $r=$this->db->update('subcat_contents', $data);

   if($r){
   return true;
   }else{
   	return false;
   }
  }
  
    }

    function save_director($id,$filepath){
extract($_POST);

  if($id==""){
  $data = array(
            'name'=>$name,
            'designation'=>$designation, 
            'contents'=>$content, 
            'image'=>$filepath,             
    );

 if($this->db->insert('list_directors', $data))
    {
      return true;
    } else {
    }

  }else{//update
if($filepath==""){
$data = array(
            'name'=>$name,
            'designation'=>$designation, 
            'contents'=>$content, 
    );
    }else{
    $data = array(
            'name'=>$name,
            'designation'=>$designation, 
            'contents'=>$content, 
            'image'=>$filepath,           
    );
  }
    $this->db->where('director_id', $id);
    $r=$this->db->update('list_directors', $data);

   if($r){
   return true;
   }else{
    return false;
   }
  }
  
    }

    function save_manager($id,$filepath){

extract($_POST);

  if($id==""){
  $data = array(
            'name'=>$name,
            'designation'=>$designation, 
            'image'=>$filepath,             
    );

 if($this->db->insert('list_management', $data))
    {
      return true;
    } else {
    }

  }else{//update
if($filepath==""){
$data = array(
            'name'=>$name,
            'designation'=>$designation, 
    );
    }else{
    $data = array(
            'name'=>$name,
            'designation'=>$designation, 
            'image'=>$filepath,           
    );
  }
    $this->db->where('manager_id', $id);
    $r=$this->db->update('list_management', $data);

   if($r){
   return true;
   }else{
    return false;
   }
  }
  
    }

    function save_community($id,$filepath){

extract($_POST);
 $current=date('Y-m-d');

  if($id==""){
  $data = array(
            'heading'=>$heading,
            'image'=>$filepath,  
            'created_at'=>$current,
            'modified_at'=>$current,            
    );

 if($this->db->insert('list_community', $data))
    {
      return true;
    } else {
    }

  }else{//update
if($filepath==""){
$data = array(
      'heading'=>$heading,
      'modified_at'=>$current,            

    );
    }else{
    $data = array(
      'heading'=>$heading,  
      'image'=>$filepath, 
      'modified_at'=>$current,            
            
       
    );
  }
    $this->db->where('community_id', $id);
    $r=$this->db->update('list_community', $data);

   if($r){
   return true;
   }else{
    return false;
   }
  }
  
    }


    function save_grievance($id){

extract($_POST);
 $current=date('Y-m-d');

  if($id==""){
  $data = array(
            'content'=>$content,
            'created_at'=>$current,
            'modified_at'=>$current,            
    );

 if($this->db->insert('list_grievance', $data))
    {
      return true;
    } else {
    }

  }else{//update
$data = array(
      'content'=>$content,
      'modified_at'=>$current,            
    );

    $this->db->where('id', $id);
    $r=$this->db->update('list_grievance', $data);

   if($r){
   return true;
   }else{
    return false;
   }
  }
  
    }

    function deletesubcat($id)
	{
		$this->db->delete('tbl_categories', array('cat_id' => $id));
	}
 function  delete_director($id){
    $this->db->delete('list_directors', array('director_id' => $id));

  }

  function  delete_manager($id){
    $this->db->delete('list_management', array('manager_id' => $id));

  }
  function  delete_community($id){
    $this->db->delete('list_community', array('community_id' => $id));

  }
  function  delete_grievance($id){
    $this->db->delete('list_grievance', array('id' => $id));

  }
     function delete_cat($id)
	{
		$this->db->delete('tbl_categories', array('cat_id' => $id));
	}
    function getContent_byid($id){
       $this->db->select('*');
        $this->db->from('subcat_contents');
        $this->db->where(array('subcat_contents.id' =>$id));
        $this->db->join('tbl_categories', 'tbl_categories.cat_id = subcat_contents.cat_id', 'left');

        $result = $this->db->get();
        return $result->result_array();
    }
    function getCategorydetail_byid($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_categories');
        $this->db->where(array('tbl_categories.cat_id' =>$id));
        $result = $this->db->get();
        return $result->result_array();

    }
		 function check_dept_id($dept_id){

        $this->db->select('*');
        $this->db->from('set_permission');
        $this->db->where(array('set_permission.dept_id' =>$dept_id));
        $result = $this->db->get();
        return $result->result_array();

    }

    function get_selected_permissions($dept_id){
        $this->db->select('permissions_id');
        $this->db->from('set_permission');
        $this->db->where(array('set_permission.dept_id' =>$dept_id));
        $result = $this->db->get();
        return $result->result_array();
    }
     function getAll_permissions()
     {
        $this->db->select('*');
        $this->db->from('master_permission');
        //$this->db->join('master_branch', 'pension_receipt_file_master.Branch_Code = master_branch.Branch_Code', 'inner');
        //$this->db->where(array('pension_receipt_file_master.Branch_Code' =>1004));
        $result = $this->db->get();
        return $result->result_array();
     }


		/****User*************/
		
		 function getUser()
		{
			$query = $this->db->query("SELECT u.user_id,u.username,u.password,u.last_login,u.deparments_id,d.departments_name,u.units_id,un.units_name  from  user u 
			JOIN units un ON u.units_id=un.units_id
			JOIN departments d ON u.deparments_id=d.departments_id  ");
			return $query->result();
   
		}
		
		function storeuser($data)
		{
			$insert = $this->db->insert('user', $data);
			return $insert;
			
		}
		
		 function getuserdata($id) 
		{
			
			$result = $this->db->query("SELECT u.user_id,u.username,u.password,u.last_login,u.deparments_id,d.departments_name,u.units_id,un.units_name  from  user u 
			JOIN units un ON u.units_id=un.units_id
			JOIN departments d ON u.deparments_id=d.departments_id  WHERE u.user_id='$id' ");
			return $result->row_array();
		}
		
		function updateuserdata($id, $data)
		{
			$this->db->where('user_id', $id);
			$this->db->update('user', $data);
		}
		
		function deleteuser($id)
		{
			$this->db->select("*");
            		$this->db->where('user_id',$id);
			$this->db->delete('user');
			$url = base_url()."admin/User";
			header("Location:$url");
		}  
		
		function get_batch_values()  
                {  
   		  $course_id=$_POST['id'];
   	          $this->db->select('*');  
               $this->db->from('departments');  
               $this->db->where('unit_id',$course_id); 
	    $query = $this->db->get();  
	    return $query->result();  
               }

                /*******units***/
    function get_categories()
		{
			$query = $this->db->query("SELECT * from tbl_categories where parent_id=0 order by priority asc");
			return $query->result();   
		}
   function get_Submenucontent(){
   	 $this->db->select('*');
      $this->db->from('subcat_contents');
      $this->db->order_by("id desc");
      $result = $this->db->get();
      return $result->result_array();
   }

   
	function update_ajax(){
        $value=$_POST['value'];
        $row_id=$_POST['row_id'];
        $column=$_POST['column'];
        $update_column='';

        switch ($column) {
            case '1':
                $update_column='cat_name';
                break;
           // case '2':
               // $update_column='address';
               // break;
            default:
                # code...
                break;
        }
        $data = array(    
               $update_column => $value
            );
        if(!empty($value)){
            
                $this->db->where('cat_id', $row_id);
                $this->db->update('tbl_categories', $data);
                echo $value;
        }
        else
        {
            $arr=$this->fetchData($row_id);
            echo $arr[0][$update_column];
        }
    }

    function check_status_category($cat_id)
{
  $CI =&get_instance();
  $CI->db->select('status');
  $CI->db->where(array('tbl_categories.cat_id'=>$cat_id));
  $result = $CI->db->get('tbl_categories');
  $row = $result->row();
  return $row->status;
  }
  function check_status_subcategory($subcat_id)
{
  $CI =&get_instance();
  $CI->db->select('status');
  $CI->db->where(array('tbl_categories.cat_id'=>$subcat_id));
  $result = $CI->db->get('tbl_categories');
  $row = $result->row();
  return $row->status;
  }
  
  function update_status_category($cat_id,$data)
  {
      //$data=array('status'=>1);
      $this->db->where(array('tbl_categories.cat_id'=>$cat_id));
      $this->db->update('tbl_categories', $data);
  }
  function update_status_subcategory($subcat_id,$data)
  {
      //$data=array('status'=>1);
      $this->db->where(array('tbl_categories.cat_id'=>$subcat_id));
      $this->db->update('tbl_categories', $data);
  }
  

		 function get_subcategories()
		{
		$query = $this->db->query("SELECT * from tbl_categories where parent_id<>0 order by priority asc");
			return $query->result();   
		}
		function addgall($data)
		{
			$insert = $this->db->insert('tbl_gal_type', $data);
			return $insert;
			
		}
		function addslider($data)
		{
			$insert = $this->db->insert('tbl_slider_type', $data);
			return $insert;
			
		}	


		function storesubcat($id)
		{
			  extract($_POST);
   

  if($id==""){

 $data = array(
				    'parent_id' => $this->input->post('cat_id'),
				    'cat_name' => $this->input->post('subcat_name'),
					  );
 if($this->db->insert('tbl_categories', $data))
    {
      return true;
    } else {
      return false;
    }
  }else{

  	$data = array(
      'parent_id' => $this->input->post('cat_id'),
     'cat_name' => $this->input->post('subcat_name'),      
    );
  	$this->db->where('cat_id', $id);
    $r=$this->db->update('tbl_categories', $data);

   if($r){
   return true;
   }else{
   	return false;
   }
  }

			// $insert = $this->db->insert('tbl_categories', $data);
			// return $insert;
			
		}	
		function storecat($data)
		{
			extract($_POST);
   

  if($id==""){
 $data = array(
				    'content_type_id' => $this->input->post('content_type'),
				    'cat_name' => $this->input->post('cat_name'),
					  );
 if($this->db->insert('tbl_categories', $data))
    {
      return true;
    } else {
      return false;
    }
  }else{
// print_r("updte".$id);
// exit();
  	$data = array(
     'content_type_id' => $this->input->post('content_type'),
     'cat_name' => $this->input->post('cat_name'),     
    );
  	$this->db->where('cat_id', $id);
    $r=$this->db->update('tbl_categories', $data);

   if($r){
   return true;
   }else{
   	return false;
   }
  } 
			// $insert = $this->db->insert('tbl_categories', $data);
			// return $insert;
			
		}

		function store_content_type($data)
		{
			$insert = $this->db->insert('tbl_content_types', $data);
			return $insert;
			
		}
			
    
		}

?>