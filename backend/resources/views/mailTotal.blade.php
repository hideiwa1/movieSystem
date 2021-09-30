<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item active" aria-current="page">メール配信集計</li>
    </x-breadcrumb>
    <x-content>

    <x-slot name="submenu">
    
    </x-slot>

    
        <x-slot name="subtitle">
            <h2 class="col-lg-8 mb-0">メール配信 集計画面</h2>
            <div id="MailListCSV" class="btn btn-secondary col-lg-3 m-2 flex-shrink-1"></div>
        </x-slot>

        <div id="MailList"></div>

    </x-content>
</x-app-layout>