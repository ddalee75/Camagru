
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
        // var mergePhoto=null;
        

        function startup() {
          
            document.getElementById('uploadImage').style.visibility='hidden';
            // document.getElementById('mergePhoto').style.visibility='hidden';
            video = document.getElementById('video');
            canvas = document.getElementById('canvas');
            photo = document.getElementById('photo');
            startbutton = document.getElementById('startbutton');
            calque = document.getElementById('calque');
            userid = startbutton.getAttribute('value');
            // mergePhoto = document.getElementById('mergePhoto');

            
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
                    //  document.getElementById("jaxa").innerHTML="message: "+tracks[0].label+" Photo takend"
                    alert('Photo takend, Save photo now !');
                }
                
            }, false);

            // mergePhoto.addEventListener('click', function(ev) {
            //     if (layerSrc === null) {
            //         alert("YOU NEED TO SELECT A LAYER");
            //        } else {
                    
            //         takepicture() ;
            //         ev.preventDefault();
            //         sauver();
            //         // prepare_envoi();
                
            //     }
                
            // }, false);


            clearphoto();
        }

        function ouvrir_camera() {

            navigator.mediaDevices.getUserMedia({ audio: false, video: { width: 400 } }).then(function(mediaStream) {
       
             var video = document.getElementById('video');
             video.srcObject = mediaStream;
       
             var tracks = mediaStream.getTracks();
       
            //  document.getElementById("jaxa").innerHTML="message: "+tracks[0].label+" connecté"
       
             console.log(tracks[0].label)
             console.log(mediaStream)
       
             video.onloadedmetadata = function(e) {
              video.play();
              document.getElementById('startbutton').style.visibility='visible';
              document.getElementById('savePhoto').style.visibility='visible';
              document.getElementById('uploadImage').style.visibility='hidden';
            //   document.getElementById('mergePhoto').style.visibility='hidden';
             };
              
            }).catch(function(err) { console.log(err.name + ": " + err.message);
       
            document.getElementById("jaxa").innerHTML="message: connection refusé"});
           }


        function fermer(){
            
            var video = document.getElementById('video');
            var mediaStream=video.srcObject;
            console.log(mediaStream)
            var tracks = mediaStream.getTracks();
            console.log(tracks[0])
            tracks.forEach(function(track) {
             track.stop();
             document.getElementById('startbutton').style.visibility='hidden';
             document.getElementById('savePhoto').style.visibility='hidden';
             document.getElementById('uploadImage').style.visibility='visible';
            //  document.getElementById('mergePhoto').style.visibility='visible';
            //  document.getElementById("jaxa").innerHTML="message: "+tracks[0].label+" déconnecté"
            });
       
            video.srcObject = null;
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

        

        function sauver(){

            if(navigator.msSaveOrOpenBlob){
       
             var blobObject=document.getElementById("canvas").msToBlob()
       
             window.navigator.msSaveOrOpenBlob(blobObject, "image.png");
            }
       
            else{
       
             var canvas = document.getElementById("canvas");
             var elem = document.createElement('a');
             elem.href = canvas.toDataURL("image/png");
             elem.download = "nom.png";
             var evt = new MouseEvent("click", { bubbles: true,cancelable: true,view: window,});
             elem.dispatchEvent(evt);
            }
           }

       

        function prepare_envoi(){

            var canvas = document.getElementById('canvas');
            canvas.toBlob(function(blob){envoi(blob)}, 'image/png');
           }
           
           
        function envoi(blob){
    
        // console.log(blob.type)
        
        var formImage = new FormData();
        // var formImage1 = new FormData();
        formImage.append('image_a', blob);
        formImage.append('layerSrc', layerSrc);
        formImage.append('userid', userid);
        
        // formImage1.append("layerSrc", layerSrc);
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
            calque.src="../common/calques/" + layerSrc;

        }
      
        window.addEventListener('load', startup, false);

        

    // })();
   