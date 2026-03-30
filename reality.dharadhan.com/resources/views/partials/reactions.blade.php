@php
    $userReactions = auth()->check()
        ? $property->reactions->pluck('type')->toArray()
        : [];
@endphp
<div class="property-actions pb-2" data-id="{{ $property->id }}">        
    <button class="reaction-btn favourite-btn {{ in_array('favourite', $userReactions) ? 'active' : '' }}" data-type="favourite">
        <i class="fas fa-heart"></i> <span class="favourite-count">{{ $property->favourites->count() }}</span>
    </button>
    <div class="media-count text-dark">
        <span><i class="fas fa-image"></i> {{ $property->images_count ?? 0 }}</span>
        <span><i class="fas fa-video"></i> {{ optional($property->videos)->count() ?? 0 }}</span>
    </div>
    <!-- <button class="reaction-btn like-btn {{ in_array('like', $userReactions) ? 'active' : '' }}" data-type="like">
        <i class="fas fa-thumbs-up"></i> <span class="like-count">{{ $property->likes->count() }}</span>
    </button>

    <button class="reaction-btn dislike-btn {{ in_array('dislike', $userReactions) ? 'active' : '' }}" data-type="dislike">
        <i class="fas fa-thumbs-down"></i> <span class="dislike-count">{{ $property->dislikes->count() }}</span>
    </button> -->
</div>

@push('styles')
    <style>
        .property-actions {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .reaction-btn {
            background: #103c3b;
            color: #fff;
            border: none;
            padding: 6px 10px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .reaction-btn.active {
            background: #cf5d3b94;
        }

    </style>
@endpush

@push('scripts')
    <script>
        $('.reaction-btn').click(function () {
            let btn = $(this);
            let wrapper = btn.closest('.property-actions');
            let propertyId = wrapper.data('id');
            let type = btn.data('type');

            if (btn.prop('disabled')) return;
            btn.prop('disabled', true);

            $.ajax({
                url: "{{ route('property.reaction') }}",
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    property_id: propertyId,
                    type: type
                },
                success: function (res) {
                    // Update counts from server
                    wrapper.find('.like-count').text(res.likes);
                    wrapper.find('.dislike-count').text(res.dislikes);
                    wrapper.find('.favourite-count').text(res.favourites);

                    // Reset active states
                    wrapper.find('.reaction-btn').removeClass('active');

                    // Apply active state
                    res.user_reaction.forEach(function (type) {
                        wrapper.find(`[data-type="${type}"]`).addClass('active');
                    });
                    toastr.success('You have ' + type + 'd this property.');
                },
                error: function (xhr) {
                    if (xhr.status === 401) {
                        toastr.info('Please log in to react to properties.');
                        $('#authModal').modal('show');
                    }
                },
                complete: function () {
                    btn.prop('disabled', false);
                }
            });
        });

    </script>
@endpush