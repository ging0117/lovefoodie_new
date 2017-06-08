<!--div id="search-input-div">
<form method="get" action="{{ url('/search') }}">
    <div id="custom-search-input">
        <div class="input-group">
            <span class="find-span">Find</span>
            <input type="text" class="search-query" disabled="true">
            <input type="text" id="find" name="keyword" placeholder="Delicious Dishes">
            
            <span class="near" >Near</span>
            <input type="text" id="location" placeholder="" class="location_input" >
            <input type="hidden" id="search_longitude" name="longitude">
            <input type="hidden" id="search_latitude" name="latitude">
            <div id='loc-menu'>
            @include('buyer.location-menu')
            </div>

            <div class="drawdown">  
                <a id="type_showoption" class="showOption" style="color:black;">Seller</a>
                <input type="hidden" id="hidden_type" name="type" value="seller">

                <ul id="type_option" class="option" style="display:none;">
                    <li id="seller" class="liOption" onclick="setOption(this)" >Seller</li>
                    <li id="dish" class="liOption no-bottom" onclick="setOption(this)">Dish</li>
                </ul>
            </div>
            <span class="input-group-btn">
                <input type="submit" class="btn_search" value="submit">
            </span>
        </div>
    </div>
</form>
</div-->

<script src="{{ URL::asset('/js/jquery-1.11.2.min.js') }}"></script>
<script>
$(document).ready(function () {
    // Setup search dropdown menu
    setOptions("{{ Auth::guest()? false : true }}");
});
</script>
