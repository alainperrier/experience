<li class="header">Menu principal</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li><li class="{{ Request::is('skills*') ? 'active' : '' }}">
    <a href="{!! route('skills.index') !!}"><i class="fa fa-edit"></i><span>Skills</span></a>
</li>

<li class="{{ Request::is('subSkills*') ? 'active' : '' }}">
    <a href="{!! route('subSkills.index') !!}"><i class="fa fa-edit"></i><span>SubSkills</span></a>
</li>

