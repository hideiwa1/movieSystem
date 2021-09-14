<div class="row g-0 justify-content-center justify-content-around mb-3">
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-secondary col-lg-4 mt-3 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $cancel }}
</button>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary col-lg-4 mt-3 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $submit }}
</button>
</div>
