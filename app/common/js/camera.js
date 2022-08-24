
    /* JS comes here */
    // (function() {

        var width = 460; // We will scale the photo width to this
        var height = 0; // This will be computed based on the input stream

        var streaming = false;

        var video = null;
        var canvas = null;
        // var photo = null;
        var startbutton = null;
        var layerSrc = null;

        function startup() {
            video = document.getElementById('video');
            canvas = document.getElementById('canvas');
            photo = document.getElementById('photo');
            startbutton = document.getElementById('startbutton');
            
            navigator.mediaDevices.getMedia = ( navigator.mediaDevices.getUserMedia ||
                         navigator.webkitGetUserMedia ||
                         navigator.mozGetUserMedia ||
                         navigator.msGetUserMedia);

            navigator.mediaDevices.getMedia({
                    video: true,
                    audio: false
                })
                .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                })
                .catch(function(err) {
                    console.log("An error occurred: " + err);
                });

            video.addEventListener('canplay', function(ev) {
                if (!streaming) {
                    height = video.videoHeight / (video.videoWidth / width);

                    if (isNaN(height)) {
                        height = width / (4 / 3);
                    }

                    video.setAttribute('width', width);
                    video.setAttribute('height', height);
                    canvas.setAttribute('width', width);
                    canvas.setAttribute('height', height);
                    streaming = true;
                }
            }, false);

            startbutton.addEventListener('click', function(ev) {
                if (layerSrc === null) {
                    alert("YOU NEED TO SELECT A LAYER");
                   } else {
                    
                    takepicture();
                    ev.preventDefault();
                    // sauver();
                    prepare_envoi();
                
                }
                
            }, false);

            clearphoto();
        }


        function clearphoto() {
            var context = canvas.getContext('2d');
            context.fillStyle = "#AAA";
            context.fillRect(0, 0, canvas.width, canvas.height);

            var data = canvas.toDataURL('image/png');
            // photo.setAttribute('src', data);
        }

        function takepicture() {
            var context = canvas.getContext('2d');
            if (width && height) {
                canvas.width = width;
                canvas.height = height;
                context.drawImage(video, 0, 0, width, height);

                var data = canvas.toDataURL('image/png');
                // photo.setAttribute('src', data);

                
            } else {
                clearphoto();
            }
        }

        // function sauver(){

        //     if(navigator.msSaveOrOpenBlob){
       
        //      var blobObject=document.getElementById("canvas").msToBlob()
       
        //      window.navigator.msSaveOrOpenBlob(blobObject, "image.png");
        //     }
       
        //     else{
       
        //      var canvas = document.getElementById("canvas");
        //      var elem = document.createElement('a');
        //      elem.href = canvas.toDataURL("image/png");
        //      elem.download = "nom.png";
        //      var evt = new MouseEvent("click", { bubbles: true,cancelable: true,view: window,});
        //      elem.dispatchEvent(evt);
        //     }
        //    }

       

        function prepare_envoi(){

            var canvas = document.getElementById('canvas');
            canvas.toBlob(function(blob){envoi(blob)}, 'image/png');
           }
           
           
        function envoi(blob){
    
        // console.log(blob.type)
        
        var formImage = new FormData();
        formImage.append('image_a', blob);
    
        var ajax = new XMLHttpRequest();
    
        ajax.open("POST","http://localhost/classes/camera.requete.classes.php",true);
        // ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
        ajax.onreadystatechange=function(){
    
            if (ajax.readyState == 4 && ajax.status==200){
    
            document.getElementById("jaxa").innerHTML+=(ajax.responseText);
            }
        }
    
        ajax.onerror=function(){
    
            alert("la requette a échoué")
        }
    
        ajax.send(formImage);
        console.log("image send")
        
        }

       

        function selectCalque(element)
        {
            
            if (layerSrc !== null)
            {
                rename = document.getElementById('selected ' + layerSrc);
                rename.border = 0;
                rename.id = layerSrc;
                // layerSrc = null;

            }
            
            element.border = 2;
            layerSrc = element.id;
            element.id = 'selected ' + element.id;

        }
        window.addEventListener('load', startup, false);

        

    // })();
   