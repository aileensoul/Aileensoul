<?php
echo $header;
echo $leftmenu;
?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $module_name; ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active">Job User</li>
        </ol>
    </section>



    <!-- Content Header (Page header) -->




    <!-- Main content -->
    <section class="content">
        <div class="row" >
            <div class="col-xs-12" >
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="callout callout-success">
                        <p><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>  
                    <div class="callout callout-danger">
                        <p><?php echo $this->session->flashdata('error'); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Job User</h3>
                        <div class=" pull-right">

                        <button name="Add" class="btn bg-orange btn-flat margin" ><i class="fa fa-plus" aria-hidden="true"></i> Add User</button>
                           <!--  <a href="<?php echo site_url('product/add'); ?>" class="btn btn-primary pull-right">Add User</a> -->
                        </div>
                    </div>



                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Gender</th>
                                    <th>Location</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Modify Date</th>
                                    <th>Action</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($users as $user) {
                                    ?>
                                    <tr>
                                        <td><?php echo $user['job_id']; ?></td>

                                        <td><?php echo $user['fname']; echo ' ';echo $user['lname'];  ?></td>

                                        <td><?php echo $user['email']; ?></td>

                                        <td><?php echo $user['phnno']; ?></td>

                                        <td><?php echo $user['gender']; ?></td>


                                        <td> 
                                        <?php 

                                        $cityname = $this->db->get_where('cities', array('city_id' => $user['city_id']))->row()->city_name;

                                        echo $cityname; if( $cityname){echo ",<br>";}

                                        $statename = $this->db->get_where('states', array('state_id' => $user['state_id']))->row()->state_name;

                                        echo $statename;if( $statename){echo ",<br>";}

                                        $countryname = $this->db->get_where('countries', array('country_id' => $user['country_id']))->row()->country_name; 
                                            
                                        echo $countryname;
                                        ?>
                                        </td>

                                         <td> 
                                        <?php  if($user['job_user_image']) 
                                                {
                                        ?>
                                     <img src="<?php echo SITEURL . $this->config->item('job_profile_thumb_upload_path') . $user['job_user_image']; ?>" alt="" >
                                     <?php }else{
                                     ?>
                                          <img alt="" class="img-circle" src="<?php echo SITEURL.(NOIMAGE); ?>" alt="" />
                                    <?php } ?>
                                         </td>

                                        <td>
                                        <?php if ($user['status'] == 1) 
                                        {
                                        ?>
                                           <button class="btn btn-block btn-primary btn-sm">Active</button>
                                        <?php 
                                        }else{ ?>

                                        <button class="btn btn-block btn-success btn-sm">Deactive</button>

                                        <?php }?></button>
                                        </td>

                                         <td><?php echo $user['created_date']; ?></td>

                                        <td><?php echo $user['modified_date']; ?></td>

                                         <td>

                                       <button class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil"></i>
                                        </button>

                                        <button class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                        </td>

                                        <td>
                                            <button class="btn btn-block btn-info btn-sm">View</button>
                                        </td>
                                       
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                </tbody>
                <tfoot>

                </tfoot>
                </table>
            </div><!-- /.box -->


        </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="frm_title">Delete Conformation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>

<script type="text/javascript">

    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
        });

        $('#search_frm').submit(function () {
            var value = $('#search_keyword').val();
            if (value == '')
                return false;
        });


        $('#checkedall').click(function (service) {
            if (this.checked) {
                // Iterate each checkbox
                $('.deletes').each(function () {
                    this.checked = true;
                });
            }
            else {
                $('.deletes').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.deletes').click(function (service) {
            var flag = 0;
            $('.deletes').each(function () {
                if (this.checked == false) {
                    flag++;
                }
            });
            if (flag) {
                $('.checkedall').prop('checked', false);
            }
            else {
                $('.checkedall').prop('checked', true);
            }


        });



    });
</script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('.callout-danger').delay(3000).hide('700');
        $('.callout-success').delay(3000).hide('700');
    });
</script>
<style type="text/css">
    .btn-primary{
        margin-top: 2px;
    }
</style>