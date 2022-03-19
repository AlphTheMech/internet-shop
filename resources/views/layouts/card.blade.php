<div class="products">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="product_grid">

                    <!-- Product -->
                    <div class="product">
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
                        <form action="{{ route('basket-add', $sku) }}" method="POST">
                            @if($sku->isAvailable())
                                <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
                            @else
                                @lang('main.not_available')
                            @endif
                            <a href="{{ route('sku',
                                [isset($category) ? $category->code :
                                $sku->product->category->code, $sku->product->code, $sku->id]) }}"
                               class="btn btn-default"
                               role="button">@lang('main.more')</a>
                            @csrf
                        </form>
                    </div>

                
                   

                </div>
                    
            </div>
        </div>
    </div>
</div>
    {{-- <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="labels">
                @if($sku->product->isNew())
                    <span class="badge badge-success">@lang('main.properties.new')</span>
                @endif

                @if($sku->product->isRecommend())
                    <span class="badge badge-warning">@lang('main.properties.recommend')</span>
                @endif

                @if($sku->product->isHit())
                    <span class="badge badge-danger">@lang('main.properties.hit')</span>
                @endif
            </div>
            <img src="{{ Storage::url($sku->product->image) }}" alt="{{ $sku->product->__('name') }}">
            <div class="caption">
                <h3>{{ $sku->product->__('name') }}</h3>
                @isset($sku->product->properties)
                    @foreach ($sku->propertyOptions as $propertyOption)
                
                        <h4>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</h4>
                    @endforeach
                @endisset
                <p>{{ $sku->price }} {{ $currencySymbol }}</p>
                <p>
                <form action="{{ route('basket-add', $sku) }}" method="POST">
                    @if($sku->isAvailable())
                        <button type="submit" class="btn btn-primary" role="button">@lang('main.add_to_basket')</button>
                    @else
                        @lang('main.not_available')
                    @endif
                    <a href="{{ route('sku',
                        [isset($category) ? $category->code :
                        $sku->product->category->code, $sku->product->code, $sku->id]) }}"
                    class="btn btn-default"
                    role="button">@lang('main.more')</a>
                    @csrf
                </form>
                </p>
            </div>
        </div>
    </div> --}}
