<style>
  /* ===============================
TOPBAR / NAVBAR
=============================== */
  .topbar {
    height: 72px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 0 20px;
    background: var(--topbar-bg);
    border-bottom: 1px solid var(--topbar-border);
    position: sticky;
    top: 0;
    z-index: 50;
  }

  /* Left side (menu button etc.) */
  .topbar-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  /* Hamburger menu */
  .menu-toggle {
    display: none;
    background: transparent;
    border: 0;
    padding: 8px;
    border-radius: 10px;
    cursor: pointer;
    font-size: 18px;
  }

  /* Right side actions */
  .top-actions {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  /* Icon button (profile) */
  .icon-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    border-radius: 10px;
    background: transparent;
    border: 1px solid rgba(0, 0, 0, 0.06);
    cursor: pointer;
  }

  /* Realtime clock */
  .realtime {
    font-size: 14px;
    font-weight: 600;
    padding: 8px 12px;
    border-radius: 10px;
    background: rgba(0, 0, 0, 0.04);
    border: 1px solid rgba(0, 0, 0, 0.06);
    letter-spacing: 0.3px;
  }

  body.dark .realtime {
    background: rgba(255, 255, 255, 0.06);
  }

  /* ===============================
RESPONSIVE (navbar only)
=============================== */
  @media (max-width: 720px) {
    .menu-toggle {
      display: inline-flex;
    }
  }
</style>


<header class="topbar" role="banner">
  <div class="topbar-left"><button class="menu-toggle"
      id="menuToggle"
      aria-controls="sidebar"
      aria-expanded="false"
      aria-label="Toggle menu">☰ </button></div>
  <div class="top-actions" role="navigation" aria-label="Top actions">
    <div class="realtime" id="realtimeClock" aria-live="polite">--:-- </div>
    <button class="icon-btn" title="Profile" aria-label="Profile"><svg width="18"
        height="18"
        viewBox="0 0 24 24"
        fill="none"
        aria-hidden="true">
        <circle cx="12"
          cy="8"
          r="4"
          stroke="currentColor"
          stroke-width="2" />
        <path d="M4 20c0-4 4-6 8-6s8 2 8 6"
          stroke="currentColor"

          stroke-width="2" />
      </svg></button>
  </div>
</header>
<script>

</script>