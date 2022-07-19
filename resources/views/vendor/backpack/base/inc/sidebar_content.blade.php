<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>
        @if (backpack_user()->hasRole('admin'))
<li class='nav-title'>Administração</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
    </ul>
    </li>
    <li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-book"></i> Gestão</a>
    <ul class="nav-dropdown-items">
         <li class="nav-item"><a class="nav-link" href="{{ backpack_url('filemanager') }}"><i class="nav-icon la la-files-o"></i> Gestão de Ficheiros</a></li>
         <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log-user') }}'><i class='nav-icon la la-history'></i> Log User</a></li>
    </ul>
</li>
</li>

<li class="nav-item nav-dropdown open">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-dragon"></i> NECM</a>
    <ul class="nav-dropdown-items">
    <li class="nav-item nav-dropdown">

         <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Equipa</a>
         <ul class="nav-dropdown-items">
        <li class="nav-item nav-dropdown">
            <li class='nav-item'><a class='nav-link' href="{{ backpack_url('equipa') }}"><i
                        class='nav-icon las la-user-tie'></i> <span>Membros</span></a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('department') }}'><i
                        class='nav-icon la la-home'></i> <span>Departamentos</span></a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cargo') }}'><i
                        class='nav-icon la la-scroll'></i> <span>Funções</span></a></li>
            <li class='nav-item'><a class='nav-link' href='{{ backpack_url('mandato') }}'>
                        <i class='nav-icon la la-book'></i> Mandatos</a></li>
            </ul>
        </li>

                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('merch') }}'><i
                                class='nav-icon la la-tshirt'></i> <span>Merch</span></a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'><i
                                class='nav-icon la la-shopping-cart'></i> Order</a></li>
               
        </ul>
    </li>

@endif
<li class='nav-title'>Blog</li>
@if (backpack_user()->hasRole('mod') || backpack_user()->hasRole('admin'))
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-blog'></i> Posts</a>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('categoria') }}'><i class='nav-icon la la-question'></i> Categorias</a></li>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('link') }}'><i class='nav-icon la la-link'></i> Links</a>
</li>


<li class='nav-title'>Páginas</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('about') }}'><i class='nav-icon la la-address-card'></i> Sobre</a></li>
</li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('faq') }}'><i class='nav-icon las la-question-circle'></i> FAQ</a></li>
</li>
@endif


