<div class="row">

    <x-input :value="$shipment->company_name??old('company_name')" :col="6" :label="'Company Name'" :type="'text'" :name="'company_name'" :required="true"></x-input>
    <x-input :value="$shipment->shipper_phone_number??old('shipper_phone_number')" :col="6" :label="'Shipper Phone Number'" :type="'text'" :name="'shipper_phone_number'" :required="true"></x-input>

</div>
