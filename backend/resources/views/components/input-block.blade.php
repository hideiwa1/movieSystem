@props(['disabled' => false])
<div>
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control w-100 mb-3 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
</div>