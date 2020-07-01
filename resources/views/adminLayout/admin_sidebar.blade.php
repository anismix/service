<?php $url= url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>

  <ul>
  <li <?php if(preg_match("/dashbord/i",$url)){ ?>class="active" <?php } ?> ><a href="{{ url('/admin/dashbord') }}"><i class="icon icon-home"></i><span>Dashbord</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
            <ul <?php if(preg_match("/category/i",$url)){ ?>style="display:block;"<?php } ?> >
              <li <?php if(preg_match("/add-category/i",$url)){ ?>class="active" <?php } ?> ><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
              <li <?php if(preg_match("/view-category'/i",$url)){ ?>class="active" <?php } ?> ><a href="{{ url('/admin/view-category') }}">View Category</a></li>
            </ul>
          </li>
          <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Services</span> <span class="label label-important">2</span></a>
            <ul <?php if(preg_match("/service/i",$url)){ ?>style="display:block;"<?php } ?>>
              <li <?php if(preg_match("/add-service/i",$url)){ ?>class="active" <?php } ?>><a href="{{ url('/admin/add-service') }}">Add service</a></li>
              <li <?php if(preg_match("/view-service/i",$url)){ ?>class="active" <?php } ?>><a href="{{ url('/admin/view-service') }}">View Service</a></li>

            </ul>
          </li>
          <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">1</span></a>
            <ul <?php if(preg_match("/user/i",$url)){ ?>style="display:block;"<?php } ?> >

              <li <?php if(preg_match("/view-users/i",$url)){ ?>class="active" <?php } ?>><a href="{{ url('/admin/view-users') }}">View Users</a></li>

            </ul>
          </li>
          <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Posts</span> <span class="label label-important">1</span></a>
            <ul <?php if(preg_match("/post/i",$url)){ ?>style="display:block;"<?php } ?> >
              <li <?php if(preg_match("/view-post/i",$url)){ ?>class="active" <?php } ?>><a href="{{ url('/admin/view-posts') }}">View Posts</a></li>
            </ul>
          </li>

  </ul>
</div>
<!--sidebar-menu-->
