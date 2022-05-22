<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-title'>Administração</li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class='nav-icon la la-user'></i> Users</a></li>
<li class='nav-title'>NECM</li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('member') }}"><i class='nav-icon la la-users'></i> Equipa</a></li>
<li class='nav-title'>Blog</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-blog'></i> Posts</a></li>