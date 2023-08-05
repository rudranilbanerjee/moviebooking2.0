// ===================Citylist update and closeing=========================//
function citylistupdate(){
    let a=document.querySelector(".citylist");
    a.style.display="flex";
}
function closecitylistbar(){
    let a=document.querySelector(".citylist");
    a.style.display="none";
}



//==================If city is already select then show the hall list with date and time and closing================// 
function dateselect(){
    let a=document.querySelector(".hall-list");
    a.style.display="block";
}
function closelist(){
    var a=document.querySelector(".hall-list");
    a.style.display="none";
}

//========================showing some message when hover city from cityList===============================//
function message(){
    let messageHover=document.querySelector(".message");
    messageHover.style.display="block";
}
function removemessage()
{
    let messageHover=document.querySelector(".message");
    messageHover.style.display="none";
}



// ===================fetch As per selected city wise show time update function ==================================//

function dateselect1(str)
{
    let city=str;
    alert(city);
    let now = new Date();
    let dname = now.getDay(),
        mo = now.getMonth(),
        dnum = now.getDate(),
        yr = now.getFullYear(),
        hou = now.getHours();
    console.log(dname,mo,dnum,hou);
    var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    let week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    var a=document.querySelector(".hall-list");
    a.style.display="block";
    var req=new XMLHttpRequest();
    req.open("GET","http://localhost/moviebookingwebsite/moviewise-cityname.php?day="+week[dname]+"&date="+dnum+"&month="+months[mo]+"&hour="+hou+"&city="+city,true);
    req.send();
    req.onreadystatechange=function(){
        if(req.readyState==4 && req.status==200)
        {
            var x=req.responseText;
            document.getElementById("hall-list").innerHTML=req.responseText;
        }
    };
}


//=======================Update the date=======================//  

let nextDay=0;
let nextDate=0;
let nextMonth=0;
let selectDate=document.getElementsByClassName('select-date')[0];


function updateDate(dname,dnum,mo){
    nextDay=dname;
    nextDate=dnum;
    nextMonth=mo;
    console.log("hello");
    let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    let week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    selectDate.innerHTML="";
    for(let j=0;j<10;j++){
        if(nextDay===7)
        {
            nextDay=0;
        }
        if(nextMonth===30){
            nextDate=1;
            nextMonth++;
        }
        let item=`
            <div class="date-for-booking" onclick="selectdate(this)" >
                <div id="dayname${j}">${week[nextDay]}</div>
                <div id="daynum${j}">${nextDate}</div>
                <div id="month${j}">${months[nextMonth]}</div>
            </div>
            `;
        nextDay++;
        nextDate++;
        selectDate.innerHTML+=item;
    }
    nextDay=dname;
    nextDate=dnum;
    nextMonth=mo;
    let firstDate=document.getElementsByClassName('date-for-booking')[0];
    firstDate.style.backgroundColor='#FF0080';
}
// ======================update the clock each second=======================//
function updateClock(){
    // updateDate();
    let now = new Date();
    let dname = now.getDay(),
        mo = now.getMonth(),
        dnum = now.getDate(),
        yr = now.getFullYear(),
        hou = now.getHours(),
        min = now.getMinutes(),
        sec = now.getSeconds(),
        pe = "AM";
        if(hou >= 12){
          pe = "PM";
        }
        if(hou == 0){
          hou = 12;
        }
        if(hou > 12){
          hou = hou - 12;
        }
        let months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        let week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
        var values = [week[dname], months[mo], dnum, yr, hou, min, sec, pe];
        for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).innerHTML= values[i];
        if(nextDate!==dnum){
            updateDate(dname,dnum,mo);
        }
  }


  //========================scrolling the date========================//
  let btnSleft1=document.getElementById('btn-scroll-left1');
  btnSleft1.addEventListener('click',()=>{
     selectDate.scrollLeft-=180;
  })
  let btnSright1=document.getElementById('btn-scroll-right1');
  btnSright1.addEventListener('click',()=>{
    selectDate.scrollLeft+=180;
  })


// ===============================fetch the Movie complex and show time list as per selected date====================//
  function selectdate(str)
  { 
    let sel=document.querySelectorAll('.date-for-booking');
    sel.forEach((ele)=>{
       ele.style.backgroundColor="#E0E0E0";
    })
    str.style.backgroundColor="#FF0080";
    var day=str.children[0].innerHTML;
    var date=str.children[1].innerHTML;
    var month=str.children[2].innerHTML;
    var now = new Date();
    var dnum=now.getDate();
    var hou = now.getHours();
    var req=new XMLHttpRequest();
    req.open("GET","http://localhost/moviebookingwebsite2.0/pages/datewise-movie-list1.php?day="+day+"&date="+date+"&month="+month+"&hour="+hou+"&today="+dnum,true);
    req.send();
    req.onreadystatechange=function(){
    if(req.readyState==4 && req.status==200)
    {
        console.log(req.responseText);
        console.log("hello")
      document.getElementById("hall-list").innerHTML=req.responseText;
    }      
    };
  }    
