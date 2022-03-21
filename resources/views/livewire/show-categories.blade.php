<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    @forelse($category as $categories)
        <li class="nav-item">
            <span class="nav-link"> {{ $categories->name }}</span>
        </li>

    @empty
        <li class="nav-item">
            <a href="#" class="nav-link"> Not Category Set</a>
        </li>
    @endforelse
</div>
