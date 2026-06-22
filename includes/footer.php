<?php
// ======================================================
// includes/footer.php
// FOOTER MODERN - RESPONSIVE + GLASSMORPHISM
// ======================================================
?>

    </div> <!-- end content -->
  </div> <!-- end main -->
</div> <!-- end wrapper -->

<footer class="footer-modern">
  <div class="footer-container">
    <div class="footer-left">
      <i class="fas fa-shield-alt"></i>
      <span>&copy; <?= date('Y'); ?> RBAC Secure System</span>
    </div>
  </div>
</footer>

<!-- Font Awesome 6 (jika belum di-load di head) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
  /* ========== FOOTER MODERN ========== */
  .footer-modern {
    background: rgba(255, 255, 255, 0.96);
    backdrop-filter: blur(4px);
    border-top: 1px solid rgba(37, 99, 235, 0.15);
    padding: 1rem 2rem;
    margin-top: auto;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.02);
  }

  .footer-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    font-size: 0.8rem;
    color: #5b6e8c;
    max-width: 1400px;
    margin: 0 auto;
  }

  .footer-left i,
  .footer-center i,
  .footer-right i {
    color: #2563eb;
    margin-right: 6px;
    font-size: 0.85rem;
  }

  .footer-left span,
  .footer-center,
  .footer-right span {
    font-weight: 500;
  }

  .footer-right #footerClock {
    font-family: 'Courier New', monospace;
    font-weight: 600;
    background: #f1f5f9;
    padding: 4px 10px;
    border-radius: 40px;
    margin-left: 5px;
  }

  /* Responsive */
  @media (max-width: 640px) {
    .footer-modern {
      padding: 0.8rem 1rem;
    }
    .footer-container {
      flex-direction: column;
      text-align: center;
      gap: 0.5rem;
    }
    .footer-left, .footer-center, .footer-right {
      width: 100%;
    }
    .footer-right #footerClock {
      display: inline-block;
      margin-top: 4px;
    }
  }
</style>

<script>
  // Jam realtime di footer
  function updateFooterClock() {
    const now = new Date();
    const jam = String(now.getHours()).padStart(2, '0');
    const menit = String(now.getMinutes()).padStart(2, '0');
    const detik = String(now.getSeconds()).padStart(2, '0');
    const clockSpan = document.getElementById('footerClock');
    if (clockSpan) {
      clockSpan.innerText = `${jam}:${menit}:${detik}`;
    }
  }
  setInterval(updateFooterClock, 1000);
  updateFooterClock();
</script>

</body>
</html>