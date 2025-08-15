document.addEventListener('DOMContentLoaded', function() {
    // Load farmhouses data and render
    fetchFarmhouses();
    
    // Initialize page navigation
    initPageNavigation();
    
    // Initialize amenities
    initAmenities();
    
    // Initialize price toggles
    initPriceToggles();
    
    // Initialize booking form
    initBookingForm();
});

// Farmhouses data and rendering
function fetchFarmhouses() {
    fetch('farms.json')
        .then(response => response.json())
        .then(data => renderFarmhouses(data))
        .catch(error => console.error('Error loading farmhouses:', error));
}

function renderFarmhouses(farms) {
    const container = document.getElementById('farmhouses-container');
    
    farms.forEach(farm => {
        const farmElement = document.createElement('div');
        farmElement.className = 'farmhouse-card';
        farmElement.innerHTML = `
            <div class="position-relative">
                <img src="${farm.image}" alt="${farm.name}" class="farmhouse-img">
                ${farm.recommended ? '<span class="farmhouse-badge">Most Recommended</span>' : ''}
            </div>
            <div class="farmhouse-body">
                <p class="fw-bold mb-1">${farm.price}</p>
                <p class="small mb-1">${farm.name}</p>
                <p class="small text-muted mb-2">
                    <i class="bi bi-geo-alt text-primary"></i> ${farm.location}
                </p>
                <div class="d-flex justify-content-between small">
                    <span><i class="bi bi-bed text-primary"></i> ${farm.bedrooms} Bedroom</span>
                    <span><i class="bi bi-person text-primary"></i> ${farm.maxPersons} Person Max</span>
                </div>
            </div>
        `;
        
        // Add click event to navigate to info page
        farmElement.addEventListener('click', function() {
            document.getElementById('home-page').classList.add('d-none');
            document.getElementById('info-page').classList.remove('d-none');
            window.scrollTo(0, 0);
        });
        
        container.appendChild(farmElement);
    });
}

// Page navigation
function initPageNavigation() {
    // In a real app, you would use proper routing
    // This is a simplified version for demo purposes
    const backButton = document.createElement('button');
    backButton.className = 'btn btn-outline-primary mb-3 d-none d-lg-block';
    backButton.innerHTML = '<i class="bi bi-arrow-left"></i> Back to Listings';
    backButton.addEventListener('click', function() {
        document.getElementById('info-page').classList.add('d-none');
        document.getElementById('home-page').classList.remove('d-none');
    });
    
    document.getElementById('info-page').querySelector('.container').prepend(backButton);
}

// Amenities setup
function initAmenities() {
    const amenitiesData = {
        "Common": [
            { icon: '<i class="bi bi-water"></i>', label: "Private Swimming Pool (25*12*6)" },
            { icon: '<i class="bi bi-emoji-smile"></i>', label: "Child Pool" },
            { icon: '<i class="bi bi-tree"></i>', label: "Garden" },
            { icon: '<i class="bi bi-brightness-alt-high"></i>', label: "Swing" },
            { icon: '<i class="bi bi-speaker"></i>', label: "Sound System" },
            { icon: '<i class="bi bi-battery-charging"></i>', label: "Inverter" },
            { icon: '<i class="bi bi-palette"></i>', label: "Extra Mattress (8)" },
            { icon: '<i class="bi bi-box-seam"></i>', label: "Khatla (2)" },
            { icon: '<i class="bi bi-chair"></i>', label: "Chairs (4)" },
            { icon: '<i class="bi bi-car-front"></i>', label: "Private Parking Area" },
            { icon: '<i class="bi bi-p-square"></i>', label: "Street Parking" },
            { icon: '<i class="bi bi-basket"></i>', label: "Food Delivery (Paid)" }
        ],
        "Living Room": [
            { icon: '<i class="bi bi-sofa"></i>', label: "Sofa(2)" },
            { icon: '<i class="bi bi-table"></i>', label: "Table" },
            { icon: '<i class="bi bi-fan"></i>', label: "Ceiling Fan" },
            { icon: '<i class="bi bi-toilet"></i>', label: "Bathroom Attach Toilet" }
        ],
        "Kitchen": [
            { icon: '<i class="bi bi-stove"></i>', label: "Stove" },
            { icon: '<i class="bi bi-fire"></i>', label: "Gas Bottle" },
            { icon: '<i class="bi bi-egg-fried"></i>', label: "Utensils(Basic Facilities)" },
            { icon: '<i class="bi bi-droplet"></i>', label: "Water Facility" },
            { icon: '<i class="bi bi-fan"></i>', label: "Ceiling Fan" }
        ],
        "Bedroom 1": [
            { icon: '<i class="bi bi-bed"></i>', label: "Double Bed" },
            { icon: '<i class="bi bi-snow"></i>', label: "Air Conditioning" },
            { icon: '<i class="bi bi-fan"></i>', label: "Ceiling Fan" },
            { icon: '<i class="bi bi-box-seam"></i>', label: "Clothes Storage" },
            { icon: '<i class="bi bi-mirror"></i>', label: "Mirror Glass" },
            { icon: '<i class="bi bi-door-open"></i>', label: "Balcony" },
            { icon: '<i class="bi bi-flower1"></i>', label: "Garden View" },
            { icon: '<i class="bi bi-water"></i>', label: "Swimming Pool View" },
            { icon: '<i class="bi bi-toilet"></i>', label: "Bathroom Attach Toilet" }
        ],
        "Bedroom 2": [
            { icon: '<i class="bi bi-bed"></i>', label: "Double Bed" },
            { icon: '<i class="bi bi-snow"></i>', label: "Air Conditioning" },
            { icon: '<i class="bi bi-fan"></i>', label: "Ceiling Fan" },
            { icon: '<i class="bi bi-box-seam"></i>', label: "Clothes Storage" },
            { icon: '<i class="bi bi-mirror"></i>', label: "Mirror Glass" },
            { icon: '<i class="bi bi-flower1"></i>', label: "Garden View" },
            { icon: '<i class="bi bi-water"></i>', label: "Swimming Pool View" },
            { icon: '<i class="bi bi-toilet"></i>', label: "Bathroom Attach Toilet" }
        ]
    };

    // Render amenities for each tab
    Object.keys(amenitiesData).forEach(tab => {
        const container = document.getElementById(`${tab.toLowerCase().replace(' ', '-')}-amenities`);
        if (container) {
            amenitiesData[tab].forEach(item => {
                const amenityElement = document.createElement('div');
                amenityElement.className = 'amenity-item';
                amenityElement.innerHTML = `
                    <span class="amenity-icon">${item.icon}</span>
                    <span>${item.label}</span>
                `;
                container.appendChild(amenityElement);
            });
        }
    });
}

// Price toggles (AC/Non-AC)
function initPriceToggles() {
    const prices = {
        "non-ac": {
            regular12: 4000,
            regular24: 6000,
            weekend12: 10000,
            weekend24: 10000,
            couple12: 3000,
            couple24: 4500
        },
        "ac": {
            regular12: 6000,
            regular24: 9000,
            weekend12: 15000,
            weekend24: 20000,
            couple12: 6000,
            couple24: 7500
        }
    };

    const toggleButtons = document.querySelectorAll('.toggle-btn');
    
    toggleButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Update active state
            toggleButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Update prices
            const type = this.dataset.type;
            const priceData = prices[type];
            
            Object.keys(priceData).forEach(key => {
                const element = document.getElementById(key);
                if (element) {
                    element.textContent = `₹${priceData[key]}`;
                }
            });
        });
    });
}

// Booking form handling
function initBookingForm() {
    const form = document.getElementById('booking-form');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // In a real app, you would send this data to your backend
            alert('Enquiry submitted successfully! We will contact you shortly.');
            form.reset();
        });
    }
}