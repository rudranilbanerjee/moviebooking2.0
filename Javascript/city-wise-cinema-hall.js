// Language selection 
let language=[];
let availableLangEle=document.querySelectorAll('.lang');
let availableLang=[];
availableLangEle.forEach((ele)=>{
    availableLang.push(ele.innerHTML);
})
let languageEle=document.querySelectorAll('.language div');
let flag=[];
languageEle.forEach((ele,idx)=>{
    flag.push(true);
    ele.setAttribute('id',`${idx}`);
  ele.addEventListener('click',(e)=>{
    // toggle features apply
    let id=e.target.getAttribute('id');
      if(flag[id]){
        e.target.style.background="#FF0080";
        language.push(e.target.innerHTML);
        flag[id]=false;
      }else{
        e.target.style.background="#E0E0E0";
        let pefIdx=language.indexOf(e.target.innerHTML);
        language.splice(pefIdx,1);
        flag[id]=true;
      }
      showLang();
      filter(language);
  })
})
function showLang(){
    language.forEach((val)=>{
        console.log(val);
    })
    console.log('Available');
    availableLang.forEach((val)=>{
        console.log(val);
    })
}
function filter(language){
    if(language.length!==0){
        let validMovie=Array.from(document.getElementsByClassName('valid-movie'));
        validMovie.forEach((ele)=>{
            ele.style.display='none';
        })
        language.forEach((value)=>{
            let select=Array.from(document.getElementsByClassName(value));
            if(select!=null){
                select.forEach((ele)=>{
                    ele.style.display="flex";
                })
            }
        })
    }
}