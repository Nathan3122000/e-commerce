<div class="row">

<x-input :options="[]" :value="$orderdetail->order_id??old('order_id')" :col="6" :label="'Order_id'" :type="'select'" :name="'order_id'" :required="true"></x-input>
<x-input :options="[]" :value="$orderdetail->product_id??old('product_id')" :col="6" :label="'Product_id'" :type="'select'" :name="'product_id'" :required="true"></x-input>
<x-input :value="$orderdetail->price??old('price')" :col="6" :label="'Price'" :type="'number'" :name="'price'" :required="true"></x-input>
<x-input :value="$orderdetail->qty??old('qty')" :col="6" :label="'Qty'" :type="'number'" :name="'qty'" :required="true"></x-input>
<x-input :value="$orderdetail->discount??old('discount')" :col="6" :label="'Discount'" :type="'number'" :name="'discount'" :required="true"></x-input>
<x-input :value="$orderdetail->subtotal??old('subtotal')" :col="6" :label="'Subtotal'" :type="'number'" :name="'subtotal'" :required="true"></x-input>
<x-input :value="$orderdetail->grandtotal??old('grandtotal')" :col="6" :label="'Grandtotal'" :type="'number'" :name="'grandtotal'" :required="true"></x-input>
<x-input :value="$orderdetail->ship_date??old('ship_date')" :col="6" :label="'Ship_date'" :type="'date'" :name="'ship_date'" :required="true"></x-input>
<x-input :value="$orderdetail->title??old('title')" :col="6" :label="'Title'" :type="'text'" :name="'title'" :required="true"></x-input>
<x-input :options="[]" :value="$orderdetail->rating??old('rating')" :col="6" :label="'Rating'" :type="'select'" :name="'rating'" :required="true"></x-input>
<x-input :value="$orderdetail->content??old('content')" :col="6" :label="'Content'" :type="'textarea'" :name="'content'" :required="true"></x-input>
<div class="col-12 mb-2 px-1">
    </div>
</div>