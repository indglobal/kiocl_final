<?php include('include/header.php'); ?>
     <?php include('include/sidebar.php'); ?>


      --><script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Content 
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active"> Content </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Submenu </h3>
                  <?php  echo validation_errors(); ?> 
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body" style="height:500px">
<?php $msg = $this->session->flashdata('message');
echo $msg;
?>
   <?php    
 if($this->session->userdata['is_logged_in']['email_address']=="admin@gmail.com"){
  $permissions=array('0' => array('permissions_id'=>0), );
}else{
$record=$selected_permissions[0];
$permissions=array();
$permissions=unserialize($record['permissions_id']);
}
?>
<?php if(!empty($getContent_byid)){
$content_type_id=$getContent_byid[0]['content_type_id'];
$cat_id=$getContent_byid[0]['cat_id'];
$subcat_id=$getContent_byid[0]['subcat_id'];
$url=$getContent_byid[0]['upload_url'];
}else{
$content_type_id="";
$cat_id="";
$subcat_id="";
$url="";
}?>
    <form role="form" action="<?php echo base_url();?>admin/add_subcatcontent/<?php echo $id;?>" method="post" enctype="multipart/form-data" >
                  <div class="box-body">

                  <input type="hidden" name="id" value="<?php echo $id;?>"
                   <div class="form-group">
                      <label>Menu:*</label>
                      <select title="Choose State" class="form-control parsley-validated parsley-success" name="cat_id" id="cat_id" style="width:200px;">
                     <option>Select</option>
                     <?php if(!empty($getContent_byid)){ ?>
                    <?php foreach ($all_category as $cat) { ?>
                         <?php if($cat->cat_id == $getContent_byid[0]['cat_id']) { ?>
                        <option value="<?php echo $cat->cat_id;?>" selected><?php echo getCategoryname_byid($cat->cat_id);?>
                        </option>
                    <?php } else { ?>
                        <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name; ?></option>
                    <?php } ?>
                    <?php } ?>
                    <?php }else{ 
                      ?>
                     
                     <?php foreach ($all_category as $cat) { 
                      ?>
              <option value="<?php echo $cat->cat_id; ?>"><?php echo $cat->cat_name;?>
                        </option>
                    <?php }
                    
                  }
                    ?>
                        </select> 
                    <?php echo form_error('cat_id', '<div class="error" style="color:red;">', '</div>');?>
                   </div>

         <div class="form-group">
          <label id="label">Submenu:*</label>
          <select name="subcat_id" id="subcat" class="form-control" style="width:200px;">>
                        
         <option value="<?php if(!empty($getContent_byid)){echo $getContent_byid[0]['subcat_id'];}?>" selected><?php if(!empty($getContent_byid)){echo getCategoryname_byid($getContent_byid[0]['subcat_id']);}?>
         </option> 


         </select>
         <?php echo form_error('subcat', '<div class="error" style="color:red;">', '</div>');?> 

        </div>
              <div class="form-group" id="ckeditor" <?php if($content_type_id=="1"){ }else{ ?>style="display:none"<?php }?>>
            <label id="label">Content:*</label>
      <textarea id="postBody" name="content" class="aa"><?php if(empty($getContent_byid)){echo "";}else{ echo $getContent_byid[0]['content'];}?></textarea>
          <?php  echo set_value('content');?><?php echo form_error('content', '<div class="error" style="color:red;">', '</div>');?>  
        </div>

    

     <div class="form-group" id="upload" <?php if($content_type_id=="2"){ }else{ ?>style="display:none"<?php }?>>
           <label id="label">Upload: *</label>
         <input type="file" name="photograph" id="photograph"   style="left: -155.9375px; top: 3px;">
<?php if(!empty($getContent_byid)){?>

          <div id="list" style="width:50px;height:50px;">
        <?php $break=explode('.',$url);
          if($break[1]=="pdf"){?> <a href="<?php echo base_url().'admin/viewMinutesFile/'.$id;?>" target="_blank"><image src="<?php echo base_url().'images.jpg'?>"></image>
          </a>
    <?php }else{?>
      <?php echo ($url!="") ? '<img src="'.base_url('assets/uploads/page_content/'.$cat_id.'_'.$subcat_id.'/'.$url).'" height="100" width="250">' : '';
           
         }?>
          </div>

    <?php } ?>
    </div>

    
          

             <div class="box-footer" style="padding-top:100px;">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                    
            </div><!-- /.box-body -->

                  
                </form>
              </div><!-- /.box -->

             

             

          

            </div><!--/.col (left) -->
            
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include('include/footer.php') ; ?>
<script type="text/javascript">
  $(document).ready(function() {
   $('#cat_id').on('change', function() {
            var me = $(this);
            $.post('<?php echo site_url("admin/getSubat_id/"); ?>',{cat_id: me.val()}, function(data) {
             $('#subcat').html(data);
            });
            $.post('<?php echo site_url("admin/getContenttpe/"); ?>',{cat_id: me.val()}, function(data1){
             // alert(data1);
              if(data1==1){
                  $('#ckeditor').show();
                  $('#upload').hide();

              }else if(data1==2){
                  $('#upload').show();
                  $('#ckeditor').hide();


              }
            });
        });

   $('#subcat').on('change', function() {
            var me = $(this);
            $.post('<?php echo site_url("admin/getSubat_content/"); ?>',{subcat_id: me.val()}, function(data) {
            CKEDITOR.instances['postBody'].setData(data)
            });
        });



   function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        var f = files[0];
        var reader = new FileReader();
        reader.onload = (function(theFile) {
            return function(e) {
                // Render thumbnail.
                var span = document.createElement('span');
                span.innerHTML = ['<img class="thumb" src="', e.target.result,
                                '" title="', escape(theFile.name), '"/>'].join('');
                $('#list').html(span);
            };
        })(f);
        reader.readAsDataURL(f);
    }

   $('#photograph').on('change',function(e){
       handleFileSelect(e);

   })

 });

</script>
  <script type="text/javascript">
var editor=CKEDITOR.replace('postBody');
</script>
<style type="text/css">

#list .thumb{width: 60px;-webkit-border-radius: 5px 5px;-moz-border-radius: 5px / 5px;border-radius: 5px / 5px;}
select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"], .uneditable-input {margin-bottom: 3px;}
</style>