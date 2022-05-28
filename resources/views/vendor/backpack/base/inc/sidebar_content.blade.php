<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-title'>Administração</li>
<li class='nav-item'><a class='nav-link' href="{{ backpack_url('user') }}"><i class='nav-icon la la-user'></i> Users</a></li>
<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-newspaper-o"></i> NECM</a>
<ul class="nav-dropdown-items">
  <li class='nav-item'><a class='nav-link' href="{{ backpack_url('equipa') }}"><i class='nav-icon la la-users'></i> <span>Equipa</span></a></li>
  <li class='nav-item'><a class='nav-link' href='{{ backpack_url('merch') }}'><i class='nav-icon la la-tshirt'></i> <span>Merch</span></a></li>
  <li class='nav-item'><a class='nav-link' href='{{ backpack_url('department') }}'><i class='nav-icon la la-question'></i> <span>Departamentos</span></a></li>
  <li class='nav-item'><a class='nav-link' href='{{ backpack_url('role') }}'><i class='nav-icon la la-question'></i> <span>Funções</span></a></li>
</ul>
<li class='nav-title'>Blog</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-blog'></i> Posts</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('link') }}'><i class='nav-icon la la-link'></i> Links</a></li>


