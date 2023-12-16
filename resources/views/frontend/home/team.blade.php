@php
    $owner = App\Models\Owner::latest()->get();
@endphp
<div class="team-area-three pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">Owner</span>
            <h2>Mari Tahu Lebih Jauh Dari Owner Homestay</h2>
        </div>
        <div class="team-slider-two owl-carousel owl-theme pt-45">
            @foreach ($owner as $item)
                <div class="team-item">
                    <a href="team.html">
                        <img src="{{ asset($item->image) }}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="team.html">{{ $item->name }}</a></h3>
                        <span>{{ $item->homestay }}</span>
                        <ul class="social-link">
                            <li>
                                <a href="{{ $item->facebook }}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{ $item->instagram }}" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="{{ $item->whatsapp }}" target="_blank"><i class='bx bxl-whatsapp'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
