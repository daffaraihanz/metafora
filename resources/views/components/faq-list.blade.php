<div class="accordion-item">
    <h2 class="accordion-header" id="{{ $heading }}">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $collapseTarget }}"
            aria-expanded="true" aria-controls="{{ $collapseControl }}">
            {{ $title }}
        </button>
    </h2>
    <div id="{{ $collapseId }}" class="accordion-collapse collapse show" aria-labelledby="{{ $headingNumber }}"
        data-bs-parent="#accordionExample">
        <div class="accordion-body">
            {{ $desc }}
        </div>
    </div>
</div>
