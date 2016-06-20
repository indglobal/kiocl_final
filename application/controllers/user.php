<?php 
ob_start(); 
class User extends CI_Controller
{
    function User()/* constuct*/
	{
	     parent::__construct();
		 
		 $this->load->library('session');
		 session_start();
		
	}
	
	
		
           function index()
	{
				$this->load->model('User_model'); 
				$this->load->model('admin_model'); 

				$current=date('Y-m-d');
				//$data['query1']=$this->User_model->gettender($current);
				$cat_data=$this->User_model->getcat_subcat();
					$category = array(
					'categories' => array(),
					'parent_cats' => array()
					);
					foreach($cat_data as $datas){  
					$category['categories'][$datas['cat_id']] = $datas;
					$category['parent_cats'][$datas['parent_id']][] = $datas['cat_id'];
	                 }
                       $data['category']  = $category;
      
			$data['query2']=$this->User_model->getcorrigendum($current);
                        $data['query3']=$this->User_model->getunit();
                         $data['query4']=$this->User_model->sliders();
                         $data['query5']=$this->User_model->whatsnew();
                          $data['query6']=$this->admin_model->get_Submenucontent();
                          $data['query7']=$this->User_model->gallery();
							$this->load->view('index',$data);
		
        }

     
   
    function cms()
	{
		$this->load->model('User_model'); 
				$this->load->model('admin_model'); 

				$current=date('Y-m-d');
				//$data['query1']=$this->User_model->gettender($current);
				$cat_data=$this->User_model->getcat_subcat();
					$category = array(
					'categories' => array(),
					'parent_cats' => array()
					);
					foreach($cat_data as $datas){  
					$category['categories'][$datas['cat_id']] = $datas;
					$category['parent_cats'][$datas['parent_id']][] = $datas['cat_id'];
	                 }
                       $data['category']  = $category;
                        $data['query3']=$this->User_model->getunit();
                         $data['query4']=$this->User_model->sliders();
                         $data['query5']=$this->User_model->whatsnew();
                          $data['query6']=$this->admin_model->get_Submenucontent();
                          $data['query7']=$this->User_model->gallery();
		$data['segment'] =  $this->uri->segment(3);
	 $this->load->view('service',$data);
	}
       public function view_unit()  
   		{  
                   $unit_id=$this->input->post('course_id');                     
                    $this->load->model('User_model'); 
			$data['query1']=$this->User_model->getunit_sorted($unit_id);
			$data['query2']=$this->User_model->getcorrigendum();
                        $data['query3']=$this->User_model->getunit();

	                $this->load->view('index',$data);
	
       		}

             public function view_date()  
   		{  
                   $from=$this->input->post('tender_due_date_from');
                   $to=$this->input->post('tender_due_date_to');                      
                    $this->load->model('User_model'); 
			$data['query1']=$this->User_model->getdate_sorted($from,$to);
			$data['query2']=$this->User_model->getcorrigendum();
                        $data['query3']=$this->User_model->getunit();

	                $this->load->view('index',$data);
	
       		}

       
 }
 ?>