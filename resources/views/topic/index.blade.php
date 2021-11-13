@section('topic')
    @if(!$topics->isEmpty())
        <div class="container">
            <div class="row pb-4">
                <div class="col">
                    <div class="list-group mt-3">
                        <a href="{{ route('home') }}" class="headNomination list-group-item list-group-item-action flex-column align-items-start">
                            <p class="mb-1">Темы</p>
                        </a>
                        @foreach($topics as $topic)
                            <a href="{{ route('topic.show', $topic->id) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                <p class="mb-1">Название: {{$topic->name}}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
