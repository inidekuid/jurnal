
Webcam.set({
    width: 320,
    height: 430,
    image_format: 'png',
    jpeg_quality: 90
});

Webcam.attach('#v_kamera');

function take_swafoto() {
    Webcam.snap(function (data_uri) {
        $("#image-tag").val(data_uri);
        document.getElementById('result').innerHTML = '<img src="' + data_uri + '"/>';
    });
}
