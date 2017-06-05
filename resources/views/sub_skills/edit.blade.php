@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sub Skill
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subSkill, ['route' => ['subSkills.update', $subSkill->id], 'method' => 'patch']) !!}

                        @include('sub_skills.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection