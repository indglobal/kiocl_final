

<?php include('include/header.php'); ?>
<?php include('include/sidebar.php') ; ?>
<!--     <link href="<?php echo base_url()?>style.css" rel="stylesheet"/>
 --><script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>js/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    CMS List
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <i class="fa fa-dashboard">
          </i> Home
        </a>
      </li>
      <li>
        <a href="#">CMS
        </a>
      </li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            
          </div>
          <!-- /.box-header -->
         
    <div class="box-body" style="height:450px">
<?php $msg = $this->session->flashdata('message');
                echo $msg;
                        ?>

      <form id="signupForm" method="post"  action="<?php echo site_url('cms/addnew_content_type'); ?>" enctype="multipart/form-data">
    
    <legend style="font-size:15px; color:#3b5999; font-weight:700">Content » <small style="font-size:11px"> Use the below panel to add whatsnew details.</small></legend>
        <div class="col-xs-6 form-group">
            <label id="label">content: *</label>
          <input type="text"  name="content_type">
          <?php  echo set_value('content_type');?><?php echo form_error('content_type', '<div class="error" style="color:red;">', '</div>');?> 
          <div style="height:30px;"></div>
          <div>
         <button type="submit" id="firstBtn" class="btn btn-primary firstBtn">Submit</button>
        </div>
        </div>

   




</form>


            


          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('include/footer.php'); ?>

<script type="text/javascript">
var editor=CKEDITOR.replace('postBody');
  
</script>  


<script type="text/javascript">

$(document).ready(function() {

       $("#example").dataTable();

    });



</script>






