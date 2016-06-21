<?php include('include/header.php'); ?>
     <?php include('include/sidebar.php'); ?>


      --><script src="<?php echo base_url()?>ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url()?>js/jquery.min.js"></script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Community 
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"> Community </li>
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
                  <h3 class="box-title">Add Community </h3>
                  <?php // echo validation_errors(); ?> 
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body" style="height:800px">
<?php $msg = $this->session->flashdata('message');
echo $msg;
?>
<?php if(!empty($getCommunity)){
$photograph=$getCommunity[0]['image'];
}else{
  $photograph="";
}
?>
    <form role="form" action="<?php echo base_url();?>admin/add_community/<?php echo $id;?>" method="post" enctype="multipart/form-data" >
                  <div class="box-body">
                  <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}?>">
                  <input type="hidden" name="image_old" value="<?php echo $photograph;?>">

            
      <div class="form-group" id="ckeditor">
      <label id="label">Heading:*</label>
      <textarea id="postBody" name="heading" class="aa"><?php if(!empty($getCommunity)){echo $getCommunity[0]['heading'];}?><?php  echo set_value('heading');?></textarea>
          <?php echo form_error('heading', '<div class="error" style="color:red;">', '</div>');?>  
        </div>

    

     <div class="form-group">
           <label id="label">upload:*</label>
  <input type="file" name="photograph"  id="photograph"  value="<?php echo $photograph;?>" style="left: -155.9375px; top: 3px;">
  <?php echo form_error('photograph', '<div class="error" style="color:red;">', '</div>');?> 
  <div id="list"><?php echo ($photograph!="") ? '<img src="'.base_url('assets/uploads/community/'.$photograph).'" height="100" width="250">' : ''; ?></div>  
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