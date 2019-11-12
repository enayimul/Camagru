const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById('snap');
feed();
var context = canvas.getContext('2d');
snap.addEventListener("click", function(){
    context.drawImage(video, 0, 0, 300, 300);
});
function feed() {
    
    var constrains = {
        video: { width: 300, height: 300 }
    };
    navigator.mediaDevices.getUserMedia(constrains).then(stream => {
        video.srcObject = stream;
    });
}
const save = document.getElementById("save");

save.addEventListener("click", function () {
    var data = "img="+canvas.toDataURL();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
         alert(xhttp.response);
      }
    };
    xhttp.open("POST", "home.php", true);
    // xhttp.open("POST", "gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(data);
});

// let width = 400,
//    height = 400,
//    streaming = false;
//        const video = document.getElementById('video');
//        const canvas = document.getElementById('canvas');
//        const snap = document.getElementById('snap');
//     //    const photos = document.getElementById('photos');
//        navigator.mediaDevices.getUserMedia({video: true, audio: false})
//        .then(function(stream)
//        {
//            video.srcObject = stream;
//            video.play();
//        })
//        .catch(function(err)
//        {
//         //   console.log('Error: ${err}');
//        });
//        video.addEventListener('canplay', function(e)
//        {
//            if(!streaming)
//            {
//                height = video.videoHeight / (video.videoWidth / width);
//                video.setAttribute('width', width);
//                video.setAttribute('height', height);
//                canvas.setAttribute('width', width);
//                canvas.setAttribute('height', height);
//                streaming = true;
//            }
//        }, false)
//        snap.addEventListener('click', function(e){
//            capture();
//            console.log('captured');
//            e.preventDefault();
//         })