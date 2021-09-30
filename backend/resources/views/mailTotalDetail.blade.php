<x-app-layout>
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('admin.mail.list') }}">メール配信集計</a></li>
        <li class="breadcrumb-item active" aria-current="page">メール配信集計　詳細</li>
    </x-breadcrumb>
    <x-content>

    <x-slot name="submenu">
    
    </x-slot>

    
        <x-slot name="subtitle">
            <h2 class="col-lg-8 mb-0">{{$trainer_data -> name}}様 メール配信 詳細画面</h2>
            <div id="MailListDetailCSV" class="btn btn-secondary col-lg-3 m-2 flex-shrink-1"></div>
        </x-slot>

        <table id="table1"
            class="charts-css bar hide-data show-labels show-primary-axis show-4-secondary-axes  data-spacing-10 mb-3">

            <caption>トレーナー名　メール配信　月別集計</caption>

            <thead>
                <tr class="row g-0">
                    <th scope="col" class="col-lg-3"> 月度 </th>
                    <th scope="col" class="col-lg-3"> メール配信数 </th>
                </tr>
            </thead>

            <tbody>
                <?php $date = date("YYYY-mm"); ?>
                @for ($i = 0; $i < 12; $i++)
                <?php
                $target_date = date("Y-n", strtotime('-'.$i.' month'));
                $total = 0;
                foreach($mailList_data as $key => $val){
                    if($val["send_month"] == $target_date){
                        $total = $val['total'];
                    }
                }

                ?>
                <tr class="row g-0">
                    <th scope="row" class="col-lg-3">{{date("y年n月", strtotime($target_date))}}</th>
                    <td class="col-lg-3" style="--size:{{$total/100}};"> {{$total}} </td>
                </tr>
                @endfor
            </tbody>

        </table>

        <table class="row g-0">

            <caption>トレーナー名　メール配信　月別集計</caption>

            <thead class="border-bottom">
                <tr class="row g-0 p-1">
                    <th scope="col" class="col-3"> 月度 </th>
                    <th scope="col" class="col"> メール配信数 </th>
                </tr>
            </thead>

            <tbody>
                

                <?php $date = date("YYYY-mm"); ?>
                @for ($i = 0; $i < 12; $i++)
                <?php
                $target_date = date("Y-n", strtotime('-'.$i.' month'));
                $total = 0;
                foreach($mailList_data as $key => $val){
                    if($val["send_month"] == $target_date){
                        $total = $val['total'];
                    }
                }

                ?>
                <tr class="row g-0 p-1 border-bottom">
                    <th scope="row" class="col-lg-3">{{date("y年n月", strtotime($target_date))}}</th>
                    <td class="col-lg-3"> {{$total}} </td>
                </tr>
                @endfor
            </tbody>

        </table>

    </x-content>
</x-app-layout>