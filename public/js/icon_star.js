/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(window).load(function(){
  for(var i=0;i<$('.rating').length;i++)
  {
      $('#rating').eq(0).attr("id","rating"+i);
      $('#rate').eq(0).attr("id","rate"+i);
      
      var rate=$('#rate'+i).attr("value");
      var count=0;
      for(var j=1;j<rate+1;j++)
      {
          $('#rating'+i+' i').eq(count).addClass("voted");
          count++;
      }
      if(rate-count>0.25&&rate-count<0.75)
      {
          $('#rating'+i+' li').eq(count).removeClass("undisplay");
      }
      else if(rate-count>0.75){
          $('#rating'+i+' i').eq(count).addClass("voted");
      }
      
      
  }
  });




