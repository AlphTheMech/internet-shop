<head>
    {{-- <link rel="stylesheet" href="/css/maincss/main_styles.css"> --}}
</head>
<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="product_grid">

                    <!-- Product -->
                    <div class="product" style="width:auto">
                        <div class="product_image"><img  src="{{ Storage::url($sku->product->image) }}" alt="{{ $sku->product->__('name') }}"></div>
                        @if($sku->product->isNew())
                        <div class="product_extra product_new"><a href="categories.html">@lang('main.properties.new')</a></div>
                        @endif
        
                        @if($sku->product->isRecommend())
                        <div class="product_extra product_sale"><a href="categories.html">@lang('main.properties.recommend')</a></div>
                        {{-- <span class="badge badge-warning"></span> --}}
                        @endif
        
                        @if($sku->product->isHit())
                        <div class="product_extra product_hit"><a href="categories.html">@lang('main.properties.hit')</a></div>
                        {{-- <span class="badge badge-danger"></span> --}}
                         @endif
                        {{-- @if(($sku->product->isHit() && $sku->product->isRecommend()) || ( $sku->product->isNew() && $sku->product->isRecommend()) || ( $sku->product->isNew() && $sku->product->isHit()) )
                        <div class="product_extra product_hit"><a href="categories.html">@lang('main.properties.hit')</a></div>
                        <div class="product_extra product_sale"><a href="categories.html">@lang('main.properties.recommend')</a></div>
                        @endif --}}
                        <div class="product_content">
                            <div class="product_title">{{ $sku->product->__('name') }}</div>
                            @isset($sku->product->properties)
                                @foreach ($sku->propertyOptions as $propertyOption)
              
                                <div class="product_title">{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</div>
                                @endforeach
                            @endisset
                            {{-- <div class="product_title"><a href="product.html">Смартфон</a></div> --}}
                            <div class="product_price">{{ $sku->price }} {{ $currencySymbol }}</div>
                        </div>
                        <form action="{{ route('basket-add', $sku) }}"  method="POST">
                            @if($sku->isAvailable())
                                <button type="submit" style="width:112px; height:52px"  class="newsletter_button trans_200" role="button"><span>@lang('main.add_to_basket')</span></button>
                            @else
                                @lang('main.not_available')
                            @endif
                            <a href="{{ route('sku',
                                [isset($category) ? $category->code :
                                $sku->product->category->code, $sku->product->code, $sku->id]) }}"
                               {{-- class="icon_box_title" --}}
                               style="padding-left:25px;color: black"
                               role="button">@lang('main.more')</a>
                            @csrf
                        </form>
                    </div>                             
                </div>
            </div>
        </div>
    </div>
</div>
