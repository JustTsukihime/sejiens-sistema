import QrScanner from "qr-scanner";

const video = document.getElementById('qr-video');
const camQrResult = document.getElementById('cam-qr-result');
const studentId = document.getElementById('student-id');
const studentName = document.getElementById('student-name');
const endpoint =  document.getElementById('endpoint-link').getAttribute('data-href');

var oldQR = null;

function resolve(result) {
    if (oldQR == result) return;

    camQrResult.textContent = result;

    $.post({
        url: endpoint,
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