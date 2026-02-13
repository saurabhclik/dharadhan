<!-- Property Categories -->
<section class="categories-section">
    <div class="container">
        <h2>We've Got Properties for You</h2>
        <div class="category-grid">
            <div class="category-card" style="background-image: url('v2/images/OwnerProperties.png'); background-size: cover; background-position: center;">
                <div class="category-overlay">
                    <h3>{{ $countByOwner['owner'] }}+</h3>
                    <p>Owner Properties</p>
                    <button class="arrow-btn">→</button>
                </div>
            </div>
            <div class="category-card" style="background-image: url('v2/images/BudgetHomes.png'); background-size: cover; background-position: center;">
                <div class="category-overlay">
                    <h3>{{ $countBudget }}+</h3>
                    <p>Budget Homes</p>
                    <button class="arrow-btn">→</button>
                </div>
            </div>
            <div class="category-card" style="background-image: url('v2/images/Investments.png'); background-size: cover; background-position: center;">
                <div class="category-overlay">
                    <h3>{{ $totalProperties }}+</h3>
                    <p>For Investment</p>
                    <button class="arrow-btn">→</button>
                </div>
            </div>
        </div>
    </div>
</section>
