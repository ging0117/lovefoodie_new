<div id="asucla-header-cart">
    <a href="{{ url('/buyer/shoppingcart') }}">
        <span class="fa-stack">
            <i class="fa fa-shopping-cart fa-stack-2x" style="color:white;"></i>
            <span class="fa-stack" style="left:1.1em;top:-0.7em;">
                <i class="fa fa-circle" style="color:gold;font-size:1.4em;"></i>
                <strong class="fa-stack-1x" style="color:black;left:-0.55em;top:-0.2em;">
                   {{-- @if(Auth::user())
                    {{ Auth::user()->shoppingCart->sum('quantity') }}
                    @else
                    0
                    @endif --}}
                0</strong>
            </span>
        </span>
    </a>
</div> 

