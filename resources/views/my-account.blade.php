<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Malik Motors</title>
    <link rel="stylesheet" href="{{ asset('css/manual-styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}">
    <style>
        .account-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .account-header {
            background: linear-gradient(135deg, #c1121f, #a10e1a);
            color: white;
            padding: 40px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .account-header h1 {
            margin: 0;
            font-size: 2.5rem;
        }
        
        .account-header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
        }
        
        .account-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .sidebar {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            height: fit-content;
        }
        
        .profile-section {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .profile-avatar {
            width: 100px;
            height: 100px;
            background: #c1121f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 2rem;
            font-weight: bold;
        }
        
        .nav-menu {
            list-style: none;
            padding: 0;
        }
        
        .nav-menu li {
            margin-bottom: 10px;
        }
        
        .nav-menu a {
            display: block;
            padding: 12px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .nav-menu a:hover, .nav-menu a.active {
            background: #c1121f;
            color: white;
        }
        
        .content-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .info-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            color: #495057;
        }
        
        .info-value {
            color: #212529;
        }
        
        .booking-card {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s;
        }
        
        .booking-card:hover {
            border-color: #c1121f;
            box-shadow: 0 2px 8px rgba(193, 18, 31, 0.1);
        }
        
        .booking-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background: #d4edda;
            color: #155724;
        }
        
        .status-completed {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        
        .btn-primary {
            background: #c1121f;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s;
        }
        
        .btn-primary:hover {
            background: #a10e1a;
            color: white;
        }
        
        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }
        
        .logout-btn:hover {
            background: #c82333;
        }
        
        @media (max-width: 768px) {
            .account-grid {
                grid-template-columns: 1fr;
            }
            
            .account-header {
                padding: 20px;
            }
            
            .account-header h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.jpg') }}" alt="Malik Motors Logo" class="logo">
            <a href="{{ url('/') }}" class="header-link"><h1>Malik Motors</h1></a>
            
            <!-- NAVIGATION BAR-->
            <div class="nav-wrapper">
                <nav class="navigation">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ url('/contact-us') }}">Contact Us</a>
                    <a href="{{ url('/rent-now') }}">Rent Now</a>
                </nav>
                @if (Auth::user()->role == 'user')
                <a href="{{ url('/my-account') }}" class="register">My Account</a>
                
                @else 
                <a href="{{ route('dashboard') }}" class="register">My Account</a>   
                @endif
            </div>
        </div>
    </div>

    <div class="account-container">
        <div class="account-header">
            <h1>My Account</h1>
            <p>Manage your profile, bookings, and preferences</p>
        </div>

        <div class="account-grid">
            <div class="sidebar">
                <div class="profile-section">
                    <div class="profile-avatar">
                        {{ substr(Auth::user()->name ?? 'Guest', 0, 1) }}
                    </div>
                    <h3>{{ Auth::user()->name ?? 'Guest User' }}</h3>
                    <p>{{ Auth::user()->email ?? 'guest@example.com' }}</p>
                    <p>{{ Auth::user()->role ?? 'guest@example.com' }}</p>
                </div>

                <ul class="nav-menu">
                    <li><a href="#profile" class="active"><i class="fas fa-user"></i> Profile</a></li>
                    <li><a href="#bookings"><i class="fas fa-car"></i> My Bookings</a></li>
                    <li><a href="#settings"><i class="fas fa-cog"></i> Settings</a></li>
                </ul>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>

            <div class="content-section">
                <div id="profile">
                    <h2>Personal Information</h2>
                    <div class="info-card">
                        <div class="info-row">
                            <span class="info-label">Full Name:</span>
                            <span class="info-value">{{ Auth::user()->name ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Email Address:</span>
                            <span class="info-value">{{ Auth::user()->email ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Phone Number:</span>
                            <span class="info-value">{{ Auth::user()->phone ?? '+92-xxx-xxxxxxx' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Member Since:</span>
                            <span class="info-value">{{ optional(Auth::user())->created_at ? optional(Auth::user())->created_at->format('F j, Y') : 'Recently' }}</span>
                        </div>
                    </div>

                    <h3>Address Information</h3>
                    <div class="info-card">
                        <div class="info-row">
                            <span class="info-label">Address:</span>
                            <span class="info-value">{{ Auth::user()->address ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">City:</span>
                            <span class="info-value">{{ Auth::user()->city ?? 'Not provided' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Country:</span>
                            <span class="info-value">Pakistan</span>
                        </div>
                    </div>

                    <a href="#" class="btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>

                </div>




                        <!-- Edit Profile Modal -->
        <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <!-- Full Name -->
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', Auth::user()->name) }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone', Auth::user()->phone) }}">
                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address"
                        class="form-control @error('address') is-invalid @enderror"
                        value="{{ old('address', Auth::user()->address) }}">
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- City -->
                <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city"
                        class="form-control @error('city') is-invalid @enderror"
                        value="{{ old('city', Auth::user()->city) }}">
                    @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <hr class="my-3">
                <p class="mb-2"><strong>Change Password (Optional)</strong></p>

                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Leave blank to keep current">
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" style="background:#c1121f; border:none;">Save Changes</button>
                </div>
            </form>
            </div>
        </div>
        </div>

                <div id="bookings" style="display: none;">
    <h2>My Bookings</h2>

    @if(isset($bookings) && $bookings->count())
        @foreach($bookings as $booking)
            <div class="booking-card">
                <!-- Car Details -->
                <h4>{{ $booking->car->name ?? 'Car Deleted' }}</h4>
                @if($booking->car)
                    <p><strong>Type:</strong> {{ ucfirst($booking->car->type) }}</p>
                    <p><strong>Transmission:</strong> {{ ucfirst($booking->car->transmission) }}</p>
                    <p><strong>Seats:</strong> {{ $booking->car->seats }}</p>
                    <img src="{{ asset('storage/'.$booking->car->image) }}" 
                         alt="{{ $booking->car->name }}" width="150">
                @else
                    <p><em>This car record no longer exists.</em></p>
                @endif

                <!-- Booking Details -->
                <p><strong>Booking ID:</strong> #BK{{ $booking->id }}</p>
                <p><strong>Pickup:</strong> {{ $booking->pickup_location }} - {{ \Carbon\Carbon::parse($booking->pickup_at)->format('d M Y, h:i A') }}</p>
                <p><strong>Return:</strong> {{ $booking->return_location }} - {{ \Carbon\Carbon::parse($booking->return_at)->format('d M Y, h:i A') }}</p>
                <p><strong>Total Amount:</strong> Rs {{ number_format($booking->total_amount, 0) }}</p>

                <!-- Status -->
                @php
                    $statusClass = match($booking->status) {
                        'confirmed' => 'status-active booking-status',
                        'cancelled' => 'status-cancelled booking-status',
                        'completed' => 'status-completed booking-status',
                        default     => 'booking-status'
                    };
                @endphp

                <span class="{{ $statusClass }}">
                    {{ ucfirst($booking->status) }}
                </span>
            </div>
        @endforeach
    @else
        <div class="info-card">
            <p>You have no bookings yet.</p>
            <a href="{{ url('/rent-now') }}" class="btn-primary">Book a Car</a>
        </div>
    @endif
</div>



                <div id="settings" style="display: none;">
                    <h2>Account Settings</h2>
                    <div class="info-card">
                        <h4>Notification Preferences</h4>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">Email notifications for booking confirmations</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked>
                            <label class="form-check-label">SMS notifications for booking updates</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Marketing emails and special offers</label>
                        </div>
                    </div>
                </div>

                <div id="payment" style="display: none;">
                    <h2>Payment Methods</h2>
                    <div class="info-card">
                        <h4>Saved Payment Methods</h4>
                        <p>No payment methods saved yet.</p>
                        <a href="#" class="btn-primary">Add Payment Method</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-menu a');
    const contentSections = ['profile', 'bookings', 'settings', 'payment'];

    function hideAllSections() {
        contentSections.forEach(section => {
            const el = document.getElementById(section);
            if (el) el.style.display = 'none';
        });
    }

    function setActiveLink(targetId) {
        navLinks.forEach(l => l.classList.remove('active'));
        const link = document.querySelector('.nav-menu a[href="#' + targetId + '"]');
        if (link) link.classList.add('active');
    }

    function showSection(targetId) {
        hideAllSections();
        const targetEl = document.getElementById(targetId);
        if (targetEl) targetEl.style.display = 'block';
        setActiveLink(targetId);
        // update URL hash without scrolling
        history.replaceState(null, null, '#' + targetId);
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = this.getAttribute('href').substring(1);
            showSection(target);
        });
    });

    // If page loaded with a hash (e.g. /my-account#bookings), open that tab
    if (location.hash) {
        const hashTarget = location.hash.substring(1);
        if (contentSections.includes(hashTarget)) {
            showSection(hashTarget);
        } else {
            showSection('profile');
        }
    } else {
        // Default: show profile
        showSection('profile');
    }

    // If server-side validation errors exist, open the Edit Profile modal
    @if ($errors->any())
        (function() {
            var modalEl = document.getElementById('editProfileModal');
            if (modalEl) {
                var myModal = new bootstrap.Modal(modalEl);
                myModal.show();
            }
        })();
    @endif
});
</script>

    <script>
        // Navigation functionality
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-menu a');
            const contentSections = ['profile', 'bookings', 'settings', 'payment'];
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Hide all content sections
                    contentSections.forEach(section => {
                        const element = document.getElementById(section);
                        if (element) {
                            element.style.display = 'none';
                        }
                    });
                    
                    // Show selected section
                    const targetSection = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetSection);
                    if (targetElement) {
                        targetElement.style.display = 'block';
                    }
                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        @if ($errors->any())
                        var modalEl = document.getElementById('editProfileModal');
                        if (modalEl) {
                            var myModal = new bootstrap.Modal(modalEl);
                            myModal.show();
                        }
                        @endif
                    });
                    </script>

                });
            });
        });
    </script>
</body>
</html>
