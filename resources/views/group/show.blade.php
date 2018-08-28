@extends('layouts.app')

@section('content')
    <div class="container">
        @include('notifications')
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Pievienot dalībnieku</div>
                <div class="card-body">
                    {{ Form::open(['action' => ['GroupController@addMember', $group]]) }}
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
        <table class="table">
            <thead>
            <tr>
                <th>Vārds</th>
                <th>Telefons</th>
            </tr>
            </thead>
            <tbody>
            @foreach($group->members as $student)
                <tr>
                    <td><a href="{{ route('student.show', $student) }}">{{ $student->name }} {{ $student->surname }}</a></td>
                    <td>{{ $student->phone }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection