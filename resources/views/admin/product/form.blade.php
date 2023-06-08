@php
    $categories = \App\Models\Category::pluck('category_name','id');
@endphp

<div class="row">

    <x-input :options="$categories" :value="$product->category_id??old('category_id')" :col="6" :label="'Category'" :type="'select'" :name="'category_id'" :required="true"></x-input>
    <x-input :value="$product->product_name??old('product_name')" :col="6" :label="'Product Name'" :type="'text'" :name="'product_name'" :required="true"></x-input>
    <x-input :value="$product->color??old('color')" :col="4" :label="'Color'" :type="'text'" :name="'color'" :required="true"></x-input>
    <x-input :options="['XS'=>'XS','S'=>'S','M'=>'M','L'=>'L','XL'=>'XL']" :value="$product->size??old('size')" :col="4" :label="'Size'" :type="'select'" :name="'size'" :required="true"></x-input>
    <x-input :value="$product->price??old('price')" :col="4" :label="'Price'" :type="'number'" :name="'price'" :required="true"></x-input>
    <x-input :value="$product->description??old('description')" :col="12" :label="'Description'" :type="'textarea'" :name="'description'" :required="true"></x-input>
    <x-input :value="$product->stock??old('stock')" :col="6" :label="'Stock'" :type="'number'" :name="'stock'" :required="true"></x-input>
    {{-- <x-input :value="$product->sold_count??old('sold_count')" :col="6" :label="'Sold Count'" :type="'number'" :name="'sold_count'" :required="true"></x-input> --}}
    <x-input :value="$product->weight??old('weight')" :col="6" :label="'Weight'" :type="'number'" :name="'weight'" :required="true"></x-input>
    <x-input :value="$product->image??old('image')" :col="6" :label="'Image'" :type="'file'" :name="'image'" :required="true"></x-input>
    <div class="col-6 mb-2">
        @if (!empty($product))
            <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}" class="img-fluid" style="height: 100px">
        @endif
    </div>
</div>
