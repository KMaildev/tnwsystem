<div class="card-header border-bottom">
    <ul class="nav nav-tabs card-header-tabs" role="tablist">
        <li class="nav-item">
            <a href="{{ route('showing_property', ['house_showing_id' => $house_showing->id]) }}" class="nav-link active">
                <i class="tf-icons bx bx-home me-1"></i>
                House Showing
            </a>
        </li>

        <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-within-card-link" aria-controls="navs-within-card-link" aria-selected="false">
                <i class="fa-solid fa-clock-rotate-left  me-1"></i>
                House Showing History
            </button>
        </li>
    </ul>
</div>
