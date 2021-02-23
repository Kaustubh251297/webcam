<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cam Snap</title>
<script type="text/javascript" src="js/webcam.js"></script>
<script language="JavaScript">
function take_snapshot() {
    Webcam.snap(function(data_uri) {
    document.getElementById('results').innerHTML = '<img id="base64image" src="'+data_uri+'"/><button onclick="SaveSnap();">Save Snap</button>';
});
}
function ShowCam(){
Webcam.set({
width: 320,
height: 240,
image_format: 'jpeg',
jpeg_quality: 100
});
Webcam.attach('#my_camera');
}
function SaveSnap(){
    Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
}
function uploadcomplete(event){
    document.getElementById("loading").innerHTML="";
    var image_return=event.target.responseText;
    var showup=document.getElementById("uploaded").src=image_return;
}
window.onload= ShowCam;
</script>
<style type="text/css">
.container{display:inline-block;width:320px;}
#Cam{background:rgb(255,255,215);}#Prev{background:rgb(255,255,155);}#Saved{background:rgb(255,255,55);}
</style>
</head>
<body>
    <form method="POST" action="upload">
        {{ csrf_field() }}
<div class="container" id="Cam"><b>Webcam Preview...</b>
    <div id="my_camera"></div><input type="button" value="Snap It" onClick="take_snapshot()">
    <input type="hidden" name="image" class="image-tag">
</div>
<div class="container" id="Prev">
    <b>Snap Preview...</b><div id="results"></div>
</div>
<button class="btn btn-success">Save</button>
    </form>
{{-- <form method="POST" action="upload">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div id="my_camera"></div>
            <br/>
            <input type=button value="Take Snapshot" onClick="SaveSnap()">
            <input type="hidden" name="image" class="image-tag">
        </div>
        <div class="col-md-6">
            <div id="results">Your captured image will appear here...</div>
        </div>
        <div class="col-md-12 text-center">
            <br/>
            <button class="btn btn-success">Submit</button>
        </div>
    </div>
</form> --}}
</body>
</html>
