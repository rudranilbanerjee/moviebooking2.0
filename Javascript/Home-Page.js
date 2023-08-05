//Menubar handle scrolling
let menu=document.querySelector(".menu-bar");
let menuBtn=document.getElementById('menuBtn');
menu.addEventListener('click',(e)=>{
    e.stopPropagation();
})
menuBtn.addEventListener('click',(e)=>{
    // alert("KJH")
    e.stopPropagation();
    menu.style.transform="unset";
    menu.style.display="block";
    menu.style.boxShadow="0 -20px 2rem #3b023b";
})
document.body.addEventListener('click',()=>{
    menu.style.transform="translateX(100%)";
    menu.style.display="none";
    menu.style.boxShadow="0 0 0 #3b023b";
})


//MenuBar combination of Back function
let navigation=document.querySelector(".navigation-bar");
let notification=document.querySelectorAll(".notification");
let backButton=document.getElementsByClassName('back-button');
Array.from(backButton).forEach((ele,idx)=>{
    ele.addEventListener('click',()=>{
       notification[idx].style.display="none";
       navigation.style.display="block";
    })
})


//MenuBar combination of notification function
let notify=document.getElementById('notify');
notify.addEventListener('click',(e)=>{
    notification[0].style.display="block";
})

// MenuBar combination of wallet function
let walletBar=document.getElementById('walletbar');
let walletfy=document.getElementById('walletfy');
walletfy.addEventListener('click',(e)=>{
    walletBar.style.display="block";
})

// Menubar combination of Ticket function
let ticketfy=document.getElementById('ticketfy');
let ticketbar=document.getElementById('ticketbar');
ticketfy.addEventListener('click',()=>{
    ticketbar.style.display="block";
})

// subMenu open
let subMenuOpen=document.getElementById('subMenuOpen');
let subMenuBar=document.getElementById('subMenuBar');
let subMenuflag=true;
subMenuOpen.addEventListener('click',()=>{
    if(subMenuflag){
    subMenuBar.style.display="block";
    subMenuflag=false;
    }else{
    subMenuBar.style.display="none";
    subMenuflag=true;
    }
})

//popup upload
let citySelector=document.getElementsByClassName('city-selector')[0];
citySelector.addEventListener('click',()=>{
    popUp.style.display="flex";
})

//POP up close
let popUp=document.querySelector(".pop-up");
let closePopUp=document.getElementById('close');
closePopUp.addEventListener('click',()=>{
    popUp.style.display="none";
})





// Container control box
let currentScrollPosition = 0;
	   function scrollrightHorizontally(val)
        {
        	var btn1=document.getElementById("btn1");
            var btn2=document.getElementById("btn2"); 
            var btn3=document.getElementById("btn3");
            var btn4=document.getElementById("btn4");
          let scrollAmount = 2385;
          const sCont = document.querySelector(".image-container");
          currentScrollPosition += (val * scrollAmount);
          if(currentScrollPosition===-2385)
          {
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=currentScrollPosition+1135;
            btn1.classList.remove("active");
            btn2.classList.add("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
          }
          else if(currentScrollPosition===-3635)
          {
          	sCont.style.left = currentScrollPosition + "px";
          	currentScrollPosition=currentScrollPosition+1125;
          	btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.add("active");
            btn4.classList.remove("active");
          }
          else if(currentScrollPosition===-4895)
          {
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=1260;
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.add("active");
          }
          else
          {	
          	sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=0;
            btn1.classList.add("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
          }
        }  

        function scrollleftHorizontally(val)
        {
          let scrollAmount = -4895;
          var btn1=document.getElementById("btn1");
          var btn2=document.getElementById("btn2"); 
          var btn3=document.getElementById("btn3");
          var btn4=document.getElementById("btn4");
          const sCont = document.querySelector(".image-container");
          currentScrollPosition += (val * scrollAmount);
          if(currentScrollPosition===-4895)
          {
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=1260;
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.add("active");
              
          }
          else if(currentScrollPosition===-3635)
          {
            
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=currentScrollPosition+6145;
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.add("active");
            btn4.classList.remove("active");
            
          }
          else if(currentScrollPosition===-2385)
          {
          	
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=currentScrollPosition+6155;
            btn1.classList.remove("active");
            btn2.classList.add("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
            
          }
          else
          {
          	
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=0;
             btn1.classList.add("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
          }
        }  


//Recommended section image slider scrolling part
let recScrollBtnLeft=document.getElementById("btnRec-scroll-left");
let recScrollBtnRight=document.getElementById("btnRec-scroll-right");
let imagesSlider=document.getElementsByClassName("image-box")[0];
if(recScrollBtnLeft!==null || recScrollBtnRight!==null){
recScrollBtnRight.addEventListener('click',()=>{
   imagesSlider.scrollLeft+=550;
})
recScrollBtnLeft.addEventListener('click',()=>{
   imagesSlider.scrollLeft-=550;
})
}
// fetch api when call 

// this function fetching the cities which type of cities are available 
//and show in the dropdown section on popup window as a suggestion
function fetchcities(str)
{
    if(str.length==0)
    {
        document.getElementById("cities").innerHTML=" ";
        document.getElementById("cities").style.display="none";
    }
    else
    {
        var req=new XMLHttpRequest();
        req.open("GET","http://localhost/moviebookingwebsite2.0/pages/film-cities.php?searchbox="+str,true);
        req.send();
        req.onreadystatechange=function(){
          if(req.readyState==4 && req.status==200)
          {
              var dropdown=document.getElementById("cities");
              dropdown.style.display="block";
              document.getElementById("cities").innerHTML=req.responseText;
          }
        };
    }
    $(document).on('click','#cities li',function(){
        var a=$(this).text();
        if(a!="city not found.....")
        {
            $('.search-bar').val($(this).text());
            $("#cities").fadeOut();
            var city=$('.search-bar').val();
            if(city!="city not found.....")
            document.getElementById("mysearch").submit();
        }
    });
}

// this function always check the typed string in input search box is valid or not. 
//if valid then it give to access submit the request corresponding this string
function validation(str)
{
  var dropdown=document.getElementById("cities"); 
  if(str.length==0)
  { 
      dropdown.innerHTML=`Pls enter a city name`;
      document.getElementById("submitbtn").setAttribute('disabled','disabled');
  }
  else
  {
      var req=new XMLHttpRequest();
      //link change as per api server link
      req.open("GET","http://localhost/moviebookingwebsite2.0/pages/city-validation.php?searchbox1="+str,true);
      req.send();
      req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200){
            var x=req.responseText;
            if(x==1)
            {
                document.getElementById("submitbtn").removeAttribute('disabled');
            }
            else
            {
                document.getElementById("submitbtn").setAttribute('disabled','disabled');
            }
        }
      };
  }
}








