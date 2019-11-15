(function(){
    var video = document.getElementById('vid'),
    canvas = document.getElementById('canvas'),
    context = canvas.getContext('2d');
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
    {
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
        {
            video.srcObject = stream;
            video.play();
        });
    }
    document.getElementById('snap').addEventListener('click', function()
    {
        context.drawImage(video, 0, 0, 400, 300);
    });
    //save an image
    document.getElementById('save').addEventListener('click', function(e)
    {
        var image = canvas.toDataURL('image/png');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                alert(this.responseText);
            }
        }
        xhttp.open("post", "webcam.php",false);
        xhttp.send(image);
    })
})();