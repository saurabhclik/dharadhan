<!-- Agent Section -->
<section class="agent-section">
    <div class="container">
        <div class="agent-content">
            <div class="agent-left">
                <div class="agent-image d-flex align-items-end justify-content-center">
                    <img src="{{ asset('v2/images/agent.png') }}" alt="Agent" width="350">
                </div>
            </div>
            <div class="agent-right">
                <h2>Become a Real Estate Agent</h2>
                <p>Join Dharadhan Property and grow your career in real estate. Get access to verified listings, quality leads, powerful tools, and dedicated support to help you close deals faster and earn more. Start building trust, success, and long-term growth with Dharadhan.</p>
                @guest()
                    <button class="btn btn-primary" onclick="$('#authModal').modal('show'); showRegister();">Become Agent</button>
                @endguest
            </div>
        </div>
    </div>
</section>
