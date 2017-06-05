<table class="table table-responsive" id="subSkills-table">
    <thead>
        <th>Name</th>
        <th>Level</th>
        <th>Description</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($subSkills as $subSkill)
        <tr>
            <td>{!! $subSkill->name !!}</td>
            <td>{!! $subSkill->level !!}</td>
            <td>{!! $subSkill->description !!}</td>
            <td>
                {!! Form::open(['route' => ['subSkills.destroy', $subSkill->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('subSkills.show', [$subSkill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('subSkills.edit', [$subSkill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>