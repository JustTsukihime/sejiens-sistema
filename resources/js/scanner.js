import QrScanner from "qr-scanner";

const video = document.getElementById('qr-video');
const camQrResult = document.getElementById('cam-qr-result');
const studentId = document.getElementById('student-id');
const studentName = document.getElementById('student-name');
const endpoint =  document.getElementById('endpoint-link').getAttribute('data-href');

var oldQR = {};

function resolve(result) {
    if (oldQR.data == result.data) return;
    
    camQrResult.textContent = result.data;

    $.post({
        url: endpoint,
        data: {'type': 'qr', 'hash': result.data},
        success: function (data) {
            studentId.value = data.id;
            studentName.textContent = data.name;
        }
    });

    oldQR = result;
}

const scanner = new QrScanner(video, result => resolve(result), {
    highlightScanRegion: true,
    maxScansPerSecond: 10,
});
scanner.start();