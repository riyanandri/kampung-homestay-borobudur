@php
    $blog = App\Models\BlogPost::latest()
        ->limit(3)
        ->get();
@endphp
<div class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">BLOGS</span>
            <h2>Our Latest Blogs to the Intranational Journal at a Glance</h2>
        </div>
        <div class="row pt-45">
            @foreach ($blog as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item">
                        <a href="{{ url('blog/details/' . $item->post_slug) }}">
                            <img src="{{ asset($item->post_image) }}" alt="Images">
                        </a>
                        <div class="content">
                            <ul>
                                <li>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</li>
                                <li><i class='bx bx-user'></i>{{ $item['user']['name'] }}</li>
                            </ul>
                            <h3>
                                <a href="{{ url('blog/details/' . $item->post_slug) }}">{{ $item->post_title }}</a>
                            </h3>
                            <p>{{ $item->short_desc }}</p>
                            <a href="{{ url('blog/details/' . $item->post_slug) }}" class="read-btn">
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
