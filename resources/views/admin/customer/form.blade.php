@php
    $users = \App\Models\User::pluck('name','id');
@endphp

<div class="row">
    <x-input :options="$users" :value="$customer->user_id??old('user_id')" :col="6" :label="'User'" :type="'select'" :name="'user_id'" :required="true"></x-input>
    <x-input :value="$customer->first_name??old('first_name')" :col="6" :label="'First Name'" :type="'text'" :name="'first_name'" :required="true"></x-input>
    <x-input :value="$customer->last_name??old('last_name')" :col="6" :label="'Last Name'" :type="'text'" :name="'last_name'" :required="true"></x-input>
    <x-input :value="$customer->birthdate??old('birthdate')" :col="6" :label="'Birthdate'" :type="'date'" :name="'birthdate'" :required="true"></x-input>
    <x-input :options="['Male'=>'Male','Female'=>'Female']" :value="$customer->gender??old('gender')" :col="6" :label="'Gender'" :type="'select'" :name="'gender'" :required="true"></x-input>
    <x-input :value="$customer->phone_number??old('phone_number')" :col="6" :label="'Phone Number'" :type="'text'" :name="'phone_number'" :required="true"></x-input>
    <x-input :value="$customer->address??old('address')" :col="6" :label="'Address'" :type="'text'" :name="'address'" :required="true"></x-input>
    <x-input :value="$customer->province??old('province')" :col="6" :label="'Province'" :type="'text'" :name="'province'" :required="true"></x-input>
    <x-input :value="$customer->city??old('city')" :col="6" :label="'City'" :type="'text'" :name="'city'" :required="true"></x-input>
    <x-input :value="$customer->postalcode??old('postalcode')" :col="6" :label="'Postalcode'" :type="'text'" :name="'postalcode'" :required="true"></x-input>
</div>
