@php
    $customers = \App\Models\Customer::pluck('first_name','id');
    $payment_methods = \App\Models\PaymentMethod::pluck('payment_method','id');
    $shipments = \App\Models\Shipment::pluck('company_name','id');
@endphp

<div class="row">
    <x-input :options="$customers" :value="$order->customer_id??old('customer_id')" :col="6" :label="'Customer'" :type="'select'" :name="'customer_id'" :required="true"></x-input>
    <x-input :options="$payment_methods" :value="$order->payment_method_id??old('payment_method_id')" :col="6" :label="'Payment Method'" :type="'select'" :name="'payment_method_id'" :required="true"></x-input>
    <x-input :options="$shipments" :value="$order->shipment_id??old('shipment_id')" :col="6" :label="'Shipment'" :type="'select'" :name="'shipment_id'" :required="true"></x-input>
    <x-input :value="$order->paid_date??old('paid_date')" :col="6" :label="'Paid Date'" :type="'date'" :name="'paid_date'" :required="true"></x-input>
    <x-input :value="$order->ship_date??old('ship_date')" :col="6" :label="'Ship Date'" :type="'date'" :name="'ship_date'" :required="true"></x-input>
    <x-input :options="['IN PROCESS'=>'IN PROCESS','ON DELIVERY'=>'ON DELIVERY','ARRIVED'=>'ARRIVED']" :value="$order->status??old('status')" :col="6" :label="'Status'" :type="'select'" :name="'status'" :required="true"></x-input>
</div>
