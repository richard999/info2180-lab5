document.addEventListener('DOMContentLoaded', function(){
    
    document.getElementById("lookup").addEventListener('click',(event) => {
          event.preventDefault();
          xmlhttpreq=new XMLHttpRequest();
          
          xmlhttpreq.onreadystatechange = function(){
          if(xmlhttpreq.readyState===XMLHttpRequest.DONE && xmlhttpreq.status===200){
            document.getElementById("result").innerHTML=xmlhttpreq.responseText;
          }
          if( xmlhttpreq.readyState===XMLHttpRequest.DONE && xmlhttpreq.status===404){
            alert("Error or not found");
          }
            
        }
            xmlhttpreq.open("GET","http://localhost/info2180-lab5/world.php?country="+(document.getElementById("country").value),true);
            xmlhttpreq.send();
  
      });
      
     
     
     
      document.getElementById("lookupCities").addEventListener('click',(event) => {
        event.preventDefault();
        xmlhttpreq=new XMLHttpRequest();
  
        xmlhttpreq.onreadystatechange = function(){
          if(xmlhttpreq.readyState===XMLHttpRequest.DONE && xmlhttpreq.status===200){
            document.getElementById("result").innerHTML=xmlhttpreq.responseText;
          }
          if( xmlhttpreq.readyState===XMLHttpRequest.DONE && xmlhttpreq.status===404){
            alert("error or not found");
          }
            
        }
        xmlhttpreq.open("GET","http://localhost/info2180-lab5/world.php?country="+(document.getElementById("country").value)+"context=cities",true);;
          xmlhttpreq.send();
  
    });
      
  }, false);