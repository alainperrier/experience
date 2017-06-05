<table class="table table-responsive" id="skills-table">
    <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Level</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($skills as $skill)
        <tr>
            <td>{!! $skill->name !!}</td>
            <td>{!! $skill->description !!}</td>
            <td>{!! $skill->level !!}</td>
            <td>
                {!! Form::open(['route' => ['skills.destroy', $skill->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('skills.show', [$skill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('skills.edit', [$skill->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>