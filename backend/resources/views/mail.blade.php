<x-app-layout>

    <x-content>

    <x-slot name="submenu">
    
    </x-slot>

    
        <x-slot name="subtitle">
            <h2 class="mb-0">メール配信画面</h2>
        </x-slot>

        <form method="POST" action="{{ route('mail.send') }}">
		@csrf
            <div class="row g-0　mb-3 p-sm-3">
				<div class="col-lg-4 form-check d-flex align-items-center">
					<input class="form-check-input me-3" type="radio" name="method" value="email" id="">
                	<label for="" class="col-form-label">宛先（直接入力）</label>
				</div>
                <div class="col-lg-8">
                    <input type="text" name="email" class="form-control mb-3">
				</div>
			</div>
                   
			<div class="row g-0　mb-3 p-sm-3  align-items-start">
				<div class="col-lg-4 form-check d-flex align-items-center">
					<input class="form-check-input me-3" type="radio" name="method" value="list" id="">
                	<a href="{{ route('student.list') }}" class="btn btn-secondary">生徒一覧から選択</a>
				</div>
				
                <div class="col-lg-8">

                    @if(!empty($student_data))
					<div style="overflow: scroll; max-height: 20vh;">
						@foreach($student_data as $key => $val)
							<input type="text" name="list[]" id="" class="form-control"
								value="{{$val -> email}}">
						@endforeach
					</div>
                    @endif
				</div>
            </div>


            <div class="row g-0　mb-3 p-sm-3">
				<div class="col-lg-4 form-check d-flex align-items-center">
					<input class="form-check-input me-3" type="radio" name="method" value="class" id="">
                	<label for="" class="col-form-label">配布リスト</label>
				</div>
                
                <div class="col-lg-8">
                    <select class="form-select" neme="class" aria-label="Default select example">
						@foreach($class_data as $key => $val)
                        <option value="{{$val -> id}}">{{$val -> name}}</option>
                        @endforeach
                        </select>
                </div>
            </div>

            <div class="row g-0　mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">件名</label>
                <div class="col-lg-8">
                    <input type="text" name="subject" class="form-control">
                </div>
            </div>

			<div class="row g-0　mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">コースメニューURL</label>
                <div class="col-lg-8">
                    <input type="text" name="url" class="form-control">
                </div>
            </div>

            <div class="row g-0　mb-3 p-sm-3">
                <label for="" class="col-lg-4 col-form-label">本文</label>
                <div class="col-lg-8">
                    <textarea name="comment" id="" rows="5" class="form-control"></textarea>
                </div>
            </div>

            <div class="row g-0 justify-content-center mb-3">
                <button type="submit" class="btn btn-primary col-lg-6 mt-4">送信する</button>
            </div>
        </form>

    </x-content>
</x-app-layout>