@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <h1>Grupa "{{ $group->name }}"</h1>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Pievienot dalībnieku</div>
                    <div class="card-body">
                        <a href="{{ route('group.show', $group) }}" class="card-link">Atpakaļ uz grupas sarakstu</a>

                        {{ Form::open(['action' => ['GroupController@storeMember', $group]]) }}
                        {{ Form::hidden('student_id', null, ['id' => 'student-id']) }}
                        <video muted autoplay playsinline id="qr-video" class="w-100"></video>

                        <b>Nolasīts: </b><span id="cam-qr-result">nekas</span>
                        <b>Atrasts: </b><span id="student-name">nav</span>
                        {{ Form::submit('Pievienot', ['class' => 'form-control btn btn-primary']) }}
                        <script type="module">
                            import QrScanner from "/js/qr-scanner/qr-scanner.min.js";

                            const video = document.getElementById('qr-video');
                            const camQrResult = document.getElementById('cam-qr-result');
                            const studentId = document.getElementById('student-id');
                            const studentName = document.getElementById('student-name');

                            var oldQR = null;

                            function resolve(result) {
                                if (oldQR == result) return;

                                camQrResult.textContent = result;

                                $.post({
                                    url: '{{ action('StudentController@resolve') }}',
                                    data: {'type': 'qr', 'hash': result},
                                    success: function (data) {
                                        studentId.value = data.id;
                                        studentName.textContent = data.name;
                                    }
                                });

                                oldQR = result;
                            }

                            const scanner = new QrScanner(video, result => resolve(result));
                            scanner.start();

                        </script>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection