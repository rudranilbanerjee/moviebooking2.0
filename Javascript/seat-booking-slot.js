let array=[
    {
        column:'A',
        totalSeat:20,
        royality:'platinum'
    },
    {
        column:'B',
        totalSeat:20,
        royality:'platinum'
    },
    {
        column:'C',
        totalSeat:20,
        royality:'platinum'
    },
    {
        column:'D',
        totalSeat:20,
        royality:'platinum'
    },
    {
        column:'E',
        totalSeat:20,
        royality:'platinum'
    },
    {
        column:'F',
        totalSeat:20,
        royality:'platinum'
    },
    {
        column:'G',
        totalSeat:20,
        royality:'gold'
    },
    {
        column:'H',
        totalSeat:20,
        royality:'gold'
    },
    {
        column:'I',
        totalSeat:20,
        royality:'gold'
    },
    {
        column:'J',
        totalSeat:20,
        royality:'silver'
    },
    {
        column:'K',
        totalSeat:20,
        royality:'silver'
    },
    {
        column:'L',
        totalSeat:8,
        royality:'silver'
    },
    {
        column:'M',
        totalSeat:8,
        royality:'silver'
    }
]
// ==============================Makeing the seat========================== // 
for(let idx=0;idx<array.length;idx++){
    let royality=array[idx].royality;
    let rawDiv=document.getElementById(royality);
    rawDiv.classList.add('unite')
    let seat=array[idx].totalSeat;
    let alphabet=array[idx].column;
    let mainDiv=document.createElement('div');
    mainDiv.setAttribute('class','row');
    mainDiv.setAttribute('id',`${alphabet}-row`);
    if(idx===0 || idx===6 || idx===9){
        mainDiv.setAttribute('style','margin-top: 17px;');
    }
    let div=document.createElement('div');
    div.innerHTML=alphabet;
    div.setAttribute('class',`rowSeat`);
    mainDiv.appendChild(div);
    for(let i=1;i<=seat;i++){
        if(alphabet==='L' || alphabet==='M' && i===4){
           let item =`<div class="seat" style="margin-right:509px" id="${alphabet}-${i}">${alphabet}-${i}</div>`
        }
        let item=`
           <div class="seat" id="${alphabet}-${i}">${alphabet}-${i}</div>
        `;
        mainDiv.innerHTML+=item;
    }
    rawDiv.appendChild(mainDiv);
}


//============================ seat selected and not selected toggle function===================//
var i=0;
var j=0;
var k=0;
var seatnop=new Array();
var seatnog=new Array();
var seatnos=new Array();
$(document).ready(function(){
    $('#platinum').on("click",function(){
      if(event.target.classList.contains('seat') && !event.target.classList.contains('occupied'))
      {
          var x=event.target.innerText;
        if(event.target.classList.contains('selected')){
            let id=seatnop.indexOf(x);
            let remove=seatnop.splice(id, 1);
            i--;
        }else{
            seatnop[i]=x;
              i++;
        }
        event.target.classList.toggle('selected');
      }
      updateselectedcount();
      
    });
    $('#gold').on("click",function(){
      if(event.target.classList.contains('seat') && !event.target.classList.contains('occupied'))
      {
        var y=event.target.innerText;
        if(event.target.classList.contains('selected')){
            let id=seatnog.indexOf(y);
            let remove=seatnog.splice(id, 1);
            j--;
        }else{
            seatnog[j]=y;
              j++;
        }
          event.target.classList.toggle('selected');
      }
      updateselectedcount();
    });
    $('#silver').on("click",function(){
      if(event.target.classList.contains('seat') && !event.target.classList.contains('occupied'))
      {
        var z=event.target.innerText;
        if(event.target.classList.contains('selected')){
            let id=seatnos.indexOf(z);
            let remove=seatnos.splice(id, 1);
            k--;
        }else{
            seatnos[k]=z;
              k++;
        }
          event.target.classList.toggle('selected');
      }
      updateselectedcount();
    });
  });




  //==============================selected seat count and total price as per seat will be counted============================//

  function updateselectedcount()
  {
     var selectedseatsforplatinum=document.querySelectorAll('#platinum .seat.selected');
     var selectedseatsforgold=document.querySelectorAll('#gold .seat.selected');
     var selectedseatsforsilver=document.querySelectorAll('#silver .seat.selected');
     var selected_seat_countp=selectedseatsforplatinum.length;
     var selected_seat_countg=selectedseatsforgold.length;
     var selected_seat_counts=selectedseatsforsilver.length;
     document.getElementById("select-seats").innerText=selected_seat_countp+selected_seat_countg+selected_seat_counts+" ticket";
     if(selected_seat_countp+selected_seat_countg+selected_seat_counts===0)
     {
         document.getElementById("total-bill-box").style.display="none";
         document.getElementById("select-seats").innerText="Select";
     }
     else
     {
        document.getElementById("total-bill-box").style.display="flex";
        document.getElementById("total-bill").innerText=(selected_seat_countp*platinum_ticket)+(selected_seat_countg*gold_ticket)+(selected_seat_counts*silver_ticket);
     }
  }


  //================Bill payment function=======================//

  function billpayment()
  {
   var selectedseatsforplatinum=document.querySelectorAll('#platinum .seat.selected');
   var selectedseatsforgold=document.querySelectorAll('#gold .seat.selected');
   var selectedseatsforsilver=document.querySelectorAll('#silver .seat.selected');
   var selected_seat_countp=selectedseatsforplatinum.length;
   var selected_seat_countg=selectedseatsforgold.length;
   var selected_seat_counts=selectedseatsforsilver.length;
   var total_ammount=(selected_seat_countp*platinum_ticket)+(selected_seat_countg*gold_ticket)+(selected_seat_counts*silver_ticket);
   var total_seat=(selected_seat_countp+selected_seat_countg+selected_seat_counts);
   $('.row .seat.selected').addClass("occupied");
   var req=new XMLHttpRequest();
   req.open("GET","http://localhost/moviebookingwebsite2.0/pages/payment-successful-page.php?totalpayment="+total_ammount+"&totalseat="+total_seat+"&seatnoplatinum="+seatnop+"&seatnogold="+seatnog+"&seatnosilver="+seatnos,true);
   req.send();
   req.onreadystatechange=function(){
       if(req.readyState==4 && req.status==200){
           var x=req.responseText;
           document.getElementById("new-page").innerHTML=x;
       }
      };
  } 