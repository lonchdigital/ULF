<section class="ready-drive-horizontal pb-7 pb-md-10 pb-lg-13">
    <div class="container">
        <div class="row">
            <div class="col">
                @if(!is_null($carDriveBlock))
                    @if($carDriveBlock->title)
                        <div class="head font-weight-bolder mb-3 mb-md-6 text-center">{{ $carDriveBlock->title }}</div>
                    @endif
                    <ul class="list-decimal mb-6">
                        @if($carDriveBlock->step_one)
                            <li>{{ $carDriveBlock->step_one }}</li>
                        @endif
                        @if($carDriveBlock->step_two)
                            <li>{{ $carDriveBlock->step_two }}</li>
                        @endif
                        @if($carDriveBlock->step_three)
                            <li>{{ $carDriveBlock->step_three }}</li>
                        @endif
                        @if($carDriveBlock->step_four)
                            <li>{{ $carDriveBlock->step_four }}</li>
                        @endif
                        @if($carDriveBlock->step_five)
                            <li>{{ $carDriveBlock->step_five }}</li>
                        @endif
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>
