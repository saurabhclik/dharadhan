<div class="phone widget-boxed mt-5">
    <div class="card widget-boxed-body" id="qrCard">
        <div class="avatar">
            @if($user->photo)
                <img width="40" height="40" class="br-100"
                    src="{{ getUserPhoto($user) }}" alt="User Photo">
            @else
                <i class="fa-regular fa-user"></i>
            @endif
        </div>

        <h2 title="{{ $user->name }}">{{ \Illuminate\Support\Str::limit($user->name, 20) }}</h2>
        <div class="subtitle">{{ 'Agent at ' . get_setting('app_name') }}</div>

        <div class="qr">{!! QrCode::size(200)->generate(route('submit.request', ['ref' => encrypt($user->id)])) !!}</div>

        <div class="actions">
            <div onclick="navigator.share({ url: '{{ route('submit.request', ['ref' => encrypt($user->id)]) }}' })">
                <i class="fa fa-share"></i> Share my code
            </div>
            <div onclick="downloadCard()">
                <i class="fa fa-download"></i> Save to Photos
            </div>
        </div>
    </div>
</div>

<style>
    .phone {
        background: #e9edf2;
        border-radius: 18px;
        padding: 12px
    }

    .tabs {
        display: flex;
        background: #1e6fb9;
        border-radius: 8px;
        overflow: hidden
    }

    .tab {
        flex: 1;
        text-align: center;
        padding: 10px;
        color: #fff;
        font-size: 14px;
        cursor: pointer
    }

    .tab.active {
        background: #165a96
    }

    .card {
        position: relative;
        background: #fff;
        border-radius: 16px;
        padding: 30px 20px 24px;
        margin-top: 12px;
        text-align: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, .08);
    }

    .hidden {
        display: none
    }

    .avatar {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        margin: 0 auto 10px;
        overflow: hidden;
        border: 3px solid #f2f4f7;
        background: #ddd;
    }

    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    #qrCard h2 {
        font-size: 18px;
        margin: 12px 0 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .subtitle {
        font-size: 13px;
        color: #666;
        margin-bottom: 16px
    }

    .qr {
        width: 220px;
        height: 220px;
        display: block;
        margin: 14px auto 0;
    }

    .actions {
        margin-top: 16px;
        font-size: 14px;
        color: #1e6fb9
    }

    .actions div {
        margin-top: 6px;
        cursor: pointer
    }

    .scan-box {
        padding: 20px;
        color: #555;
        font-size: 14px
    }

    .exporting .actions {
        display: none !important;
    }

    /* Square card during export */
    .exporting {
        border-radius: 0 !important;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    function showTab(tab) {
        document.getElementById('myTab').classList.add('hidden');
        document.getElementById('scanTab').classList.add('hidden');

        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));

        if (tab === 'my') {
            document.getElementById('myTab').classList.remove('hidden');
            document.querySelector('.tab:first-child').classList.add('active');
        } else {
            document.getElementById('scanTab').classList.remove('hidden');
            document.querySelector('.tab:last-child').classList.add('active');
        }
    }
</script>

<script>
    function downloadCard() {
        const card = document.getElementById('qrCard');
        card.classList.add('exporting');
        html2canvas(card, {
            scale: 3,
            useCORS: true,
            backgroundColor: '#ffffff',
            scrollY: -window.scrollY
        }).then(canvas => {
            const link = document.createElement('a');
            link.download = '{{ $user->name }}.png';
            link.href = canvas.toDataURL('image/png');
            link.click();
            card.classList.remove('exporting');
        });
    }
</script>
