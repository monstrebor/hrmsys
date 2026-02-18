<style>
    /* =================================================
   SIDEBAR STYLES
   ================================================= */
    .sidebar {
        width: 280px;
        background: var(--green);
        color: var(--white);
        padding: 26px 20px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        gap: 18px;
        height: 100vh;
        position: sticky;
        top: 0;

        /* Sidebar scrolling behavior */
        overflow-y: auto;
        scrollbar-gutter: stable;

        /* Firefox scrollbar */
        scrollbar-width: thin;
        scrollbar-color: transparent transparent;
    }

    /* Sidebar scrollbar visible on hover */
    .sidebar:hover {
        scrollbar-color: #494949 rgba(255, 255, 255, 0.15);
    }

    /* Sidebar scrollbar (Chrome / Edge / Safari) */
    .sidebar::-webkit-scrollbar {
        width: 0;
        transition: width 0.3s;
    }

    .sidebar:hover::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 10px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }

    /* Sidebar user info container */
    .sidebar-user {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
    }

    /* Sidebar user icon (top-right) */
    .sidebar-user-icon {
        position: absolute;
        top: 14px;
        right: 14px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition:
            background 0.2s ease,
            transform 0.15s ease;
    }

    .sidebar-user-icon:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: scale(1.05);
    }

    .sidebar-user-icon svg {
        width: 18px;
        height: 18px;
        color: #fff;
    }

    /* Sidebar avatar */
    .user-avatar {
        width: 85px;
        height: 85px;
        background-color: #444;
        color: #fff;
        font-weight: bold;
        font-size: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin-bottom: 10px;
    }

    /* Sidebar user text */
    .user-name {
        font-weight: 600;
        color: #fff;
        font-size: 13px;
        text-align: center;
    }

    .user-email {
        text-align: center;
        font-size: 12px;
        opacity: 0.8;
        margin-bottom: 20px;
    }

    /* Sidebar brand / logo */
    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 6px;
        padding-bottom: 220px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .brand .logo {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: var(--white);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: var(--green);
        font-weight: 700;
        font-size: 18px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    }

    .brand h1 {
        font-size: 18px;
        margin: 0;
        font-weight: 600;
        letter-spacing: 0.2px;
    }

    /* Sidebar navigation links */
    nav.sidebar-nav {
        display: flex;
        flex-direction: column;
        margin-top: 6px;
    }

    nav.sidebar-nav h3 {
        font-size: 15px;
        font-weight: 700;
        color: var(--green-600);
        margin-bottom: 6px;
    }

    nav.sidebar-nav a {
        color: rgba(255, 255, 255, 0.95);
        text-decoration: none;
        padding: 10px 12px;
        border-radius: 8px;
        display: inline-block;
        font-size: 15px;
        font-weight: 600;
        letter-spacing: 0.2px;
        margin-bottom: 10px;
    }

    nav.sidebar-nav a:last-child {
        margin-bottom: 0;
    }

    nav.sidebar-nav a:focus,
    nav.sidebar-nav a:hover {
        background: rgba(255, 255, 255, 0.08);
        outline: none;
    }

    /* Sidebar footer / dividers */
    .sidebar-footer {
        margin-top: auto;
        font-size: 13px;
        opacity: 0.95;
    }

    .sidebar-line {
        height: 1px;
        background: rgba(255, 255, 255, 0.3);
        margin: 8px 0;
    }
</style>


<!-- SIDEBAR -->
<aside
    class="sidebar"
    id="sidebar"
    aria-label="Main navigation"
    data-open="false">

    <!-- USER INFO (top) -->
    <div class="sidebar-user">
        <div class="user-info">
            <div class="user-name"></div>
            <div class="user-email"></div>
        </div>
    </div>

    <!-- NAVIGATION -->
    <nav class="sidebar-nav" role="navigation" aria-label="Sidebar links">
        <h3>Dashboard</h3>
        <a href="#">Master Files</a>
        <a href="#">Encounters</a>
        <a href="#">Nursing Services</a>

        <div class="sidebar-line"></div>

        <h3>Billing</h3>
        <a href="#">Laboratory Fees</a>
        <a href="#">Ward / Room Fee</a>
        <a href="#">Professional's Fee</a>
        <a href="#">Billing Statement of Patient</a>

        <div class="sidebar-line"></div>

        <h3>Claim Generation & Submission</h3>
        <a href="#">Denial Management and Appeals</a>
        <a href="#">Appointments</a>
        <a href="#">Claiming Form</a>

        <div class="sidebar-line"></div>

        <h3>Payment Processing</h3>
        <a href="#">PhilHealth (Public Sector)</a>
        <a href="#">HMOs (Private Sector)</a>

        <div class="sidebar-line"></div>

        <h3>Reports</h3>
        <a href="#">Invoice Record</a>
        <a href="#">Inpatients (Tag as MGH)</a>
        <a href="#">Outpatients</a>
    </nav>
</aside>




<script>
    (function() {
        const toggle = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar"); // existing sidebar

        if (!toggle || !sidebar) return;

        function setOpen(open) {
            sidebar.setAttribute("data-open", open);
            toggle.setAttribute("aria-expanded", open);
        }

        toggle.addEventListener("click", function(e) {
            e.stopPropagation();
            const open = sidebar.getAttribute("data-open") === "true";
            setOpen(!open);
        });
    })();
</script>