<div class="row">

<x-input :options="[]" :value="$like->customer_id??old('customer_id')" :col="6" :label="'Customer_id'" :type="'select'" :name="'customer_id'" :required="true"></x-input>
<x-input :options="[]" :value="$like->product_id??old('product_id')" :col="6" :label="'Product_id'" :type="'select'" :name="'product_id'" :required="true"></x-input>
<div class="col-12 mb-2 px-1">
    </div>
</div>