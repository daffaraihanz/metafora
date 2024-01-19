<div class="row align-items-center detail-service-list {{ $flexreverse }}">
    <div class="col-6">
        <img class="img-fluid" src="{{ asset('medias/images/') . '/' . $image . '.jpg' }}" alt="logo">
    </div>
    <div class="col-5 ps-4">
        <h5>{{ $about }}</h5>
        <h2>{{ $title }}</h2>
        <p>{{ $desc }}</p>
    </div>
</div>
