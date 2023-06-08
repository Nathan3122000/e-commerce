<div class="row">

<x-input :value="$paymentmethod->payment_method??old('payment_method')" :col="6" :label="'Payment Method'" :type="'text'" :name="'payment_method'" :required="true"></x-input>
<div class="col-12 mb-2 px-1">
    </div>
</div>
