<div class="row g-0 justify-content-center justify-content-around mb-3">
<button data-bs-toggle="modal" data-bs-target="#cancelModal" {{ $attributes->merge(['type' => 'button', 'class' => 'btn btn-secondary col-lg-4 mt-3 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $cancel ?? '' }}
</button>
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
        このコンテンツを削除します。<br>
        よろしいですか？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteModal">キャンセル</button>
            <button type="submit" form="deleteForm" name="delete" class="btn btn-primary">削除する</button>
        </div>
    </div>
  </div>
</div>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary col-lg-4 mt-3 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $submit }}
</button>
</div>
