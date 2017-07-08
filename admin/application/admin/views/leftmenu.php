<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('admin/images/logo.png') ?>" class="" alt="Dollarbid">
            </div>
        </div>

        <ul class="sidebar-menu">
            <!--<li class="header">MAIN NAVIGATION</li>-->

            <!-- Start Dashboard -->
            <li <?php if ($this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '') { ?> class="active treeview" <?php } else { ?> class="treeview"   <?php } ?> >
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                </a>
            </li>
            <!-- End Dashboard -->
         
          
          
            <!--Start Products-->
            <li <?php if ($this->uri->segment(1) == 'product' || $this->uri->segment(1) == '') { ?> class="active treeview" <?php } else { ?> class="treeview"   <?php } ?>>
                <a href="#">
                    <i class="fa fa-bars"></i> <span>Products</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('product/add'); ?>"><i class="fa fa-circle-o"></i> Add products</a></li>
                    <li><a href="<?php echo base_url('product'); ?>"><i class="fa fa-circle-o"></i> List Products</a></li>
                </ul>
            </li>
            <!--End Products-->

             <!--Start Job Management-->
            <li <?php if ($this->uri->segment(1) == 'job' || $this->uri->segment(1) == '') { ?> class="active treeview" <?php } else { ?> class="treeview"   <?php } ?>>
                <a href="#">
                    <i class="fa fa-briefcase"></i> <span>Job Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url('job/post'); ?>"><i class="fa fa-list-alt"></i>List Job Post</a></li>
                    <li><a href="<?php echo base_url('job/user'); ?>"><i class="fa fa-users"></i>List Job User</a></li>
                </ul>
            </li>
            <!--End Job Management-->
           
           <!--Start Change Password-->
            <li <?php if ($this->uri->segment(1) == 'change_password' || $this->uri->segment(1) == '') { ?> class="active treeview" <?php } else { ?> class="treeview"   <?php } ?> >
               <a href="<?php echo base_url('dashboard/change_password'); ?>">
                   <i class="fa fa-lock"></i> <span>Change Password</span>
               </a>
           </li>
           <!--End Change Password-->
            


            <!--End of my code-->

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>