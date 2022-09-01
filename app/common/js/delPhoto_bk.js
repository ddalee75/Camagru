 
 function startDel() {


    croix_image = document.getElementById('croix_image');
    userid = croix_image.getAttribute('value');
    idGallery = croix_image.getAttribute('value2');

    // console.log(userid);
    // console.log(idGallery);

    croix_image.addEventListener('click', function(ev) {

        
           delPhoto(userid, idGallery); 
           //une fois photo deleted, reload la page gallery et show info:image deleted
        //    setTimeout(function(){ window.location.href= 'http://localhost/index.php?url=gallery&error=imageDel';}, 1000);
           
           
    }, false);

}


function delPhoto(userid, idGallery)
{
    // console.log(userid);
    // console.log(idGallery);
    var formInfo = new FormData();
        
        formInfo.append('idGallery', idGallery);
        formInfo.append('userid', userid);
        
     
        var ajax2 = new XMLHttpRequest();
    
        ajax2.open("POST","http://localhost/classes/del_like_image.classes.php",true);
        
        ajax2.onreadystatechange=function(){
    
            if (ajax2.readyState == 4 && ajax2.status==200){
    
            document.getElementById("jaxa2").innerHTML+=(ajax2.responseText);
            }
        }
    
        ajax2.onerror=function(){
    
            alert("la requette a échoué")
        }
         

        ajax2.send(formInfo);
     
        console.log("info send")
       
    

        

}

window.addEventListener('load', startDel, false);