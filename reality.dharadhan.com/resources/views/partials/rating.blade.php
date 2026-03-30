<!-- Rating Section -->
<section class="rating-container">
    <div class="container my-5">
        <div class="row align-items-center rating-section">
            <!-- Left Content -->
            <div class="col-12 col-lg-12 mb-4 mb-lg-0">
                <h2 class="rating-title">
                    How Would You Rate Your Locality / Society?
                </h2>

                <p class="rating-text">
                    Share your experience to help others make better decisions about the area.
                </p>

                <div class="rating-stars" id="ratingStars" {{ $userRating ? 'read-only' : '' }}>
                    @for($i = 1; $i <= 5; $i++)
                        <svg class="star {{ isset($userRating) && $i <= $userRating->rating ? 'active' : '' }}"
                            data-value="{{ $i }}"
                            width="36" height="36" viewBox="0 0 24 24">
                            <path d="M12 17.3l-6.18 3.7 1.64-7.03L2 9.24l7.19-.61L12 2l2.81 6.63
                                    7.19.61-5.46 4.73 1.64 7.03z"/>
                        </svg>
                    @endfor
                </div>
                    @if($userRating)
                        <p class="text-success mt-3">
                            Thanks! You rated this locality {{ $userRating->rating }}/5
                        </p>
                    @endif

                <input type="hidden" id="selectedRating">
                <img class="rating-img" src="{{ asset('v2/images/rating.png') }}">
            </div>

        </div>
    </div>
</section>

<div class="modal fade" id="ratingModal">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <form method="POST" action="{{ route('rating.store') }}" class="modal-content">
      @csrf

      <input type="hidden" name="rating" id="modalRating" value="{{ $userRating->rating ?? '' }}">
      <input type="hidden" name="device_hash" id="deviceHash" value="{{ $userRating->device_hash ?? '' }}">

      <div class="modal-body">
        <input type="text" name="name" class="form-control mb-2" placeholder="Your Name" required value="{{ $userRating->name ?? '' }}">
        <input type="text" name="location" class="form-control mb-2" placeholder="City / Society" required value="{{ $userRating->location ?? '' }}">
        <textarea name="message" class="form-control" placeholder="Your experience (optional)">{{ $userRating->message ?? '' }}</textarea>
        <button class="btn btn-primary mt-3 w-100">Submit</button>
      </div>
    </form>
  </div>
</div>

@push('styles')
    <style>
        .rating-stars {
            display: flex;
            gap: 12px;
        }

        .star {
            fill: none;
            stroke: #f97316;
            stroke-width: 1.8;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .star:hover {
            transform: scale(1.08);
        }

        .star.active {
            fill: #f97316;
        }

        .rating-stars.read-only .star {
            cursor: default;
        }


    </style>
@endpush

@push('scripts')
    <script>
        document.getElementById('deviceHash').value = localStorage.getItem('device_id');

        document.querySelectorAll('#ratingStars .star').forEach(star => {
            star.addEventListener('click', function () {
                let rating = this.dataset.value;

                document.getElementById('modalRating').value = rating;

                document.querySelectorAll('.star').forEach(s => {
                    s.classList.toggle('active', s.dataset.value <= rating);
                });

                new bootstrap.Modal(
                    document.getElementById('ratingModal')
                ).show();
            });
        });
    </script>
@endpush