   window.onload = function(){
     var hou = 50;
     var sec = 10;
     setInterval(function(){

       document.getElementById("timer").innerHTML = hou +" : " + sec ;
       sec--;
       if(sec == 00)
       {
         hou--;
         sec = 60;
         if (hou == 0)
         {
            hou = 2;
         }
       }
      },500);
    }
 