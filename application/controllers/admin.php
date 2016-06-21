<?php 
ob_start(); 
class Admin extends CI_Controller
{
    function Admin()/* constuct*/
	{
	     parent::__construct();
		 
		 $this->load->library('session');
		 session_start();
		$this->load->helper('base');

	}
	
           function index()
	{
		if($this->session->userdata('is_logged_in'))
		{
		    $this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->getUser();
			$this->load->view('admin/dashboard',$data);
				
		}
		else
		{       
		$this->load->view('index2');	
	    }	
        }


     /***********Login********************/


    function validate_credentials()
	{	
	   $this->load->model('Admin_model');
	   $this->form_validation->set_rules('captcha', "Captcha", 'required');
       $email_address = $this->input->post('email_address');
	   $password = $this->input->post('password');
       $is_valid = $this->Admin_model->validate($email_address, $password);
 
	   if($is_valid)
		{
		   $data = array(
				'email_address' => $email_address,
				'units_id' => $is_valid[0]->units_id,
				'deparments_id' => $is_valid[0]->deparments_id,
				'user_id' => $is_valid[0]->user_id,
				'is_logged_in' => true);
		    $this->session->set_userdata('is_logged_in', $data);
			if($email_address=="admin@gmail.com")
			{
		       $this->index();
			}
			else{
				$this->index();
			}
		}
		else 
		{

	        $data['message_error'] = TRUE;
			$this->load->view('index2', $data);	
		}
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('index2');	
	}
	
	
	function home()
		{
			$this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->getUser();
			$this->load->view('admin/dashboard',$data);
		}
	
	/******************Unit*******************/
	
	function unit()
		{
			$this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->getunit();
			$this->load->view('admin/units',$data);
		}
		
			
	     function addunit()
                    {
			$this->load->model('Admin_model');
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		    {
			$this->form_validation->set_rules('units_name', 'units_name', 'required');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×                                                          </a><strong>', '</strong></div>');
			
			
			if ($this->form_validation->run())
			{
				     $data_to_store = array(
				    'units_id' => $this->input->post(''),
				    'units_name' => $this->input->post('units_name'),
					  );
				$this->load->model('Admin_model');
				
				if($this->Admin_model->storeunit($data_to_store))
				{
					$data['flash_message'] = TRUE;
				}
				else
				{
					$data['flash_message'] = FALSE;
				}
				
				header("Location:".  base_url()."admin/unit");
			}
		}
		
		$this->load->view('admin/addunit');
		
     }	
     
      function editunit($id)
		{
			$this->load->model('Admin_model');
			$product = $this->Admin_model->getunitdata($id);
		   
		   $this->form_validation->set_rules('units_name', 'units_name', 'required');
						
		   if ($this->form_validation->run())
		   {
			   				 
			$data = array(
				    'units_name' => $this->input->post('units_name'),
				   );
			$this->load->model('Admin_model');
			
			$this->Admin_model->updateunitdata($id, $data);
			
			$this->session->set_flashdata('message', "<p>updated successfully.</p>");
			redirect(base_url().'admin/unit');	
		}
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$this->data['product'] = $product;
			$this->data['units_name'] = array(
										'name' => 'units_name',
										'id'=>'units_name',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('units_name', $product['units_name'])
									);
			$this->load->view('admin/editunitdata',$this->data);
		}
		
		function removeunit()
	       {
		
			$this->load->model('Admin_model');
			$this->Admin_model->deleteunit($this->uri->segment(3));
		
               }
               
               
               
               /********Departments*******************/
               
               function departments()
		{
			$this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->getdepartments();
			$this->load->view('admin/departments',$data);
		}
		
			
			
			
			
	     function adddepartments()
                    {
			$this->load->model('Admin_model');
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		    {
			$this->form_validation->set_rules('unit_id', 'unit_id', 'required');
			$this->form_validation->set_rules('departments_name', 'departments_name', 'required');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×                                                          </a><strong>', '</strong></div>');
			
			
			if ($this->form_validation->run())
			{
				     $data_to_store = array(
				    'departments_id' => $this->input->post(''),
				    'unit_id' => $this->input->post('unit_id'),
				    'departments_name' => $this->input->post('departments_name'),
				    
					  );
				$this->load->model('Admin_model');
				
				if($this->Admin_model->storedepartments($data_to_store))
				{
					$data['flash_message'] = TRUE;
				}
				else
				{
					$data['flash_message'] = FALSE;
				}
				
				header("Location:".  base_url()."admin/departments");
			}
		}
		$data['query']=$this->Admin_model->get_unit();
		$this->load->view('admin/adddepartments',$data);
		
     }	
  //    function manage(){
  //    $this->load->model('Admin_model');

  //    	if($_POST)
  // 	    {

  // 	    $this->form_validation->set_rules('permission_id', 'Permission','required');
  // 	     if($this->form_validation->run() == FALSE){ 

  //       $data['all_department']=getAll_Department();
  //       $data['all_unit']=getAll_Unit();
  //       $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
  //       $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
  //       $data['all_permissions']=$this->Admin_model->getAll_permissions();
		// $this->load->view('admin/manage',$data);
		// 	}else{

		// $permission_id=$this->input->post('permission_id');


  //                 }


  //        }else{
  //       $data['all_department']=getAll_Department();
  //       $data['all_unit']=getAll_Unit();
  //       $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
  //       $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
  //       $data['all_permissions']=$this->Admin_model->getAll_permissions();
		// $this->load->view('admin/manage',$data);
	 //         }// not post
  //    }

//      function manage()
//      {
//      $this->load->model('Admin_model');
//    if($_POST)
//   	    {
// $permission_id=$this->input->post('permission_id');
// switch($permission_id){
// 					case '1':
// 						redirect(site_url('admin/contactus/'));
// 						break;
// 					case '2':
// 						redirect(site_url('admin/shareholders_communication/'));
// 						break;
// 					case '3':
// 						redirect(site_url('admin/awards_accolades/'));
// 						break;
// 					case '4':
// 						redirect(site_url('admin/policies/'));
// 						break;
// 					case '5':
// 						redirect(site_url('admin/csr/'));
// 						break;
// 					case '6':
// 						redirect(site_url('admin/community_development/'));
// 						break;
// 					case '7':
// 						redirect(site_url('admin/global_tenders/'));
// 						break;
// 					case '8':
// 						redirect(site_url('admin/open_tenders/'));
// 						break;
// 					case '9':
// 						redirect(site_url('admin/limited_tenders/'));
// 						break;
// 					case '10':
// 						redirect(site_url('admin/short_tenders/'));
// 						break;
// 					case '11':
// 						redirect(site_url('admin/contracts/'));
// 						break;
// 					case '12':
// 						redirect(site_url('admin/bill_payments/'));
// 						break;
// 					case '13':
// 						redirect(site_url('admin/vendor_registration/'));
// 						break;
// 					case '14':
// 						redirect(site_url('admin/works_awarded/'));
// 						break;
// 					case '15':
// 						redirect(site_url('admin/house_journal/'));
// 						break;
// 					case '16':
// 						redirect(site_url('admin/kiocl_news/'));
// 						break;
// 				    case '17':
// 						redirect(site_url('admin/video_gallery/'));
// 						break;
// 					case '18':
// 						redirect(site_url('admin/photo_gallery/'));
// 						break;
// 					case '19':
// 						redirect(site_url('admin/corporate_brochure/'));
// 						break;
// 					default:
// 						$this->session->set_flashdata('message', 'File no. is not matched.');
// 						redirect(site_url('administrator/pension/file'));
// 						break;
// 				}

// 	}else{
// 		$data['all_department']=getAll_Department();
//         $data['all_unit']=getAll_Unit();
//         $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
//         $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
//         $data['all_permissions']=$this->Admin_model->getAll_permissions();
// 		$this->load->view('admin/manage',$data);
// 	}

//      }
// SELECT * FROM `tbl_categories`,subcat_contents where tbl_categories.parent_id=9 and subcat_contents.subcat_id<>tbl_categories.cat_id group BY tbl_categories.cat_id
     public function getSubat_id() {
          $this->load->model('Admin_model');

        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);

 if($this->session->userdata['is_logged_in']['email_address']=="admin@gmail.com"){
  $permissions=array('0' => array('permissions_id'=>0), );
}else{
$record=$data['selected_permissions'][0];
$permissions=array();
$permissions=unserialize($record['permissions_id']);
}
 $new=array(); for($i=0;$i<count($permissions);$i++){ array_push($new, $permissions[$i]['permissions_id']); }
        $cat_id = $this->input->post('cat_id');
	    $this->db->select('*');
    	$this->db->from('tbl_categories');
    	$this->db->where(array('parent_id'=>$cat_id));
    	$result = $this->db->get();
    	echo '<option value="0">--Select--</option>';
    	foreach ($result->result_array() as $value) {
   if($this->session->userdata['is_logged_in']['email_address']=="admin@gmail.com"){
   echo '<option value="'.$value['cat_id'].'">'.$value['cat_name'].'</option>';

}else{	

        if(in_array($value['cat_id'], $new)) { 
        echo '<option value="'.$value['cat_id'].'">'.$value['cat_name'].'</option>';
           } else {

                   } 

    	}
}

	}

	function add_directors($id='')
        {
          $this->load->model('Admin_model');
          if($_POST){
     	  $id=$this->input->post('id');

            $this->form_validation->set_rules('name', 'name','required');
  	    	$this->form_validation->set_rules('designation', 'designation','required');
  	    	$this->form_validation->set_rules('content', 'content','required');
  	    	//$this->form_validation->set_rules('photograph', ' image','required');

			   if($this->form_validation->run() == FALSE){ 

               $data['id']=$id;
               $data['getDirector']=$this->Admin_model->getDirector($data['id']);
		       $this->load->view('admin/add_directors',$data);
  
			   }else{

			   	if($_FILES['photograph']['name']=="")
	          {
	        	$filePath="";
	        	if($this->Admin_model->save_director($id,$filePath))
	        	{ 
$this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved </div>");
redirect('admin/list_of_directors/');
	        	}

	        }else{
                   
                   $image_old=$_POST['image_old'];
                   

           
     	        $pathToUpload ='assets/uploads/directors/';
  	    	    if ( ! file_exists($pathToUpload) ) {
			       $create = mkdir($pathToUpload, 0777, TRUE);
			                                        }
			        $this->load->library('upload');
			        $fileName=$_FILES['photograph']['name'];
            	    $config['upload_path'] = $pathToUpload;
	                $config['allowed_types'] ='gif|jpg|png';
	                $config['file_name'] = $fileName;
                    
	                $this->upload->initialize($config);
                    if($this->upload->do_upload('photograph')) {
                    $data = $this->upload->data();
                    $filepath=$data['file_name'];
                    } else {
                    $errors = $this->upload->display_errors();
                            }
                     if(!empty($errors)){
	            	$this->session->set_flashdata('message', '<div class="alert alert-danger">'.$errors.'</div>');
                     redirect('admin/list_of_directors/');
	                               } 

     	   if($this->Admin_model->save_director($id,$filepath))
              { 
              	if(isset($image_old)){
                unlink($pathToUpload.$image_old);
                                     }

            $this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved</div>");
            redirect('admin/list_of_directors/');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error">Some error occured during Insertion.</div>');
            redirect('admin/list_of_directors/');
            }
        }
    }


     }else{
        $data['id']=$id;
        $data['getDirector']=$this->Admin_model->getDirector($data['id']);
		$this->load->view('admin/add_directors',$data);
	        }
	}

	function add_manager($id='')
        {
          $this->load->model('Admin_model');
          if($_POST){
     	  $id=$this->input->post('id');

            $this->form_validation->set_rules('name', 'name','required');
  	    	$this->form_validation->set_rules('designation', 'designation','required');
  	    	// $this->form_validation->set_rules('content', 'content','required');
  	        //$this->form_validation->set_rules('photograph', ' image','required');

			   if($this->form_validation->run() == FALSE){ 

               $data['id']=$id;
               $data['getManager']=$this->Admin_model->getManager($data['id']);
		       $this->load->view('admin/add_manager',$data);
  
			   }else{

			   	if($_FILES['photograph']['name']=="")
	          {
	        	$filePath="";
	        	if($this->Admin_model->save_manager($id,$filePath))
	        	{ 
$this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved </div>");
redirect('admin/list_of_management/');
	        	}

	        }else{
                   
                   $image_old=$_POST['image_old'];
               
     	        $pathToUpload ='assets/uploads/manager/';
  	    	    if ( ! file_exists($pathToUpload) ) {
			       $create = mkdir($pathToUpload, 0777, TRUE);
			                                 }
			        $this->load->library('upload');
			        $fileName=$_FILES['photograph']['name'];
            	    $config['upload_path'] = $pathToUpload;
	                $config['allowed_types'] ='gif|jpg|png';
	                $config['file_name'] = $fileName;

	                $this->upload->initialize($config);
                    if($this->upload->do_upload('photograph')) {
                    $data = $this->upload->data();
                    $filepath=$data['file_name'];

                    } else {
                    $errors = $this->upload->display_errors();
                            }
                     if(!empty($errors)){
	            	$this->session->set_flashdata('message', '<div class="alert alert-danger">'.$errors.'</div>');
                     redirect('admin/list_of_management/');
	                               } 
     	   if($this->Admin_model->save_manager($id,$filepath))
              { 
              	if(isset($image_old)){
                unlink($pathToUpload.$image_old);
                                     }

            $this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved</div>");
            redirect('admin/list_of_management/');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error">Some error occured during Insertion.</div>');
            redirect('admin/list_of_management/');
            }
        }
    }


     }else{
        $data['id']=$id;
        $data['getManager']=$this->Admin_model->getManager($data['id']);
		$this->load->view('admin/add_manager',$data);
	        }
	}

	function add_community($id='')
        {

          $this->load->model('Admin_model');
          if($_POST){
     	  $id=$this->input->post('id');

            $this->form_validation->set_rules('heading','heading','required');
  	    	

			   if($this->form_validation->run() == FALSE){ 
               $data['id']=$id;
               $data['getCommunity']=$this->Admin_model->getCommunity($data['id']);
		       $this->load->view('admin/add_community',$data);
 
			   }else{

			   	if($_FILES['photograph']['name']=="")
	          {
	        	$filePath="";
	        	if($this->Admin_model->save_community($id,$filePath))
	        	{ 
$this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved </div>");
redirect('admin/list_of_community/');
	        	}

	        }else{
                  
                   $image_old=$_POST['image_old'];
               
     	        $pathToUpload ='assets/uploads/community/';
  	    	    if ( ! file_exists($pathToUpload) ) {
			       $create = mkdir($pathToUpload, 0777, TRUE);
			                                 }
			        $this->load->library('upload');
			        $fileName=$_FILES['photograph']['name'];
            	    $config['upload_path'] = $pathToUpload;
	                $config['allowed_types'] ='gif|jpg|png';
	                $config['file_name'] = $fileName;

	                $this->upload->initialize($config);
                    if($this->upload->do_upload('photograph')) {
                    $data = $this->upload->data();
                    $filepath=$data['file_name'];

                    } else {
                    $errors = $this->upload->display_errors();
                            }
                     if(!empty($errors)){
	            	$this->session->set_flashdata('message', '<div class="alert alert-danger">'.$errors.'</div>');
                     redirect('admin/list_of_community/');
	                               } 
     	   if($this->Admin_model->save_community($id,$filepath))
              { 
              	if(isset($image_old)){
                unlink($pathToUpload.$image_old);
                                     }

            $this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved</div>");
            redirect('admin/list_of_community/');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error">Some error occured during Insertion.</div>');
            redirect('admin/list_of_community/');
            }
        }
    }


     }else{
        $data['id']=$id;
        $data['getCommunity']=$this->Admin_model->getCommunity($data['id']);
		$this->load->view('admin/add_community',$data);
	        }
	}
	function add_grievance($id='')
        {

          $this->load->model('Admin_model');
          if($_POST){
     	  $id=$this->input->post('id');

            $this->form_validation->set_rules('content','content','required');
  	    
			   if($this->form_validation->run() == FALSE){ 
               $data['id']=$id;
               $data['getGrievance']=$this->Admin_model->getGrievance($data['id']);
		       $this->load->view('admin/add_grievance',$data);
 
			   }else{
     	   if($this->Admin_model->save_grievance($id,$filepath))
              { 
            $this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved</div>");
            redirect('admin/list_of_grievance/');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error">Some error occured during Insertion.</div>');
            redirect('admin/list_of_grievance/');
            }
       
    }


     }else{
        $data['id']=$id;
        $data['getGrievance']=$this->Admin_model->getGrievance($data['id']);
		$this->load->view('admin/add_grievance',$data);
	        }
	}
	function list_of_directors()
	{
		$this->load->model('Admin_model');
        $data['query1']=$this->Admin_model->getAll_director();
        $this->load->view('admin/list_of_directors',$data);
	}

	function list_of_management(){
        $this->load->model('Admin_model');
        $data['query1']=$this->Admin_model->getAll_management();
        $this->load->view('admin/list_of_management',$data);
	}
	function list_of_community(){
        $this->load->model('Admin_model');
        $data['query1']=$this->Admin_model->getAll_community();
        $this->load->view('admin/list_of_community',$data);
	}

	function list_of_grievance(){
        $this->load->model('Admin_model');
        $data['query1']=$this->Admin_model->getAll_grievance();
        $this->load->view('admin/list_of_grievance',$data);
	}
	

	function delete_directors($director_id){
    $pathToUpload ='assets/uploads/directors/';
    $this->load->model('Admin_model');
    $data['getDirector']=$this->Admin_model->getDirector($director_id);
    unlink($pathToUpload.$data['getDirector'][0]['image']);

        if($this->uri->segment(3, 0) != ""){
		$this->Admin_model->delete_director($this->uri->segment(3, 0));	
		}
		redirect("admin/list_of_directors");
	}
    function delete_manager($manager_id){
    $pathToUpload ='assets/uploads/manager/';
    $this->load->model('Admin_model');
    $data['getManager']=$this->Admin_model->getManager($manager_id);
    unlink($pathToUpload.$data['getManager'][0]['image']);
        if($this->uri->segment(3, 0) != ""){
		$this->Admin_model->delete_manager($this->uri->segment(3, 0));	
		}
		redirect("admin/list_of_management");
	}

	 function delete_community($community_id){
    $pathToUpload ='assets/uploads/community/';
    $this->load->model('Admin_model');
        $data['getCommunity']=$this->Admin_model->getCommunity($community_id);
    unlink($pathToUpload.$data['getCommunity'][0]['image']);
        if($this->uri->segment(3, 0) != ""){
		$this->Admin_model->delete_community($this->uri->segment(3, 0));	
		}
		redirect("admin/list_of_community");
	}

	function delete_grievance($id){
    $this->load->model('Admin_model');
        if($this->uri->segment(3, 0) != ""){
		$this->Admin_model->delete_grievance($this->uri->segment(3, 0));	
		}
		redirect("admin/list_of_grievance");
	}
    
	
	
	function getContenttpe(){
		$cat_id = $this->input->post('cat_id');
	    $this->db->select('content_type_id');
        $this->db->where(array('tbl_categories.cat_id'=>$cat_id));
        $result = $this->db->get('tbl_categories');
        $row = $result->row();
        echo $row->content_type_id;

	}
function getSubat_content()
{
	     $subcat_id = $this->input->post('subcat_id');
	     $this->db->select('content');
	     $this->db->where('subcat_id',$subcat_id);
	     $result = $this->db->get('subcat_contents');
	     $row = $result->row();
	     if(empty($row)){
         echo  "";
	     }else{
	     echo $row->content;
	     }

}
     function add_subcatcontent($id=''){
     $this->load->model('Admin_model');
     if($_POST){
     	$id=$this->input->post('id');
         

          if($_FILES['photograph']['name']=="")
	        {
	       $filepath="nofile";
	        }else{
	           	$cat_id=$this->input->post('cat_id');
     	        $subcat_id=$this->input->post('subcat_id');
     	        $pathToUpload ='assets/uploads/page_content/'.$cat_id."_".$subcat_id;
  	    	    if ( ! file_exists($pathToUpload) ) {
			       $create = mkdir($pathToUpload, 0777, TRUE);
			                                        }
			        $this->load->library('upload');
			        $fileName=$_FILES['photograph']['name'];
            	    $config['upload_path'] = $pathToUpload;
	                $config['allowed_types'] ='gif|jpg|png|pdf';
	                $config['file_name'] = $fileName;
                    
	                $this->upload->initialize($config);
                    if($this->upload->do_upload('photograph')) {
                    $data = $this->upload->data();
                    $filepath=$data['file_name'];
                    } else {
                    $errors = $this->upload->display_errors();
                            }
                     if(!empty($errors)){
	            	$this->session->set_flashdata('message', '<div class="alert alert-danger">'.$errors.'</div>');
                     redirect('admin/manage/');
	                               } 
                

	        }


     	if($this->Admin_model->save_subcontent($id,$filepath))
              { 
            $this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Saved</div>");
            redirect('admin/manage/');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error">Some error occured during Insertion.</div>');
            redirect('admin/manage/');
            }
        
     }else{
     	$data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['id']=$id;
        $data['getContent_byid']=$this->Admin_model->getContent_byid($data['id']);
     	$data['all_category']=$this->Admin_model->get_categories();
		$this->load->view('admin/add_subcatcontent',$data);
	        }
     }
     function viewMinutesFile($id){
           $this->load->model('Admin_model');

$data['getContent_byid']=$this->Admin_model->getContent_byid($id);

$url=base_url().'assets/uploads/page_content/4_6/'.$data['getContent_byid'][0]['upload_url'];
    $this->output
           ->set_content_type('application/pdf')
           ->set_output(file_get_contents($url));
     }
     function manage(){
     	$this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_Submenucontent();
        $this->load->view('admin/manage',$data);
     }
     function contactus()
	{
	    $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/contactus',$data);

	}
	
	function shareholders_communication()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/shareholders_communication',$data);

	}
	function awards_accolades()
	{
	
	    $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/awards_accolades',$data);

	}
	function policies()
	{
	    $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/policies',$data);

	}
	function csr()
	{
	    $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/csr',$data);

	}
     function community_development()
	{
	
	    $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/community_development',$data);

	}

	function global_tenders()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/global_tenders',$data);

	}
	function open_tenders()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/open_tenders',$data);

	}
	function limited_tenders()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/limited_tenders',$data);

	}
	function short_tenders()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/limited_tenders',$data);

	}
	 function contracts()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/contracts',$data);

	}
	function bill_payments()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/bill_payments',$data);

	}
	function vendor_registration()
	{
	     $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/vendor_registration',$data);

	}
	function works_awarded()
	{   $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/works_awarded',$data);

	}
	function house_journal()
	{   $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/house_journal',$data);

	}
	function kiocl_news()
	{   $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/kiocl_news',$data);
	}
	function video_gallery()
	{   $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/video_gallery',$data);

	}
	function photo_gallery()
	{   $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/photo_gallery',$data);

	}
	function corporate_brochure()
	{   $this->load->model('Admin_model');
        $data['dept_id']=$this->session->userdata['is_logged_in']['deparments_id'];
        $data['selected_permissions']=$this->Admin_model->get_selected_permissions($data['dept_id']);
        $data['all_permissions']=$this->Admin_model->getAll_permissions();
		$data['content']="";
	    $data['query1']=$this->Admin_model->get_categories();
        $this->load->view('admin/manage/corporate_brochure',$data);

	}


	
	
     
       function editdepartments($id)
		{
			$this->load->model('Admin_model');
			$product = $this->Admin_model->getdeptdata($id);
		   
		
		   $this->form_validation->set_rules('unit_id', 'unit_id', 'required');
			$this->form_validation->set_rules('departments_name', 'departments_name', 'required');
						
		   if ($this->form_validation->run())
		   {			 
			$data = array(
				    'unit_id' => $this->input->post('unit_id'),
				    'departments_name' => $this->input->post('departments_name'),
				   );
			$this->load->model('Admin_model');
			
			$this->Admin_model->updateDeptdata($id, $data);
			
			$this->session->set_flashdata('message', "<p>updated successfully.</p>");
			redirect(base_url().'admin/departments');	
		}
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$this->data['product'] = $product;
			$this->data['unit_id'] = array(
										'name' => 'unit_id',
										'id'=>'unit_id',
										'class'=>'validate[required] form-control',
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('unit_id', $product['unit_id'])
									);
									
			$this->data['departments_name'] = array(
										'name' => 'departments_name',
										'id'=>'departments_name',
										'class'=>'validate[required] form-control',
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('departments_name', $product['departments_name'])
									);
			
					
			$this->data['query']=$this->Admin_model->get_unit();		
			$this->load->view('admin/editDeptdata',$this->data);
		}
		
		function removedepartments()
	       {
		
			$this->load->model('Admin_model');
			$this->Admin_model->deletedepartments($this->uri->segment(3));
		
           }

        function set_permissions($dept_id){
        $this->load->model('Admin_model');
         $data['chk']=$this->Admin_model->check_dept_id($dept_id);
          if(empty($data['chk'][0])){
                 }else{
                  }
        
         if($_POST){
          
          if($this->Admin_model->save_permissions($dept_id))
              { 
            $this->session->set_flashdata('message',"<div class='alert alert-success'>Successfully Updated</div>");
            redirect('admin/set_permissions/'.$dept_id);
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error">Some error occured during Insertion.</div>');
            redirect('admin/set_permissions/'.$dept_id);
            }
         }else{
         $data['selected_permissions']=$this->Admin_model->get_selected_permissions($dept_id);
         $data['dept_id']=$dept_id;
        // $data['all_permissions']=$this->Admin_model->getAll_permissions();
          $data['all_permissions']=$this->Admin_model->get_subcategories();
         $data['content']="Department_Permissions";
	     $this->load->view('admin/set_permission',$data);

       }

        }
               
               /**************User**********/
               
                function User()
		{
			$this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->getUser();
			$this->load->view('admin/user',$data);
		}
		
		
		  function addUser()
                    {
			$this->load->model('Admin_model');
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		    {
			$this->form_validation->set_rules('units_id', 'units_id', 'required');
			$this->form_validation->set_rules('deparments_id', 'deparments_id', 'required');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×                                                          </a><strong>', '</strong></div>');
			
			
			if ($this->form_validation->run())
			{
				
				
				     $data_to_store = array(
				     'user_id' => $this->input->post(''),
				    'units_id' => $this->input->post('units_id'),
				    'deparments_id' => $this->input->post('deparments_id'),
				    'username' => $this->input->post('username'),
				    'password' => $this->input->post('password'),
				    
				    
					  );
				$this->load->model('Admin_model');
				
				if($this->Admin_model->storeuser($data_to_store))
				{
					$data['flash_message'] = TRUE;
				}
				else
				{
					$data['flash_message'] = FALSE;
				}
				
				header("Location:".  base_url()."admin/User");
			}
		}
		$data['query']=$this->Admin_model->get_unit();
	    $data['query1']=$this->Admin_model->getdepartments();
		$this->load->view('admin/adduser',$data);
		
     }	
     
     function edituser($id)
		{
		  
		
			$this->load->model('Admin_model');
			$product = $this->Admin_model->getuserdata($id);
		   
		
		  $this->form_validation->set_rules('units_id', 'units_id', 'required');
			$this->form_validation->set_rules('deparments_id', 'deparments_id', 'required');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
						
		   if ($this->form_validation->run())
		   {
			   				 
			$data = array(
				   
				    'units_id' => $this->input->post('units_id'),
				    'deparments_id' => $this->input->post('deparments_id'),
				    'username' => $this->input->post('username'),
				    'password' => $this->input->post('password'),
				   
					
				   );
			$this->load->model('Admin_model');
			
			$this->Admin_model->updateuserdata($id, $data);
			
			$this->session->set_flashdata('message', "<p>updated successfully.</p>");
			redirect(base_url().'admin/User');	
		}
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$this->data['product'] = $product;
			$this->data['units_id'] = array(
										'name' => 'units_id',
										'id'=>'units_id',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('units_id', $product['units_id'])
									);
									
			$this->data['deparments_id'] = array(
										'name' => 'deparments_id',
										'id'=>'deparments_id',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('deparments_id', $product['deparments_id'])
									);
									
			$this->data['username'] = array(
										'name' => 'username',
										'id'=>'username',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('username', $product['username'])
									);
									
			$this->data['password'] = array(
										'name' => 'password',
										'id'=>'password',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('password', $product['password'])
									);
			
					
			$this->data['query']=$this->Admin_model->get_unit();		
			$this->load->view('admin/edituserdata',$this->data);
		}
		
		function removeuser()
	       {
		
			$this->load->model('Admin_model');
			$this->Admin_model->deleteuser($this->uri->segment(3));
		
               }
               
                public function dept_selection()  
   		{  
       		$this->load->model("Admin_model");
      		$data['batch_id']=$this->Admin_model->get_batch_values(); 
      		
      					$output = "";
       		$output .= "<option value=''>Select Departments</option>";
      		foreach ($data['batch_id'] as $row)  
      		{  
         	$output .= "<option value='".$row->departments_id."'>".$row->departments_name."</option>";  
      		}  
      	echo $output;  
   		}

   		 function categories()
		{
			$this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->get_categories();
			$this->load->view('admin/categories',$data);
		}

		function subcategories()
		{
			$this->load->model('Admin_model');
			$data['query1']=$this->Admin_model->get_subcategories();
			$this->load->view('admin/subcategories',$data);
		}
		function update_status_category(){
		$this->load->model('Admin_model');
         $cat_id=$this->input->post('cat_id');
         $status = $this->Admin_model->check_status_category($cat_id);
    //echo $status;
     if($status=="1")
    {
      $data=array('status'=>"0");
      $this->Admin_model->update_status_category($cat_id,$data);
      echo "success";
      exit;
      }elseif($status=="0"){
      $data=array('status'=>"1");
      $this->Admin_model->update_status_category($cat_id,$data);
      echo "fail";
      exit;
    }
		}
		function deletesubcat()
	{
		$this->load->model('Admin_model');
		if($this->uri->segment(3, 0) != ""){
		$this->Admin_model->deletesubcat($this->uri->segment(4, 0));	
		}
		redirect("admin/subcategories");
	}
        function update_status_subcategory(){
		$this->load->model('Admin_model');
         $subcat_id=$this->input->post('subcat_id');
         $status = $this->Admin_model->check_status_subcategory($subcat_id);
    //echo $status;
     if($status=="1")
    {
      $data=array('status'=>"0");
      $this->Admin_model->update_status_subcategory($subcat_id,$data);
      echo "success";
      exit;
      }elseif($status=="0"){
      $data=array('status'=>"1");
      $this->Admin_model->update_status_subcategory($subcat_id,$data);
      echo "fail";
      exit;
    }
		}
        function update_ajax_categories(){
         $this->load->model('Admin_model');
         $this->Admin_model->update_ajax();
                                         }



		function addsub($id='')
       {	
			$this->load->model('Admin_model');
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		    {
		    $id=$this->input->post('id');
			$this->form_validation->set_rules('cat_id', 'cat_id', 'required');
			$this->form_validation->set_rules('subcat_name', 'subcat_name', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×                                                          </a><strong>', '</strong></div>');
			
			if ($this->form_validation->run())
			{
		     
				if($this->Admin_model->storesubcat($id))
				{
					$data['flash_message'] = TRUE;
				}
				else
				{
					$data['flash_message'] = FALSE;
				}
				
                header("Location:".  base_url()."admin/subcategories");
}         }         
$data['id']=$id;         
if($data['id']==""){
$data['getsubCat_byid']="";   
$data['getCat_byid']="";   
    }else{
$data['getsubCat_byid']=$this->Admin_model->getCategorydetail_byid($data['id']);
$data['getCat_byid']=$this->Admin_model->getCategorydetail_byid($data['getsubCat_byid'][0]['parent_id']);
        }
		$data['query']=$this->Admin_model->get_categories();
		$this->load->view('admin/add_subcat',$data);
		
     }	

     function addcat($id='') {		
			$this->load->model('Admin_model');
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		    {
		    $id=$this->input->post('id');

			$this->form_validation->set_rules('cat_name', 'category name', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×                                                          </a><strong>', '</strong></div>');
			
			
			if ($this->form_validation->run())
			{
				    
				if($this->Admin_model->storecat($id))
				{
					$data['flash_message'] = TRUE;
				}
				else
				{
					$data['flash_message'] = FALSE;
				}
				
				header("Location:".  base_url()."admin/categories");
			}
		}
		$data['id']=$id; 
		$data['getCat_byid']=$this->Admin_model->getCategorydetail_byid($data['id']);      
		$data['content_type']=$this->Admin_model->getcontent_type();
		$this->load->view('admin/addcat',$data);
		
     }	
     function delete_cat()
	{
		$this->load->model('Admin_model');
		if($this->uri->segment(3, 0) != ""){
		$this->Admin_model->delete_cat($this->uri->segment(3, 0));	
		}
		redirect("admin/categories");
	}
       function editdepartments1($id)
		{
			$this->load->model('Admin_model');
			$product = $this->Admin_model->getdeptdata($id);
		   
		
		   $this->form_validation->set_rules('unit_id', 'unit_id', 'required');
			$this->form_validation->set_rules('departments_name', 'departments_name', 'required');
						
		   if ($this->form_validation->run())
		   {
			   				 
			$data = array(
				   
				    'unit_id' => $this->input->post('unit_id'),
				    'departments_name' => $this->input->post('departments_name'),
				   );
			$this->load->model('Admin_model');
			
			$this->Admin_model->updateDeptdata($id, $data);
			
			$this->session->set_flashdata('message', "<p>updated successfully.</p>");
			redirect(base_url().'admin/departments');	
		}
			$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
			$this->data['product'] = $product;
			$this->data['unit_id'] = array(
										'name' => 'unit_id',
										'id'=>'unit_id',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('unit_id', $product['unit_id'])
									);
									
			$this->data['departments_name'] = array(
										'name' => 'departments_name',
										'id'=>'departments_name',
										'class'=>'validate[required] form-control',
										
										'type'=>'text',
										'value' 	=> $this->form_validation->set_value('departments_name', $product['departments_name'])
									);
			
					
			$this->data['query']=$this->Admin_model->get_unit();		
			$this->load->view('admin/editDeptdata',$this->data);
		}
		
		function removedepartments1()
	       {
		
			$this->load->model('Admin_model');
			$this->Admin_model->deletedepartments($this->uri->segment(3));
		
               }

     

     function update_priority()
		{
			update_priority($_POST);
			echo 1;
		}


   		 function content_types()
		{
			$this->load->model('cms_model');
			$data['query']=$this->cms_model->get_subcategories();
			$this->load->view('admin/content_types',$data);
		}
     

     function add_content_types() {		
			$this->load->model('cms_model');
			$this->load->model('Admin_model');
			if ($this->input->server('REQUEST_METHOD') === 'POST')
		    {
			$this->form_validation->set_rules('cat_name', 'category name', 'required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×                                                          </a><strong>', '</strong></div>');
			
			
			if ($this->form_validation->run())
			{
				     $data_to_store = array(
				    'cat_name' => $this->input->post('cat_name'),
					  );
				
				if($this->Admin_model->store_content_type($data_to_store))
				{
					$data['flash_message'] = TRUE;
				}
				else
				{
					$data['flash_message'] = FALSE;
				}
				
				header("Location:".  base_url()."admin/content_types");
			}
		}
		$data['query']=$this->cms_model->get_subcategories();
	//	print_r($data);
		//exit;
		$this->load->view('admin/add_content_types',$data);
		
     }	
               
              
              

}

?>