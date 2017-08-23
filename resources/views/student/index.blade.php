{{ Form::open(['url' => route('student.import'), 'files' => true]) }}
    {{ Form::file('file') }}
    {{ Form::submit() }}
{{ Form::close() }}