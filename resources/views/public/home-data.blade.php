@php
$utils = new App\Libraries\utils;
$result = $utils->get_data('/dishes/newest', 'public.home-data');
echo $result;
@endphp


<script>
$(document).ready(function(){
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
</script>
