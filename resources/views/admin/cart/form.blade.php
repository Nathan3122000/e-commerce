<div class="row">

<x-input :options="[]" :value="$cart->user_id??old('user_id')" :col="6" :label="'User_id'" :type="'select'" :name="'user_id'" :required="true"></x-input>
<x-input :options="[]" :value="$cart->product_id??old('product_id')" :col="6" :label="'Product_id'" :type="'select'" :name="'product_id'" :required="true"></x-input>
<x-input :value="$cart->qty??old('qty')" :col="6" :label="'Qty'" :type="'number'" :name="'qty'" :required="true"></x-input>
<x-input :value="$cart->price_item??old('price_item')" :col="6" :label="'Price_item'" :type="'number'" :name="'price_item'" :required="true"></x-input>
<x-input :value="$cart->discount??old('discount')" :col="6" :label="'Discount'" :type="'number'" :name="'discount'" :required="true"></x-input>
<x-input :value="$cart->subtotal??old('subtotal')" :col="6" :label="'Subtotal'" :type="'number'" :name="'subtotal'" :required="true"></x-input>
<div class="col-12 mb-2 px-1">
    </div>
</div>
