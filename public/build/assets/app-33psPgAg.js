document.addEventListener("DOMContentLoaded",()=>{const a="http://127.0.0.1:8000",e=document,t=e.querySelector("button#Auth"),s=e.querySelector("input#email"),o=200;let d=e.querySelector("title").innerHTML;t.addEventListener("click",function(){t.disabled=!0,t.innerHTML=`<img id="loading" src='${a+"/assets/images/loading.png"}' alt=''>`;let i=new XMLHttpRequest;i.onload=function(){if(t.disabled=!1,JSON.parse(i.response).length===0){t.innerHTML="ادامه بده",s.classList.remove("invalid");try{e.querySelector(".error-box").style.display="none"}catch{}}else{t.innerHTML="مرحله بعد";let r=JSON.parse(i.response);s.classList.add("invalid");let l="";try{e.querySelector(".error-box").remove()}catch{}l+='<div class="error-box mt-1">',r.email.forEach(function(n){n==="email is required."?n="ایمیل اجباری است.":n==="email must be type email."&&(n="ورودی باید از نوع ایمیل باشد."),l+=`<span class="error text-[#FF5C00] mt-1 block">${n}</span>`}),l+="</div>",s.insertAdjacentHTML("afterend",l)}},i.open("POST",a+"/api/v1/auth"),i.setRequestHeader("Content-type","application/json"),setTimeout(()=>{i.send(JSON.stringify({email:s.value}))},o)}),e.addEventListener("visibilitychange",function(){e.visibilityState==="hidden"?e.title="منتظر شما هستیم...":e.title=d})});
