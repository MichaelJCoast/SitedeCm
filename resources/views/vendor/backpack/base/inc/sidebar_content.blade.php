<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-title'>Administração</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
</li>
</li>

<li class="nav-item nav-dropdown open">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-dragon"></i> NECM</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href="{{ backpack_url('equipa') }}"><i
                    class='nav-icon la la-users'></i> <span>Equipa</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('merch') }}'><i
                    class='nav-icon la la-tshirt'></i> <span>Merch</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('department') }}'><i
                    class='nav-icon la la-home'></i> <span>Departamentos</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cargo') }}'><i
                    class='nav-icon la la-scroll'></i> <span>Funções</span></a></li>
    </ul>
</li>

<li class='nav-title'>Blog</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-blog'></i> Posts</a>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('link') }}'><i class='nav-icon la la-link'></i> Links</a>
</li>

