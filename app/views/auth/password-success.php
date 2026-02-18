<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="text-center">

        <div class="mb-3">
            <div class="text-success fs-1">✅</div>
        </div>

        <h3>Password Set Successfully</h3>
        <p class="text-muted">
            Redirecting to login in <span id="countdown">5</span> seconds...
        </p>

        <a href="index.php?url=login" class="btn btn-primary mt-3">
            Go to Login Now
        </a>
    </div>
</div>

<script>
let count = 5;
const el = document.getElementById('countdown');

setInterval(() => {
    count--;
    el.textContent = count;
    if (count === 0) window.location.href = 'index.php?url=login';
}, 1000);
</script>
