{{ Form::open(['url' => route('student.import'), 'files' => true]) }}
    {{ Form::file('file') }}
    {{ Form::submit() }}
{{ Form::close() }}
    <div>Attendees import</div>
{{ Form::open(['url' => route('student.importAttendees'), 'files' => true]) }}
    {{ Form::file('file') }}
    {{ Form::submit() }}
{{ Form::close() }}