@props(['disabled' => false])
<div class="col-lg-8">
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
</div>