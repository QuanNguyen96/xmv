<?php if( $this->admin_auth->is_login() ): ?>
<nav>
 <div class="view_site"><a target="_blank" href="<?php echo base_url();?>"><i class="fa fa-eye" aria-hidden="true"></i> Xem website</a></div>
 <ul class="user">
    <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo base_url('admin/user/change_password');?>"><?php echo $this->admin_auth->get_colum('fullname');?></a></li>
    <li> <i class="fa fa-sign-out" aria-hidden="true"></i> <a href="<?php echo base_url('admin/user/logout');?>">Đăng xuất</a></li>
 </ul>
</nav>
<?php endif; ?>